//<?php
/**
 * zem_contact_reborn: A Textpattern CMS plugin for mail delivery of contact forms.
 */

/**
 * Tag: encapsulate a contact form.
 *
 * Triggers the following callbacks:
 *  -> 'zemcontact.form' during form rendering so additional fields can be injected.
 *  -> 'zemcontact.submit' on successful posting of form data. Primarily of use for spam
 *     plugins: they can return a non-zero value to signal that the form should NOT be sent.
 *
 * @param array  $atts  Tag attributes
 * @param string $thing Tag's container content
 */
function zem_contact($atts, $thing = null)
{
	global $sitename, $zem_contact_flags, $zem_contact_from,
		$zem_contact_recipient, $zem_contact_error, $zem_contact_submit,
		$zem_contact_form, $zem_contact_labels, $zem_contact_values;

	extract(zem_contact_lAtts(array(
		'body_form'    => '',
		'class'        => 'zemContactForm',
		'copysender'   => 0,
		'expire'       => 600,
		'form'         => '',
		'from'         => '',
		'from_form'    => '',
		'label'        => gTxt('zem_contact_contact'),
		'redirect'     => '',
		'required'     => '1',
		'show_error'   => 1,
		'show_input'   => 1,
		'send_article' => 0,
		'subject'      => gTxt('zem_contact_email_subject', array('{site}' => html_entity_decode($sitename,ENT_QUOTES))),
		'subject_form' => '',
		'to'           => '',
		'to_form'      => '',
		'thanks'       => graf(gTxt('zem_contact_email_thanks')),
		'thanks_form'  => ''
	), $atts));

	unset($atts['show_error'], $atts['show_input']);
	$zem_contact_form_id = md5(serialize($atts) . preg_replace('/[\t\s\r\n]/', '', $thing));
	$zem_contact_submit = (ps('zem_contact_form_id') == $zem_contact_form_id);
	$override_email_charset = (get_pref('override_emailcharset') && is_callable('utf8_decode'));

	// The $zem_contact_flags['this_form'] global is set if an id is supplied for the <form>.
	// This value then becomes the default value for all html_form (a.k.a. form=)
	// attributes for any input tags in this tag's container, providing HTML 5 is in use.
	$zem_contact_flags['this_form'] = 'zcr' . $zem_contact_form_id;

	// Global toggle for required attribute.
	$zem_contact_flags['required'] = $required;

	$now = time();
	$now_date = date('Y-m-d H:i:s', $now);

	$expire = abs(assert_int($expire));

	static $headers_sent = false;
	if (!$headers_sent) {
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s', $now - (3600 * 24 * 7)) . ' GMT');
		header('Expires: ' . gmdate('D, d M Y H:i:s', $now + $expire) . ' GMT');
		header('Cache-Control: no-cache, must-revalidate');
		$headers_sent = true;
	}

	$nonce = doSlash(ps('zem_contact_nonce'));
	$renonce = false;

	if ($zem_contact_submit) {
		// Could use "interval $expire second" but multiple zem_contact forms could delete data
		// that might be in use by other forms.
		// ToDo: use max(600, $expire)? Not perfect, but ensures a safe minimum deletion rate.
		safe_delete('txp_discuss_nonce', "issue_time < date_sub('$now_date', interval 10 minute)");
		if ($rs = safe_row('used', 'txp_discuss_nonce', "nonce = '$nonce'")) {
			if ($rs['used']) {
				unset($zem_contact_error);
				$zem_contact_error[] = gTxt('zem_contact_form_used');
				$renonce = true;
				$_POST = array();
				$_POST['zem_contact_submit'] = TRUE;
				$_POST['zem_contact_form_id'] = $zem_contact_form_id;
				$_POST['zem_contact_nonce'] = $nonce;
			}
		} else {
			$zem_contact_error[] = gTxt('zem_contact_form_expired');
			$renonce = true;
		}
	}

	if ($zem_contact_submit && $nonce && !$renonce) {
		$zem_contact_nonce = $nonce;
	} elseif (!$show_error || $show_input) {
		$zem_contact_nonce = md5(uniqid(rand(), true));
		safe_insert('txp_discuss_nonce', "issue_time = '" . $now_date . "', nonce = '$zem_contact_nonce'");
	}

	$form = ($form) ? fetch_form($form) : $thing;

	if (empty($form)) {
		$form = '
<txp:zem_contact_text label="'.gTxt('zem_contact_name').'" /><br />
<txp:zem_contact_email /><br />'.
($send_article ? '<txp:zem_contact_email send_article="1" label="'.gTxt('zem_contact_recipient').'" /><br />' : '').
'<txp:zem_contact_textarea /><br />
<txp:zem_contact_submit />
';
	}

	$form = parse($form);

	if ($to_form) {
		$to = parse_form($to_form);
	}

	if (!$to && !$send_article) {
		return gTxt('zem_contact_to_missing');
	}

	$out = '';

	if (!$zem_contact_submit) {
		// Don't show errors or send mail
	} elseif (!empty($zem_contact_error)) {
		if ($show_error || !$show_input) {
			$out .= n.doWrap(array_unique($zem_contact_error), 'ul', 'li', 'zemError').n;

			if (!$show_input) {
				return $out;
			}
		}
	} elseif ($show_input && is_array($zem_contact_form)) {
		// Load and check spam plugins.
		callback_event('zemcontact.submit');
		$evaluation =& get_zemcontact_evaluator();
		$clean = $evaluation->get_zemcontact_status();

		if ($clean != 0) {
			return gTxt('zem_contact_spam');
		}

		if ($from_form) {
			$from = parse_form($from_form);
		}

		if ($subject_form) {
			$subject = parse_form($subject_form);
		}

		$sep = is_windows() ? "\r\n" : "\n";
		$msg = array();

		foreach ($zem_contact_labels as $name => $label) {
			if (!trim($zem_contact_values[$name])) continue;
			$msg[] = $label . ': ' . $zem_contact_values[$name];
		}

		if ($send_article) {
			global $thisarticle;

			$subject = str_replace('&#38;', '&', $thisarticle['title']);
			$msg[] = permlinkurl($thisarticle);
			$msg[] = $subject;
			$s_ar = array('&#8216;', '&#8217;', '&#8220;', '&#8221;', '&#8217;', '&#8242;', '&#8243;', '&#8230;', '&#8211;', '&#8212;', '&#215;', '&#8482;', '&#174;', '&#169;', '&lt;', '&gt;', '&quot;', '&amp;', '&#38;', "\t", '<p');

			if ($override_email_charset) {
				$r_ar = array("'", "'", '"', '"', "'", "'", '"', '...', '-', '--', 'x', '[tm]', '(r)', '(c)', '<', '>', '"', '&', '&', ' ', "\n<p");
			} else {
				$r_ar = array('‘', '’', '“', '”', '’', '?', '?', '…', '–', '—', '×', '™', '®', '©', '<', '>', '"', '&', '&', ' ', "\n<p");
			}

			$msg[] = trim(strip_tags(str_replace($s_ar,$r_ar,(trim(strip_tags($thisarticle['excerpt'])) ? $thisarticle['excerpt'] : $thisarticle['body']))));

			if (empty($zem_contact_recipient)) {
				return gTxt('zem_contact_field_missing', array('{field}' => gTxt('zem_contact_recipient')));
			} else {
				$to = $zem_contact_recipient;
			}
		}

		$msg = implode("\n\n", $msg);

		if ($body_form) {
			$msg = parse_form($body_form);
		}

		$msg = str_replace(array("\r\n", "\r", "\n"), array("\n", "\n", $sep), $msg);

		$reply   = zem_contact_strip($from ? $zem_contact_from : '');
		$from    = zem_contact_strip($from ? $from : $zem_contact_from);
		$to      = zem_contact_strip($to);
		$subject = zem_contact_strip($subject);
		$msg     = zem_contact_strip($msg, false);

		if ($override_email_charset) {
			$charset = 'ISO-8859-1';
			$subject = utf8_decode($subject);
			$msg     = utf8_decode($msg);
		} else {
			$charset = 'UTF-8';
		}

		// ToDo: function deprecated in 4.6.0
		$subject = encode_mailheader($subject, 'text');

		$headers = array(
			'from'          => $from,
			'separator'     => $sep,
			'reply'         => $reply,
			'charset'       => $charset,
			'content_type'  => 'text/plain',
			'xfer_encoding' => '8bit',
		);

		safe_update('txp_discuss_nonce', "used = '1', issue_time = '$now_date'", "nonce = '$nonce'");

		if (zem_contact_deliver($to, $subject, $msg, $headers)) {
			$_POST = array();

			if ($copysender && $zem_contact_from) {
				zem_contact_deliver(zem_contact_strip($zem_contact_from), $subject, $msg, $headers);
			}

			if ($redirect) {
				while (@ob_end_clean());
				$uri = hu.ltrim($redirect,'/');

				if (empty($_SERVER['FCGI_ROLE']) && empty($_ENV['FCGI_ROLE'])) {
					txp_status_header('303 See Other');
					header('Location: '.$uri);
					header('Connection: close');
					header('Content-Length: 0');
				} else {
					$uri = txpspecialchars($uri);
					$refresh = gTxt('zem_contact_refresh');
					echo <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>$sitename</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="refresh" content="0;url=$uri" />
</head>
<body>
<a href="$uri">$refresh</a>
</body>
</html>
END;
				}

				exit;
			} else {
				return '<div class="zemThanks" id="zcr'.$zem_contact_form_id.'">' .
					($thanks_form ? parse_form($thanks_form) : $thanks) .
					'</div>';
			}
		} else {
			$out .= graf(gTxt('zem_contact_mail_sorry'));
		}
	}

	if ($show_input && !$send_article || gps('zem_contact_send_article')) {
		return '<form method="post"' . ((!$show_error && $zem_contact_error) ? '' : ' id="zcr' . $zem_contact_form_id . '"') . ' class="' . $class . '" action="' . txpspecialchars(serverSet('REQUEST_URI')) . '#zcr' . $zem_contact_form_id . '">' .
			($label ? n . '<fieldset>' : n . '<div>') .
			($label ? n . '<legend>' . txpspecialchars($label) . '</legend>' : '') .
			$out .
			n . '<input type="hidden" name="zem_contact_nonce" value="' . $zem_contact_nonce . '" />' .
			n . '<input type="hidden" name="zem_contact_form_id" value="' . $zem_contact_form_id . '" />' .
			$form .
			callback_event('zemcontact.form') .
			($label ? (n . '</fieldset>') : (n . '</div>')) .
			n . '</form>';
	}

	return '';
}

/**
 * Tag: Render a text input field.
 *
 * Many different $types are allowed. In fact, the $type attribute is not
 * restricted in any way to allow for any future types. This does bring some
 * developer responsibility if you wish your document to validate because
 * not all attributes will be valid for all input types, despite the plugin
 * faithfully rendering whatever attributes it is given.
 *
 * A lot of invalid situations are recognised (e.g. only permitting max/min/step
 * to occur on 'numeric' input types) but some are not easily trappable so they
 * are left to user discretion.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function zem_contact_text($atts)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_flags;

	extract(zem_contact_lAtts(array(
		'autocomplete' => '',
		'break'        => br,
		'class'        => 'zemText',
		'default'      => '',
		'html_form'    => $zem_contact_flags['this_form'],
		'isError'      => '',
		'label'        => gTxt('zem_contact_text'),
		'max'          => 100,
		'min'          => 0,
		'name'         => '',
		'pattern'      => '',
		'placeholder'  => '',
		'required'     => $zem_contact_flags['required'],
		'size'         => '',
		'step'         => '',
		'type'         => 'text',
	), $atts));

	$numeric_types = array(
		'date',
		'datetime',
		'datetime-local',
		'month',
		'number',
		'range',
		'time',
		'week',
	);

	$is_numeric = (in_array($type, $numeric_types));
	$doctype = get_pref('doctype');

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	if ($zem_contact_submit) {
		$value = trim(ps($name));
		$utf8len = preg_match_all("/./su", $value, $utf8ar);
		$hlabel = txpspecialchars($label);

		if (strlen($value)) {
			if (!$utf8len) {
				$zem_contact_error[] = gTxt('zem_contact_invalid_utf8', array('{field}' => $hlabel));
				$isError = "errorElement";
			} elseif ($min && !$is_numeric && $utf8len < $min) {
				$zem_contact_error[] = gTxt('zem_contact_min_warning', array('{field}' => $hlabel, '{value}' => $min));
				$isError = "errorElement";
			} elseif ($max && !$is_numeric && $utf8len > $max) {
				$zem_contact_error[] = gTxt('zem_contact_max_warning', array('{field}' => $hlabel, '{value}' => $max));
				$isError = "errorElement";
			} elseif ($min && $is_numeric && $value < $min) {
				$zem_contact_error[] = gTxt('zem_contact_minval_warning', array('{field}' => $hlabel, '{value}' => $min));
				$isError = "errorElement";
			} elseif ($max && $is_numeric && $value > $max) {
				$zem_contact_error[] = gTxt('zem_contact_maxval_warning', array('{field}' => $hlabel, '{value}' => $max));
				$isError = "errorElement";
			} elseif ($pattern and !preg_match('/^'.$pattern.'$/', $value)) {
				$zem_contact_error[] = gTxt('zem_contact_pattern_warning', array('{field}' => $hlabel, '{value}' => $pattern));
				$isError = "errorElement";
			} else {
				zem_contact_store($name, $label, $value);
			}
		} elseif ($required) {
			$zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => $hlabel));
			$isError = "errorElement";
		}
	} else {
		$value = $default;
	}

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'    => (($id) ? $id : $name),
		'name'  => $name,
		'type'  => $type,
		'value' => $value,
	));

	if ($size && !$is_numeric) {
		$attr['size'] = 'size="' . intval($size) . '"';
	}
	if ($max && !$is_numeric) {
		$attr['maxlength'] = 'maxlength="' . intval($max) . '"';
	}

	if ($doctype !== 'xhtml' && $is_numeric) {
		// Not using intval() because min/max/step can be floating point values.
		$attr += zem_contact_build_atts(array(
			'min'  => $min,
			'max'  => $max,
			'step' => $step,
		));
	}

	// HTML 5 attributes
	$required = ($required) ? 'required' : '';
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'autocomplete' => $autocomplete,
			'form'         => $html_form,
			'pattern'      => $pattern,
			'placeholder'  => $placeholder,
			'required'     => $required,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$zemRequired = $required ? 'zemRequired' : '';
	$classStr = (($class) ? $class . ' ' : '') . $zemRequired . $isError;

    return '<label for="' . $name . '" class="' . ($classStr ? $classStr . ' ' : '') . $name . '">' . txpspecialchars($label) . '</label>' . $break .
		'<input class="' . $classStr . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . ' />';
}

/**
 * Tag: Render an email input field.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function zem_contact_email($atts)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_from, $zem_contact_recipient, $zem_contact_flags;

	// ToDo: 'multiple' attribute?
	$defaults = array(
		'autocomplete' => '',
		'break'        => br,
		'class'        => '',
		'default'      => '',
		'html_form'    => $zem_contact_flags['this_form'],
		'isError'      => '',
		'label'        => gTxt('zem_contact_email'),
		'max'          => 100,
		'min'          => 0,
		'name'         => '',
		'pattern'      => '',
		'placeholder'  => '',
		'required'     => $zem_contact_flags['required'],
		'send_article' => 0,
		'size'         => '',
		'type'         => 'email',
	);
	extract(zem_contact_lAtts($defaults, $atts));

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	$email = $zem_contact_submit ? trim(ps($name)) : $default;

	if ($zem_contact_submit && strlen($email)) {
		if (!is_valid_email($email)) {
			$zem_contact_error[] = gTxt('zem_contact_invalid_email', array('{email}' => txpspecialchars($email)));
			$isError = "errorElement";
		} else {
			preg_match("/@(.+)$/", $email, $match);
			$domain = $match[1];

			if (is_callable('checkdnsrr') && checkdnsrr('textpattern.com.','A') && !checkdnsrr($domain.'.','MX') && !checkdnsrr($domain.'.','A')) {
				$zem_contact_error[] = gTxt('zem_contact_invalid_host', array('{host}' => txpspecialchars($domain)));
				$isError = "errorElement";
			} else {
				if ($send_article) {
					$zem_contact_recipient = $email;
				} else {
					$zem_contact_from = $email;
				}
			}
		}
	}

	$passed_atts = array();
	foreach ($defaults as $key => $value) {
		$passed_atts[$key] = $$key;
	}

	$passed_atts['isError'] = $isError;
	unset ($passed_atts['send_article']);

	return zem_contact_text($passed_atts);
}

/**
 * Tag: Render a textarea input field.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function zem_contact_textarea($atts)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_flags;

	extract(zem_contact_lAtts(array(
		'break'       => br,
		'class'       => 'zemTextarea',
		'cols'        => 58,
		'default'     => '',
		'html_form'   => $zem_contact_flags['this_form'],
		'isError'     => '',
		'label'       => gTxt('zem_contact_message'),
		'max'         => 10000,
		'min'         => 0,
		'name'        => '',
		'placeholder' => '',
		'required'    => $zem_contact_flags['required'],
		'rows'        => 8,
		'wrap'        => '',
	), $atts));

	$min = intval($min);
	$max = intval($max);

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	$doctype = get_pref('doctype');

	if ($zem_contact_submit) {
		$value = preg_replace('/^\s*[\r\n]/', '', rtrim(ps($name)));
		$utf8len = preg_match_all("/./su", ltrim($value), $utf8ar);
		$hlabel = txpspecialchars($label);

		if (strlen(ltrim($value))) {
			if (!$utf8len) {
				$zem_contact_error[] = gTxt('zem_contact_invalid_utf8', array('{field}' => $hlabel));
				$isError = "errorElement";
			} elseif ($min && $utf8len < $min) {
				$zem_contact_error[] = gTxt('zem_contact_min_warning', array('{field}' => $hlabel, '{value}' => $min));
				$isError = "errorElement";
			} elseif ($max && $utf8len > $max) {
				$zem_contact_error[] = gTxt('zem_contact_max_warning', array('{field}' => $hlabel, '{value}' => $max));
				$isError = "errorElement";
			} else {
				zem_contact_store($name, $label, $value);
			}
		} elseif ($required) {
			$zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => $hlabel));
			$isError = "errorElement";
		}
	} else {
		$value = $default;
	}

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'        => (($id) ? $id : $name),
		'name'      => $name,
		'cols'      => intval($cols),
		'rows'      => intval($rows),
		'maxlength' => $max,
	));

	// HTML 5 attributes
	$required = ($required) ? 'required' : '';
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form'        => $html_form,
			'placeholder' => $placeholder,
			'required'    => $required,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$zemRequired = $required ? 'zemRequired' : '';
	$classStr = (($class) ? $class . ' ' : '') . $zemRequired . $isError;

	return '<label for="' . $name . '" class="' . ($classStr ? $classStr . ' ' : '') . $name . '">' . txpspecialchars($label) . '</label>' . $break .
		'<textarea class="' . $classStr . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($value) . '</textarea>';
}

/**
 * Tag: Render a select/option input list.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function zem_contact_select($atts, $thing = null)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_flags;

	// ToDo: multipl attribute?
	extract(zem_contact_lAtts(array(
		'break'     => ' ',
		'class'     => 'zemSelect',
		'delimiter' => ',',
		'html_form' => $zem_contact_flags['this_form'],
		'isError'   => '',
		'label'     => gTxt('zem_contact_option'),
		'list'      => gTxt('zem_contact_general_inquiry'),
		'name'      => '',
		'required'  => $zem_contact_flags['required'],
		'selected'  => '',
		'size'      => '',
	), $atts));

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	$value = ($zem_contact_submit) ? trim(ps($name)) : $selected;
	$doctype = get_pref('doctype');

	if ($thing) {
		zem_contact_option(null, $value);
		$out = parse($thing);
		$list = zem_contact_option(null, null);
	} else {
		$list = array_map('trim', explode($delimiter, preg_replace('/[\r\n\t\s]+/', ' ', $list)));
		$out = '';

		foreach ($list as $item) {
			$out .= n.t.'<option' . ($item == $value ? ' selected="selected">' : '>') . (strlen($item) ? txpspecialchars($item) : ' ') . '</option>';
		}
	}

	if ($zem_contact_submit) {
		if (strlen($value)) {
			if (in_array($value, $list)) {
				zem_contact_store($name, $label, $value);
			} else {
				$zem_contact_error[] = gTxt('zem_contact_invalid_value', array('{field}' => txpspecialchars($label), '{value}' => txpspecialchars($value)));
				$isError = "errorElement";
			}
		} elseif ($required) {
			$zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($label)));
			$isError = "errorElement";
		}
	} else {
		$value = $selected;
	}

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'   => (($id) ? $id : $name),
		'name' => $name,
		'size' => intval($size),
	));


	// HTML 5 attributes
	$required = ($required) ? 'required' : '';
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form'     => $html_form,
			'required' => $required,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$zemRequired = $required ? 'zemRequired' : '';
	$classStr = (($class) ? $class . ' ' : '') . $zemRequired . $isError;

	return '<label for="' . $name . '" class="' . ($classStr ? $classStr . ' ' : '') . $name . '">' . txpspecialchars($label) . '</label>' . $break .
		n . '<select class="' . $classStr . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . '>' .
			$out .
		n . '</select>';
}

/**
 * Tag: Render a set of select options.
 *
 * @param  array  $atts  Tag attributes
 * @param  string $thing Tag's container
 * @return string HTML
 */
function zem_contact_option($atts, $thing = null)
{
	static $options;
	static $match;

	if ($atts === null) {
		if ($thing === null) {
			return $options;
		} else {
			$match = $thing;
			return;
		}
	}

	global $zem_contact_error, $zem_contact_submit;

	extract(zem_contact_lAtts(array(
		'class'    => 'zemOption',
		'id'       => null,
		'label'    => null,
		'selected' => null,
		'value'    => null,
	), $atts));

	$val = ($value !== null) ? $value : $thing;
	$attr = array();

	if ($zem_contact_submit) {
		$options[] = $val;

		if ($val == $match) {
			$attr[] = 'selected="selected"';
		}
	} elseif ($selected) {
		$attr[] = 'selected="selected"';
	}

	$attr += zem_contact_build_atts(array(
		'id'    => $id,
		'label' => $label,
		'value' => $value,
	));

	return '<option ' . implode(' ', $attr) . '>' . txpspecialchars($thing) . '</option>';
}

/**
 * Tag: Render a checkbox.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 * @todo checkbox groups?
 */
function zem_contact_checkbox($atts)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_flags;

	extract(zem_contact_lAtts(array(
		'break'     => ' ',
		'checked'   => 0,
		'class'     => 'zemCheckbox',
		'html_form' => $zem_contact_flags['this_form'],
		'isError'   => '',
		'label'     => gTxt('zem_contact_checkbox'),
		'name'      => '',
		'required'  => $zem_contact_flags['required'],
	), $atts));

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	$doctype = get_pref('doctype');

	if ($zem_contact_submit) {
		$value = (bool) ps($name);

		if ($required && !$value) {
			$zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($label)));
			$isError = "errorElement";
		} else {
			zem_contact_store($name, $label, $value ? gTxt('yes') : gTxt('no'));
		}
	} else {
		$value = $checked;
	}

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'    => (($id) ? $id : $name),
		'name'  => $name,
		'value' => $value,
	));

	// HTML 5 attributes
	$required = ($required) ? 'required' : '';
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form'     => $html_form,
			'required' => $required,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$zemRequired = $required ? 'zemRequired' : '';
	$classStr = (($class) ? $class . ' ' : '') . $zemRequired . $isError;

	return '<input type="checkbox" class="' . $classStr . '"' .
		($value ? ' checked="checked"' : '') . ($attr ? implode(' ', $attr) : '') . ' />' . $break . 
		'<label for="' . $name . '" class="' . ($classStr ? $classStr . ' ' : '') . $name . '">' . txpspecialchars($label) . '</label>';
}

/**
 * Tag: Render a radio button.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 */
function zem_contact_radio($atts)
{
	global $zem_contact_error, $zem_contact_submit, $zem_contact_values, $zem_contact_flags;

	extract(zem_contact_lAtts(array(
		'break'     => ' ',
		'checked'   => 0,
		'class'     => 'zemRadio',
		'group'     => '',
		'html_form' => $zem_contact_flags['this_form'],
		'isError'   => '',
		'label'     => gTxt('zem_contact_option'),
		'name'      => '',
		'required'  => $zem_contact_flags['required'],
	), $atts));

	static $cur_name = '';
	static $cur_group = '';

	if (!$name && !$group && !$cur_name && !$cur_group) {
		$cur_group = gTxt('zem_contact_radio');
		$cur_name = $cur_group;
	}
	if ($group && !$name && $group != $cur_group) {
		$name = $group;
	}

	if ($name) {
		$cur_name = $name;
	} else {
		$name = $cur_name;
	}

	if ($group) {
		$cur_group = $group;
	} else {
		$group = $cur_group;
	}

	$id = 'q' . md5($name . '=>' . $label);
	$name = zem_contact_label2name($name);
	$doctype = get_pref('doctype');

	if ($zem_contact_submit) {
		$is_checked = (ps($name) == $id);

		if ($required && !$is_checked) {
			$zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($label)));
			$isError = "errorElement";
		} else {
			if ($is_checked || $checked && !isset($zem_contact_values[$name])) {
				zem_contact_store($name, $group, $label);
			}
		}
	} else {
		$is_checked = $checked;
	}

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'    => $id,
		'name'  => $name,
		'value' => $id,
	));

	// HTML 5 attributes
	$required = ($required) ? 'required' : '';
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form'     => $html_form,
			'required' => $required,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$zemRequired = $required ? 'zemRequired' : '';
	$classStr = $name . (($class) ? ' ' . $class : '') . ' ' . $zemRequired . $isError;

	return '<input type="radio" class="' . $classStr . '"' . ($attr ? ' ' . implode(' ', $attr) : '') .
		( $is_checked ? ' checked="checked" />' : ' />') . $break .
		'<label for="' . $id . '" class="' . $classStr . '">' . txpspecialchars($label) . '</label>';
}

/**
 * Tag: Store server information in the payload.
 *
 * @param  array  $atts  Tag attributes
 */
function zem_contact_serverinfo($atts)
{
	global $zem_contact_submit;

	extract(zem_contact_lAtts(array(
		'label' => '',
		'name'  => '',
	), $atts));

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	if (strlen($name) && $zem_contact_submit) {
		if (!$label) {
			$label = $name;
		}

		zem_contact_store($name, $label, serverSet($name));
	}
}

/**
 * Tag: Store a secret value in the payload.
 *
 * @param  array  $atts  Tag attributes
 */
function zem_contact_secret($atts, $thing = null)
{
	global $zem_contact_submit;

	extract(zem_contact_lAtts(array(
		'name'	=> '',
		'label'	=> gTxt('zem_contact_secret'),
		'value'	=> '',
	), $atts));

	$name = zem_contact_label2name($name ? $name : $label);

	if ($zem_contact_submit) {
		if ($thing) {
			$value = trim(parse($thing));
		}

		zem_contact_store($name, $label, $value);
	}

	return '';
}

/**
 * Tag: Render a submit button.
 *
 * If the container is used, a button tag is rendered, otherwise a
 * standard input type=submit button is rendered.
 *
 * @param  array  $atts  Tag attributes
 * @param  string $thing Tag's container
 * @return string HTML
 */
function zem_contact_submit($atts, $thing = null)
{
	global $zem_contact_flags;

	extract(zem_contact_lAtts(array(
		'button'    => 0,
		'class'     => 'zemSubmit',
		'html_form' => $zem_contact_flags['this_form'],
		'label'     => gTxt('zem_contact_send'),
	), $atts));

	$label = txpspecialchars($label);
	$doctype = get_pref('doctype');

	// Core attributes
	$attr = zem_contact_build_atts(array(
		'id'    => $id,
	));

	// HTML 5 attributes
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form'     => $html_form,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	if ($button || strlen($thing)) {
		return '<button type="submit" class="' . $class . '" name="zem_contact_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . ($thing ? trim(parse($thing)) : $label) . '</button>';
	} else {
		return '<input type="submit" class="' . $class . '" name="zem_contact_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . ' />';
	}
}

/**
 * Tag: Render a link to allow someone to forward a page to a friend.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 */
function zem_contact_send_article($atts)
{
	if (!isset($_REQUEST['zem_contact_send_article'])) {
		$linktext = (empty($atts['linktext'])) ? gTxt('zem_contact_send_article') : $atts['linktext'];
		$join = (empty($_SERVER['QUERY_STRING'])) ? '?' : '&';
		$href = $_SERVER['REQUEST_URI'] . $join . 'zem_contact_send_article=yes';

		return '<a href="' . txpspecialchars($href) . '" rel="nofollow">' . txpspecialchars($linktext) . '</a>';
	}

	return;
}

/**
 * Process tag attributes and set defaults.
 *
 * Handles HTML 'global' attributes too, though what we consider global differs slightly
 * from the W3C: any attributes that apply to most of the <input> tags is considered
 * global. Just saves repetitive code in each tag handler.
 *
 * Note that 'class' is omitted, because that has different default values per input
 * widget, so it is dealt with explicitly in each tag handler.
 *
 * @param  array $arr  Acceptable tag attributes
 * @param  array $atts User-submitted attribute values
 * @return array
 */
function zem_contact_lAtts($pairs, $atts)
{
	foreach(array('button', 'copysender', 'checked', 'required', 'send_article', 'show_input', 'show_error') as $key) {
		if (isset($atts[$key])) {
			$atts[$key] = ($atts[$key] === 'yes' || intval($atts[$key])) ? 1 : 0;
		}
	}

	if (isset($atts['break']) && $atts['break'] === 'br') {
		$atts['break'] = '<br />';
	}

	$zem_contact_globals = array(
		'accesskey' => '',
		'autofocus' => '',
		'dir' => '', 'disabled' => '',
		'hidden' => '',
		'id' => '',
		'lang' => '', 'list' => '',
		'readonly' => '',
		'spellcheck' => '', 'style' => '',
		'tabindex' => '', 'title' => '', 'translate' => '',
	);

	foreach($atts as $name => $value) {
		if (array_key_exists($name, $pairs) || substr($name, 0, 2) === 'on' || array_key_exists($name, $zem_contact_globals)) {
			$pairs[$name] = $value;
		} elseif (get_pref('production_status') != 'live') {
			trigger_error(gTxt('unknown_attribute', array('{att}' => $name)));
		}
	}

	$pairs['zem_contact_globals'] = $zem_contact_globals;

	return ($pairs) ? $pairs : false;
}

/**
 * Build a sanitized, unique attribute array from the given pairs.
 *
 * If called multiple times, earlier values supersede later values
 * if the keys clash.
 *
 * @param  array $pairs    Attribute tuples to compile
 * @param  array $defaults Attribute values to use if the $pairs tuple value is empty
 * @return array
 */
function zem_contact_build_atts($pairs, $defaults = array())
{
	$attr = array();

	foreach ($pairs as $key => $value) {
		if ($value !== '') {
			$attr[$key] = $key . '="' . txpspecialchars($value) . '"';
		} else {
			if (isset($defaults[$key])) {
				$attr[$key] = $key . '="' . txpspecialchars($defaults[$key]) . '"';
			}
		}
	}

	return $attr;
}

/**
 * Replace nulls and newlines in content with spaces.
 *
 * @param string $str    String to sanitize
 * @param bool   $header Whether the string is a header or not
 */
function zem_contact_strip($str, $header = true)
{
	if ($header) {
		// ToDo: strip_rn will be deprecated in 4.6.0.
		$str = strip_rn($str);
	}

	return preg_replace('/[\x00]/', ' ', $str);
}

/**
 * Handle content delivery of payload.
 *
 * Triggers a 'zemcontact.deliver' callback event to override or augment
 * the delivery mechanism. Third party plugins can return:
 *  -> true to allow this plugin to continue mailing after the plugin completes
 *  -> null to skip zem_contact's mailing and continue to deliver 'success' 
 *  -> false to halt zem_contact's mailing (i.e. the 3rd party handles mailing) and 'fail'
 *  -> alterations to the $payload such as adding Multi-part MIME headers for HTML emails
 *
 * @param string $to      Delivery address
 * @param string $subject Subject of message
 * @param string $body    Message content
 * @param array  $headers Message headers as tuples
 */
function zem_contact_deliver($to, $subject, $body, $headers)
{
	$payload = array(
		'to'      => $to,
		'subject' => $subject,
		'headers' => $headers,
		'body'    => $body,
	);

	// Allow plugins to override or alter default action (mail) if required.
	// ToDo: use has_handler() from 4.6.0+
	$ret = callback_event_ref('zemcontact.deliver', '', 0, $payload);

	if (in_array(false, $ret)) {
		return false;
	} elseif (in_array(null, $ret)) {
		return true;
	}

	extract($payload);

	$smtp_from = get_pref('smtp_from');

	if (!is_callable('mail')) {
		return (get_pref('production_status') === 'live')
			? gTxt('zem_contact_mail_sorry')
			: gTxt('warn_mail_unavailable');
	}

	$sep = (!empty($headers['separator'])) ? $headers['separator'] : (is_windows() ? "\r\n" : "\n");
	$xfer_encoding = (!empty($headers['xfer_encoding'])) ? $headers['xfer_encoding'] : '8bit';
	$content_type = (!empty($headers['content_type'])) ? $headers['content_type'] : 'text/plain';
	$reply = (!empty($headers['reply'])) ? $headers['reply'] : '';
	$charset = (!empty($headers['charset'])) ? $headers['charset'] : 'UTF-8';
	$x_mailer = (!empty($headers['x_mailer'])) ? $headers['x_mailer'] : 'Textpattern (zem_contact_reborn)';

	$header_string = 'From: ' . $headers['from'] .
		($reply ? ($sep . 'Reply-To: ' . $reply) : '') .
		$sep . 'X-Mailer: ' . $x_mailer .
		$sep . 'X-Originating-IP: ' . zem_contact_strip((!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] . ' via ' : '') . $_SERVER['REMOTE_ADDR']) .
		$sep . 'Content-Transfer-Encoding: ' . $xfer_encoding .
		$sep . 'Content-Type: ' . $content_type . '; charset="' . $charset . '"';

	// Remove all the header entries that have already been handled.
	unset(
		$headers['separator'],
		$headers['xfer_encoding'],
		$headers['content_type'],
		$headers['reply'],
		$headers['charset'],
		$headers['x_mailer'],
		$headers['from']
	);

	// Any remaining headers set by plugins are appended as-is.
	foreach ($headers as $name => $value) {
		$header_string .= $sep . $name . ': ' . $value;
	}

	if (is_valid_email($smtp_from)) {
		if (IS_WIN) {
			ini_set('sendmail_from', $smtp_from);
		} elseif (!ini_get('safe_mode')) {
			return mail($to, $subject, $body, $header_string, '-f'.$smtp_from);
		}
	}

	return mail($to, $subject, $body, $header_string);
}

/**
 * Evaluate return values from plugins.
 */
class zemcontact_evaluation
{
	private $status;

	/**
	 * Constructor.
	 */
	function __construct() {
		$this->status = 0;
	}

	/**
	 * Append the given status to the counter.
	 */
	function add_zemcontact_status($check) {
		$this->status += $check;
	}

	/**
	 * Fetch the current evaluator status.
	 */
	function get_zemcontact_status() {
		return $this->status;
	}
}

/**
 * Evaluator singleton for checking return values from plugins.
 */
function &get_zemcontact_evaluator()
{
	static $instance;

	if (!isset($instance)) {
		$instance = new zemcontact_evaluation();
	}

	return $instance;
}

/**
 * Convert the given label to a suitably unique name.
 *
 * @param string $label Label to convert to name.
 */
function zem_contact_label2name($label)
{
	$label = trim($label);

	if (strlen($label) == 0) {
		return 'invalid';
	}

	if (strlen($label) <= 32 && preg_match('/^[a-zA-Z][A-Za-z0-9:_-]*$/', $label)) {
		return $label;
	} else {
		return 'q' . md5($label);
	}
}

/**
 * Store the given names/values in the global arrays.
 *
 * @param  string $name  Parameter name
 * @param  string $label Parameter label
 * @param  string $value Parameter value
 */
function zem_contact_store($name, $label, $value)
{
	global $zem_contact_form, $zem_contact_labels, $zem_contact_values;

	$zem_contact_form[$label] = $value;
	$zem_contact_labels[$name] = $label;
	$zem_contact_values[$name] = $value;
}

/**
 * Return the value of the given attribute, by name or its label.
 *
 * @param  array $atts Attribute to return
 * @return string
 */
function zem_contact_value($atts)
{
	global $zem_contact_values, $zem_contact_form;

	extract(lAtts(array(
		'name'	=> '',
		'label'	=> '',
	), $atts));

	$str = '';

	if ($name) {
		$str = isset($zem_contact_values[$name]) ? $zem_contact_values[$name] : '';
	} elseif ($label) {
		$str = isset($zem_contact_form[$name]) ? $zem_contact_form[$name] : '';
	}

	return trim($str);
}

/**
 * Return the label for the given attribute.
 *
 * @param  array $atts Attribute name to return
 * @return string
 */
function zem_contact_label($atts)
{
	global $zem_contact_labels;

	extract(lAtts(array(
		'name'	=> '',
	), $atts));
	
	if ($name) {
		return isset($zem_contact_labels[$name]) ? $zem_contact_labels[$name] : '';
	}

	return '';
}

/**
 * Conditional tag for checking variable conditions.
 *
 * @param  array  $atts  Attributes to check
 * @param  string $thing Tag's container content
 * @return string
 */
function zem_contact_if($atts, $thing = null)
{
	extract(lAtts(array(
		'name'	=> '',
		'label' => '',
		'value' => '',
	), $atts));

	$val = zem_contact_value(array('name' => $name, 'label' => $label));

	if ($val) {
		$cond = ($val == $value);
	} else {
		$cond = ($value || $value == zem_contact_gTxt('yes'));
	}

	return parse(EvalElse($thing, $cond));
}
