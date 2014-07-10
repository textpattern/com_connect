<?php

// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'zem_contact_reborn';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
# $plugin['allow_html_help'] = 1;

$plugin['version'] = '4.5.0.0';
$plugin['author'] = 'TXP Community';
$plugin['author_uri'] = 'http://forum.textpattern.com/viewtopic.php?id=23728';
$plugin['description'] = 'Form mailer for Textpattern';

// Plugin load order:
// The default value of 5 would fit most plugins, while for instance comment
// spam evaluators or URL redirectors would probably want to run earlier
// (1...4) to prepare the environment for everything else that follows.
// Values 6...9 should be considered for plugins which would work late.
// This order is user-overrideable.
$plugin['order'] = '5';

// Plugin 'type' defines where the plugin is loaded
// 0 = public              : only on the public side of the website (default)
// 1 = public+admin        : on both the public and admin side
// 2 = library             : only when include_plugin() or require_plugin() is called
// 3 = admin               : only on the admin side (no AJAX)
// 4 = admin+ajax          : only on the admin side (AJAX supported)
// 5 = public+admin+ajax   : on both the public and admin side (AJAX supported)
$plugin['type'] = '0';

// Plugin "flags" signal the presence of optional capabilities to the core plugin loader.
// Use an appropriately OR-ed combination of these flags.
// The four high-order bits 0xf000 are available for this plugin's private use
if (!defined('PLUGIN_HAS_PREFS')) define('PLUGIN_HAS_PREFS', 0x0001); // This plugin wants to receive "plugin_prefs.{$plugin['name']}" events
if (!defined('PLUGIN_LIFECYCLE_NOTIFY')) define('PLUGIN_LIFECYCLE_NOTIFY', 0x0002); // This plugin wants to receive "plugin_lifecycle.{$plugin['name']}" events

$plugin['flags'] = '0';

// Plugin 'textpack' is optional. It provides i18n strings to be used in conjunction with gTxt().
// Syntax:
// ## arbitrary comment
// #@event
// #@language ISO-LANGUAGE-CODE
// abc_string_name => Localized String
$plugin['textpack'] = <<<EOT
#@public
zem_contact_checkbox => Checkbox
zem_contact_contact => Contact
zem_contact_email => Email
zem_contact_email_subject => {site} > Inquiry
zem_contact_email_thanks => Thank you, your message has been sent.
zem_contact_field_missing => Required field, &#8220;<strong>{field}</strong>&#8221; is missing.
zem_contact_form_expired => The form has expired, please try again.
zem_contact_form_used => The form was already submitted, please fill out a new form.
zem_contact_general_inquiry => General inquiry
zem_contact_invalid_email => &#8220;<strong>{email}</strong>&#8221; is not a valid email address.
zem_contact_invalid_host => &#8220;<strong>{host}</strong>&#8221; is not a valid email host.
zem_contact_invalid_utf8 => &#8220;<strong>{field}</strong>&#8221; contains invalid UTF-8 characters.
zem_contact_invalid_value => Invalid value for &#8220;<strong>{field}</strong>&#8221;, &#8220;<strong>{value}</strong>&#8221; is not one of the available options.
zem_contact_mail_sorry => Sorry, unable to send email.
zem_contact_maxval_warning => &#8220;<strong>{field}</strong>&#8221; must not exceed {value}.
zem_contact_max_warning => &#8220;<strong>{field}</strong>&#8221; must not contain more than {value} characters.
zem_contact_message => Message
zem_contact_minval_warning => &#8220;<strong>{field}</strong>&#8221; must be at least {value}.
zem_contact_min_warning => &#8220;<strong>{field}</strong>&#8221; must contain at least {value} characters.
zem_contact_name => Name
zem_contact_option => Option
zem_contact_pattern_warning => &#8220;<strong>{field}</strong>&#8221; does not match the pattern {value}.
zem_contact_radio => Radio
zem_contact_recipient => Recipient
zem_contact_refresh => Follow this link if the page does not refresh automatically.
zem_contact_secret => Secret
zem_contact_send => Send
zem_contact_send_article => Send article
zem_contact_spam => We do not accept spam, thank you!
zem_contact_text => Text
zem_contact_to_missing => &#8220;<strong>To</strong>&#8221; email address is missing.
#@public
#@language fr-fr
zem_contact_checkbox => Case à cocher
zem_contact_contact => Contact
zem_contact_email => Email
zem_contact_email_subject => {site} > Demande
zem_contact_email_thanks => Merci, votre message a bien été envoyé.
zem_contact_field_missing => Champ obligatoire &#8220;<strong>{field}</strong>&#8221; manquant
zem_contact_form_expired => Le délai du formulaire vient d'expirer. Veuillez recommencer.
zem_contact_form_used => Le formulaire a déjà été soumis. Veuillez en remplir un nouveau.
zem_contact_general_inquiry => Demande d'ordre général
zem_contact_invalid_email => &#8220;<strong>{email}</strong>&#8221; n'est pas une adresse email valide
zem_contact_invalid_host => &#8220;<strong>{host}</strong>&#8221; n'est pas correctement rédigé
zem_contact_invalid_utf8 => &#8220;<strong>{field}</strong>&#8221; contient des caractères invalides
zem_contact_invalid_value => cette valeur : &#8220;<strong>{value}</strong>&#8221; n'est pas correcte pour &#8220;<strong>{field}</strong>&#8221;.
zem_contact_mail_sorry => Désolé, impossible d'envoyer votre message dans l'immédiat.
zem_contact_maxval_warning => &#8220;<strong>{field}</strong>&#8221; ne peux pas être plus grand que {value}.
zem_contact_max_warning => &#8220;<strong>{field}</strong>&#8221; dépasse {value} caractères.
zem_contact_message => Message
zem_contact_minval_warning => &#8220;<strong>{field}</strong>&#8221; doit être au moins {value}.
zem_contact_min_warning => &#8220;<strong>{field}</strong>&#8221; doit contenir au moins {value} caractères.
zem_contact_name => Nom
zem_contact_option => Option
zem_contact_pattern_warning => &#8220;<strong>{field}</strong>&#8221; doit correspondre à ce modèle {value}.
zem_contact_radio => Bouton radio
zem_contact_recipient => Destinataire
zem_contact_refresh => Cliquez sur ce lien si la page ne se rafraîchissait pas automatiquement.
zem_contact_secret => Secret
zem_contact_send => Envoyer
zem_contact_send_article => Envoyer l'article
zem_contact_spam => Nous refusons catégoriquement les spam. Bien à vous.
zem_contact_text => Texte
zem_contact_to_missing => l'adresse mail &#8220;<strong>To</strong>&#8221; est manquante.
EOT;
// End of textpack

if (!defined('txpinterface'))
        @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---
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

		if (zem_contact_deliver($to, $subject, $msg, $headers, array('isCopy' => false))) {
			$_POST = array();

			if ($copysender && $zem_contact_from) {
				zem_contact_deliver(zem_contact_strip($zem_contact_from), $subject, $msg, $headers, array('isCopy' => true));
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
		'id'    => (isset($id) ? $id : $name),
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
		'id'        => (isset($id) ? $id : $name),
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

	// ToDo: multiple attribute?
	extract(zem_contact_lAtts(array(
		'break'     => ' ',
		'class'     => 'zemSelect',
		'delimiter' => ',',
		'html_form' => $zem_contact_flags['this_form'],
		'isError'   => '',
		'label'     => gTxt('zem_contact_option'),
		'list'      => '', // ToDo: remove from here in favour of the global list attribute
		'options'   => gTxt('zem_contact_general_inquiry'),
		'name'      => '',
		'required'  => $zem_contact_flags['required'],
		'selected'  => '',
		'size'      => '',
	), $atts));

	// Detect old-school use of the list attribute. Note that deprecated_function_with
	// isn't strictly the correct error to throw, but it's close enough until core has
	// a dedicated deprecated_attribute_with string.
	if (!empty($list) && strpos($list, $delimiter) !== false) {
		$options = $list;
		trigger_error(gTxt('deprecated_function_with', array('{name}' => 'list', '{with}' => 'options')), E_USER_NOTICE);
		unset($list);
	}

	if (empty($name)) {
		$name = zem_contact_label2name($label);
	}

	$value = ($zem_contact_submit) ? trim(ps($name)) : $selected;
	$doctype = get_pref('doctype');

	if ($thing) {
		zem_contact_option(null, $value);
		$out = parse($thing);
		$options = zem_contact_option(null, null);
	} else {
		$options = array_map('trim', explode($delimiter, preg_replace('/[\r\n\t\s]+/', ' ', $options)));
		$out = '';

		foreach ($options as $item) {
			$out .= n.t.'<option' . ($item == $value ? ' selected="selected">' : '>') . (strlen($item) ? txpspecialchars($item) : ' ') . '</option>';
		}
	}

	if ($zem_contact_submit) {
		if (strlen($value)) {
			if (in_array($value, $options)) {
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
		'id'   => (isset($id) ? $id : $name),
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
	} elseif ($selected || $val == $match) {
		$attr[] = 'selected="selected"';
	}

	// Core attributes
	$attr += zem_contact_build_atts(array(
		'label' => $label,
		'value' => $value,
	));

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	$classStr = (($class) ? ' class="' . $class . '"' : '');

	return '<option' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($thing) . '</option>';
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
		'id'    => (isset($id) ? $id : $name),
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
		'name'  => '',
		'label' => gTxt('zem_contact_secret'),
		'value' => '',
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
		'class'     => 'zemSubmit',
		'html_form' => $zem_contact_flags['this_form'],
		'label'     => gTxt('zem_contact_send'),
	), $atts));

	$label = txpspecialchars($label);
	$doctype = get_pref('doctype');

	$attr = array();

	// HTML 5 attributes
	if ($doctype !== 'xhtml') {
		$attr += zem_contact_build_atts(array(
			'form' => $html_form,
		));
	}

	// Global attributes
	$attr += zem_contact_build_atts($zem_contact_globals, $atts);

	if (strlen($thing)) {
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
		if ($value !== '' && $value !== null) {
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
 * the delivery mechanism. Third party plugins can make alterations to the $payload
 * such as adding Multi-part MIME headers for HTML emails, then return one of the strings:
 *  -> "zemcontact.send" (or no return value) to allow ZCR to continue mailing after the 3rd party plugin completes
 *  -> "zemcontact.skip" to skip zem_contact's mailing (i.e. the 3rd party handles mailing) and return 'success'
 *  -> "zemcontact.fail" to skip zem_contact's mailing and return 'fail'
 *
 * By hooking into the callback's step you can target either the main 'send'
 * process or the 'copysender' process.
 *
 * @param string $to      Delivery address
 * @param string $subject Subject of message
 * @param string $body    Message content
 * @param array  $headers Message headers as tuples
 * @param array  $flags   Signals to govern delivery / callback behaviour
 */
function zem_contact_deliver($to, $subject, $body, $headers, $flags)
{
	$payload = array(
		'to'      => $to,
		'subject' => $subject,
		'headers' => $headers,
		'body'    => $body,
	);

	$flavour = ($flags['isCopy'] === true) ? 'copysender' : 'send';

	// Allow plugins to override or alter default action (mail) if required.
	// ToDo: use has_handler() from 4.6.0+
	$ret = callback_event_ref('zemcontact.deliver', $flavour, 0, $payload);

	if (in_array('zemcontact.fail', $ret)) {
		return false;
	} elseif (in_array('zemcontact.skip', $ret)) {
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
		'name'  => '',
		'label' => '',
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
		'name' => '',
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
		'name'  => '',
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

# --- END PLUGIN CODE ---
if (0) {
?>
<!--
# --- BEGIN PLUGIN HELP ---
<style>
   dt {margin: 1em 0em 0.5em; font-weight: bolder;}
   pre {padding: 0.5em 1em; background: #eee; border: 1px dashed #ccc;}
   h1, h2, h3, h3 code {font-family: sans-serif; font-weight: bold;}
   h1, h2, h3 {margin-left: -1em;}
   h2, h3 {margin-top: 2em;}
   h1 {font-size: 3em;}
   h2 {font-size: 2em;}
   h3 {font-size: 1.5em;}
   li code {font-weight: bold;}
   li a code {font-weight: normal;}
   .required, .warning {color:red;}
 </style>

h1(#top). Zem Contact Reborn

Please reports bugs and problems with this plugin in "this forum thread":http://forum.textpattern.com/viewtopic.php?id=YYYYY.

h2(#contents). Contents

* "Features":#features
* "Getting started":#start
** "Contact form":#contactform
** "Send article":#sendarticle
* "Frequently Asked Questions (FAQ)":#faq
* "Tags":#tags
** <a href="#zc">@<txp:zem_contact />@</a>
** <a href="#zc_text">@<txp:zem_contact_text />@</a>
** <a href="#zc_email">@<txp:zem_contact_email />@</a>
** <a href="#zc_textarea">@<txp:zem_contact_textarea />@</a>
** <a href="#zc_submit">@<txp:zem_contact_submit />@</a>
** <a href="#zc_select">@<txp:zem_contact_select />@</a>
** <a href="#zc_checkbox">@<txp:zem_contact_checkbox />@</a>
** <a href="#zc_radio">@<txp:zem_contact_radio />@</a>
** <a href="#zc_secret">@<txp:zem_contact_secret />@</a>
** <a href="#zc_server_info">@<txp:zem_contact_serverinfo />@</a>
** <a href="#zc_send_article">@<txp:zem_contact_send_article />@</a>
** <a href="#zc_label">@<txp:zem_contact_label />@</a>
** <a href="#zc_value">@<txp:zem_contact_value />@</a>
** <a href="#zc_if">@<txp:zem_contact_if />@</a>
* "Advanced examples":#advanced
** "Separate input and error forms":#show_error
** "User selectable subject field":#subject_form
** "User selectable recipient, without showing email addresses":#to_form
* "Styling":#styling
* "History":#history
* "Credits":#credits
* "Plugin API and callback events":#api

h2(#features). Features

* Arbitrary HTML 5 text fields can be specified, with min/max/required settings for validation.
* Email address validation, including a check for a valid MX record (Unix only).
* Safe escaping of input data.
* UTF-8 safe.
* Accessible form layout, including @<label>@, @<legend>@ and @<fieldset>@ tags.
* Various classes and ids to allow easy styling of all parts of the form.
* Spam prevention API (used by Tranquillo's @pap_contact_cleaner@ plugin) and delivery API.

"Back to top":#top

h2(#start). Getting started

h3(#contactform). Contact form

The simplest form is shown below, which produces a default form with Name, Email and Message fields. Email will be delivered to recipient@example.com, with the user's supplied email as the "From:" address.

bc. <txp:zem_contact to="recipient@example.com" />

To specify fields explicitly, use something like this:

bc. <txp:zem_contact to="recipient@example.com">
  <txp:zem_contact_email />
  <txp:zem_contact_text label="Phone" min="7" max="15" />
  <txp:zem_contact_textarea label="Your question" />
  <txp:zem_contact_submit label="Send" />
</txp:zem_contact>

Alternatively, place the field specifications in a Textpattern form, and call it like this:

bc. <txp:zem_contact to="recipient@example.com" form="my-contact-form" />

"Back to top":#top

h3(#sendarticle). Send article

Within the context of an individual article, this plugin can be used to send the article (or excerpt, if it exists) to an email address specified by the visitor. This requires at least two tags:
* @zem_contact@, to create form that is initially hidden by setting the @send_article@ attribute.
* @zem_contact_send_article@, to create a 'send article' link which reveals the aforementioned form when clicked.

bc. <txp:zem_contact send_article="1" />
<txp:zem_contact_send_article />

p. By default the form contains fields for your name and email address, the recipient's email address and a personal message, but similar to contact forms you can create your own form layout. Some things you need to know:
* Set the @send_article@ attribute to @1@ in the @zem_contact@ tag.
* Use a @zem_contact_email@ tag with the @send_article@ attribute set to @1@. This field will be used as the recipient email address.

bc.. <txp:zem_contact to="you@example.com" send_article="1">
  <txp:zem_contact_email label="Recipient Email" send_article="1" />
  <txp:zem_contact_email label="Your Email" />
  <txp:zem_contact_submit label="Send Article" />
</txp:zem_contact>

<txp:zem_contact_send_article />

p. "Back to top":#top

h2(#faq). Frequently Asked Questions (FAQ)

; How do I remove the legend and fieldset surrounding the contact form?
: Set the @label@ attribute to an empty value (@label=""@) in the @zem_contact@ tag.
; No email is sent. How do I diagnose and fix the problem?
: First try a simple contact form, using only the @zem_contact@ tag with the @to@ attribute set to a valid email address. If that doesn't send email, fill out the "SMTP envelope sender address":index.php?event=prefs&step=advanced_prefs in TXP's advanced preferences on the admin tab. If that doesn't help either, take a look at your mail server log files to see what the problem is.
; Which tag do I use to create the submit button?
: Just use normal HTML code to create a submit button. For historical reasons this plugin still provides the zem_contact_submit tag, but it provides no extra functionality.
; How can I get a unique (order) number in the subject of each email?
: Try using the "rvm_counter":http://vanmelick.com/txp tag in the @subject@ attribute of the @zem_contact@ tag.
; I want to use the contact form in an article list (one form for each article), but how do I make each form unique?
: You can make each form unique by making one of its attribute values unique. See previous question for an example of how to do this with the @subject@ attribute.
; Send article: can I let people specify multiple recipients?
: No. The 'send article' functionality is spammy enough as it is right now.
; Send article: can I show the contact form without having to click a link first?
: Sure, put this just above the @zem_contact@ tag: @<txp:php>$_GET['zem_contact_send_article']='yes';</txp:php>@
; How can I use this form to upload files?
: You can't, but have a look at the "sed_afu":http://txp-plugins.netcarving.com/ (anonymous file upload) and "mem_form":https://bitbucket.org/Manfre/txp-plugins/downloads/ plugins.
; Can I use this plugin to send HTML email?
: Not without a plugin like "mem_form":https://bitbucket.org/Manfre/txp-plugins/downloads or using the "delivery callback":#api. HTML email is evil.
; Can I use this plugin to send newsletters?
: Nope, but for that purpose you can use the "mem_postmaster":https://bitbucket.org/Manfre/txp-plugins/downloads/ plugin.
; I have a question that's not listed here
: First read the plugin documentation (the page you're on right now) once more. If that doesn't answer your question, visit the Textpattern forum (see link at the top of this page).

p. "Back to top":#top

h2(#tags). Tags

<a href="#zc">@<txp:zem_contact />@</a> produces a flexible, customisable email contact form. It is intended for use as an enquiry form for commercial and private sites, and includes several features to help reduce common problems with such forms (invalid email addresses, missing information).

<a href="#zc_send_article">@<txp:zem_contact_send_article />@</a> can be used to create a "send article" link within an article form, connecting it to the contact form.

All other tags provided by this plugin can only be used inside a @<txp:zem_contact>@ ... @</txp:zem_contact>@ container tag or in a Textpattern form used as the @form@ attribute in the @<txp:zem_contact />@ tag.

In addition to the tags detailed in the following sections, every tag accepts a core set of common attributes. These are:

* @accesskey@ : shortcut key to set focus on the field.
* @autofocus@ : to automatically focus the cursor in this field on page load. Only one field may have this property.
* @dir@ : text direction (@ltr@, @rtl@ or @auto@).
* @disabled@ : whether the input control accepts user input. If set, the element does not get submitted with the form, nor is it subject to any @checkValidity()@ JavaScript calls.
* @hidden@ : the visibility of the input control.
* @id@ : the HTML identifier of the control.
* @lang@ : the ISO 639 language short code (e.g. @en-gb@, @de-de@) that govern the field.
* @list@ : used in conjunction with the @<datalist>@ tag to specify a set of options.
* @readonly@ : control does not accept user input, but will be processed on form submission and can be validated.
* @spellcheck@ : whether the field is subject to spell checking.
* @style@ : inline CSS style rules to apply to the input control.
* @tabindex@ : the order in which the cursor jumps between elements when using the tab key.
* @title@ : usually used for hover tooltip describing the input control's use in your application.
* @translate@ : whether to subject the attribute content to language translation.

"Back to top":#top

h3(#zc). @<txp:zem_contact />@

May be used as a self-closing or container tag. Place this where you want the input form to go. Status and error messages, if any, will be displayed before the form.

h4. Attributes

* @to="email address"@ %(required)required%<br />Recipient email address. Multiple recipients can be specified separated by commas.
* @to_form="form name"@<br />Use specified form (overrides *to* attribute).
* @body_form="form name"@<br />Use specified form for the message body text.

* @from="email address"@<br />Email address used in the "From:" field when sending email. Defaults to the sender's email address. If specified, the sender's email address will be placed in the "Reply-To:" field instead.
* @from_form="form name"@<br />Use specified form (overrides *from* attribute).

* @subject="subject text"@<br />Subject used when sending an email. Default is the site name.
* @subject_form="form name"@<br />Use specified form (overrides *subject* attribute).

* @thanks="text"@<br />Message shown after successfully submitting a message. Default is *Thank you, your message has been sent*.
* @thanks_form="form name"@<br />Use specified form (overrides *thanks* attribute).
* @redirect="URL"@<br />Redirect to specified URL (overrides *thanks* and *thanks_form* attributes). URL must be relative to the Textpattern Site URL. Example: _redirect="monkey"_ would redirect to http://example.com/monkey.
* @expire="number"@<br />Number of seconds after which the form will expire, thus requiring a page refresh before sending. Default is *600*.

* @label="text"@<br />Label for the contact form. If set to an empty string, display of the fieldset and legend tags will be suppressed. Default is *Contact*.
* @send_article="boolean"@<br />Whether to use this form to <a href="#article">send an article</a>. Available values: *1* (yes), *0* (no). Default is *0* (no).
* @copysender="boolean"@<br />Whether to send a copy of the email to the sender's address. Available values: *1* (yes), *0* (no). Default is *0* (no).

* @form="form name"@<br />Use specified form, containing the layout of the contact form fields.
* @show_input="boolean"@<br /> Whether to display the form input fields. Available values: *1* (yes), *0* (no). Default is *1* (yes).
* @show_error="boolean"@<br /> Whether to display error and status messages. Available values: *1* (yes), *0* (no). Default is *1* (yes).
* @class="space-separated values"@<br /> Set the CSS class name of the tag. Default: @zemContactForm@.
* @required="boolean"@<br /> Whether to require all tags in this contact form to be completed before the form can be submitted. Can be overridden on a field-by-field basis by using the @required@ attribute in the relevant tag. Available values: *1* (yes), *0* (no). Default is *1* (yes).

h4. Examples

See "Getting started":#contactform and "Advanced examples":#advanced.

"Back to top":#top

h3(#zc_text). @<txp:zem_contact_text />@

Creates a text input field and corresponding @<label>@ tag. The input value will be included in the email, preceded by the label.

h4. Attributes

* @type="value"@<br />Type of text input. Default is *text*. Choose from:
** @text@
** @url@
** @password@
** @number@
** @range@
** @date@
** @datetime@
** @datetime-local@
** @month@
** @week@
** @time@
** @search@
** @color@
* @label="text"@<br />Text label displayed to the user. Default is *Text*.
* @name="value"@<br />Field name, as used in the HTML input tag.
* @break="tag"@<br />Break tag between the label and input field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @default="value"@<br />Default value when no input is provided.
* @size@<br/>The size, in characters, of the input field.
* @min="value"@<br />For character-based inputs, the minimum input length in characters. For numeric-based inputs, the minimum value the field accepts. Default is *0*.
* @max=value"@<br />For character-based inputs, the maximum input length in characters. For numeric-based inputs, the maximum value the field accepts. Default is *100*.
* @step="value"@<br />For numeric-based inputs, the interval between min and max.
* @pattern="regex"@<br />Regular expression that governs the format in which the field data is expected. Only used for character-based inputs.
* @placeholder="text"@<br />Text to show as a guide, when the input field is empty.
* @class="space-separated values"@<br /> Set the CSS class name of the tag. Default: @zemText@.
* @required="boolean"@<br />Whether this field must be filled out. Available values: *1* (yes), *0* (no). Default is whatever is set in the @<txp:zem_contact_form>@'s @required@ attribute.
* @html_form@<br />The HTML id of the @<form>@ tag to which the field is attached. Associated with the contained form by default.

h4. Examples

bc. <txp:zem_contact_text label="Your name" />

bc. <txp:zem_contact_text type="range" label="UK shoe size" min="1" max="15" />

"Back to top":#top

h3(#zc_email). @<txp:zem_contact_email />@

Input field for user's email address.

The entered email address will automatically be validated to make sure it is of the form "abc@xxx.yyy[.zzz]". On non-Windows servers, a test will be done to verify that an A or MX record exists for the domain. Neither test prevents spam, but it does help detecting accidental typing errors.

h4. Attributes

Identical as those for "zem_contaxt_text":#zc_text, with the addition of:

* @send_article="boolean"@<br />Whether this field is used as the recipient email address when using the send_article function. Available values: *1* (yes), *0* (no). Default is *0* (no).

h4. Example

bc. <txp:zem_contact_email label="Your email address" />

"Back to top":#top

h3(#zc_textarea). @<txp:zem_contact_textarea />@

Creates a textarea.

h4. Attributes

* @label="text"@<br />Text label displayed to the user. Default is *Message*.
* @name="value"@<br />Field name, as used in the HTML input tag.
* @break="tag"@<br />Break tag between the label and input field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @cols="integer"@<br/>Number of columns, in characters, of the textarea. Default is *58*.
* @rows="integer"@<br/>Number of rows, in characters, of the textarea. Default is *8*.
* @default="value"@<br />Default value when no input is provided.
* @min="integer"@<br />Minimum input length in characters. Default is *0*.
* @max="integer"@<br />Maximum input length in characters. Default is *10000*.
* @placeholder="text"@<br />Text to show as a guide to users, when the textarea is empty.
* @class="space-separated values"@<br /> Set the CSS class name of the textarea. Default: @zemTextarea@.
* @required="boolean"@<br />Whether this field must be filled out. Available values: *1* (yes), *0* (no). Default is whatever is set in the @<txp:zem_contact_form>@'s @required@ attribute.
* @wrap="value"@<br/>Governs word-wrap. Available values: *hard* or *soft*.
* @html_form@<br />The HTML id of the @<form>@ tag to which the textarea is attached. Associated with the contained form by default.

h4. Example

Textarea that is 40 chars wide, 10 lines high, with a customized label:

bc. <txp:zem_contact_textarea cols="40" rows="10" label="Your question" />

"Back to top":#top

h3(#zc_submit). @<txp:zem_contact_submit />@

Creates a submit button. When used as a container tag, a "button" element will be used instead of an "input" element.

h4. Attributes:

* @label="text"@<br />Text shown on the submit button. Default is "Send".
* @class="space-separated values"@<br /> Set the CSS class name of the tag. Default: @zemSubmit@.
* @html_form@<br />The HTML id of the @<form>@ tag to which the button is attached. Associated with the contained form by default.

h4. Examples

Standard submit button:

bc. <txp:zem_contact_submit />

Submit button with your own text:

bc. <txp:zem_contact_submit label="To the moooon" />

Usage as a container tag, which allows you to use Textpattern tags and HTML markup in the submit button:

bc. <txp:zem_contact_submit><strong>Send</strong> question</txp:zem_contact_submit>

bc. <txp:zem_contact_submit><img src="path/to/img.png" alt="submit"></txp:zem_contact_submit>

"Back to top":#top

h3(#zc_select). @<txp:zem_contact_select />@

Creates a drop-down selection list.

h4. Attributes

* @options="comma-separated values"@<br />List of items to show in the select box. May also use the @<txp:zem_contact_option />@ tag inside this tag's container.
* @selected="value"@<br />List item that is selected by default.
* @label="text"@<br />Text label displayed to the user. Default is *Option*.
* @name="value"@<br />Field name, as used in the HTML input tag.
* @break="tag"@<br />Break tag between the label and input field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @size@<br/>The vertical size, in entries, of the input field.
* @delimiter="character"@<br />Separator character used in the *list* attribute. Default is *,* (comma).
* @class="space-separated values"@<br /> Set the CSS class name of the list. Default: @zemSelect@.
* @required="boolean"@<br />Whether this field must be filled out. Available values: *1* (yes), *0* (no). Default is whatever is set in the @<txp:zem_contact_form>@'s @required@ attribute.
* @html_form@<br />The HTML id of the @<form>@ tag to which the textarea is attached. Associated with the contained form by default.

h4. Examples

Select list labeled 'Department', containing three options and a blank option (due to the comma before 'Marketing') shown by default, forcing the user to make a selection.

bc. <txp:zem_contact_select label="Department" list=",Marketing,Sales,Support" />

OR

bc. <txp:zem_contact_select label="Department">
   <txp:zem_contact_option />
   <txp:zem_contact_option value="marketing">Marketing</txp:zem_contact_option>
   <txp:zem_contact_option value="sales">Sales</txp:zem_contact_option>
   <txp:zem_contact_option value="support">Support</txp:zem_contact_option>
</txp:zem_contact_select>

Select list containing three options with 'Marketing' selected by default.

bc. <txp:zem_contact_select list="Marketing,Sales,Support" selected="Marketing" />

"Back to top":#top

h3(#zc_option). @<txp:zem_contact_option />@

Creates a drop-down selection option.

h4. Attributes

* @label="text"@<br />Text label of this option displayed to the user.
* @class="space-separated values"@<br /> Set the CSS class name of the option. Default: @zemOption@.
* @value="text"@<br />The value associated with this option when submitted. Default is the label.
* @selected="boolean"@<br />Whether this item is selected, May also be specified in the container tag's @selected" attribute. Available values: *1* (yes), *0* (no).

"Back to top":#top

h3(#zc_checkbox). @<txp:zem_contact_checkbox />@

Creates a check box.

h4. Attributes

* @label="text"@<br />Text label displayed to the user. Default is *Checkbox*.
* @name="value"@<br />Field name, as used in the HTML input tag.
* @break="tag"@<br />Break tag between the label and input field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @checked="boolean"@<br />Whether this box is checked when first displayed. Available values: *1* (yes), *0* (no). Default is "0" (no).
* @class="space-separated values"@<br /> Set the CSS class name of the option. Default: @zemCheckbox@.
* @required="boolean"@<br />Whether this checkbox must be filled out. Available values: *1* (yes), *0* (no). Default is whatever is set in the @<txp:zem_contact_form>@'s @required@ attribute.
* @html_form@<br />The HTML id of the @<form>@ tag to which the checkbox is attached. Associated with the contained form by default.

h4. Examples

Shrink-wrap agreement which must be checked by the user before the email will be sent.

bc. <txp:zem_contact_checkbox label="I accept the terms and conditions" />

Optional checkboxes:

bc. Select which operating systems are you familiar with:<br />
<txp:zem_contact_checkbox label="Windows" required="0" /><br />
<txp:zem_contact_checkbox label="Unix/Linux/BSD" required="0" /><br />
<txp:zem_contact_checkbox label="MacOS" required="0" /><br />

"Back to top":#top

h3(#zc_radio). @<txp:zem_contact_radio />@

Creates a radio button.

h4. Attributes

* @group="text"@ %(required)required%<br />Text used in the email to describe this group of radio buttons. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. Default is *Radio*.
* @label="text"@ %(required)required%<br />Text label displayed to the user as radio button option.
* @name="value"@<br />Field name, as used in the HTML input tag. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. If it hasn't been set at all, it will be derived from the @group@ attribute.
* @break="tag"@<br />Break tag between the label and field. Default is a space.
* @checked="boolean"@<br />Whether this radio option is checked when the form is first displayed. Available values: *1* (yes), *0* (no). Default is *0* (no).
* @class="space-separated values"@<br /> Set the CSS class name of the radio button. Default: @zemRadio@.
* @required="boolean"@<br />Whether this radio set must be filled out. Available values: *1* (yes), *0* (no). Default is whatever is set in the @<txp:zem_contact_form>@'s @required@ attribute. You may set it on only the first option, or set the same value on all of them in the group.
* @html_form@<br />The HTML id of the @<form>@ tag to which the checkbox is attached. Associated with the contained form by default.

h4. Example

Group mutually exclusive radio buttons by setting the @group@ attribute on the first radio button in a group. Only the chosen radio button from each group will be used in the email message. The message will be output in the form *group: label* for each of the chosen radio buttons.

bc.. <txp:zem_contact_radio label="Medium" group="I like my steak" />
<txp:zem_contact_radio label="Rare" />
<txp:zem_contact_radio label="Well done" />

<txp:zem_contact_radio label="Wine" group="With a glass of" />
<txp:zem_contact_radio label="Beer" />
<txp:zem_contact_radio label="Water" />

p. "Back to top":#top

h3(#zc_secret). @<txp:zem_contact_secret />@

This tag has no effect on the form or HTML output, but will include additional information in the email. It can be used as a self-closing tag or as a container tag.

h4. Attributes

* @name="text"@<br />Used internally. Set this only if you have multiple 'secret' form elements with identical labels.
* @label="text"@<br />Used to identify the field in the email. Default is *Secret*.
* @value="value"@<br />Some text you want to add to the email.

h4. Examples

Usage as a self-closing tag

bc. <txp:zem_contact_secret value="The answer is 42" />

Usage as a container tag

bc. <txp:zem_contact_secret label="Dear user">
  Please provide a useful example for this tag!
</txp:zem_contact_secret>

"Back to top":#top

h3(#zc_serverinfo). @<txp:zem_contact_serverinfo />@

This tag has no effect on the form or HTML output, but will include additional information in the email based on the PHP $_SERVER variable.

h4. Attributes

* @name="value"@ %(required)required%<br />Name of the server variable. See the "PHP manual":http://php.net/manual/reserved.variables.php#reserved.variables.server for a full list.
* @label="text"@<br />Used to identify the field in the email. Defaults to the value of the *name* attribute.

h4. Examples

Add the IP address of the visitor to the email

bc. <txp:zem_contact_serverinfo name="REMOTE_ADDR" label="IP number" />

Add the name of the visitor's browser to the email

bc. <txp:zem_contact_serverinfo name="HTTP_USER_AGENT" label="Browser" />

"Back to top":#top

h3(#zc_send_article). @<txp:zem_contact_send_article />@

Use this tag in your individual article form, where you want the "send article" link to be displayed.

h4. Attributes:

* @linktext="text"@<br />Text displayed for the link. Default is *send article*

h4. Examples:

See "Getting started":#sendarticle

"Back to top":#top

h3(#zc_label). @<txp:zem_contact_label />@

Return the label for the given attribute name.

h4. Attributes

* @name="text"@<br />The name of the field for which you wish to retrieve the label.

"Back to top":#top

h3(#zc_value). @<txp:zem_contact_value />@

Return the value of the given attribute, by name or its label.

h4. Attributes

* @name="text"@<br />The name of the field for which you wish to retrieve the value.
* @label="text"@<br />The label of the field for which you wish to retrieve the value.

"Back to top":#top

h3(#zc_if). @<txp:zem_contact_if />@

Conditional tag for checking variable conditions, either by name or label.

h4. Attributes

* @name="text"@<br />The name of the field you wish to check.
* @label="text"@<br />The label of the field you wish to check.
* @value="text"@<br />The value against which to test the given field. Leave blank to just test if there is any value assigned to the field.

h4. Examples:

Take action if the visitor has entered a particular value.

bc. <txp:zem_contact_if name="delivery" value="courier">
   Please note, this option incurs an additional charge,
</txp:zem_contact_if>

"Back to top":#top

h2(#advanced). Advanced examples

h3(#show_error). Separate input and error forms

Using @show_input@ and @show_error@ to display the form and error messages on different parts of a page. A form is used to make sure the contents of both forms are identical, otherwise they would be seen as two independent forms. The first form only shows errors (no input), the second form only shows the input fields (no errors).

bc.. <div id="error">
  <txp:zem_contact form="contact_form" show_input="0" />
</div>

<div id="inputform">
  <txp:zem_contact form="contact_form" show_error="0" />
</div>

p. Apart from the @show_error@ and @show_input@ attributes, all other attributes must be 100% identical in both forms, otherwise they would be seen as two unrelated forms.

"Back to top":#top

h3(#subject_form). User selectable subject field

Specify the @subject_form@ attribute and create a form which includes a @zem_contact_select@ tag:

bc. <txp:zem_contact to="you@example.com" subject_form="my_subject_form" />
  <txp:zem_contact_text label="Name" /><br />
  <txp:zem_contact_email /><br />
  <txp:zem_contact_select label="Choose Subject" list=",Question,Feedback" /><br />
  <txp:zem_contact_textarea label="Message" /><br />
</txp:zem_contact>

Create a Textpattern form called "my_subject_form", containing:

bc. <txp:php>
  global $zem_contact_form;
  echo $zem_contact_form['Choose Subject'];
</txp:php>

The @label@ used in the @zem_contact_select@ tag must be identical to the corresponding variable in the @subject_form@. Here we used @Choose subject@.

If you'd prefer to add a common prefix for all subjects, use a @subject_form@ containing:

bc. <txp:php>
  global $zem_contact_form;
  echo 'My common prefix - ' . $zem_contact_form['Choose Subject'];
</txp:php>

"Back to top":#top

h3(#to_form). User selectable recipient, without showing email address

Specify the @to_form@ attribute and create a form which includes a @zem_contact_select@ tag:

bc. <txp:zem_contact to_form="my_zem_contact_to_form">
  <txp:zem_contact_text label="Name" /><br />
  <txp:zem_contact_email /><br />
  <txp:zem_contact_select label="Department" list=",Support,Sales" /><br />
  <txp:zem_contact_textarea label="Message" /><br />
</txp:zem_contact>

Create a Textpattern form called "my_zem_contact_to_form", containing:

bc. <txp:php>
  global $zem_contact_form;
  switch($zem_contact_form['Department'])
  {
    case 'Support':
      echo 'crew@example.com';
      break;
    case 'Sales':
      echo 'showmethemoney@example.com';
      break;
    default:
      echo 'someone@example.com';
  }
</txp:php>

The @label@ used in the @zem_contact_select@ tag must be identical to the corresponsing variable in the @to_form@. Here we used @Department@.

A 'default' email address in the @to_form@ is specified to ensure that a valid email address is used in cases where you add or change a select/radio option and forget to update the @to_form@.

p(warning). Never use tags like @zem_contact_text@, @zem_contact_email@ or @zem_contact_textarea@ for setting the recipient address, otherwise your form can be abused to send spam to any email address!

"Back to top":#top

h2(#styling). Styling

The form itself has a class *zemContactForm* set on the @form@ HTML tag.

The list of error messages (if any) has a class *zemError* set on the @ul@ HTML tag that encloses the list of errors.

All form elements and corresponding labels have the following classes (or ids set):

# One of *zemText*, *zemTextarea*, *zemSelect*, *zemOption*, *zemRadio*, *zemCheckbox*, *zemSubmit*. By default, it should be obvious which class is used for which form element (and corresponding label). You can override these names by using your own @class@ attribute.
# *zemRequired* or *errorElement* or *zemRequirederrorElement*, depending on whether the form element is required, an error was found in whatever the visitor entered... or both.
# An individual "id" or "class" set to the value of the @name@ attribute of the corresponding tag. When styling forms based on this class, you should explicitly set the @name@ attribute because automatically generated names may change in newer zem_contact_reborn versions.

"Back to top":#top

h2(#history). History

Only the changes that may affect people who upgrade are detailed below.
To save space, links to forum topics that detail all the changes in each version have been added.

* 09 jul 2014: *version 4.5.0.0*
** Replace @split()@, which is deprecated since PHP 5.3, with @explode()@.
** Remove zem_contact_mailheader() function, switch to using TXP's encode_mailheader function (TXP 4.0.4+).
** Parse the thanks_form.
** Make email work when the mailserver requires the SMTP envelope sender (advanced prefs).
** Use "From: <email@example.com>" instead of "From: email@example.com" to avoid triggering Spamassassin rule.
** Add @body_form@ attribute. Not to be confused with the ladies' sanitary product.
** Add @class@ and @expire@ attributes.
** Add @<txp:zem_contact_option />@ tag.
** Add a host of HTML 5 attributes to tags.
** Add @zemcontact.delivery@ callback for enhanced mailing through other plugins.
** Remove deprecated @button@ attribute in @<zem_contact_submit />@.
* 23 aug 2007: *version 4.0.3.20* "changelog":http://forum.textpattern.com/viewtopic.php?id=23728
** escape label attribute values when showing the form in the browser (not in email, plain text there)
** don’t display empty input values in the email
* 14 feb 2007: *version 4.0.3.19* "changelog":http://forum.textpattern.com/viewtopic.php?id=21144
** "send_article":#sendarticle functionality revised, requiring changes when upgrading from earlier versions
** New language strings: 'send_article' and 'recipient' (replaces 'receiver')
** Sets of radio buttons require the new "group":#zc_radio attribute
** Yes/No values deprecated in favor of the TXP standard 1/0 values (yes/no still work in this version)
* 20 nov 2006: *version 4.0.3.18* "changelog":http://forum.textpattern.com/viewtopic.php?id=19823
** IDs 'zemContactForm' and 'zemSubmit' have changed to classes to allow multiple forms per page
** New language strings: 'form_used', 'invalid_utf8', 'max_warning', 'name', 'refresh', 'secret'
* 12 mar 2006: *version 4.0.3.17* "changelog":http://forum.textpattern.com/viewtopic.php?id=13416
* 11 feb 2006: *version .16*
* 06 feb 2006: *version .15*
* 03 feb 2006: *version .14*
** Requires separate zem_contact_lang plugin
* 29 jan 2006: *version .12*
* 27 jan 2006: *version .11*
* 23 jan 2006: *version .09 and .10*
* 23 jan 2006: *version .08*
* 17 jan 2006: *version .07*
* 16 jan 2006: *version .05 and .06*
* 15 jan 2006: *version .04*
* 10 jan 2006: *version .03*
* 19 dec 2005: *version .02*

"Back to top":#top

h2(#credits). Credits

* *zem* wrote the zem_contact 0.6 plugin on which this plugin was initially based.
* *Mary* completely revised the plugin code.
* *Stuart* Turned it into a plugin, added a revised help text and additional code. Maintained all plugin versions till 4.0.3.17.
* *wet* added the zem_contact_radio tag.
* *Tranquillo* added the anti-spam API and zem_contact_send_article functionality.
* *aslsw66*, *jdykast* and others (?) provided additional code
* *Ruud* cleaned up and audited the code to weed out bugs and completely revised the help text. Maintainer of versions 4.0.3.18 and up.
* *Bloke* is the maintainer of v4.5.0.0 and up.
* Supported and tested to destruction by the Textpattern community.

"Back to top":#top

h2(#api). Zem Contact Reborn's API

The plugin API of zem contact, developed by Tranquillo, is similar to the comments API of Textpattern, which is explained in the Textbook "Plugin Development Topics":http://textpattern.net/wiki/index.php?title=Plugin_Development_Topics and "Combat Comment Spam":http://textpattern.net/wiki/index.php?title=Combat_Comment_Spam.

Three callback events exist in zem_contact_reborn:

* @zemcontact.submit@ is called after the form is submitted and the values are checked if empty or valid email addresses, but before the mail is sent.
* @zemcontact.form@ lets you insert content in the contact form as displayed to the visitor.
* @zemcontact.deliver@ is called immediately prior to delivery and sends the intended payload so you may manipulate it. For example, you could change the MIME type header to @text/html@ and add some HTML content based on the given body data, then let zem_contact_reborn handle the mailing. Or you could intercept the entire mail process, handle mailing yourself with a third party system, and tell zem_contact_reborn to skip its internal mailing process.

For reference here are the commands that will be interesting to plugin developers:

bc.. // This will call your function before the form is submitted
// So you can analyse the submitted data
register_callback('abc_myfunction', 'zemcontact.submit');

// This will call your function and add the output (use @return $mystuff;@)
// to the contact-form.
register_callback('abc_myotherfunction2', 'zemcontact.form');

// To get hold of the form-variables you can use
global zem_contact_form;

// With the following two lines you can tell zem_contact if your
// plugin found spam
$evaluator =& get_zemcontact_evaluator();

// The passed value must be non-zero to mark the content as spam.
// Value must be a number between 0 and 1.
$evaluator -> add_zemcontact_status(1);

p. Multiple plugins can be active at the same time and each of them can mark the submitted content as spam and prevent the form from being submitted.

*An example of a plug-in connecting to Zem Contact Reborn's API:*

bc.. register_callback('pap_zemcontact_form','zemcontact.form');
register_callback('pap_zemcontact_submit','zemcontact.submit');

function pap_zemcontact_form() {
  $field = '<div style="display:none">'.
    finput('text','phone',ps('phone'),'','','','','','phone').'<br />'.
    finput('text','mail',ps('mail'),'','','','','','mail').'</div>';
  return $field;</code>
}

function pap_zemcontact_submit() {
  $checking_mail_field = trim(ps('mail'));
  $checking_phone_field = trim(ps('phone'));

  $evaluation =& get_zemcontact_evaluator();

  // If the hidden fields are filled out, the contact form won't be submitted!
  if ($checking_mail_field != '' or $checking_phone_field != '') {
    $evaluation -> add_zemcontact_status(1);
  }
  return;
}

p. For the delivery callback you signal back to the plugin your intentions so that zem_contact_reborn knows what to do after your delivery plugin has executed. Return the following strings:

* @zemcontact.send@ (or no return value) to allow ZCR to continue mailing.
* @zemcontact.skip@ to skip zem_contact's mailing (i.e. the third party handles the mail process) and return 'success' to the visitor.
* @zemcontact.fail@ to skip zem_contact's mailing and return 'fail' to the visitor.

Or simply @exit@ your plugin to halt the entire operation so no ZCR feedback is given.

p. "Back to top":#top

# --- END PLUGIN HELP ---
-->
<?php
}
?>