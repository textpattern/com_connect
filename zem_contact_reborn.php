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
zem_contact_email_subject => {site} > Enquiry
zem_contact_email_thanks => Thank you, your message has been sent.
zem_contact_field_missing => Required field, &#8220;<strong>{field}</strong>&#8221; is missing.
zem_contact_format_warning => Value {value} in &#8220;<strong>{field}</strong>&#8221; is not of the expected format.
zem_contact_form_expired => The form has expired, please try again.
zem_contact_form_used => The form was already submitted, please fill out a new form.
zem_contact_general_inquiry => General enquiry
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
#@language es-es
zem_contact_checkbox => Checkbox
zem_contact_contact => Contacto
zem_contact_email => Email
zem_contact_email_subject => {site} > Consulta
zem_contact_email_thanks => Gracias, tu mensaje ha sido enviado.
zem_contact_field_missing => falta el campo obligatorio &#8220;<strong>{field}</strong>&#8221;.
zem_contact_format_warning => El valor {value} en &#8220;<strong>{field}</strong>&#8221; no es el formato esperado.
zem_contact_form_expired => El formulario ha caducado, por favor inténtalo de nuevo.
zem_contact_form_used => El formulario ya había sido enviado, por favor rellena el formulario de nuevo.
zem_contact_general_inquiry => Consulta general
zem_contact_invalid_email => &#8220;<strong>{email}</strong>&#8221; no es un email válido.
zem_contact_invalid_host => &#8220;<strong>{host}</strong>&#8221; no es un dominio de email válido.
zem_contact_invalid_utf8 => &#8220;<strong>{field}</strong>&#8221; contiene caracteres UTF-8 no válidos.
zem_contact_invalid_value => Valor incorrecto para &#8220;<strong>{field}</strong>&#8221;, &#8220;<strong>{value}</strong>&#8221; No es una de las opciones disponibles.
zem_contact_mail_sorry => Lo siento, no se pudo enviar el email.
zem_contact_maxval_warning => &#8220;<strong>{field}</strong>&#8221; no debe exceder {value}.
zem_contact_max_warning => &#8220;<strong>{field}</strong>&#8221; no debe contener más de {value} caracteres.
zem_contact_message => Message
zem_contact_minval_warning => &#8220;<strong>{field}</strong>&#8221; debe tener al menos {value}.
zem_contact_min_warning => &#8220;<strong>{field}</strong>&#8221; debe contener al menos {value} caracteres.
zem_contact_name => Name
zem_contact_option => Option
zem_contact_pattern_warning => &#8220;<strong>{field}</strong>&#8221; no encaja con el patrón {value}.
zem_contact_radio => Radio
zem_contact_recipient => Recipient
zem_contact_refresh => Pincha aquí si la página no se recarga automáticamente.
zem_contact_secret => Secreto
zem_contact_send => Enviar
zem_contact_send_article => Enviar artículo
zem_contact_spam => Gracias, pero no aceptamos correo basura
zem_contact_text => Texto
zem_contact_to_missing => &#8220;<strong>To</strong>&#8221; falta la dirección de email.
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
#@public
#@language pt-br
zem_contact_checkbox => Checkbox
zem_contact_contact => Contato
zem_contact_email => Email
zem_contact_email_subject => {site} > Contato
zem_contact_email_thanks => Obrigado, sua mensagem foi enviada.
zem_contact_field_missing => Faltou preencher o campo requerido &#8220;<strong>{field}</strong>&#8221;.
zem_contact_format_warning => O valor {value} em &#8220;<strong>{field}</strong>&#8221; não está formato esperado.
zem_contact_form_expired => O formulário expirou, por favor tente novamente.
zem_contact_form_used => O formulário já foi enviado, por favor preencha o formulário novamente.
zem_contact_general_inquiry => Assuntos gerais
zem_contact_invalid_email => &#8220;<strong>{email}</strong>&#8221; não é um endereço de email válido.
zem_contact_invalid_host => &#8220;<strong>{host}</strong>&#8221; não é um domínio de email válido.
zem_contact_invalid_utf8 => &#8220;<strong>{field}</strong>&#8221; contém caracteres UTF-8 inválidos.
zem_contact_invalid_value => Valor incorreto para &#8220;<strong>{field}</strong>&#8221;, &#8220;<strong>{value}</strong>&#8221; Não é uma das opções disponíveis.
zem_contact_mail_sorry => Desculpe, não foi possível enviar o email.
zem_contact_maxval_warning => &#8220;<strong>{field}</strong>&#8221; não pode exceder {value}.
zem_contact_max_warning => &#8220;<strong>{field}</strong>&#8221; não pode conter mais que {value} caracteres.
zem_contact_message => Mensagem
zem_contact_minval_warning => &#8220;<strong>{field}</strong>&#8221; deve ter ao menos {value}.
zem_contact_min_warning => &#8220;<strong>{field}</strong>&#8221; deve conter ao menos {value} caracteres.
zem_contact_name => Nome
zem_contact_option => Opção
zem_contact_pattern_warning => &#8220;<strong>{field}</strong>&#8221; não se encaixa no formato {value}.
zem_contact_radio => Rádio
zem_contact_recipient => Destinatário
zem_contact_refresh => Clique neste link caso a página não se atualize automaticamente.
zem_contact_secret => Secreto
zem_contact_send => Enviar
zem_contact_send_article => Enviar artigo
zem_contact_spam => Não aceitamos SPAM, obrigado!
zem_contact_text => Texto
zem_contact_to_missing => &#8220;<strong>To</strong>&#8221; falta o endereço de email.
#@public
#@language de-de
zem_contact_checkbox => Checkbox
zem_contact_contact => Kontakt
zem_contact_email => E-Mail
zem_contact_email_subject => {site} > Anfrage
zem_contact_email_thanks => Vielen Dank, Ihre Nachricht wurde gesendet.
zem_contact_field_missing => Erforderliche Eingabe im Feld &#8220;<strong>{field}</strong>&#8221; fehlt.
zem_contact_format_warning => Eingabe {value} im Feld &#8220;<strong>{field}</strong>&#8221; entspricht nicht dem erwarteten Format.
zem_contact_form_expired => Dieses Formular ist abgelaufen, bitte versuchen Sie es erneut.
zem_contact_form_used => Dieses Formular wurde bereits gesendet. Bitte laden Sie das Formular noch einmal.
zem_contact_general_inquiry => Allgemeine Anfrage
zem_contact_invalid_email => &#8220;<strong>{email}</strong>&#8221; ist keine gültige E-Mailadresse.
zem_contact_invalid_host => &#8220;<strong>{host}</strong>&#8221; ist kein gültiger E-Mail-Server.
zem_contact_invalid_utf8 => &#8220;<strong>{field}</strong>&#8221; enthält ungültige UTF-8-Zeichen.
zem_contact_invalid_value => Ungültiger Wert für &#8220;<strong>{field}</strong>&#8221;, &#8220;<strong>{value}</strong>&#8221; ist keine verfügbare Option.
zem_contact_mail_sorry => Leider kann keine E-Mail gesendet werden.
zem_contact_maxval_warning => &#8220;<strong>{field}</strong>&#8221; darf {value} nicht überschreiten.
zem_contact_max_warning => &#8220;<strong>{field}</strong>&#8221; darf nicht länger als {value} Zeichen sein.
zem_contact_message => Nachricht
zem_contact_minval_warning => &#8220;<strong>{field}</strong>&#8221; darf {value} nicht unterschreiten.
zem_contact_min_warning => &#8220;<strong>{field}</strong>&#8221; darf nicht kürzer als {value} Zeichen sein.
zem_contact_name => Name
zem_contact_option => Option
zem_contact_pattern_warning => &#8220;<strong>{field}</strong>&#8221; entspricht nicht dem Muster {value}.
zem_contact_radio => Radio
zem_contact_recipient => Empfänger
zem_contact_refresh => Bitte folgen Sie diesem Link, falls die Seite icht automatisch neu geladen wird.
zem_contact_secret => Geheimnis
zem_contact_send => Senden
zem_contact_send_article => Artikel senden
zem_contact_spam => Danke, wir brauchen keinen Spam!
zem_contact_text => Text
zem_contact_to_missing => &#8220;<strong>To</strong>&#8221; E-Mail-Adresse fehlt.

EOT;

if (!defined('txpinterface'))
        @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---
//<?php
/**
 * zem_contact_reborn: A Textpattern CMS plugin for mail delivery of contact forms.
 */

// Register tags if necessary.
if (class_exists('\Textpattern\Tag\Registry')) {
    Txp::get('\Textpattern\Tag\Registry')
        ->register('zem_contact')
        ->register('zem_contact_text')
        ->register('zem_contact_email')
        ->register('zem_contact_textarea')
        ->register('zem_contact_select')
        ->register('zem_contact_option')
        ->register('zem_contact_checkbox')
        ->register('zem_contact_radio')
        ->register('zem_contact_serverinfo')
        ->register('zem_contact_secret')
        ->register('zem_contact_submit')
        ->register('zem_contact_send_article')
        ->register('zem_contact_value')
        ->register('zem_contact_label')
        ->register('zem_contact_if');
}

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
    global $sitename, $textarray, $zem_contact_flags, $zem_contact_from,
        $zem_contact_recipient, $zem_contact_error, $zem_contact_submit,
        $zem_contact_form, $zem_contact_labels, $zem_contact_values;

    extract(zem_contact_lAtts(array(
        'body_form'        => '',
        'class'            => 'zemContactForm',
        'classes'          => '',
        'copysender'       => 0,
        'expire'           => 600,
        'form'             => '',
        'from'             => '',
        'from_form'        => '',
        'label'            => null,
        'browser_validate' => 1,
        'redirect'         => '',
        'required'         => '1',
        'show_error'       => 1,
        'show_input'       => 1,
        'send_article'     => 0,
        'subject'          => null,
        'subject_form'     => '',
        'to'               => '',
        'to_form'          => '',
        'thanks'           => null,
        'thanks_form'      => ''
    ), $atts));

    if (!empty($lang)) {
        $strings = zem_contact_load_lang($lang);
        $textarray = array_merge($textarray, $strings);
    }

    // Set defaults, in the local language if necessary.
    if ($label === null) {
        $label = gTxt('zem_contact_contact');
    }

    if ($subject === null) {
        $subject = gTxt('zem_contact_email_subject', array('{site}' => html_entity_decode($sitename,ENT_QUOTES)));
    }

    if ($thanks === null) {
        $thanks = graf(gTxt('zem_contact_email_thanks'));
    }

    unset($atts['show_error'], $atts['show_input']);

    $defaultClassNames = array(
        'element'  => 'errorElement',
        'wrapper'  => 'zemError',
        'required' => 'zemRequired',
        'thanks'   => 'zemThanks',
        );

    $zem_contact_form_id = md5(serialize($atts) . preg_replace('/[\t\s\r\n]/', '', $thing));
    $zem_contact_submit = (ps('zem_contact_form_id') == $zem_contact_form_id);
    $override_email_charset = (get_pref('override_emailcharset') && is_callable('utf8_decode'));
    $userClassNames = do_list($classes);

    foreach (array_merge($defaultClassNames, $userClassNames) as $classKey => $classValue) {
        if (strpos($classValue, ':') !== false) {
            $classParts = do_list($classValue, ':');

            if (count($classParts) === 2) {
                $zem_contact_flags['cls_' . $classParts[0]] = $classParts[1];
            }
        } elseif ($classKey && $classValue) {
            $zem_contact_flags['cls_' . $classKey] = $classValue;
        }
    }

    // The $zem_contact_flags['this_form'] global is set if an id is supplied for the <form>.
    // This value then becomes the default value for all html_form (a.k.a. form=)
    // attributes for any input tags in this tag's container, providing HTML5 is in use.
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
        // TODO: use max(600, $expire)? Not perfect, but ensures a safe minimum deletion rate.
        safe_delete('txp_discuss_nonce', "issue_time < date_sub('$now_date', interval 10 minute)");
        if ($rs = safe_row('used', 'txp_discuss_nonce', "nonce = '$nonce'")) {
            if ($rs['used']) {
                unset($zem_contact_error);
                $zem_contact_error[] = gTxt('zem_contact_form_used');
                $renonce = true;
                $_POST = array();
                $_POST['zem_contact_submit'] = true;
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

    // Perform aggregate functions for checking radio sets.
    if ($zem_contact_submit) {
        zem_contact_group_validate();
    }

    if ($to_form) {
        $to = parse_form($to_form);
    }

    if (!$to && !$send_article) {
        return gTxt('zem_contact_to_missing');
    }

    $out = '';

    if (!$zem_contact_submit) {
        // Don't show errors or send mail.
    } elseif (!empty($zem_contact_error)) {
        if ($show_error || !$show_input) {
            $out .= n.doWrap(array_unique($zem_contact_error), 'ul', 'li', $zem_contact_flags['cls_wrapper']).n;

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
        $fields = array();

        foreach ($zem_contact_labels as $name => $label) {
            if (!is_array($zem_contact_values[$name])) {
                if (trim($zem_contact_values[$name]) === false) {
                    continue;
                }

                $msg[] = $label . ': ' . $zem_contact_values[$name];
            }

            $fields[$name] = $zem_contact_values[$name];
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

            $msg[] = trim(strip_tags(str_replace($s_ar, $r_ar, (trim(strip_tags($thisarticle['excerpt'])) ? $thisarticle['excerpt'] : $thisarticle['body']))));

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

        // TODO: function deprecated in 4.6.0.
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

        if (zem_contact_deliver($to, $subject, $msg, $headers, $fields, array('isCopy' => false))) {
            $_POST = array();

            if ($copysender && $zem_contact_from) {
                zem_contact_deliver(zem_contact_strip($zem_contact_from), $subject, $msg, $headers, $fields, array('isCopy' => true));
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
                return '<div class="' . $zem_contact_flags['cls_thanks'] . '" id="zcr'.$zem_contact_form_id.'">' .
                    ($thanks_form ? parse_form($thanks_form) : $thanks) .
                    '</div>';
            }
        } else {
            // TODO: consider allowing zem_contact_error to be displayed here if third party plugin
            // returned anything more specific.
            $out .= graf(gTxt('zem_contact_mail_sorry'));
        }
    }

    if ($show_input && !$send_article || gps('zem_contact_send_article')) {
        $out = '<form method="post"' . ((!$show_error && $zem_contact_error) ? '' : ' id="zcr' . $zem_contact_form_id . '"') .
            ($class ? ' class="' . $class . '"' : '') .
            ($browser_validate ? '' : ' novalidate') .
            ' action="' . txpspecialchars(serverSet('REQUEST_URI')) . '#zcr' . $zem_contact_form_id . '">' .
            ($label ? n . '<fieldset>' : n . '<div>') .
            ($label ? n . '<legend>' . txpspecialchars($label) . '</legend>' : '') .
            $out .
            n . '<input type="hidden" name="zem_contact_nonce" value="' . $zem_contact_nonce . '" />' .
            n . '<input type="hidden" name="zem_contact_form_id" value="' . $zem_contact_form_id . '" />' .
            $form .
            callback_event('zemcontact.form') .
            ($label ? (n . '</fieldset>') : (n . '</div>')) .
            n . '</form>';

        callback_event_ref('zemcontact.render', '', 0, $out, $atts);

        return $out;
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
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'zemText',
        'default'        => '',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'inputmode'      => '',
        'label'          => gTxt('zem_contact_text'),
        'label_position' => 'before',
        'max'            => null,
        'min'            => null,
        'name'           => '',
        'pattern'        => '',
        'placeholder'    => '',
        'required'       => $zem_contact_flags['required'],
        'size'           => '',
        'step'           => '',
        'type'           => 'text',
    ), $atts));

    $doctype = get_pref('doctype', 'xhtml');

    $datetime_types = array(
        'date',
        'datetime',
        'datetime-local',
        'month',
        'time',
        'week',
    );

    $numeric_types = array(
        'number',
        'range',
    );

    $is_datetime = (in_array($type, $datetime_types));
    $is_numeric = (in_array($type, $numeric_types));

    // Dates / times get special treatment: no default min/max if not set by tag.
    if (!$is_datetime && $min === null) {
        $min = 0;
    }

    if (!$is_datetime && $max === null) {
        $max = 100;
    }

    if (empty($name)) {
        $name = zem_contact_label2name($label);
    }

    if ($zem_contact_submit) {
        $value = trim(ps($name));
        $utf8len = preg_match_all("/./su", $value, $utf8ar);
        $hlabel = txpspecialchars($label);
        $datetime_ok = true;

        if ($is_datetime) {
            $minval = $min;
            $maxval = $max;
            $cmpval = $value;

            try {
                $dt = new DateTime($cmpval);
                $cmpval = $dt->format('U');

                if ($min) {
                    $dt = new DateTime($min);
                    $minval = $dt->format('U');
                }

                if ($max) {
                    $dt = new DateTime($max);
                    $maxval = $dt->format('U');
                }
            } catch (Exception $e) {
                $datetime_ok = false;
            }
        }

        if (strlen($value)) {
            if (!$utf8len) {
                $zem_contact_error[] = gTxt('zem_contact_invalid_utf8', array('{field}' => $hlabel));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($is_datetime && !$datetime_ok) {
                $zem_contact_error[] = gTxt('zem_contact_format_warning', array('{field}' => $hlabel, '{value}' => $value));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($min && !$is_numeric && !$is_datetime && $utf8len < $min) {
                $zem_contact_error[] = gTxt('zem_contact_min_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($max && !$is_numeric && !$is_datetime && $utf8len > $max) {
                $zem_contact_error[] = gTxt('zem_contact_max_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($min && $is_datetime && $cmpval < $minval) {
                $zem_contact_error[] = gTxt('zem_contact_minval_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($max && $is_datetime && $cmpval > $maxval) {
                $zem_contact_error[] = gTxt('zem_contact_maxval_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($min && $is_numeric && $value < $min) {
                $zem_contact_error[] = gTxt('zem_contact_minval_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($max && $is_numeric && $value > $max) {
                $zem_contact_error[] = gTxt('zem_contact_maxval_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($pattern and !preg_match('/^'.$pattern.'$/', $value)) {
                $zem_contact_error[] = gTxt('zem_contact_pattern_warning', array('{field}' => $hlabel, '{value}' => $pattern));
                $isError = $zem_contact_flags['cls_element'];
            } else {
                zem_contact_store($name, $label, $value);
            }
        } elseif ($required) {
            $zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => $hlabel));
            $isError = $zem_contact_flags['cls_element'];
        }
    } else {
        $value = $default;
    }

    // Core attributes.
    $attr = zem_contact_build_atts(array(
        'id'    => (isset($id) ? $id : $name),
        'name'  => $name,
        'type'  => $type,
        'value' => $value,
    ));

    if ($size && !$is_numeric) {
        $attr['size'] = 'size="' . intval($size) . '"';
    }

    if ($min && !$is_numeric) {
        $attr['minlength'] = 'minlength="' . intval($min) . '"';
    }

    if ($max && !$is_numeric) {
        $attr['maxlength'] = 'maxlength="' . intval($max) . '"';
    }

    if ($doctype !== 'xhtml' && ($is_numeric || $is_datetime)) {
        // Not using intval() because min/max/step can be floating point values.
        $attr += zem_contact_build_atts(array(
            'min'  => $min,
            'max'  => $max,
            'step' => $step,
        ));
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'autocomplete' => $autocomplete,
            'form'         => $html_form,
            'inputmode'    => $inputmode,
            'pattern'      => $pattern,
            'placeholder'  => $placeholder,
            'required'     => $required,
        ));

        if ($isError) {
            $attr += zem_contact_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $zem_contact_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>';

    return ($label_position === 'before' ? $labelStr . $break : '') .
        '<input' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . ' />' .
        ($label_position === 'after' ? $break . $labelStr : '');
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

    // TODO: 'multiple' attribute?
    $defaults = array(
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'zemEmail',
        'default'        => '',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('zem_contact_email'),
        'label_position' => 'before',
        'max'            => 100,
        'min'            => 0,
        'name'           => '',
        'pattern'        => '',
        'placeholder'    => '',
        'required'       => $zem_contact_flags['required'],
        'send_article'   => 0,
        'size'           => '',
        'type'           => 'email',
    );

    extract(zem_contact_lAtts($defaults, $atts));

    if (empty($name)) {
        $name = zem_contact_label2name($label);
    }

    $email = $zem_contact_submit ? trim(ps($name)) : $default;

    if ($zem_contact_submit && strlen($email)) {
        if (!is_valid_email($email)) {
            $zem_contact_error[] = gTxt('zem_contact_invalid_email', array('{email}' => txpspecialchars($email)));
            $isError = $zem_contact_flags['cls_element'];
        } else {
            preg_match("/@(.+)$/", $email, $match);
            $domain = $match[1];

            if (is_callable('checkdnsrr') && checkdnsrr('textpattern.com.','A') && !checkdnsrr($domain.'.','MX') && !checkdnsrr($domain.'.','A')) {
                $zem_contact_error[] = gTxt('zem_contact_invalid_host', array('{host}' => txpspecialchars($domain)));
                $isError = $zem_contact_flags['cls_element'];
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
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'zemTextarea',
        'cols'           => 58,
        'default'        => '',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('zem_contact_message'),
        'label_position' => 'before',
        'max'            => 10000,
        'min'            => 0,
        'name'           => '',
        'placeholder'    => '',
        'required'       => $zem_contact_flags['required'],
        'rows'           => 8,
        'wrap'           => '',
    ), $atts));

    $min = intval($min);
    $max = intval($max);

    if (empty($name)) {
        $name = zem_contact_label2name($label);
    }

    $doctype = get_pref('doctype', 'xhtml');

    if ($zem_contact_submit) {
        $value = preg_replace('/^\s*[\r\n]/', '', rtrim(ps($name)));
        $utf8len = preg_match_all("/./su", ltrim($value), $utf8ar);
        $hlabel = txpspecialchars($label);

        if (strlen(ltrim($value))) {
            if (!$utf8len) {
                $zem_contact_error[] = gTxt('zem_contact_invalid_utf8', array('{field}' => $hlabel));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($min && $utf8len < $min) {
                $zem_contact_error[] = gTxt('zem_contact_min_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $zem_contact_flags['cls_element'];
            } elseif ($max && $utf8len > $max) {
                $zem_contact_error[] = gTxt('zem_contact_max_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $zem_contact_flags['cls_element'];
            } else {
                zem_contact_store($name, $label, $value);
            }
        } elseif ($required) {
            $zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => $hlabel));
            $isError = $zem_contact_flags['cls_element'];
        }
    } else {
        $value = $default;
    }

    // Core attributes.
    $attr = zem_contact_build_atts(array(
        'id'        => (isset($id) ? $id : $name),
        'name'      => $name,
        'cols'      => intval($cols),
        'rows'      => intval($rows),
        'maxlength' => $max,
    ));

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'autocomplete' => $autocomplete,
            'form'         => $html_form,
            'placeholder'  => $placeholder,
            'required'     => $required,
        ));

        if ($isError) {
            $attr += zem_contact_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $zem_contact_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>';

    return ($label_position === 'before' ? $labelStr . $break : '') .
        '<textarea' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($value) . '</textarea>' .
        ($label_position === 'after' ? $break . $labelStr : '');
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

    // TODO: multiple attribute?
    extract(zem_contact_lAtts(array(
        'break'          => br,
        'class'          => 'zemSelect',
        'delimiter'      => ',',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('zem_contact_option'),
        'label_position' => 'before',
        'list'           => '', // TODO: remove from here in favour of the global list attribute.
        'options'        => gTxt('zem_contact_general_inquiry'),
        'name'           => '',
        'required'       => $zem_contact_flags['required'],
        'selected'       => '',
        'size'           => '',
    ), $atts));

    // Detect old-school use of the list attribute. Note that deprecated_function_with
    // isn't strictly the correct error to throw, but it's close enough until core has
    // a dedicated deprecated_attribute_with string.
    if (!empty($list) && strpos($list, $delimiter) !== false) {
        $options = $list;
        trigger_error(gTxt('deprecated_function_with', array('{name}' => 'list', '{with}' => 'options')), E_USER_NOTICE);
        unset($list, $atts['list']);
    }

    if (empty($name)) {
        $name = zem_contact_label2name($label);
    }

    $value = ($zem_contact_submit) ? trim(ps($name)) : $selected;
    $doctype = get_pref('doctype', 'xhtml');

    if ($thing) {
        zem_contact_option(null, $value);
        $out = parse($thing);
        $options = zem_contact_option(null, null);
    } else {
        $options = array_map('trim', explode($delimiter, preg_replace('/[\r\n\t\s]+/', ' ', $options)));
        $out = '';

        foreach ($options as $item) {
            $out .= n.t.'<option' . ($item == $value ? ' selected' . (($doctype === 'xhtml') ? '="selected"' : '') . '>' : '>') . (strlen($item) ? txpspecialchars($item) : ' ') . '</option>';
        }
    }

    if ($zem_contact_submit) {
        if (strlen($value)) {
            if (in_array($value, $options)) {
                zem_contact_store($name, $label, $value);
            } else {
                $zem_contact_error[] = gTxt('zem_contact_invalid_value', array('{field}' => txpspecialchars($label), '{value}' => txpspecialchars($value)));
                $isError = $zem_contact_flags['cls_element'];
            }
        } elseif ($required) {
            $zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($label)));
            $isError = $zem_contact_flags['cls_element'];
        }
    } else {
        $value = $selected;
    }

    // Core attributes.
    $attr = zem_contact_build_atts(array(
        'id'   => (isset($id) ? $id : $name),
        'name' => $name,
    ));

    if ($size && is_numeric($size)) {
        $attr['size'] = 'size="' . intval($size) . '"';
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));

        if ($isError) {
            $attr += zem_contact_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $zem_contact_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>';

    return ($label_position === 'before' ? $labelStr . $break : '') .
        n . '<select' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' .
            $out .
        n . '</select>' .
        ($label_position === 'after' ? $break . $labelStr : '');
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

    if (empty($val)) {
        $val = $label;
    }

    $attr = array();
    $doctype = get_pref('doctype', 'xhtml');

    if ($zem_contact_submit) {
        $options[] = $val;

        if ($val !== null && ((string)$val === (string)$match)) {
            $attr[] = 'selected' . (($doctype === 'xhtml') ? '="selected"' : '');
        }
    } elseif ($selected || ($val !== null && ((string)$val === (string)$match))) {
        $attr[] = 'selected' . (($doctype === 'xhtml') ? '="selected"' : '');
    }

    // Core attributes.
    $attr += zem_contact_build_atts(array(
        'value' => $val,
    ));

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classStr = (($class) ? ' class="' . $class . '"' : '');

    return '<option' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($val) . '</option>';
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
        'break'          => ' ',
        'checked'        => 0,
        'class'          => 'zemCheckbox',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('zem_contact_checkbox'),
        'label_position' => 'after',
        'name'           => '',
        'required'       => $zem_contact_flags['required'],
        'value'          => null,
    ), $atts));

    if (empty($name)) {
        $name = zem_contact_label2name($label);
    }

    $doctype = get_pref('doctype', 'xhtml');

    if ($zem_contact_submit) {
        $theValue = (bool) ps($name);

        if ($required && !$theValue) {
            $zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($label)));
            $isError = $zem_contact_flags['cls_element'];
        } else {
            $toStore = (($value !== null && $theValue) ? $value : ($theValue ? gTxt('yes') : gTxt('no')));
            zem_contact_store($name, $label, $toStore);
        }
    } else {
        $theValue = $checked;
    }

    // Core attributes.
    $attr = zem_contact_build_atts(array(
        'id'    => (isset($id) ? $id : $name),
        'name'  => $name,
    ));

    if ($value !== null) {
        $attr += zem_contact_build_atts(array(
            'value' => $value,
        ));
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));

        if ($isError) {
            $attr += zem_contact_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $zem_contact_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>';

    return ($label_position === 'before' ? $labelStr . $break : '') .
        '<input type="checkbox"' . $classStr .
            ($theValue ? ' checked' . (($doctype === 'xhtml') ? '="checked"' : '') : '') . ($attr ? ' ' . implode(' ', $attr) : '') . ' />' .
        ($label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Render a radio button.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 */
function zem_contact_radio($atts)
{
    global $zem_contact_error, $zem_contact_submit, $zem_contact_values, $zem_contact_flags, $zem_contact_group;

    extract(zem_contact_lAtts(array(
        'break'          => ' ',
        'checked'        => 0,
        'class'          => 'zemRadio',
        'group'          => '',
        'html_form'      => $zem_contact_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('zem_contact_option'),
        'label_position' => 'after',
        'name'           => '',
        'required'       => null,
        'value'          => null,
    ), $atts));

    static $cur_name = array();
    static $cur_req = array();
    static $cur_group = null;

    if (!$group) {
        if ($cur_group === null) {
            $group = gTxt('zem_contact_radio');
        } else {
            $group = $cur_group;
        }
    } else {
        if (!$name) {
            $name = $group;
        }
    }

    if (isset($cur_name[$group])) {
        if (!$name) {
            $name = $cur_name[$group];
        }
    } else {
        if ($name) {
            $cur_name[$group] = $name;
        } else {
            $name = $cur_name[$group] = gTxt('zem_contact_radio');
        }
    }

    if (isset($cur_req[$group])) {
        if ($required === null) {
            $required = $cur_req[$group];
        }
    } else {
        if ($required === null) {
            $required = $cur_req[$group] = $zem_contact_flags['required'];
        } else {
            $cur_req[$group] = $required;
        }
    }

    $cur_group = $group;

    $id = 'q' . md5($name . '=>' . $label);
    $name = zem_contact_label2name($name);
    $doctype = get_pref('doctype', 'xhtml');
    $zem_contact_group[$name][$id]['req'] = $required;
    $zem_contact_group[$name][$id]['label'] = $group;

    if ($zem_contact_submit) {
        $toCompare = ($value === null ? $id : $value);
        $is_checked = (ps($name) == $toCompare);
        $zem_contact_group[$name][$id]['isSet'] = $is_checked;

        if ($is_checked || $checked && !isset($zem_contact_values[$name])) {
            zem_contact_store($name, $group, ($value !== null ? $value : $label));
        }
    } else {
        $is_checked = $checked;
    }

    // Core attributes.
    $attr = zem_contact_build_atts(array(
        'id'    => $id,
        'name'  => $name,
        'value' => ($value !== null ? $value : $id),
    ));

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $zem_contact_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = '<label for="' . $id . '"' . $classStr . '>' . txpspecialchars($label) . '</label>';

    return ($label_position === 'before' ? $labelStr . $break : '') .
        '<input type="radio"'. $classStr . ($attr ? ' ' . implode(' ', $attr) : '') .
            ( $is_checked ? ' checked' . (($doctype === 'xhtml') ? '="checked"' : ''). ' />' : ' />') .
        ($label_position === 'after' ? $break . $labelStr : '');
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
        'label' => gTxt('zem_contact_secret'),
        'name'  => '',
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
    $doctype = get_pref('doctype', 'xhtml');

    $attr = array();

    // HTML5 attributes.
    if ($doctype !== 'xhtml') {
        $attr += zem_contact_build_atts(array(
            'form' => $html_form,
        ));
    }

    // Global attributes.
    $attr += zem_contact_build_atts($zem_contact_globals, $atts);

    $classStr = ($class ? ' class="' . $class . '"' : '');

    if (strlen($thing)) {
        return '<button type="submit"' . $classStr . ' name="zem_contact_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . ($thing ? trim(parse($thing)) : $label) . '</button>';
    } else {
        return '<input type="submit"' . $classStr . ' name="zem_contact_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . ' />';
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
 * Perform post-processing for aggregate (group) controls like radio sets.
 *
 * @todo Can this be done any neater?
 * @todo Should this be exposed as a callback to allow plugins to extend the functionality?
 */
function zem_contact_group_validate()
{
    global $zem_contact_group, $zem_contact_error;

    $flags = array();

    if ($zem_contact_group) {
        foreach ($zem_contact_group as $key => $grp) {
            foreach ($grp as $id => $atts) {
                $flags[$key]['label'] = $atts['label'];

                if (!empty($atts['req']) && !isset($flags[$key]['req'])) {
                    $flags[$key]['req'] = 1;
                }

                if (!empty($atts['isSet']) && !isset($flags[$key]['isSet'])) {
                    $flags[$key]['isSet'] = 1;
                }
            }
        }

        foreach ($flags as $key => $data) {
            if (!empty($data['req']) && !isset($data['isSet'])) {
                $zem_contact_error[] = gTxt('zem_contact_field_missing', array('{field}' => txpspecialchars($data['label'])));
            }
        }
    }
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
    foreach (array('button', 'copysender', 'checked', 'required', 'send_article', 'show_input', 'show_error') as $key) {
        if (isset($atts[$key])) {
            $atts[$key] = ($atts[$key] === 'yes' || intval($atts[$key])) ? 1 : 0;
        }
    }

    if (isset($atts['break']) && $atts['break'] === 'br') {
        $atts['break'] = '<br />';
    }

    $zem_contact_globals = array(
        'accesskey'  => '',
        'autofocus'  => '',
        'dir'        => '',
        'disabled'   => '',
        'hidden'     => '',
        'id'         => '',
        'lang'       => '',
        'list'       => '',
        'readonly'   => '',
        'spellcheck' => '',
        'style'      => '',
        'tabindex'   => '',
        'title'      => '',
        'translate'  => '',
    );

    foreach ($atts as $name => $value) {
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

    $booleans = array(
        'autofocus',
        'checked',
        'disabled',
        'hidden',
        'multiple',
        'readonly',
        'required',
        'selected',
        );

    foreach ($pairs as $key => $value) {
        if ($value !== '' && $value !== null) {
            $attr[$key] = $key . (in_array($key, $booleans) ? '' : '="' . txpspecialchars($value) . '"');
        } else {
            if (isset($defaults[$key])) {
                $attr[$key] = $key . (in_array($key, $booleans) ? '' : '="' . txpspecialchars($defaults[$key]) . '"');
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
        // TODO: strip_rn will be deprecated in 4.6.0.
        $str = strip_rn($str);
    }

    return preg_replace('/[\x00]/', ' ', $str);
}

/**
 * Handle content delivery of payload.
 *
 * Triggers a 'zemcontact.deliver' callback event to override or augment the
 * delivery mechanism. Third party plugins can make alterations to the $payload,
 * then return one of the strings:
 *  -> "zemcontact.send" (or no return value) to allow ZCR to continue mailing after the 3rd party plugin completes
 *  -> "zemcontact.skip" to skip zem_contact's mailing (i.e. the 3rd party handles mailing) and return 'success'
 *  -> "zemcontact.fail" to skip zem_contact's mailing and return 'fail'
 *
 * By hooking into the callback's step you can target either the main 'send'
 * process or the 'copysender' process. Examples of things you could do:
 * -> Add Multi-part MIME headers for HTML emails.
 * -> Add CC: or BCC: fields.
 * -> Subscribe people to mailing lists.
 * -> Handle the mailing process independently of Textpattern.
 *
 * @param string $to      Delivery address
 * @param string $subject Subject of message
 * @param string $body    Message content
 * @param array  $headers Message headers as tuples
 * @param array  $fields  Message field names and content as tuples
 * @param array  $flags   Signals to govern delivery / callback behaviour
 */
function zem_contact_deliver($to, $subject, $body, $headers, $fields, $flags)
{
    $payload = array(
        'to'      => $to,
        'subject' => $subject,
        'headers' => $headers,
        'body'    => $body,
        'fields'  => $fields,
    );

    $flavour = ($flags['isCopy'] === true) ? 'copysender' : 'send';

    // Allow plugins to override or alter default action (mail) if required.
    // TODO: use has_handler() from 4.6.0+.
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
    function __construct()
    {
        $this->status = 0;
    }

    /**
     * Append the given status to the counter.
     */
    function add_zemcontact_status($check)
    {
        $this->status += $check;
    }

    /**
     * Fetch the current evaluator status.
     */
    function get_zemcontact_status()
    {
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
 * Override the language strings if necessary.
 *
 * @param  string $lang Language designator (e.g. fr-fr)
 * @return array        Partial language array to merge with $textarray
 */
function zem_contact_load_lang($lang = LANG)
{
    $out = array();

    if ($lang != LANG) {

        $rs = safe_rows("name, data", 'txp_lang', "lang = '" . doSlash($lang) . "' AND name like 'zem\_contact\_%'");

        if (!empty($rs)) {
            foreach ($rs as $a) {
                $out[$a['name']] = $a['data'];
            }
        }
    }

    return $out;
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
        'label' => '',
        'name'  => '',
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
        'label' => '',
        'name'  => '',
        'value' => null,
    ), $atts));

    $val = zem_contact_value(array(
        'label' => $label,
        'name'  => $name,
    ));

    if ($val) {
        $cond = ($value === null || $val == $value);
    } else {
        $cond = false;
    }

    return parse(EvalElse($thing, $cond));
}
# --- END PLUGIN CODE ---
if (0) {
?>
<!--
# --- BEGIN PLUGIN HELP ---
h1. Zem Contact Reborn

A Textpattern CMS form mailer plugin. @<txp:zem_contact />@ produces a flexible, customisable email contact form. It is intended for use as an enquiry form for commercial and private sites, and includes several features to help reduce common problems with such forms (invalid email addresses, missing information).

Please report bugs and problems with this plugin at "the GitHub project's issues page":https://github.com/Bloke/zem_contact_reborn/issues.

h2. Contents

* "Features":#features
* "Installing and upgrading":#install
* "Differences from previous version":#differences
* "Usage":#usage
* "Tags":#tags
** "zem_contact tag":#zc
** "zem_contact_text tag":#zc_text
** "zem_contact_email tag":#zc_email
** "zem_contact_textarea tag":#zc_textarea
** "zem_contact_submit tag":#zc_submit
** "zem_contact_select tag":#zc_select
** "zem_contact_option tag":#zc_option
** "zem_contact_checkbox tag":#zc_checkbox
** "zem_contact_radio tag":#zc_radio
** "zem_contact_secret tag":#zc_secret
** "zem_contact_serverinfo tag":#zc_serverinfo
** "zem_contact_send_article tag":#zc_send_article
** "zem_contact_label tag":#zc_label
** "zem_contact_value tag":#zc_value
** "zem_contact_if tag":#zc_if
* "Advanced examples":#advanced
** "Separate input and error forms":#advanced1
** "User selectable subject field":#advanced2
** "User selectable recipient, without showing email address":#advanced3
* "Styling":#styling
* "Plugin API and callback events":#api
* "Frequently asked questions":#faq
* "History":#history
* "Authors/credits":#credits

h2(#features). Features

* Arbitrary HTML5 text fields can be specified, with min/max/required settings for validation.
* Email address validation, including a check for a valid MX record (Unix only).
* Safe escaping of input data.
* UTF-8 safe.
* Accessible form layout, including @<label>@, @<legend>@ and @<fieldset>@ tags.
* Various classes and ids to allow easy styling of all parts of the form.
* Spam prevention API (used by Tranquillo's @pap_contact_cleaner@ plugin) and delivery API for altering or extending the plugin's capabilities.

h2(#install). Installing and upgrading

*Requires Textpattern 4.5.0+*

Download the latest release of the plugin from "the GitHub project page":https://github.com/Bloke/zem_contact_reborn/releases, paste the code into the Textpattern Admin → Plugins panel, install and enable the plugin. Visit the "forum thread":http://forum.textpattern.com/viewtopic.php?id=46798 for more info or to report on the success or otherwise of the plugin.

To uninstall, delete from the Admin → Plugins panel.

h2(#differences). Differences from previous version

If upgrading from v4.0.3.20, please note these differences:

* Disable or remove the zem_contact_lang plugin. Language strings are now bundled as part of the plugin itself. If you have a translation Textpack available that is not yet bundled, please submit it for inclusion.
* Classes based on the input element @name@ are no longer automatically applied. Only default class names beginning with @zem@ are set. To employ custom classes, use the @class@ attribute for each tag, or the global @classes@ attribute to set names for error and information messages.
* If your site's Doctype preference is set to @html5@ you may use HTML5 attributes in your tags. Otherwise, they will be ignored.
* Validation of required elements and min/max constraints is done by the browser first, and the plugin second. So if you specify a field is required and it is left empty, the browser will usually prevent the form being submitted. To bypass (most of) the browser checks, specify @browser_validate="0"@ in your @<txp:zem_contact />@ tag.

h2(#usage). Usage

h3. Contact form

The simplest form is shown below, which produces a default form with 'Name', 'Email' and 'Message' fields. Email will be delivered to <code>recipient@example.com</code>, with the user's supplied email as the @From:@ address.

bc. <txp:zem_contact to="recipient@example.com" />

To specify fields explicitly, use something like this:

bc. <txp:zem_contact to="recipient@example.com">
    <txp:zem_contact_email />
    <txp:zem_contact_text label="Phone" min="7" max="15" />
    <txp:zem_contact_textarea label="Your question" />
    <txp:zem_contact_submit label="Send" />
</txp:zem_contact>

Alternatively, place the field specifications in a Textpattern form, and call it like this:

bc(language-markup). <txp:zem_contact to="recipient@example.com" form="my-contact-form" />

h3. Send article

Within the context of an individual article, this plugin can be used to send the article (or excerpt, if it exists) to an email address specified by the visitor. This requires at least two tags:

# @zem_contact@, to create form that is initially hidden by setting the @send_article@ attribute.
# @zem_contact_send_article@, to create a 'Send article' link which reveals the aforementioned form when clicked.

bc(language-markup). <txp:zem_contact send_article="1" />
<txp:zem_contact_send_article />

By default the form contains fields for your name and email address, the recipient's email address and a personal message, but similar to contact forms you can create your own form layout. Some things you need to know:

# Set the @send_article@ attribute to @1@ in the @zem_contact@ tag.
# Use a @zem_contact_email@ tag with the @send_article@ attribute set to @1@. This field will be used as the recipient email address.

bc(language-markup).. <txp:zem_contact to="you@example.com" send_article="1">
    <txp:zem_contact_email label="Recipient Email" send_article="1" />
    <txp:zem_contact_email label="Your Email" />
    <txp:zem_contact_submit label="Send Article" />
</txp:zem_contact>

<txp:zem_contact_send_article />

h2(#tags). Tags

@<txp:zem_contact_send_article />@ can be used to create a 'Send article' link within an article form, connecting it to the contact form.

All other tags provided by this plugin can only be used inside a @<txp:zem_contact>@ - @</txp:zem_contact>@ container tag or in a Textpattern form used as the @form@ attribute in the @<txp:zem_contact />@ tag.

In addition to the tags detailed in the following sections, every tag accepts a core set of common attributes. These are:

* @accesskey="character"@<br />Shortcut key to set focus on the field.
* @autofocus="boolean"@<br />To automatically focus the cursor in this field on page load. Only one field may have this property.
* @dir="value"@<br />Text direction (@ltr@, @rtl@ or @auto@).
* @disabled="boolean"@<br />Whether the input control accepts user input. If set, the element does not get submitted with the form, nor is it subject to any @checkValidity()@ JavaScript calls.
* @hidden="boolean"@<br />The visibility of the input control.
* @id="id"@<br />The HTML identifier for the control.
* @lang="value"@<br />The ISO 639 language short code (e.g. @en-gb@, @de-de@) that govern the field.
* @list="id"@<br />Used in conjunction with the @<datalist>@ tag to specify a set of options. The id is the reference to the datalist to use.
* @readonly="boolean"@<br />Control does not accept user input, but will be processed on form submission and can be validated.
* @spellcheck="value"@<br />Whether the field is subject to spell checking (@true@ = yes, @default@ = browser decides, or @false@ = no).
* @style="style rules"@<br />Inline CSS @style@ rules to apply to the input control.
* @tabindex="number"@<br />The order in which the cursor jumps between elements when using the tab key.
* @title="value"@<br />Usually used for hover tooltip describing the input control's use in your application.
* @translate="boolean"@<br />Whether to subject the attribute content to language translation.

h3(#zc). zem_contact tag

bc(language-markup). <txp:zem_contact />

May be used as a single (self-closing) or container tag. Place this where you want the input form to go. Status and error messages, if any, will be displayed before the form.

h4. Attributes

* @body_form="form name"@<br />Use specified form for the message body text.
* @class="space-separated values"@<br />Set the CSS @class@ name of the tag. Default: @zemContactForm@. To remove @class@ attribute from the element entirely, use @class=""@.
* @classes="comma-separated key:value pairs"@<br />Set the CSS classes for error / information conditions. Specify each as a pair of values separated by a colon, e.g. @classes="required: req_field, element: warn_field"@. There are up to four available to customise:
** @element@: Set for each form field that fails validation for any reason. Default: @errorElement@.
** @wrapper@: The class to surround the list of errors shown above the form. Default: @zemError@.
** @required@: Class assigned when a required element is not completed. Default: @zemRequired@.
** @thanks@: Class applied to the wrapper around the @thanks_form@. Default: @zemThanks@.
* @copysender="boolean"@<br />Whether to send a copy of the email to the sender's address. Available values: @1@ (yes) or @0@ (no). Default is @0@.
* @expire="number"@<br />Number of seconds after which the form will expire, thus requiring a page refresh before sending. Default is @600@.
* @form="form name"@<br />Use specified form, containing the layout of the contact form fields.
* @from="email address"@<br />Email address used in the "From:" field when sending email. Defaults to the sender's email address. If specified, the sender's email address will be placed in the "Reply-To:" field instead.
* @from_form="form name"@<br />Use specified form (overrides @from@ attribute).
* @label="text"@<br />Label for the contact form. If set to an empty string, display of the fieldset and legend tags will be suppressed. Default is @Contact@.
* @lang="lang-code"@<br />Override the language strings that would normally be used from the current admin-side language in force. e.g. @lang="fr-fr"@ would load the French language strings. A Textpack must already exist for the chosen language.
* @browser_validate="boolean"@<br />Set to 0 if you wish to stop the browser from validating form field values and 'required' status of input elements. The plugin itself is then solely responsible for validation and will indicate error conditions after submission. Default is @1@.
* @redirect="URL"@<br />Redirect to specified URL (overrides @thanks@ and @thanks_form@ attributes). URL must be relative to the Textpattern site URL. Example: @redirect="monkey"@ would redirect to @http://example.com/monkey@.
* @required="boolean"@<br />Whether to require all tags in this contact form to be completed before the form can be submitted. Can be overridden on a field-by-field basis by using the @required@ attribute in the relevant tag. Available values: @1@ (yes) or @0@ (no). Default is @1@.
* @send_article="boolean"@<br />Whether to use this form to send an article. Available values: @1@ (yes) or @0@ (no). Default is @0@.
* @show_error="boolean"@<br />Whether to display error and status messages. Available values: @1@ (yes) or @0@ (no). Default is @1@.
* @show_input="boolean"@<br />Whether to display the form @<input>@ fields. Available values: @1@ (yes) or @0@ (no). Default is @1@.
* @subject="subject text"@<br />Subject used when sending an email. Default is the site name.
* @subject_form="form name"@<br />Use specified form (overrides @subject@ attribute).
* @thanks="text"@<br />Message shown after successfully submitting a message. Default is @Thank you, your message has been sent@.
* @thanks_form="form name"@<br />Use specified form (overrides @thanks@ attribute).
* @to="email address"@ %(warning)required%<br />Recipient email address. Multiple recipients can be specified, separated by commas.
* @to_form="form name"@<br />Use specified form (overrides @to@ attribute).

h4. Examples

h5. Example 1

When used as a single tag, produces a default form with 'Name', 'Email' and 'Message' fields. Email will be delivered to <code>recipient@example.com</code>, with the user's supplied email as the @From:@ address:

bc(language-markup). <txp:zem_contact to="recipient@example.com" />

h5. Example 2

When used as a container tag, much more flexibility is allowed, for example:

bc(language-markup). <txp:zem_contact to="recipient@example.com">
    <txp:zem_contact_email />
    <txp:zem_contact_text type="tel" label="Phone" min="7" max="15" />
    <txp:zem_contact_textarea label="Your question" />
    <txp:zem_contact_submit label="Send" />
</txp:zem_contact>

h5. Example 3

Example with custom email message formatting, called via the @body_form@ attribute:

bc(language-markup). <txp:zem_contact to="recipient@example.com" body_form="message-formatting" />

And the @body_form@ form template named @message-formatting@ is as follows:

bc.. ============
Email received.

<txp:zem_contact_if name="email"><txp:zem_contact_label name="email" />: <txp:zem_contact_value name="email" /><txp:else />Mr. Nobody</txp:zem_contact_if> wrote:

<txp:zem_contact_if name="message"><txp:zem_contact_value name="message" /><txp:else />Nothing much :(</txp:zem_contact_if>

============

h3(#zc_text). zem_contact_text tag

bc(language-markup). <txp:zem_contact_text />

Creates a text @<input>@ field and corresponding @<label>@ tag. The input value will be included in the email, preceded by the label.
Creates a text @<input>@ field. The input value will be included in the email, preceded by the label.

h4. Attributes

* @autocomplete="value"@<br />Indicates whether the value of the control can be automatically completed by the browser. This attribute is ignored if the value of the type attribute is @password@. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
* @break="tag"@<br />Break tag between the @<label>@ and @<input>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the tag. Default: @zemText@. To remove @class@ attribute from the element entirely, use @class=""@.
* @default="value"@<br />Default value when no input is provided.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the field is attached. Associated with the contained form by default.
* @inputmode="value"@<br />A hint to the browser for which keyboard to display. This attribute applies when the value of the type attribute is @text@, @password@ or @url@. Possible values are:
** @verbatim@: Alphanumeric, non-prose content such as usernames and passwords.
** @latin@: Latin-script input in the user's preferred language with typing aids such as text prediction enabled. For human-to-computer communication such as search boxes.
** @latin-name@: As latin, but for human names.
** @latin-prose@: As latin, but with more aggressive typing aids. For human-to-human communication such as instant messaging for email.
** @full-width-latin@: As latin-prose, but for the user's secondary languages.
** @kana@: Kana or romaji input, typically hiragana input, using full-width characters, with support for converting to kanji. Intended for Japanese text input.
** @katakana@: Katakana input, using full-width characters, with support for converting to kanji. Intended for Japanese text input.
** @numeric@: Numeric input, including keys for the digits 0 to 9, the user's preferred thousands separator character, and the character for indicating negative numbers. Intended for numeric codes, e.g. credit card numbers. For actual numbers, prefer using @type="number"@.
** @tel@: Telephone input, including asterisk and pound key. Use @type="tel"@ if possible instead.
** @email@: Email input. Use @<txp:zem_contact_email />@ if possible instead.
** @url@: URL input. Use @type="url"@ if possible instead.
* @label="text"@<br />Text label displayed to the user. Default is @Text@.
* @label_position="text"@<br />Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @before@.
* @max=value"@<br />For character-based inputs, the maximum input value length in characters, using the HTML5 @maxlength@ attribute. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@. For numeric-based inputs, the maximum input value the field accepts, using the HTML5 @max@ attribute (can be a negative value). Default is @100@. To remove @max@ attribute from the numerical input element entirely, use @max=""@.
* @min="value"@<br />For character-based inputs, the minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit. For numeric-based inputs, the minimum input value the field accepts, using the HTML5 @min@ attribute (can be a negative value). Default is @0@. To remove @min@ attribute from the numerical input element entirely, use @min=""@.
* @name="value"@<br />Field name, as used in the HTML @<input>@ tag.
* @pattern="regex"@<br />Regular expression that governs the format in which the field data is expected. Only used for character-based inputs.
* @placeholder="text"@<br />Text to show as a guide, when the @<input>@ field is empty.
* @required="boolean"@<br />Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
* @size="value"@<br/>The size, in characters, of the @<input>@ field.
* @step="value"@<br />For numeric-based inputs, the interval between min and max.
* @type="value"@<br />Type of text input. Default is @text@. Choose from:
** @color@
** @date@
** @datetime@
** @datetime-local@
** @month@
** @number@
** @password@
** @range@
** @search@
** @tel@
** @text@
** @time@
** @url@
** @week@

h4. Examples

h5. Example 1

bc(language-markup). <txp:zem_contact_text label="Your name" />

h5. Example 2

bc(language-markup). <txp:zem_contact_text type="range" label="UK shoe size" min="1" max="15" />

h5. Example 3

Create a telephone field with a "validation pattern for UK telephone number":http://html5pattern.com/Phones format:

bc(language-markup). <txp:zem_contact_text type="tel" label="Telephone" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" required="1" />

h3(#zc_email). zem_contact_email tag

bc(language-markup). <txp:zem_contact_email />

@<input>@ field for user's email address.

The entered email address will automatically be validated to make sure it is of the form "abc@xxx.yyy[.zzz]". On non-Windows servers, a test will be done to verify that an A or MX record exists for the domain. Neither test prevents spam, but it does help detect accidental typing errors.

h4. Attributes

* @autocomplete="value"@<br />Indicates whether the value of the control can be automatically completed by the browser. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
* @break="tag"@<br />Break tag between the @<label>@ and @<input>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the tag. Default: @zemEmail@. To remove @class@ attribute from the element entirely, use @class=""@.
* @default="value"@<br />Default value when no input is provided.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the field is attached. Associated with the contained form by default.
* @label="text"@<br />Text label displayed to the user. Default is @Email@.
* @label_position="text"@<br />Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @before@.
* @max="integer"@<br />Maximum input value length in characters, using the HTML5 @maxlength@ attribute. Default is @100@. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@.
* @min="integer"@<br />Minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit.
* @name="value"@<br />Field name, as used in the HTML @<input>@ tag.
* @placeholder="text"@<br />Text to show as a guide, when the @<input>@ field is empty.
* @required="boolean"@<br />Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
* @send_article="boolean"@<br />Whether this field is used as the recipient email address when using the send_article function. Available values: @1@ (yes) or @0@ (no). Default is @0@.
* @size="value"@<br/>The size, in characters, of the @<input>@ field.

h4. Examples

h5. Example 1

bc(language-markup). <txp:zem_contact_email label="Your email address" />

h3(#zc_textarea). zem_contact_textarea tag

bc(language-markup). <txp:zem_contact_textarea />

Creates a @<textarea>@.

h4. Attributes

* @autocomplete="value"@<br />Indicates whether the value of the control can be automatically completed by the browser. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
* @break="tag"@<br />Break tag between the @<label>@ and @<textarea>@. Default is @<br />@. Use @break=""@ to put the @<label>@ and @<input>@ field on the same line.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the  @<textarea>@. Default: @zemTextarea@. To remove @class@ attribute from the element entirely, use @class=""@.
* @cols="integer"@<br/>Number of columns, in characters, of the @<textarea>@. Default is @58@.
* @default="value"@<br />Default value when no input is provided.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the @<textarea>@ is attached. Associated with the contained form by default.
* @label="text"@<br />Text label displayed to the user. Default is @Message@.
* @label_position="text"@<br />Position of the label in relation to the @<textarea>@ field. Available values: @before@ or @after@. Default is @before@.
* @max="integer"@<br />Maximum input value length in characters, using the HTML5 @maxlength@ attribute. Default is @10000@. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@.
* @min="integer"@<br />Minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit.
* @name="value"@<br />Field name, as used in the HTML @<input>@ tag.
* @placeholder="text"@<br />Text to show as a guide to users, when the  @<textarea>@ is empty.
* @required="boolean"@<br />Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
* @rows="integer"@<br/>Number of rows, in characters, of the @<textarea>@. Default is @8@.
* @wrap="value"@<br/>Governs word-wrap. Available values: @hard@ or @soft@. If this attribute is not specified, @soft@ is its default value.

h4. Examples

h5. Example 1

Create a text area that is 40 characters wide, 10 lines high, with a customised label:

bc(language-markup). <txp:zem_contact_textarea cols="40" rows="10" label="Your question" />

h3(#zc_submit). zem_contact_submit tag

bc(language-markup). <txp:zem_contact_submit />

Creates a submit button. When used as a container tag, a @<button>@ element will be used instead of an @<input>@ element.

h4. Attributes:

* @class="space-separated values"@<br /> Set the CSS @class@ name of the tag. Default: @zemSubmit@. To remove @class@ attribute from the element entirely, use @class=""@.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the button is attached. Associated with the contained form by default.
* @label="text"@<br />Text shown on the submit button. Default is @Send@.

h4. Examples

h5. Example 1

Standard submit button:

bc(language-markup). <txp:zem_contact_submit />

h5. Example 2

Submit button with your own text:

bc(language-markup). <txp:zem_contact_submit label="To the moooon" />

h5. Example 3

Usage as a container tag, which allows you to use Textpattern tags and HTML markup in the submit button:

bc(language-markup). <txp:zem_contact_submit><strong>Send</strong> question</txp:zem_contact_submit>

h5. Example 4

As example 3 above, but using an image as the button:

bc(language-markup). <txp:zem_contact_submit>
    <img src="path/to/img.png" alt="submit">
</txp:zem_contact_submit>

h3(#zc_select). zem_contact_select tag

bc(language-markup). <txp:zem_contact_select />

Container tag that creates a drop-down selection @<select>@ list, or scrolled @<select>@ list box (by utilising the @size@ attribute).

h4. Attributes

* @break="tag"@<br />Break tag between the label and @<select>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the list. Default: @zemSelect@. To remove @class@ attribute from the element entirely, use @class=""@.
* @delimiter="character"@<br />Separator character between list items if using the @options@ attribute. Default is @,@ (comma). Ignored if this tag is used as a container.
* @label="text"@<br />Text label displayed to the user. Default is @Option@.
* @label_position="text"@<br />Position of the label in relation to the @<select>@ field. Available values: @before@ or @after@. Default is @before@.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the @<select>@ is attached. Associated with the contained form by default.
* @name="value"@<br />Field name, as used in the HTML @<select>@ tag.
* @options="comma-separated values"@<br /> List of items (previously @list@) to show in the select box. May also use the @<txp:zem_contact_option />@ tag inside this tag's container.
* @required="boolean"@<br />Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
* @selected="value"@<br />List item that is selected by default.
* @size="value"@<br/>If the @<select>@ is to be presented as a scrolled list box, this attribute represents the number of rows in the list that should be visible at one time. Default is unset (i.e., a drop-down selection @<select>@ list).

h4. Examples

h5. Example 1

Drop-down selection list labeled 'Department', containing three options and a blank option (due to the comma before 'Marketing') shown by default, forcing the user to make a selection.

bc(language-markup). <txp:zem_contact_select label="Department" options=",Marketing,Sales,Support" />

h5. Example 2

bc. <txp:zem_contact_select label="Department" selected="Sales">
    <txp:zem_contact_option />
    <txp:zem_contact_option label="Marketing" />
    <txp:zem_contact_option label="Sales" />
    <txp:zem_contact_option label="Support" />
</txp:zem_contact_select>

Drop-down selection list containing three options plus a blank option (also see @zem_contact_option@ tag below), with 'Sales' selected by default.

h3(#zc_option). zem_contact_option tag

bc(language-markup). <txp:zem_contact_option />

Creates a drop-down selection option. May be used as a single (self-closing) or container tag. Also see @zem_contact_select@ tag above.

h4. Attributes

* @class="space-separated values"@<br /> Set the CSS @class@ name of the option. Default: @zemOption@. To remove @class@ attribute from the element entirely, use @class=""@.
* @label="text"@ %(warning)required%<br />Text label of this option displayed to the user.
* @selected="boolean"@<br />Whether this item is selected, May also be specified in the container tag's @selected@ attribute. Available values: @1@ (yes) or @0@ (no).
* @value="text"@<br />The value associated with this option when submitted. Default is the label.

h5. Example 1

bc(language-markup). <txp:zem_contact_select label="Department">
    <txp:zem_contact_option label="Marketing" />
    <txp:zem_contact_option label="Sales" />
    <txp:zem_contact_option label="Support" />
</txp:zem_contact_select>

Drop-down selection list containing three options as single tags.

h5. Example 2

bc(language-markup). <txp:zem_contact_select label="Department">
    <txp:zem_contact_option value="contact-marketing">Marketing</txp:zem_contact_option>
    <txp:zem_contact_option value="contact-sales" selected="1">Sales</txp:zem_contact_option>
    <txp:zem_contact_option value="contact-support">Support</txp:zem_contact_option>
</txp:zem_contact_select>

Drop-down selection list containing three options as container tags with 'Sales' selected by default.

h3(#zc_checkbox). zem_contact_checkbox tag

bc(language-markup). <txp:zem_contact_checkbox />

Creates a checkbox.

h4. Attributes

* @break="tag"@<br />Break tag between the checkbox button and label. Default is one space. Use @break="br"@ to put the checkbox and label on separate lines.
* @checked="boolean"@<br />Whether this box is checked when first displayed. Available values: @1@ (yes) or @0@ (no). Default is @0@.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the option. Default: @zemCheckbox@. To remove @class@ attribute from the element entirely, use @class=""@.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the checkbox is attached. Associated with the contained form by default.
* @label="text"@<br />Text label displayed to the user. Default is @Checkbox@.
* @label_position="text"@<br />Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @after@.
* @name="value"@<br />Field name, as used in the HTML @<input>@ tag.
* @required="boolean"@<br />Whether this checkbox must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
* @value="text"@<br />Value to send in the email if the option is checked. Uses yes/no if not set.

h4. Examples

h5. Example 1

Shrink-wrap agreement which must be checked by the user before the email will be sent.

bc(language-markup). <txp:zem_contact_checkbox label="I accept the terms and conditions" />

h5. Example 2

Optional checkboxes:

bc(language-markup). With which operating systems are you familiar?<br />
<txp:zem_contact_checkbox label="Windows" required="0" /><br />
<txp:zem_contact_checkbox label="Unix/Linux/BSD" required="0" /><br />
<txp:zem_contact_checkbox label="MacOS" required="0" />

h3(#zc_radio). zem_contact_radio tag

bc(language-markup). <txp:zem_contact_radio />

Creates a radio button.

h4. Attributes

* @break="tag"@<br />Break tag between the radio button and label. Default is one space. Use @break="br"@ to put the radio button and label on separate lines.
* @checked="boolean"@<br />Whether this radio option is checked when the form is first displayed. Available values: @1@ (yes) or @0@ (no). Default is @0@.
* @class="space-separated values"@<br /> Set the CSS @class@ name of the radio button. Default: @zemRadio@. To remove @class@ attribute from the element entirely, use @class=""@.
* @group="text"@ %(warning)required%<br />Text used in the email to describe this group of radio buttons. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. Default is @Radio@.
* @html_form="id"@<br />The HTML @id@ of the @<form>@ tag to which the radio button is attached. Associated with the contained form by default.
* @label="text"@ %(warning)required%<br />Text label displayed to the user as radio button option.
* @name="value"@ %(warning)recommended%<br />Field name, as used in the HTML @<input>@ tag. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. If it hasn't been set at all, it will be derived from the @group@ attribute.
* @required="boolean"@<br />Whether this radio set must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:zem_contact>@ tag's @required@ attribute - if neither attribute is set then default is @1@. *You should set the @required@ attribute on only the first radio button of the group, or set the same identical attribute value on all radio buttons in the group.*
* @value="text"@<br />Value to send in the email if the option is checked. Uses label if not set.

h4. Examples

h5. Example 1

Group mutually exclusive radio buttons by setting the @group@ attribute on the first radio button in a group. Only the chosen radio button from each group will be used in the email message. The message will be output in the form @group: label@ for each of the chosen radio buttons.

bc(language-markup). <txp:zem_contact_radio label="Medium" group="I like my steak" />
<txp:zem_contact_radio label="Rare" />
<txp:zem_contact_radio label="Well done" />
<txp:zem_contact_radio label="Wine" group="With a glass of" />
<txp:zem_contact_radio label="Beer" />
<txp:zem_contact_radio label="Water" />

h3(#zc_secret). zem_contact_secret tag

bc(language-markup). <txp:zem_contact_secret />

This tag has no effect on the form or HTML output, but will include additional information in the email. It can be used as a single (self-closing) tag or as a container tag.

h4. Attributes

* @label="text"@<br />Used to identify the field in the email. Default is @Secret@.
* @name="text"@<br />Used internally. Set this only if you have multiple 'secret' form elements with identical labels.
* @value="value"@<br />Some text you want to add to the email.

h4. Examples

h5. Example 1

Usage as a single (self-closing) tag:

bc(language-markup). <txp:zem_contact_secret value="The answer is 42" />

h5. Example 2

Usage as a container tag:

bc. <txp:zem_contact_secret label="Dear user">
    Please provide a useful example for this tag!
</txp:zem_contact_secret>

h3(#zc_serverinfo). zem_contact_serverinfo tag

bc(language-markup). <txp:zem_contact_serverinfo />

This tag has no effect on the form or HTML output, but will include additional information in the email based on the PHP @$_SERVER@ variable.

h4. Attributes

* @label="text"@<br />Used to identify the field in the email. Defaults to the value of the @name@ attribute.
* @name="value"@ %(warning)required%<br />Name of the server variable. See the "PHP manual":http://php.net/manual/reserved.variables.php#reserved.variables.server for a full list.

h4. Examples

h5. Example 1

Add the IP address of the visitor to the email:

bc(language-markup). <txp:zem_contact_serverinfo name="REMOTE_ADDR" label="IP number" />

h5. Example 2

Add the name of the visitor's browser to the email:

bc. <txp:zem_contact_serverinfo name="HTTP_USER_AGENT" label="Browser" />

h3(#zc_send_article). zem_contact_send_article tag

bc(language-markup). <txp:zem_contact_send_article />

Use this tag in your individual article form, where you want the "send article" link to be displayed.

h4. Attributes

* @linktext="text"@<br />Text displayed for the link. Default is @send article@.

h4. Examples

h5. Example 1

On an article form:

bc(language-markup). <txp:zem_contact_send_article linktext="Send this article" />

h3(#zc_label). zem_contact_label tag

bc(language-markup). <txp:zem_contact_label />

Return the label for the given attribute name.

h4. Attributes

* @name="text"@<br />The name of the field for which you wish to retrieve the label.

h3(#zc_value). zem_contact_value tag

bc(language-markup). <txp:zem_contact_value />

Return the value of the given attribute, by name or its label.

h4. Attributes

* @label="text"@<br />The label of the field for which you wish to retrieve the value.
* @name="text"@<br />The name of the field for which you wish to retrieve the value.

h3(#zc_if). zem_contact_if tag

bc(language-markup). <txp:zem_contact_if />

Conditional tag for checking variable conditions, either by name or label.

h4. Attributes

* @label="text"@<br />The label of the field you wish to check.
* @name="text"@<br />The name of the field you wish to check.
* @value="text"@<br />The value against which to test the given field. Leave blank to just test if there is any value assigned to the field.

h4. Examples

h5. Example 1

Take action if the visitor has entered a particular value.

bc(language-markup). <txp:zem_contact_if name="delivery" value="courier">

Please note, this option incurs an additional charge, @</txp:zem_contact_if>@.

h2(#advanced). Advanced examples

h3(#advanced1). Separate input and error forms

Using @show_input@ and @show_error@ to display the form and error messages on different parts of a page. A form is used to make sure the contents of both forms are identical, otherwise they would be seen as two independent forms. The first form only shows errors (no input), the second form only shows the input fields (no errors).

bc(language-markup). <div id="error">
    <txp:zem_contact form="contact_form" show_input="0" />
</div>
<div id="inputform">
    <txp:zem_contact form="contact_form" show_error="0" />
</div>

Apart from the @show_error@ and @show_input@ attributes, all other attributes must be 100% identical in both forms, otherwise they would be seen as two unrelated forms.

h3(#advanced2). User selectable subject field

Specify the @subject_form@ attribute and create a form which includes a @zem_contact_select@ tag:

bc(language-markup). <txp:zem_contact to="you@example.com" subject_form="my_subject_form" />
    <txp:zem_contact_text label="Name" /><br />
    <txp:zem_contact_email /><br />
    <txp:zem_contact_select label="Choose Subject" options=",Question,Feedback" /><br />
    <txp:zem_contact_textarea label="Message" /><br />
</txp:zem_contact>

Create a Textpattern form called "my_subject_form", containing:

bc(language-php). <txp:php>
    global $zem_contact_form;
    echo $zem_contact_form['Choose Subject'];
</txp:php>

The @label@ used in the @zem_contact_select@ tag must be identical to the corresponding variable in the @subject_form@. Here we used @Choose subject@.

If you'd prefer to add a common prefix for all subjects, use a @subject_form@ containing:

bc(language-php). <txp:php>
    global $zem_contact_form;
    echo 'My common prefix - ' . $zem_contact_form['Choose Subject'];
</txp:php>

h3(#advanced3). User selectable recipient, without showing email address

Specify the @to_form@ attribute and create a form which includes a @zem_contact_select@ tag:

bc(language-markup). <txp:zem_contact to_form="my_zem_contact_to_form">
    <txp:zem_contact_text label="Name" /><br />
    <txp:zem_contact_email /><br />
    <txp:zem_contact_select label="Department" options=",Support,Sales" /><br />
    <txp:zem_contact_textarea label="Message" /><br />
</txp:zem_contact>

Create a Textpattern form called "my_zem_contact_to_form", containing:

bc(language-php). <txp:php>
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

p(alert-block warning). *Warning:* Never use tags like @zem_contact_text@, @zem_contact_email@ or @zem_contact_textarea@ for setting the recipient address, otherwise your form can be abused to send spam to any email address!

h2(#styling). Styling

The form itself has a @class@ of @zemContactForm@ set on the @form@ HTML tag.

The list of error messages (if any) has a @class@ of @zemError@ set on the @ul@ HTML tag that encloses the list of errors. This class name may be overridden using the @classes@ attribute of the @zem_contact@ tag.

All form elements and corresponding labels have the following classes (or ids set by default):

# One of @zemText@, @zemEmail@, @zemTextarea@, @zemSelect@, @zemOption@, @zemRadio@, @zemCheckbox@ or @zemSubmit@. By default, it should be obvious which @class@ is used for which form element (and corresponding label). You can override these names by using your own @class@ attribute.
# @zemRequired@ and/or @errorElement@, depending on whether the form element is required, an error was found in whatever the visitor entered, or both. These can be overriden using the @classes@ attribute on the @zem_contact@ tag.
# An individual @id@ or @class@ set to the value of the @name@ attribute of the corresponding tag. When styling forms based on this @class@, you should explicitly set the @name@ attribute because automatically generated names may change in newer zem_contact_reborn versions.

h2(#api). Zem Contact Reborn's API

The plugin API of zem_contact_reborn, originally developed by Tranquillo, allows other plugins to interact with contact forms. This permits extra functionality such as "Combatting Comment Spam":http://textpattern.net/wiki/index.php?title=Combat_Comment_Spam, HTML email, newsletter delivery and so forth to be bolted onto the base plugin.

Four callback events exist in zem_contact_reborn:

* @zemcontact.submit@ is called after the form is submitted and the values are checked if empty or valid email addresses, but before the mail is sent.
* @zemcontact.form@ lets you inject content (fields) in the contact form as displayed to the visitor.
* @zemcontact.render@ lets you inject or alter markup of the entire @<form>@. Useful for editing things like @enctype@ (e.g. for file attachment modules that link into this plugin).
* @zemcontact.deliver@ is called immediately prior to delivery and advertises the intended payload so you may manipulate it. For example, you could do something as simple as adding CC: or BCC: fields. Or change the MIME type header to @text/html@ and add some HTML content based on the given body data, then let zem_contact_reborn handle the mailing. Or you could intercept the entire mail process, handle mailing yourself with a third party system, and tell zem_contact_reborn to skip its internal mailing process.

For reference here are the commands that will be interesting to plugin developers:

bc(language-php).. // This will call your function before the form is submitted so you can analyse the submitted data
register_callback('abc_myfunction', 'zemcontact.submit');

// This will call your function and add the output (use @return $mystuff;@) to the contact-form.
register_callback('abc_myotherfunction2', 'zemcontact.form');

// To get hold of the form-variables you can use global zem_contact_form;
// With the following two lines you can tell zem_contact if your plugin found spam.
$evaluator =& get_zemcontact_evaluator();

// The passed value must be non-zero to mark the content as spam.
// Value must be a number between 0 and 1.
$evaluator -> add_zemcontact_status(1);

p. Multiple plugins can be active at the same time and each of them can mark the submitted content as spam and prevent the form from being submitted.

h4. Examples

bc(language-php).. register_callback('pap_zemcontact_form','zemcontact.form');
register_callback('pap_zemcontact_submit','zemcontact.submit');

function pap_zemcontact_form()
{
    $field = '<div style="display:none">'.
        finput('text','phone',ps('phone'),'','','','','','phone').'<br />'.
        finput('text','mail',ps('mail'),'','','','','','mail').'</div>';
    return $field;</code>
}

function pap_zemcontact_submit()
{
    $checking_mail_field = trim(ps('mail'));
    $checking_phone_field = trim(ps('phone'));
    $evaluation =& get_zemcontact_evaluator();

    // If the hidden fields are filled out, the contact form won't be submitted!
    if ($checking_mail_field != '' or $checking_phone_field != '') {
        $evaluation -> add_zemcontact_status(1);
    }

    return;
}

p. For the delivery callback, you signal back to the plugin your intentions so that Zem Contact Reborn knows what to do after your delivery plugin has executed. Return the following strings:

* @zemcontact.send@ (or no return value) to allow Zem Contact Reborn to continue mailing the content.
* @zemcontact.skip@ to skip zem_contact's mailing (i.e., the third party handles the mail process) and return 'success' to the visitor.
* @zemcontact.fail@ to skip zem_contact's mailing and return 'fail' to the visitor.

Or simply @exit@ your plugin to halt the entire operation so no Zem Contact Reborn feedback is given.

h2(#faq). Frequently asked questions

; How do I remove the legend and fieldset surrounding the contact form?
: Set the @label@ attribute to an empty value (@label=""@) in the @zem_contact@ tag.
; No email is sent. How do I diagnose and fix the problem?
: First try a simple contact form, using only the @zem_contact@ tag with the @to@ attribute set to a valid email address. If that doesn't send email, fill out the 'SMTP envelope sender address' field in Textpattern's Admin → Preferences panel. If that doesn't help either, take a look at your mail server log files to see what the problem is.
; Which tag do I use to create the submit button?
: Just use normal HTML code to create a submit button. For historical reasons this plugin still provides the @zem_contact_submit@ tag, but it provides little extra functionality.
; How can I get a unique (order) number in the subject of each email?
: Try using the "rvm_counter":http://vanmelick.com/txp tag in the @subject@ attribute of the @zem_contact@ tag.
; I want to use the contact form in an article list (one form for each article), but how do I make each form unique?
: You can make each form unique by making one of its attribute values unique. See previous question for an example of how to do this with the @subject@ attribute.
; Send article: can I let people specify multiple recipients?
: No. The 'send article' functionality is spammy enough as it is right now.
; Send article: can I show the contact form without having to click a link first?
: Sure, put this just above the @zem_contact@ tag: @<txp:php>$_GET['zem_contact_send_article']='yes';</txp:php>@
; How can I use this form to upload files?
: You can't, but have a look at the "zcr_file_attach":https://github.com/Bloke/zcr_file_attach/releases/ module, or "mem_form":https://bitbucket.org/Manfre/txp-plugins/downloads/ plugins.
; Can I use this plugin to send HTML email?
: Not without a plugin like "mem_form":https://bitbucket.org/Manfre/txp-plugins/downloads or using the delivery callback.
; Can I use this plugin to send newsletters?
: Not without a plugin, such as "mem_postmaster":https://bitbucket.org/Manfre/txp-plugins/downloads/.
; I have a question that's not listed here
: First read the plugin documentation (the page you're on right now) once more. If that doesn't answer your question, visit the "Textpattern forum":http://forum.textpattern.com.

h2(#history). History

Please see the "changelog on GitHub":https://github.com/Bloke/zem_contact_reborn/blob/master/CHANGELOG.textile.

h2(#credits). Authors/credits

* *zem* wrote the zem_contact 0.6 plugin on which this plugin was initially based.
* *Mary* completely revised the plugin code.
* *Stuart* turned it into a plugin, added a revised help text and additional code. Maintained all plugin versions until 4.0.3.17.
* *wet* added the @zem_contact_radio@ tag.
* *Tranquillo* added the anti-spam API and @zem_contact_send_article@ functionality.
* *aslsw66*, *jdykast* and others provided additional code.
* *Ruud* cleaned up and audited the code to weed out bugs and completely revised the help text. Maintained all versions until 4.0.3.20.
* *Bloke* is the maintainer of v4.5.0.0 and up. Many thanks to "all additional contributors":https://github.com/Bloke/zem_contact_reborn/graphs/contributors.
* Supported and tested to destruction by the Textpattern community.
# --- END PLUGIN HELP ---
-->
<?php
}
?>
