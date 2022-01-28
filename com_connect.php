<?php

// This is a PLUGIN TEMPLATE for Textpattern CMS.

// Copy this file to a new name like abc_myplugin.php.  Edit the code, then
// run this file at the command line to produce a plugin for distribution:
// $ php abc_myplugin.php > abc_myplugin-0.1.txt

// Plugin name is optional.  If unset, it will be extracted from the current
// file name. Plugin names should start with a three letter prefix which is
// unique and reserved for each plugin author ("abc" is just an example).
// Uncomment and edit this line to override:
$plugin['name'] = 'com_connect';

// Allow raw HTML help, as opposed to Textile.
// 0 = Plugin help is in Textile format, no raw HTML allowed (default).
// 1 = Plugin help is in raw HTML.  Not recommended.
# $plugin['allow_html_help'] = 1;

$plugin['version'] = '4.7.0';
$plugin['author'] = 'Textpattern Community';
$plugin['author_uri'] = 'https://forum.textpattern.io/viewtopic.php?id=47913';
$plugin['description'] = 'Form and contact mailer for Textpattern';

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
#@owner com_connect
#@language en, en-gb, en-us
#@public
com_connect_checkbox => Checkbox
com_connect_contact => Contact
com_connect_email => Email
com_connect_email_subject => {site} > Enquiry
com_connect_email_thanks => Thank you, your message has been sent.
com_connect_field_missing => Required field <strong>{field}</strong> is missing.
com_connect_format_warning => Value {value} in <strong>{field}</strong> is not of the expected format.
com_connect_form_expired => The form has expired, please try again.
com_connect_form_used => The form was already submitted, please fill out a new form.
com_connect_general_inquiry => General enquiry
com_connect_invalid_email => <strong>{email}</strong> is not a valid email address.
com_connect_invalid_host => <strong>{host}</strong> is not a valid email host.
com_connect_invalid_utf8 => <strong>{field}</strong> contains invalid UTF-8 characters.
com_connect_invalid_value => Invalid value for <strong>{field}</strong>: <strong>{value}</strong> is not one of the available options.
com_connect_mail_sorry => Sorry, unable to send email.
com_connect_maxval_warning => <strong>{field}</strong> must not exceed {value}.
com_connect_max_warning => <strong>{field}</strong> must not contain more than {value} characters.
com_connect_message => Message
com_connect_minval_warning => <strong>{field}</strong> must be at least {value}.
com_connect_min_warning => <strong>{field}</strong> must contain at least {value} characters.
com_connect_name => Name
com_connect_option => Option
com_connect_pattern_warning => <strong>{field}</strong> does not match the pattern {value}.
com_connect_radio => Radio
com_connect_recipient => Recipient
com_connect_refresh => Follow this link if the page does not refresh automatically.
com_connect_secret => Secret
com_connect_send => Send
com_connect_send_article => Send article
com_connect_spam => We do not accept spam, thank you!
com_connect_text => Text
com_connect_to_missing => <strong>To</strong> email address is missing.
#@language de-de
com_connect_checkbox => Checkbox
com_connect_contact => Kontakt
com_connect_email => E-Mail
com_connect_email_subject => {site} > Anfrage
com_connect_email_thanks => Vielen Dank, Ihre Nachricht wurde gesendet.
com_connect_field_missing => Erforderliche Eingabe im Feld <strong>{field}</strong> fehlt.
com_connect_format_warning => Eingabe {value} im Feld <strong>{field}</strong> entspricht nicht dem erwarteten Format.
com_connect_form_expired => Dieses Formular ist abgelaufen, bitte versuchen Sie es erneut.
com_connect_form_used => Dieses Formular wurde bereits gesendet. Bitte laden Sie das Formular noch einmal.
com_connect_general_inquiry => Allgemeine Anfrage
com_connect_invalid_email => <strong>{email}</strong> ist keine gültige E-Mailadresse.
com_connect_invalid_host => <strong>{host}</strong> ist kein gültiger E-Mail-Server.
com_connect_invalid_utf8 => <strong>{field}</strong> enthält ungültige UTF-8-Zeichen.
com_connect_invalid_value => Ungültiger Wert für <strong>{field}</strong>, <strong>{value}</strong> ist keine verfügbare Option.
com_connect_mail_sorry => Leider kann keine E-Mail gesendet werden.
com_connect_maxval_warning => <strong>{field}</strong> darf {value} nicht überschreiten.
com_connect_max_warning => <strong>{field}</strong> darf nicht länger als {value} Zeichen sein.
com_connect_message => Nachricht
com_connect_minval_warning => <strong>{field}</strong> darf {value} nicht unterschreiten.
com_connect_min_warning => <strong>{field}</strong> darf nicht kürzer als {value} Zeichen sein.
com_connect_name => Name
com_connect_option => Option
com_connect_pattern_warning => <strong>{field}</strong> entspricht nicht dem Muster {value}.
com_connect_radio => Radio
com_connect_recipient => Empfänger
com_connect_refresh => Bitte folgen Sie diesem Link, falls die Seite icht automatisch neu geladen wird.
com_connect_secret => Geheimnis
com_connect_send => Senden
com_connect_send_article => Artikel senden
com_connect_spam => Danke, wir brauchen keinen Spam!
com_connect_text => Text
com_connect_to_missing => <strong>To</strong> E-Mail-Adresse fehlt.
#@language es-es
com_connect_checkbox => Casilla de verificación
com_connect_contact => Contacto
com_connect_email => Correo electrónico
com_connect_email_subject => {site} > Consulta
com_connect_email_thanks => Gracias, tu mensaje ha sido enviado.
com_connect_field_missing => falta el campo obligatorio <strong>{field}</strong>.
com_connect_format_warning => El valor {value} en <strong>{field}</strong> no está en el formato esperado.
com_connect_form_expired => El formulario ha caducado, por favor inténtalo de nuevo.
com_connect_form_used => El formulario ya había sido enviado, por favor rellena el formulario de nuevo.
com_connect_general_inquiry => Consulta general
com_connect_invalid_email => La dirección de correo electrónico <strong>{email}</strong> no es válida.
com_connect_invalid_host => El dominio de correo electrónico <strong>{host}</strong> no es válido.
com_connect_invalid_utf8 => <strong>{field}</strong> contiene caracteres UTF-8 no válidos.
com_connect_invalid_value => Valor incorrecto para <strong>{field}</strong>: <strong>{value}</strong> no es una de las opciones disponibles.
com_connect_mail_sorry => Lo siento, el correo electrónico no pudo ser enviado.
com_connect_maxval_warning => <strong>{field}</strong> no debe exceder {value}.
com_connect_max_warning => <strong>{field}</strong> no debe contener más de {value} caracteres.
com_connect_message => Mensaje
com_connect_minval_warning => <strong>{field}</strong> debe tener al menos {value}.
com_connect_min_warning => <strong>{field}</strong> debe contener al menos {value} caracteres.
com_connect_name => Nombre
com_connect_option => Opción
com_connect_pattern_warning => <strong>{field}</strong> no encaja con el patrón {value}.
com_connect_radio => Botón de opción
com_connect_recipient => Destinatario
com_connect_refresh => Siga este enlace si la página no se recarga automáticamente.
com_connect_secret => Secreto
com_connect_send => Enviar
com_connect_send_article => Enviar artículo
com_connect_spam => Gracias, ¡pero no aceptamos correo basura!
com_connect_text => Texto
com_connect_to_missing => Falta la dirección de correo electrónico del <strong>destinatario</strong>.
#@language fr-fr
com_connect_checkbox => Case à cocher
com_connect_contact => Contact
com_connect_email => Email
com_connect_email_subject => {site} > Demande
com_connect_email_thanks => Merci, votre message a bien été envoyé.
com_connect_field_missing => Champ obligatoire <strong>{field}</strong> manquant.
com_connect_form_expired => Le délai du formulaire vient d’expirer. Veuillez recommencer.
com_connect_form_used => Le formulaire a déjà été soumis. Veuillez en remplir un nouveau.
com_connect_general_inquiry => Demande d’ordre général
com_connect_invalid_email => <strong>{email}</strong> n’est pas une adresse email valide.
com_connect_invalid_host => <strong>{host}</strong> n’est pas correctement rédigé.
com_connect_invalid_utf8 => <strong>{field}</strong> contient des caractères invalides.
com_connect_invalid_value => Cette valeur : <strong>{value}</strong> n’est pas correcte pour <strong>{field}</strong>.
com_connect_mail_sorry => Désolé, impossible d’envoyer votre message dans l’immédiat.
com_connect_maxval_warning => <strong>{field}</strong> ne peux pas être plus grand que {value}.
com_connect_max_warning => <strong>{field}</strong> dépasse {value} caractères.
com_connect_message => Message
com_connect_minval_warning => <strong>{field}</strong> doit être au moins {value}.
com_connect_min_warning => <strong>{field}</strong> doit contenir au moins {value} caractères.
com_connect_name => Nom
com_connect_option => Option
com_connect_pattern_warning =><strong>{field}</strong> doit correspondre à ce modèle {value}.
com_connect_radio => Bouton radio
com_connect_recipient => Destinataire
com_connect_refresh => Cliquez sur ce lien si la page ne se rafraîchissait pas automatiquement.
com_connect_secret => Secret
com_connect_send => Envoyer
com_connect_send_article => Envoyer l’article
com_connect_spam => Nous refusons catégoriquement les spam. Bien à vous!
com_connect_text => Texte
com_connect_to_missing => l’adresse mail <strong>To</strong> est manquante.
#@language nl-nl
com_connect_checkbox => Keuze
com_connect_contact => Contact
com_connect_email => E-mail adres
com_connect_email_subject => {site} > bericht via de site
com_connect_email_thanks => Hartelijk dank, je bericht is verzonden.
com_connect_field_missing => Je hebt bij <strong>{field}</strong> nog niets ingevuld.
com_connect_format_warning => De invoer {value} in <strong>{field}</strong> heeft niet de juiste vorm.
com_connect_form_expired => Het formulier is verlopen, probeer het opnieuw.
com_connect_form_used => Het formulier is reeds verstuurd, vul het opnieuw in.
com_connect_general_inquiry => Bericht van de site
com_connect_invalid_email => <strong>{email}</strong> is geen geldig e-mail addres.
com_connect_invalid_host => <strong>{host}</strong> is geen geldige e-mail host.
com_connect_invalid_utf8 => <strong>{field}</strong> bevat ongeldige lettertekens.
com_connect_invalid_value => Ongeldige invoer bij <strong>{field}</strong>, <strong>{value}</strong> is niet mogelijk.
com_connect_mail_sorry => Sorry, er kan geen e-mail verzonden worden.
com_connect_maxval_warning => <strong>{field}</strong> mag niet groter zijn dan {value}.
com_connect_max_warning => <strong>{field}</strong> mag niet meer dan {value} lettertekes bevatten.
com_connect_message => Berichttekst
com_connect_minval_warning => <strong>{field}</strong> moet minstens {value} zijn.
com_connect_min_warning => <strong>{field}</strong> moet minstens {value} lettertekens bevatten.
com_connect_name => Naam
com_connect_option => Optie
com_connect_pattern_warning => <strong>{field}</strong> komt niet overeen met de volgorde {value}.
com_connect_radio => Keuzeknop
com_connect_recipient => Ontvanger
com_connect_refresh => Je kunt deze link gebruiken als de pagina niet automatisch ververst.
com_connect_secret => Geheim
com_connect_send => Verzenden
com_connect_send_article => Artikel verzenden
com_connect_spam => We accepteren geen spam!
com_connect_text => Tekst
com_connect_to_missing => <strong>Aan</strong> e-mailadres ontbreekt.
#@language pt-br
com_connect_checkbox => Checkbox
com_connect_contact => Contato
com_connect_email => Email
com_connect_email_subject => {site} > Contato
com_connect_email_thanks => Obrigado, sua mensagem foi enviada.
com_connect_field_missing => Faltou preencher o campo requerido <strong>{field}</strong>.
com_connect_format_warning => O valor {value} em <strong>{field}</strong> não está formato esperado.
com_connect_form_expired => O formulário expirou, por favor tente novamente.
com_connect_form_used => O formulário já foi enviado, por favor preencha o formulário novamente.
com_connect_general_inquiry => Assuntos gerais
com_connect_invalid_email => <strong>{email}</strong> não é um endereço de email válido.
com_connect_invalid_host => <strong>{host}</strong> não é um domínio de email válido.
com_connect_invalid_utf8 => <strong>{field}</strong> contém caracteres UTF-8 inválidos.
com_connect_invalid_value => Valor incorreto para <strong>{field}</strong>, <strong>{value}</strong> não é uma das opções disponíveis.
com_connect_mail_sorry => Desculpe, não foi possível enviar o email.
com_connect_maxval_warning => <strong>{field}</strong> não pode exceder {value}.
com_connect_max_warning => <strong>{field}</strong> não pode conter mais que {value} caracteres.
com_connect_message => Mensagem
com_connect_minval_warning => <strong>{field}</strong> deve ter ao menos {value}.
com_connect_min_warning => <strong>{field}</strong> deve conter ao menos {value} caracteres.
com_connect_name => Nome
com_connect_option => Opção
com_connect_pattern_warning => <strong>{field}</strong> não se encaixa no formato {value}.
com_connect_radio => Rádio
com_connect_recipient => Destinatário
com_connect_refresh => Clique neste link caso a página não se atualize automaticamente.
com_connect_secret => Secreto
com_connect_send => Enviar
com_connect_send_article => Enviar artigo
com_connect_spam => Não aceitamos spam, obrigado!
com_connect_text => Texto
com_connect_to_missing => <strong>To</strong> falta o endereço de email.
EOT;

if (!defined('txpinterface'))
        @include_once('zem_tpl.php');

# --- BEGIN PLUGIN CODE ---
//<?php
/**
 * com_connect: A Textpattern CMS plugin for mail delivery of contact forms.
 */

// Register tags if necessary.
if (class_exists('\Textpattern\Tag\Registry')) {
    Txp::get('\Textpattern\Tag\Registry')
        ->register('com_connect')
        ->register('com_connect_text')
        ->register('com_connect_email')
        ->register('com_connect_textarea')
        ->register('com_connect_select')
        ->register('com_connect_option')
        ->register('com_connect_checkbox')
        ->register('com_connect_radio')
        ->register('com_connect_serverinfo')
        ->register('com_connect_secret')
        ->register('com_connect_submit')
        ->register('com_connect_send_article')
        ->register('com_connect_value')
        ->register('com_connect_label')
        ->register('com_connect_fields')
        ->register('com_connect_mime')
        ->register('com_connect_if');
}

/**
 * Tag: encapsulate a contact form.
 *
 * Triggers the following callbacks:
 *  -> 'comconnect.form' during form rendering so additional fields (e.g. spam honeypots) can be injected.
 *  -> 'comconnect.render' immediately prior to form rendering so other parts of the form content may be altered.
 *  -> 'comconnect.submit' on successful posting of form data. Primarily of use for spam
 *     plugins: they can return a non-zero value to signal that the form should NOT be sent.
 *
 * @param array  $atts  Tag attributes
 * @param string $thing Tag's container content
 */
function com_connect($atts, $thing = null)
{
    global $sitename, $com_connect_flags, $com_connect_from,
        $com_connect_recipient, $com_connect_error, $com_connect_submit,
        $com_connect_form, $com_connect_labels, $com_connect_values;

    extract(com_connect_lAtts(array(
        'body_form'        => '',
        'class'            => 'comConnectForm',
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
        $strings = com_connect_load_lang($lang);
        $current = Txp::get('\Textpattern\L10n\Lang')->getStrings();
        $textarray = array_merge($current, $strings);
        Txp::get('\Textpattern\L10n\Lang')->setPack($textarray);
    }

    // Set defaults, in the local language if necessary.
    if ($label === null) {
        $label = gTxt('com_connect_contact');
    }

    if ($subject === null) {
        $subject = gTxt('com_connect_email_subject', array('{site}' => html_entity_decode($sitename,ENT_QUOTES)));
    }

    if ($thanks === null) {
        $thanks = graf(gTxt('com_connect_email_thanks'));
    }

    unset($atts['show_error'], $atts['show_input']);

    $defaultClassNames = array(
        'element'  => 'errorElement',
        'wrapper'  => 'comError',
        'required' => 'comRequired',
        'thanks'   => 'comThanks',
        );

    $com_connect_form_id = md5(serialize($atts) . preg_replace('/[\t\s\r\n]/', '', $thing));
    $com_connect_submit = (ps('com_connect_form_id') == $com_connect_form_id);
    $override_email_charset = (get_pref('override_emailcharset') && is_callable('utf8_decode'));
    $userClassNames = do_list($classes);

    foreach (array_merge($defaultClassNames, $userClassNames) as $classKey => $classValue) {
        if (strpos($classValue, ':') !== false) {
            $classParts = do_list($classValue, ':');

            if (count($classParts) === 2) {
                $com_connect_flags['cls_' . $classParts[0]] = $classParts[1];
            }
        } elseif ($classKey && $classValue) {
            $com_connect_flags['cls_' . $classKey] = $classValue;
        }
    }

    // The $com_connect_flags['this_form'] global is set if an id is supplied for the <form>.
    // This value then becomes the default value for all html_form (a.k.a. form=)
    // attributes for any input tags in this tag's container, providing HTML5 is in use.
    $com_connect_flags['this_form'] = 'com' . $com_connect_form_id;

    // Global toggle for required attribute.
    $com_connect_flags['required'] = $required;

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

    $nonce = doSlash(ps('com_connect_nonce'));
    $renonce = false;

    if ($com_connect_submit) {
        // Since multiple com_connect forms could delete data that might be in use by other forms,
        // protect them by using a well-known minimum value of 10 minutes. Not perfect.
        // Using multiple forms on a page will result in them all adopting the lowest expiry time.
        safe_delete('txp_discuss_nonce', "issue_time < date_sub('$now_date', interval ".max(600, $expire)." second)");
        if ($rs = safe_row('used', 'txp_discuss_nonce', "nonce = '$nonce'")) {
            if ($rs['used']) {
                unset($com_connect_error);
                $com_connect_error[] = gTxt('com_connect_form_used');
                $renonce = true;
                $_POST = array();
                $_POST['com_connect_submit'] = true;
                $_POST['com_connect_form_id'] = $com_connect_form_id;
                $_POST['com_connect_nonce'] = $nonce;
            }
        } else {
            $com_connect_error[] = gTxt('com_connect_form_expired');
            $renonce = true;
        }
    }

    if ($com_connect_submit && $nonce && !$renonce) {
        $com_connect_nonce = $nonce;
    } elseif (!$show_error || $show_input) {
        $com_connect_nonce = md5(uniqid(rand(), true));
        safe_insert('txp_discuss_nonce', "issue_time = '" . $now_date . "', nonce = '$com_connect_nonce'");
    }

    $form = ($form) ? fetch_form($form) : $thing;

    if (empty($form)) {
        $form = '
<txp:com_connect_text label="'.gTxt('com_connect_name').'" /><br />
<txp:com_connect_email /><br />'.
($send_article ? '<txp:com_connect_email send_article="1" label="'.gTxt('com_connect_recipient').'" /><br />' : '').
'<txp:com_connect_textarea /><br />
<txp:com_connect_submit />
';
    }

    $form = parse($form);

    // Perform aggregate functions for checking radio sets.
    if ($com_connect_submit) {
        com_connect_group_validate();
    }

    if ($to_form) {
        $to = parse_form($to_form);
    }

    if (!$to && !$send_article) {
        return gTxt('com_connect_to_missing');
    }

    $out = '';

    if (!$com_connect_submit) {
        // Don't show errors or send mail.
    } elseif (!empty($com_connect_error)) {
        if ($show_error || !$show_input) {
            $out .= n.doWrap(array_unique($com_connect_error), 'ul', 'li', $com_connect_flags['cls_wrapper']).n;

            if (!$show_input) {
                return $out;
            }
        }
    } elseif ($show_input && is_array($com_connect_form)) {
        // Load and check spam plugins.
        callback_event('comconnect.submit');
        $evaluation =& get_comconnect_evaluator();
        $clean = $evaluation->get_comconnect_status();

        if ($clean != 0) {
            return $evaluation->get_comconnect_reason();
        }

        $semi_rand = md5(time());
        $com_connect_flags['boundary'] = "Multipart_Boundary_x{$semi_rand}x";

        if ($from_form) {
            $from = parse_form($from_form);
        }

        if ($subject_form) {
            $subject = parse_form($subject_form);
        }

        $sep = IS_WIN ? "\r\n" : "\n";
        $msg = array();
        $fields = array();

        foreach ($com_connect_labels as $name => $lbl) {
            $com_connect_values[$name] = doArray($com_connect_values[$name], 'trim');

            if ($com_connect_values[$name] === false) {
                continue;
            }

            $msg[] = $lbl . ': ' . (is_array($com_connect_values[$name]) ? implode(',', $com_connect_values[$name]) : $com_connect_values[$name]);

            $fields[$name] = $com_connect_values[$name];
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

            if (empty($com_connect_recipient)) {
                return gTxt('com_connect_field_missing', array('{field}' => gTxt('com_connect_recipient')));
            } else {
                $to = $com_connect_recipient;
            }
        }

        $com_connect_flags['charset'] = $override_email_charset ? 'ISO-8859-1' : 'UTF-8';
        $com_connect_flags['content_type'] = 'text/plain';
        $com_connect_flags['xfer_encoding'] = '8bit';
        $reply   = com_connect_strip($from ? $com_connect_from : '');
        $from    = com_connect_strip($from ? $from : $com_connect_from);
        $to      = com_connect_strip($to);
        $subject = com_connect_strip($subject);
        $body    = implode("\n\n", $msg);

        if ($body_form) {
            $body = parse_form($body_form);
        }

        $body = str_replace(array("\r\n", "\r", "\n"), array("\n", "\n", $sep), $body);
        $body = com_connect_strip($body, false);

        if ($override_email_charset) {
            $subject = utf8_decode($subject);
            $body    = utf8_decode($body);
        }

        $subject = Txp::get('\Textpattern\Mail\Encode')->header($subject, 'text');

        $headers = array(
            'from'          => $from,
            'separator'     => $sep,
            'reply'         => $reply,
            'charset'       => $com_connect_flags['charset'],
            'content_type'  => $com_connect_flags['content_type'],
            'xfer_encoding' => $com_connect_flags['xfer_encoding'],
        );

        safe_update('txp_discuss_nonce', "used = '1', issue_time = '$now_date'", "nonce = '$nonce'");

        if (com_connect_deliver($to, $subject, $body, $headers, $fields, array('isCopy' => false, 'redirect' => $redirect))) {
            $_POST = array();

            if ($copysender && $com_connect_from) {
                com_connect_deliver(com_connect_strip($com_connect_from), $subject, $body, $headers, $fields, array('isCopy' => true, 'redirect' => $redirect));
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
                    $refresh = gTxt('com_connect_refresh');
                    echo <<<END
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>$sitename</title>
    <meta http-equiv="refresh" content="0;url=$uri">
</head>
<body>
    <a href="$uri">$refresh</a>
</body>
</html>
END;
                }

                exit;
            } else {
                return '<div class="' . $com_connect_flags['cls_thanks'] . '" id="com'.$com_connect_form_id.'">' .
                    ($thanks_form ? parse_form($thanks_form) : $thanks) .
                    '</div>';
            }
        } else {
            // Plugin modules may have set error messages: display if appropriate.
            if ($com_connect_error) {
                $out .= n.doWrap(array_unique($com_connect_error), 'ul', 'li', $com_connect_flags['cls_wrapper']).n;
            } else {
                $out .= graf(gTxt('com_connect_mail_sorry'));
            }
        }
    }

    if ($show_input && !$send_article || gps('com_connect_send_article')) {
        $contactForm = '<form method="post"' . ((!$show_error && $com_connect_error) ? '' : ' id="com' . $com_connect_form_id . '"') .
            ($class ? ' class="' . $class . '"' : '') .
            ($browser_validate ? '' : ' novalidate') .
            ' action="' . txpspecialchars(serverSet('REQUEST_URI')) . '#com' . $com_connect_form_id . '">' .
            ($label ? n . '<fieldset>' : '') .
            ($label ? n . '<legend>' . txpspecialchars($label) . '</legend>' : '') .
            $out .
            n . '<input type="hidden" name="com_connect_nonce" value="' . $com_connect_nonce . '" />' .
            n . '<input type="hidden" name="com_connect_form_id" value="' . $com_connect_form_id . '" />' .
            $form .
            callback_event('comconnect.form') .
            ($label ? (n . '</fieldset>') : '') .
            n . '</form>';

        callback_event_ref('comconnect.render', '', 0, $contactForm, $atts);

        return $contactForm;
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
function com_connect_text($atts)
{
    global $com_connect_error, $com_connect_submit, $com_connect_flags;

    extract(com_connect_lAtts(array(
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'comText',
        'default'        => '',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'inputmode'      => '',
        'label'          => gTxt('com_connect_text'),
        'label_position' => 'before',
        'max'            => null,
        'min'            => null,
        'name'           => '',
        'pattern'        => '',
        'placeholder'    => '',
        'required'       => $com_connect_flags['required'],
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
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);

    if ($com_connect_submit) {
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
                $com_connect_error[] = gTxt('com_connect_invalid_utf8', array('{field}' => $hlabel));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($is_datetime && !$datetime_ok) {
                $com_connect_error[] = gTxt('com_connect_format_warning', array('{field}' => $hlabel, '{value}' => $value));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($min && !$is_numeric && !$is_datetime && $utf8len < $min) {
                $com_connect_error[] = gTxt('com_connect_min_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($max && !$is_numeric && !$is_datetime && $utf8len > $max) {
                $com_connect_error[] = gTxt('com_connect_max_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($min && $is_datetime && $cmpval < $minval) {
                $com_connect_error[] = gTxt('com_connect_minval_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($max && $is_datetime && $cmpval > $maxval) {
                $com_connect_error[] = gTxt('com_connect_maxval_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($min && $is_numeric && $value < $min) {
                $com_connect_error[] = gTxt('com_connect_minval_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($max && $is_numeric && $value > $max) {
                $com_connect_error[] = gTxt('com_connect_maxval_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($pattern and !preg_match('/^'.$pattern.'$/', $value)) {
                $com_connect_error[] = gTxt('com_connect_pattern_warning', array('{field}' => $hlabel, '{value}' => $pattern));
                $isError = $com_connect_flags['cls_element'];
            } else {
                com_connect_store($name, $label, $value);
            }
        } elseif ($required) {
            $com_connect_error[] = gTxt('com_connect_field_missing', array('{field}' => $hlabel));
            $isError = $com_connect_flags['cls_element'];
        }
    } else {
        $value = $default;
    }

    // Core attributes.
    $attr = com_connect_build_atts(array(
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
        $attr += com_connect_build_atts(array(
            'min'  => $min,
            'max'  => $max,
            'step' => $step,
        ));
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';

    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'autocomplete' => $autocomplete,
            'form'         => $html_form,
            'inputmode'    => $inputmode,
            'pattern'      => $pattern,
            'placeholder'  => $placeholder,
            'required'     => $required,
        ));

        if ($isError) {
            $attr += com_connect_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $com_connect_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = ($label) ? '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>' : '';

    return ($labelStr && $label_position === 'before' ? $labelStr . $break : '') .
        '<input' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . ' />' .
        ($labelStr && $label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Render an email input field.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function com_connect_email($atts)
{
    global $com_connect_error, $com_connect_submit, $com_connect_from, $com_connect_recipient, $com_connect_flags;

    // TODO: 'multiple' attribute?
    $defaults = array(
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'comEmail',
        'default'        => '',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('com_connect_email'),
        'label_position' => 'before',
        'max'            => 100,
        'min'            => 0,
        'name'           => '',
        'pattern'        => '',
        'placeholder'    => '',
        'required'       => $com_connect_flags['required'],
        'send_article'   => 0,
        'size'           => '',
        'type'           => 'email',
    );

    extract(com_connect_lAtts($defaults, $atts));

    if (empty($name)) {
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);
    $email = $com_connect_submit ? trim(ps($name)) : $default;

    if ($com_connect_submit && strlen($email)) {
        if (!is_valid_email($email)) {
            $com_connect_error[] = gTxt('com_connect_invalid_email', array('{email}' => txpspecialchars($email)));
            $isError = $com_connect_flags['cls_element'];
        } else {
            preg_match("/@(.+)$/", $email, $match);
            $domain = $match[1];

            if (is_callable('checkdnsrr') && checkdnsrr('textpattern.com.','A') && !checkdnsrr($domain.'.','MX') && !checkdnsrr($domain.'.','A')) {
                $com_connect_error[] = gTxt('com_connect_invalid_host', array('{host}' => txpspecialchars($domain)));
                $isError = $com_connect_flags['cls_element'];
            } else {
                if ($send_article) {
                    $com_connect_recipient = $email;
                } else {
                    $com_connect_from = $email;
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

    return com_connect_text($passed_atts);
}

/**
 * Tag: Render a textarea input field.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function com_connect_textarea($atts)
{
    global $com_connect_error, $com_connect_submit, $com_connect_flags;

    extract(com_connect_lAtts(array(
        'autocomplete'   => '',
        'break'          => br,
        'class'          => 'comTextarea',
        'cols'           => 58,
        'default'        => '',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('com_connect_message'),
        'label_position' => 'before',
        'max'            => 10000,
        'min'            => 0,
        'name'           => '',
        'placeholder'    => '',
        'required'       => $com_connect_flags['required'],
        'rows'           => 8,
        'wrap'           => '',
    ), $atts));

    $min = intval($min);
    $max = intval($max);

    if (empty($name)) {
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);
    $doctype = get_pref('doctype', 'xhtml');

    if ($com_connect_submit) {
        $value = preg_replace('/^\s*[\r\n]/', '', rtrim(ps($name)));
        $utf8len = preg_match_all("/./su", ltrim($value), $utf8ar);
        $hlabel = txpspecialchars($label);

        if (strlen(ltrim($value))) {
            if (!$utf8len) {
                $com_connect_error[] = gTxt('com_connect_invalid_utf8', array('{field}' => $hlabel));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($min && $utf8len < $min) {
                $com_connect_error[] = gTxt('com_connect_min_warning', array('{field}' => $hlabel, '{value}' => $min));
                $isError = $com_connect_flags['cls_element'];
            } elseif ($max && $utf8len > $max) {
                $com_connect_error[] = gTxt('com_connect_max_warning', array('{field}' => $hlabel, '{value}' => $max));
                $isError = $com_connect_flags['cls_element'];
            } else {
                com_connect_store($name, $label, $value);
            }
        } elseif ($required) {
            $com_connect_error[] = gTxt('com_connect_field_missing', array('{field}' => $hlabel));
            $isError = $com_connect_flags['cls_element'];
        }
    } else {
        $value = $default;
    }

    // Core attributes.
    $attr = com_connect_build_atts(array(
        'id'        => (isset($id) ? $id : $name),
        'name'      => $name,
        'cols'      => intval($cols),
        'rows'      => intval($rows),
        'maxlength' => $max,
    ));

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';

    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'autocomplete' => $autocomplete,
            'form'         => $html_form,
            'placeholder'  => $placeholder,
            'required'     => $required,
        ));

        if ($isError) {
            $attr += com_connect_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $com_connect_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = ($label) ? '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>' : '';

    return ($labelStr && $label_position === 'before' ? $labelStr . $break : '') .
        '<textarea' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($value) . '</textarea>' .
        ($labelStr && $label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Render a select/option input list.
 *
 * @param  array  $atts Tag attributes
 * @return string HTML
 */
function com_connect_select($atts, $thing = null)
{
    global $com_connect_error, $com_connect_submit, $com_connect_flags;

    extract(com_connect_lAtts(array(
        'break'          => br,
        'class'          => 'comSelect',
        'delimiter'      => ',',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('com_connect_option'),
        'label_position' => 'before',
        'list'           => '', // TODO: remove from here in favour of the global list attribute.
        'multiple'       => '',
        'options'        => gTxt('com_connect_general_inquiry'),
        'name'           => '',
        'required'       => $com_connect_flags['required'],
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
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);
    $value = ($com_connect_submit) ? (array)doArray(ps($name), 'trim') : do_list_unique($selected);
    $doctype = get_pref('doctype', 'xhtml');

    if ($thing) {
        com_connect_option(null, $value);
        $out = parse($thing);
        $options = com_connect_option(null, null);
    } else {
        $options = array_map('trim', explode($delimiter, preg_replace('/[\r\n\t\s]+/', ' ', $options)));
        $out = '';

        foreach ($options as $item) {
            $safeItem = txpspecialchars($item);
            $val = '';

            if (preg_match('@^\{(.*)\}$@', $safeItem, $emptyLabel)) {
                $val = ' value="" label="' . $emptyLabel[1] . '"';
                $safeItem = '';
            }

            $sel = (in_array($safeItem, $value)) ? ' selected' . (($doctype === 'xhtml') ? '="selected"' : '') : '';

            $out .= n.t.'<option' . $sel . $val . '>' . (strlen($safeItem) ? $safeItem : '') . '</option>';
        }
    }

    if ($com_connect_submit) {
        if ($value) {
            if (com_connect_in_array($value, $options)) {
                com_connect_store($name, $label, $value);
            } else {
                $val = doArray($value, 'txpspecialchars');
                $com_connect_error[] = gTxt('com_connect_invalid_value', array('{field}' => txpspecialchars($label), '{value}' => is_array($val) ? $val[0] : $val));
                $isError = $com_connect_flags['cls_element'];
            }
        } elseif ($required) {
            $com_connect_error[] = gTxt('com_connect_field_missing', array('{field}' => txpspecialchars($label)));
            $isError = $com_connect_flags['cls_element'];
        }
    } else {
        $value = $selected;
    }

    // Core attributes.
    $attr = com_connect_build_atts(array(
        'id'       => (isset($id) ? $id : $name),
        'name'     => $name.($multiple ? '[]' : ''),
        'multiple' => $multiple,
    ));

    if ($size && is_numeric($size)) {
        $attr['size'] = 'size="' . intval($size) . '"';
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';
    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));

        if ($isError) {
            $attr += com_connect_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $com_connect_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = ($label) ? '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>' : '';

    return ($labelStr && $label_position === 'before' ? $labelStr . $break : '') .
        n . '<select' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' .
            $out .
        n . '</select>' .
        ($labelStr && $label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Render a set of select options.
 *
 * @param  array  $atts  Tag attributes
 * @param  string $thing Tag's container
 * @return string HTML
 */
function com_connect_option($atts, $thing = null)
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

    global $com_connect_error, $com_connect_submit;

    extract(com_connect_lAtts(array(
        'class'    => 'comOption',
        'label'    => null,
        'selected' => null,
        'value'    => null,
    ), $atts));

    $val = ($value === null) ? (!empty($thing) ? $thing : (!empty($label) ? $label : null)) : $value;
    $label = ($label === null) ? (!empty($thing) ? $thing : (!empty($value) ? $value : null)) : $label;

    $attr = array();
    $doctype = get_pref('doctype', 'xhtml');

    if ($com_connect_submit) {
        $options[] = $val;

        if ($val !== null && (in_array((string)$val, (array)$match))) {
            $attr[] = 'selected' . (($doctype === 'xhtml') ? '="selected"' : '');
        }
    } elseif ($selected || ($val !== null && (in_array((string)$val, (array)$match)))) {
        $attr[] = 'selected' . (($doctype === 'xhtml') ? '="selected"' : '');
    }

    $defaults = array();

    if (preg_match('@^\{(.*)\}$@', $label, $emptyLabel)) {
        $val = $defaults['value'] = "";
        $defaults['label'] = $emptyLabel[1];
        $label = '';
    }

    // Core attributes.
    $attr += com_connect_build_atts(array(
        'value' => $val,
        'label' => $label,
    ), $defaults);

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classStr = (($class) ? ' class="' . $class . '"' : '');

    return '<option' . $classStr . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . txpspecialchars($label) . '</option>';
}

/**
 * Tag: Render a checkbox.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 * @todo checkbox groups?
 */
function com_connect_checkbox($atts)
{
    global $com_connect_error, $com_connect_submit, $com_connect_flags;

    extract(com_connect_lAtts(array(
        'break'          => ' ',
        'checked'        => 0,
        'class'          => 'comCheckbox',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('com_connect_checkbox'),
        'label_position' => 'after',
        'name'           => '',
        'required'       => $com_connect_flags['required'],
        'value'          => null,
    ), $atts));

    if (empty($name)) {
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);
    $doctype = get_pref('doctype', 'xhtml');

    if ($com_connect_submit) {
        $theValue = (bool) ps($name);

        if ($required && !$theValue) {
            $com_connect_error[] = gTxt('com_connect_field_missing', array('{field}' => txpspecialchars($label)));
            $isError = $com_connect_flags['cls_element'];
        } else {
            $toStore = (($value !== null && $theValue) ? $value : ($theValue ? gTxt('yes') : gTxt('no')));
            com_connect_store($name, $label, $toStore);
        }
    } else {
        $theValue = $checked;
    }

    // Core attributes.
    $attr = com_connect_build_atts(array(
        'id'    => (isset($id) ? $id : $name),
        'name'  => $name,
    ));

    if ($value !== null) {
        $attr += com_connect_build_atts(array(
            'value' => $value,
        ));
    }

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';

    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));

        if ($isError) {
            $attr += com_connect_build_atts(array(
                'aria-invalid' => 'true',
            ));
        }
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $com_connect_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = ($label) ? '<label for="' . $name . '"' . $classStr . '>' . txpspecialchars($label) . '</label>' : '';

    return ($labelStr && $label_position === 'before' ? $labelStr . $break : '') .
        '<input type="checkbox"' . $classStr .
            ($theValue ? ' checked' . (($doctype === 'xhtml') ? '="checked"' : '') : '') . ($attr ? ' ' . implode(' ', $attr) : '') . ' />' .
        ($labelStr && $label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Render a radio button.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 */
function com_connect_radio($atts)
{
    global $com_connect_error, $com_connect_submit, $com_connect_values, $com_connect_flags, $com_connect_group;

    extract(com_connect_lAtts(array(
        'break'          => ' ',
        'checked'        => 0,
        'class'          => 'comRadio',
        'group'          => '',
        'html_form'      => $com_connect_flags['this_form'],
        'isError'        => '',
        'label'          => gTxt('com_connect_option'),
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
            $group = gTxt('com_connect_radio');
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
            $name = $cur_name[$group] = gTxt('com_connect_radio');
        }
    }

    if (isset($cur_req[$group])) {
        if ($required === null) {
            $required = $cur_req[$group];
        }
    } else {
        if ($required === null) {
            $required = $cur_req[$group] = $com_connect_flags['required'];
        } else {
            $cur_req[$group] = $required;
        }
    }

    $cur_group = $group;

    $id = 'q' . md5($name . '=>' . $label);
    $name = com_connect_label2name($name);
    $name = sanitizeForUrl($name);
    $doctype = get_pref('doctype', 'xhtml');
    $com_connect_group[$name][$id]['req'] = $required;
    $com_connect_group[$name][$id]['label'] = $group;

    if ($com_connect_submit) {
        $toCompare = ($value === null ? $id : $value);
        $is_checked = (ps($name) == $toCompare);
        $com_connect_group[$name][$id]['isSet'] = $is_checked;

        if ($is_checked || $checked && !isset($com_connect_values[$name])) {
            com_connect_store($name, $group, ($value !== null ? $value : $label));
        }
    } else {
        $is_checked = $checked;
    }

    // Core attributes.
    $attr = com_connect_build_atts(array(
        'id'    => $id,
        'name'  => $name,
        'value' => ($value !== null ? $value : $id),
    ));

    // HTML5 attributes.
    $required = ($required) ? 'required' : '';

    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'form'     => $html_form,
            'required' => $required,
        ));
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classes = array();

    foreach (array($class, ($required ? $com_connect_flags['cls_required'] : ''), $isError) as $cls) {
        if ($cls) {
            $classes[] = $cls;
        }
    }

    $classStr = ($classes ? ' class="' . implode(' ', $classes) . '"' : '');
    $labelStr = ($label) ? '<label for="' . $id . '"' . $classStr . '>' . txpspecialchars($label) . '</label>' : '';

    return ($labelStr && $label_position === 'before' ? $labelStr . $break : '') .
        '<input type="radio"'. $classStr . ($attr ? ' ' . implode(' ', $attr) : '') .
            ( $is_checked ? ' checked' . (($doctype === 'xhtml') ? '="checked"' : ''). ' />' : ' />') .
        ($labelStr && $label_position === 'after' ? $break . $labelStr : '');
}

/**
 * Tag: Store server information in the payload.
 *
 * @param  array  $atts  Tag attributes
 */
function com_connect_serverinfo($atts)
{
    global $com_connect_submit;

    extract(com_connect_lAtts(array(
        'label' => '',
        'name'  => '',
    ), $atts));

    if (empty($name)) {
        $name = com_connect_label2name($label);
    }

    $name = sanitizeForUrl($name);

    if (strlen($name) && $com_connect_submit) {
        if (!$label) {
            $label = $name;
        }

        com_connect_store($name, $label, serverSet($name));
    }
}

/**
 * Tag: Store a secret value in the payload.
 *
 * @param  array  $atts  Tag attributes
 */
function com_connect_secret($atts, $thing = null)
{
    global $com_connect_submit;

    extract(com_connect_lAtts(array(
        'label' => gTxt('com_connect_secret'),
        'name'  => '',
        'value' => '',
    ), $atts));

    $name = com_connect_label2name($name ? $name : $label);
    $name = sanitizeForUrl($name);

    if ($com_connect_submit) {
        if ($thing) {
            $value = trim(parse($thing));
        }

        com_connect_store($name, $label, $value);
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
function com_connect_submit($atts, $thing = null)
{
    global $com_connect_flags;

    extract(com_connect_lAtts(array(
        'class'     => 'comSubmit',
        'html_form' => $com_connect_flags['this_form'],
        'label'     => gTxt('com_connect_send'),
    ), $atts));

    $label = txpspecialchars($label);
    $doctype = get_pref('doctype', 'xhtml');

    $attr = array();

    // HTML5 attributes.
    if ($doctype !== 'xhtml') {
        $attr += com_connect_build_atts(array(
            'form' => $html_form,
        ));
    }

    // Global attributes.
    $attr += com_connect_build_atts($com_connect_globals, $atts);

    $classStr = ($class ? ' class="' . $class . '"' : '');

    if (strlen($thing)) {
        return '<button type="submit"' . $classStr . ' name="com_connect_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . '>' . ($thing ? trim(parse($thing)) : $label) . '</button>';
    } else {
        return '<input type="submit"' . $classStr . ' name="com_connect_submit" value="' . $label . '"' . ($attr ? ' ' . implode(' ', $attr) : '') . ' />';
    }
}

/**
 * Tag: Render a link to allow someone to forward a page to a friend.
 *
 * @param  array  $atts  Tag attributes
 * @return string HTML
 */
function com_connect_send_article($atts)
{
    if (!isset($_REQUEST['com_connect_send_article'])) {
        $linktext = (empty($atts['linktext'])) ? gTxt('com_connect_send_article') : $atts['linktext'];
        $join = (empty($_SERVER['QUERY_STRING'])) ? '?' : '&';
        $href = $_SERVER['REQUEST_URI'] . $join . 'com_connect_send_article=yes';

        return '<a href="' . txpspecialchars($href) . '" rel="nofollow">' . txpspecialchars($linktext) . '</a>';
    }

    return;
}

/**
 * Replace mime tags with boundary text
 *
 * @param  array $atts Tag attributes
 * @return string      Boundary
 */
function com_connect_mime($atts)
{
    global $com_connect_flags;

    $boundary = $com_connect_flags['boundary'];
    $charset  = $com_connect_flags['charset'];
    $encoding = $com_connect_flags['xfer_encoding'];

    extract(lAtts(array(
        'type' => 'text',
    ), $atts));

    // Build mimes - trailing blank line is necessary.
    $text_mime = <<<text_mime
--$boundary
Content-Type: text/plain; charset=$charset
Content-Transfer-Encoding: $encoding

text_mime;

    $html_mime = <<<html_mime
--$boundary
Content-Type: text/html; charset=$charset
Content-Transfer-Encoding: $encoding

html_mime;

    $end_mime = <<<end_mime
--$boundary--
end_mime;

    // Overwrite default content-type header.
    $com_connect_flags['content_type'] = 'multipart/alternative; boundary="'.$boundary.'"';

    if ($type === 'text') {
        return $text_mime;
    }

    if ($type === 'html') {
        return $html_mime;
    }

    if ($type === 'end') {
        return $end_mime;
    }

    return;
}

/**
 * Perform post-processing for aggregate (group) controls like radio sets.
 *
 * @todo Can this be done any neater?
 * @todo Should this be exposed as a callback to allow plugins to extend the functionality?
 */
function com_connect_group_validate()
{
    global $com_connect_group, $com_connect_error;

    $flags = array();

    if ($com_connect_group) {
        foreach ($com_connect_group as $key => $grp) {
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
                $com_connect_error[] = gTxt('com_connect_field_missing', array('{field}' => txpspecialchars($data['label'])));
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
function com_connect_lAtts($pairs, $atts)
{
    foreach (array('button', 'copysender', 'checked', 'required', 'send_article', 'show_input', 'show_error') as $key) {
        if (isset($atts[$key])) {
            $atts[$key] = ($atts[$key] === 'yes' || intval($atts[$key])) ? 1 : 0;
        }
    }

    if (isset($atts['break']) && $atts['break'] === 'br') {
        $atts['break'] = '<br />';
    }

    $com_connect_globals = array(
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
        if (array_key_exists($name, $pairs) || substr($name, 0, 2) === 'on' || array_key_exists($name, $com_connect_globals)) {
            $pairs[$name] = $value;
        } elseif (get_pref('production_status') != 'live') {
            trigger_error(gTxt('unknown_attribute', array('{att}' => $name)));
        }
    }

    $pairs['com_connect_globals'] = $com_connect_globals;

    // Prevent global attributes from interfering.
    // See https://github.com/textpattern/textpattern/pull/893
    lAtts(deNull($pairs), $atts, false);

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
function com_connect_build_atts($pairs, $defaults = array())
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
function com_connect_strip($str, $header = true)
{
    if ($header) {
        $str = Txp::get('\Textpattern\Mail\Encode')->escapeHeader($str);
    }

    return preg_replace('/[\x00]/', ' ', $str);
}

/**
 * Handle content delivery of payload.
 *
 * Triggers a 'comconnect.deliver' callback event to override or augment the
 * delivery mechanism. Third party plugins can make alterations to the $payload,
 * then return one of the strings:
 *  -> "comconnect.send" (or no return value) to allow the plugin to continue mailing after the 3rd party plugin completes
 *  -> "comconnect.skip" to skip com_connect's mailing (i.e. the 3rd party handles mailing) and return 'success'
 *  -> "comconnect.fail" to skip com_connect's mailing and return 'fail'
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
function com_connect_deliver($to, $subject, $body, $headers, $fields, $flags)
{
    $payload = array(
        'to'      => $to,
        'subject' => $subject,
        'headers' => $headers,
        'body'    => $body,
        'fields'  => $fields,
        'flags'   => $flags,
    );

    $flavour = ($flags['isCopy'] === true) ? 'copysender' : 'send';

    // Allow plugins to override or alter default action (mail) if required.
    $ret = callback_event_ref('comconnect.deliver', $flavour, 0, $payload);

    if (in_array('comconnect.fail', $ret)) {
        return false;
    } elseif (in_array('comconnect.skip', $ret)) {
        return true;
    }

    extract($payload);

    $smtp_from = get_pref('smtp_from');

    if (!is_callable('mail')) {
        return (get_pref('production_status') === 'live')
            ? gTxt('com_connect_mail_sorry')
            : gTxt('warn_mail_unavailable');
    }

    $sep = (!empty($headers['separator'])) ? $headers['separator'] : (IS_WIN ? "\r\n" : "\n");
    $xfer_encoding = (!empty($headers['xfer_encoding'])) ? $headers['xfer_encoding'] : '8bit';
    $content_type = (!empty($headers['content_type'])) ? $headers['content_type'] : 'text/plain';
    $reply = (!empty($headers['reply'])) ? $headers['reply'] : '';
    $charset = (!empty($headers['charset'])) ? $headers['charset'] : 'UTF-8';
    $x_mailer = (!empty($headers['x_mailer'])) ? $headers['x_mailer'] : 'Textpattern (com_connect)';

    // @todo remove enforced charset in content-type declaration if it's multipart.
    $header_string = 'From: ' . $headers['from'] .
        ($reply ? ($sep . 'Reply-To: ' . $reply) : '') .
        $sep . 'X-Mailer: ' . $x_mailer .
        $sep . 'X-Originating-IP: ' . com_connect_strip((!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] . ' via ' : '') . $_SERVER['REMOTE_ADDR']) .
        $sep . 'Content-Transfer-Encoding: ' . $xfer_encoding .
        $sep . 'Content-Type: ' . $content_type . (strpos($content_type, 'boundary=') !== false ? '' : '; charset="' . $charset . '"');

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
 * Checks if a value or values are in the haystack.
 *
 * @param  string|array $needles  Scalar or array of values to check
 * @param  array        $haystack Set of things to compare them against
 * @return bool
 */
function com_connect_in_array($needles, $haystack)
{
    if (is_array($needles)) {
        return (count(array_intersect($needles, $haystack)) === count($needles));
    } else {
        return in_array($needles, $haystack);
    }
}

/**
 * Evaluate return values from plugins.
 */
class comconnect_evaluation
{
    private $status;
    private $reason = array();

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
    function add_comconnect_status($check)
    {
        $this->status += $check;
    }

    /**
     * Append the given reason to the array.
     */
    function add_comconnect_reason($reason)
    {
        $this->reason[] = $reason;
    }

    /**
     * Fetch the current evaluator status.
     */
    function get_comconnect_status()
    {
        return $this->status;
    }

    /**
     * Fetch the current evaluator reason.
     */
    function get_comconnect_reason()
    {
        if (empty($this->reason)) {
            $this->reason[] = gTxt('com_connect_spam');
        }

        return join(br, $this->reason);
    }
}

/**
 * Evaluator singleton for checking return values from plugins.
 */
function &get_comconnect_evaluator()
{
    static $instance;

    if (!isset($instance)) {
        $instance = new comconnect_evaluation();
    }

    return $instance;
}

/**
 * Convert the given label to a suitably unique name.
 *
 * @param string $label Label to convert to name.
 */
function com_connect_label2name($label)
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
function com_connect_store($name, $label, $value)
{
    global $com_connect_form, $com_connect_labels, $com_connect_values;

    $label = (empty($label)) ? $name : $label;
    $com_connect_form[$label] = $value;
    $com_connect_labels[$name] = $label;
    $com_connect_values[$name] = $value;
}

/**
 * Override the language strings if necessary.
 *
 * @param  string $lang Language designator (e.g. fr-fr)
 * @return array        Partial language array to merge with current loaded strings
 */
function com_connect_load_lang($lang = LANG)
{
    $out = array();

    if ($lang != LANG) {
        $rs = safe_rows("name, data", 'txp_lang', "lang = '" . doSlash($lang) . "' AND name like 'com\_connect\_%'");

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
function com_connect_value($atts)
{
    global $com_connect_values, $com_connect_form, $com_connect_item;

    extract(lAtts(array(
        'break'   => ', ',
        'class'   => '',
        'label'   => '',
        'name'    => '',
        'wraptag' => '',
    ), $atts));

    $str = '';

    if (empty($name) && !empty($com_connect_item)) {
        $name = $com_connect_item;
    }

    if ($name) {
        $str = isset($com_connect_values[$name]) ? $com_connect_values[$name] : '';
    } elseif ($label) {
        $str = isset($com_connect_form[$label]) ? $com_connect_form[$label] : '';
    }

    $str = doArray($str, 'trim');

    return doWrap($str, $wraptag, $break, $class);
}

/**
 * Return the label for the given attribute.
 *
 * @param  array $atts Attribute name to return
 * @return string
 */
function com_connect_label($atts)
{
    global $com_connect_labels, $com_connect_item;

    extract(lAtts(array(
        'name' => '',
    ), $atts));

    if (empty($name) && !empty($com_connect_item)) {
        $name = $com_connect_item;
    }

    if ($name) {
        return isset($com_connect_labels[$name]) ? $com_connect_labels[$name] : '';
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
function com_connect_if($atts, $thing = null)
{
    global $com_connect_item;

    extract(lAtts(array(
        'label' => '',
        'name'  => '',
        'value' => null,
    ), $atts));

    if (empty($label) && empty($name) && !empty($com_connect_item)) {
        $name = $com_connect_item;
    }

    $val = com_connect_value(array(
        'label' => $label,
        'name'  => $name,
    ));

    if ($val) {
        $cond = ($value === null || $val == $value);
    } else {
        $cond = false;
    }

    return parse($thing, $cond);
}

/**
 * Iterate over the submitted fields
 *
 * @param  array  $atts  Tag attributes
 * @param  string $thing Container content
 * @return HTML
 */
function com_connect_fields($atts, $thing = null)
{
    global $com_connect_labels, $com_connect_item;

    extract(lAtts(array(
        'break'   => ', ',
        'class'   => '',
        'label'   => '',
        'name'    => '',
        'wraptag' => '',
    ), $atts));

    $out = array();

    $labels = do_list($label);
    $names = do_list($name);

    foreach ($com_connect_labels as $nm => $lbl) {
        if ((empty($label) && empty($name)) || ($label && in_array($lbl, $labels)) || ($name && in_array($nm, $names))) {
            $com_connect_item = $nm;
            $out[] = parse($thing);
        }
    }

    $com_connect_item = null;

    return doWrap($out, $wraptag, $break, $class);
}
# --- END PLUGIN CODE ---
if (0) {
?>
<!--
# --- BEGIN PLUGIN HELP ---
h1. com_connect

h2. Contents

* "Introduction":#introduction
* "Installing and upgrading":#install
* "Migrating from zem_contact_reborn":#differences
* "Usage":#usage
* "Tags":#tags
** "com_connect tag":#cc
** "com_connect_text tag":#cc_text
** "com_connect_email tag":#cc_email
** "com_connect_textarea tag":#cc_textarea
** "com_connect_submit tag":#cc_submit
** "com_connect_select tag":#cc_select
** "com_connect_option tag":#cc_option
** "com_connect_checkbox tag":#cc_checkbox
** "com_connect_radio tag":#cc_radio
** "com_connect_secret tag":#cc_secret
** "com_connect_serverinfo tag":#cc_serverinfo
** "com_connect_send_article tag":#cc_send_article
** "com_connect_mime tag":#cc_mime
** "com_connect_fields tag":#cc_fields
** "com_connect_label tag":#cc_label
** "com_connect_value tag":#cc_value
** "com_connect_if tag":#cc_if
* "Advanced examples":#advanced
** "Separate input and error forms":#advanced1
** "User selectable subject field":#advanced2
** "User selectable recipient, without showing email address":#advanced3
* "Styling":#styling
* "Plugin API and callback events":#api
* "Frequently asked questions":#faq
* "Authors/credits":#credits

h2(#introduction). Introduction

A Textpattern CMS form mailer plugin. @<txp:com_connect />@ produces a flexible, customisable email contact form. It is intended for use as an enquiry form for commercial and private sites, and includes several features to help reduce common problems with such forms (invalid email addresses, missing information).

Please report bugs and problems with this plugin at "the GitHub project's issues page":https://github.com/textpattern/com_connect/issues.

h3. Features

* Arbitrary HTML5 text fields can be specified, with min/max/required settings for validation.
* Email address validation, including a check for a valid MX record (Unix only).
* Safe escaping of input data.
* UTF-8 safe.
* Accessible form layout, including @<label>@, @<legend>@ and @<fieldset>@ tags.
* Various classes and ids to allow easy styling of all parts of the form.
* Spam prevention API (used by Tranquillo's @pap_contact_cleaner@ plugin) and delivery API for altering or extending the plugin's capabilities.

h3. History

Please see the "changelog on GitHub":https://github.com/textpattern/com_connect/blob/main/CHANGELOG.textile.

h2(#install). Installing and upgrading

*Requires Textpattern 4.7.0+*

Download the latest release of the plugin from "the GitHub project page":https://github.com/textpattern/com_connect/releases, paste the code into the Textpattern Admin>Plugins panel, install and enable the plugin. Visit the "forum thread":https://forum.textpattern.io/viewtopic.php?id=47913 for more info or to report on the success or otherwise of the plugin.

To uninstall, delete from the Plugins panel.

Alternatively, this plugin can be installed using "Composer":https://getcomposer.org:

bc(language-bash). $ composer require textpattern/com_connect:*

h2(#differences). Migrating from zem_contact_reborn

If upgrading from zem_contact_reborn (the previous incarnation of this plugin), please note these differences:

* Tags have been globally renamed from @<txp:zem_contact ... />@ to @<txp:com_connect ... />@ - please adjust your code accordingly.
* Classes @zemConnectForm@, @zemError@, @zemRequired@, @zemThanks@, @zemText@, @zemEmail@, @zemTextarea@, @zemSubmit@, @zemSelect@, @zemOption@, @zemCheckbox@ and @zemRadio@ have been renamed to @comConnectForm@, @comError@, @comRequired@, @comThanks@, @comText@, @comEmail@, @comTextarea@, @comSubmit@, @comSelect@, @comOption@, @comCheckbox@ and @comRadio@ respectively - please adjust your code accordingly.
* Disable or remove the zem_contact_lang plugin. Language strings are now bundled as part of the plugin itself. If you have a translation Textpack available that is not yet bundled, please submit it for inclusion.
* Classes based on the input element @name@ are no longer automatically applied. Only default class names beginning with @com@ are set. To employ custom classes, use the @class@ attribute for each tag, or the global @classes@ attribute to set names for error and information messages.
* If your site's 'Doctype' preference is set to @html5@ you may use HTML5 attributes in your tags. Otherwise, they will be ignored.
* Validation of required elements and min/max constraints is done by the browser first, and the plugin second. So if you specify a field is required and it is left empty, the browser will usually prevent the form being submitted. To bypass (most of) the browser checks, specify @browser_validate="0"@ in your @<txp:com_connect />@ tag.

h2(#usage). Usage

h3. Contact form

The simplest form is shown below, which produces a default form with 'Name', 'Email' and 'Message' fields. Email will be delivered to <code>recipient@example.com</code>, with the user's supplied email as the @From:@ address.

bc(language-markup). <txp:com_connect to="recipient@example.com" />

To specify fields explicitly, use something like this:

bc(language-markup). <txp:com_connect to="recipient@example.com">
    <txp:com_connect_email />
    <txp:com_connect_text label="Phone" min="7" max="15" />
    <txp:com_connect_textarea label="Your question" />
    <txp:com_connect_submit label="Send" />
</txp:com_connect>

Alternatively, place the field specifications in a Textpattern form, and call it like this:

bc(language-markup). <txp:com_connect to="recipient@example.com" form="my-contact-form" />

h3. Send article

Within the context of an individual article, this plugin can be used to send the article (or excerpt, if it exists) to an email address specified by the visitor. This requires at least two tags:

# @com_connect@, to create a form that is initially hidden by setting the @send_article@ attribute.
# @com_connect_send_article@, to create a 'Send article' link which reveals the aforementioned form when clicked.

bc(language-markup). <txp:com_connect send_article="1" />
<txp:com_connect_send_article />

By default the form contains fields for your name and email address, the recipient's email address and a personal message, but similar to contact forms you can create your own form layout. Some things you need to know:

# Set the @send_article@ attribute to @1@ in the @com_connect@ tag.
# Use a @com_connect_email@ tag with the @send_article@ attribute set to @1@. This field will be used as the recipient email address.

bc(language-markup).. <txp:com_connect to="you@example.com" send_article="1">
    <txp:com_connect_email label="Recipient Email" send_article="1" />
    <txp:com_connect_email label="Your Email" />
    <txp:com_connect_submit label="Send Article" />
</txp:com_connect>

<txp:com_connect_send_article />

h2(#tags). Tags

@<txp:com_connect_send_article />@ can be used to create a 'Send article' link within an article form, connecting it to the contact form.

All other tags provided by this plugin can only be used inside a @<txp:com_connect>@ - @</txp:com_connect>@ container tag or in a Textpattern form used as the @form@ attribute in the @<txp:com_connect />@ tag.

In addition to the tags detailed in the following sections, every tag accepts a core set of common attributes. These are:

; @accesskey="character"@
: Shortcut key to set focus on the field.
; @autofocus="boolean"@
: To automatically focus the cursor in this field on page load. Only one field may have this property.
; @dir="value"@
: Text direction (@ltr@, @rtl@ or @auto@).
; @disabled="boolean"@
: Whether the input control accepts user input. If set, the element does not get submitted with the form, nor is it subject to any @checkValidity()@ JavaScript calls.
; @hidden="boolean"@
: The visibility of the input control.
; @id="id"@
: The HTML identifier for the control.
; @lang="value"@
: The ISO 639 language short code (e.g. @en-gb@, @de-de@) that governs the field.
; @list="id"@
: Used in conjunction with the @<datalist>@ tag to specify a set of options. The id is the reference to the datalist to use.
; @readonly="boolean"@
: Control does not accept user input, but will be processed on form submission and can be validated.
; @spellcheck="value"@
: Whether the field is subject to spell checking (@true@ = yes, @default@ = browser decides, or @false@ = no).
; @style="style rules"@
: Inline CSS @style@ rules to apply to the input control.
; @tabindex="number"@
: The order in which the cursor jumps between elements when using the tab key.
; @title="value"@
: Usually used for hover tooltip describing the input control's use in your application.
; @translate="boolean"@
: Whether to subject the attribute content to language translation.

h3(#cc). com_connect tag

bc(language-markup). <txp:com_connect />

May be used as a single (self-closing) or container tag. Place this where you want the input form to go. Status and error messages, if any, will be displayed before the form.

h4. Attributes

; @body_form="form name"@
: Use specified form for the message body text.
; @class="space-separated values"@
: Set the CSS @class@ name of the tag. Default: @comConnectForm@. To remove @class@ attribute from the element entirely, use @class=""@.
; @classes="comma-separated key:value pairs"@
: Set the CSS classes for error / information conditions. Specify each as a pair of values separated by a colon, e.g. @classes="required: req_field, element: warn_field"@. There are up to four available to customise:
: @element@: Set for each form field that fails validation for any reason. Default: @errorElement@.
: @wrapper@: The class to surround the list of errors shown above the form. Default: @comError@.
: @required@: Class assigned when a required element is not completed. Default: @comRequired@.
: @thanks@: Class applied to the wrapper around the @thanks_form@. Default: @comThanks@.
; @copysender="boolean"@
: Whether to send a copy of the email to the sender's address. Available values: @1@ (yes) or @0@ (no). Default is @0@.
; @expire="number"@
: Number of seconds after which the form will expire, thus requiring a page refresh before sending. Default is @600@.
; @form="form name"@
: Use specified form, containing the layout of the contact form fields.
; @from="email address"@
: Email address used in the "From:" field when sending email. Defaults to the sender's email address. If specified, the sender's email address will be placed in the "Reply-To:" field instead.
; @from_form="form name"@
: Use specified form (overrides @from@ attribute).
; @label="text"@
: Label for the contact form. If set to an empty string, display of the fieldset and legend tags will be suppressed. Default is @Contact@.
; @lang="lang-code"@
: Override the language strings that would normally be used from the current admin-side language in force. e.g. @lang="fr-fr"@ would load the French language strings. A Textpack must already exist for the chosen language.
; @browser_validate="boolean"@
: Set to 0 if you wish to stop the browser from validating form field values and 'required' status of input elements. The plugin itself is then solely responsible for validation and will indicate error conditions after submission. Default is @1@.
; @redirect="URL"@
: Redirect to specified URL (overrides @thanks@ and @thanks_form@ attributes). URL must be relative to the Textpattern site URL. Example: @redirect="monkey"@ would redirect to @http://example.com/monkey@.
; @required="boolean"@
: Whether to require all tags in this contact form to be completed before the form can be submitted. Can be overridden on a field-by-field basis by using the @required@ attribute in the relevant tag. Available values: @1@ (yes) or @0@ (no). Default is @1@.
; @send_article="boolean"@
: Whether to use this form to send an article. Available values: @1@ (yes) or @0@ (no). Default is @0@.
; @show_error="boolean"@
: Whether to display error and status messages. Available values: @1@ (yes) or @0@ (no). Default is @1@.
; @show_input="boolean"@
: Whether to display the form @<input>@ fields. Available values: @1@ (yes) or @0@ (no). Default is @1@.
; @subject="subject text"@
: Subject used when sending an email. Default is the site name.
; @subject_form="form name"@
: Use specified form (overrides @subject@ attribute).
; @thanks="text"@
: Message shown after successfully submitting a message. Default is @Thank you, your message has been sent@.
; @thanks_form="form name"@
: Use specified form (overrides @thanks@ attribute).
; @to="email address"@ %(warning)required%
: Recipient email address. Multiple recipients can be specified, separated by commas.
; @to_form="form name"@
: Use specified form (overrides @to@ attribute).

h4. Examples

h5. Example 1: Built-in contact form

When used as a single tag, produces a default form with 'Name', 'Email' and 'Message' fields. Email will be delivered to <code>recipient@example.com</code>, with the user's supplied email as the @From:@ address:

bc(language-markup). <txp:com_connect to="recipient@example.com" />

h5. Example 2: Building a custom form container

When used as a container tag, much more flexibility is allowed, for example:

bc(language-markup). <txp:com_connect to="recipient@example.com">
    <txp:com_connect_email />
    <txp:com_connect_text type="tel" label="Phone" min="7" max="15" />
    <txp:com_connect_textarea label="Your question" />
    <txp:com_connect_submit label="Send" />
</txp:com_connect>

h5. Example 3: Custom message formatting

Use the @body_form@ attribute to build custom content that is emailed to the recipient:

bc(language-markup). <txp:com_connect to="recipient@example.com" body_form="message-formatting" />

And the @body_form@ form template named @message-formatting@ is as follows:

bc.. ============
Email received.

<txp:com_connect_if name="email"><txp:com_connect_label name="email" />: <txp:com_connect_value name="email" /><txp:else />Mr. Nobody</txp:com_connect_if> wrote:

<txp:com_connect_if name="message"><txp:com_connect_value name="message" /><txp:else />Nothing much :(</txp:com_connect_if>

============

h5. Example 4: HTML and plaintext email content

Use the @body_form@ attribute to build custom content in both plaintext and HTML formats that is emailed to the recipient:

bc(language-markup). <txp:com_connect to="recipient@example.com" body_form="message-formatting" />

Use the @body_form@ form template named @message-formatting@ as follows, and note the @<txp:com_connect_mime>@ tags which indicate that the content of the given @type@ immediately follows. Use the tag with @type="end"@ to signify that the content is complete.

bc.. ============
<txp:com_connect_mime type="text" />
Fields submitted:
<txp:com_connect_fields break="">
<txp:com_connect_label />: <txp:com_connect_value />
</txp:com_connect_fields>

<txp:com_connect_mime type="html" />
<table width="600" style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">
<txp:com_connect_fields break="tr">
<td style="padding:10px 0">
   <txp:com_connect_label />
</td>
<td style="padding:10px 0">
   <txp:com_connect_value />
</td>
</txp:com_connect_fields>
</table>

<txp:com_connect_mime type="end" />
============

h3(#cc_text). com_connect_text tag

bc(language-markup). <txp:com_connect_text />

Creates a text @<input>@ field and corresponding @<label>@ tag. The input value will be included in the email, preceded by the label.

h4. Attributes

; @autocomplete="value"@
: Indicates whether the value of the control can be automatically completed by the browser. This attribute is ignored if the value of the type attribute is @password@. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
; @break="tag"@
: Break tag between the @<label>@ and @<input>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
; @class="space-separated values"@
: Set the CSS @class@ name of the tag. Default: @comText@. To remove @class@ attribute from the element entirely, use @class=""@.
; @default="value"@
: Default value when no input is provided.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the field is attached. Associated with the contained form by default.
; @inputmode="value"@
: A hint to the browser for which keyboard to display. This attribute applies when the value of the type attribute is @text@, @password@ or @url@. Possible values are:
: @verbatim@: Alphanumeric, non-prose content such as usernames and passwords.
: @latin@: Latin-script input in the user's preferred language with typing aids such as text prediction enabled. For human-to-computer communication such as search boxes.
: @latin-name@: As latin, but for human names.
: @latin-prose@: As latin, but with more aggressive typing aids. For human-to-human communication such as instant messaging for email.
: @full-width-latin@: As latin-prose, but for the user's secondary languages.
: @kana@: Kana or romaji input, typically hiragana input, using full-width characters, with support for converting to kanji. Intended for Japanese text input.
: @katakana@: Katakana input, using full-width characters, with support for converting to kanji. Intended for Japanese text input.
: @numeric@: Numeric input, including keys for the digits 0 to 9, the user's preferred thousands separator character, and the character for indicating negative numbers. Intended for numeric codes, e.g. credit card numbers. For actual numbers, prefer using @type="number"@.
: @tel@: Telephone input, including asterisk and pound key. Use @type="tel"@ if possible instead.
: @email@: Email input. Use @<txp:com_connect_email />@ if possible instead.
: @url@: URL input. Use @type="url"@ if possible instead.
; @label="text"@
: Text label displayed to the user. Default is @Text@.
; @label_position="text"@
: Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @before@.
; @max=value"@
: For character-based inputs, the maximum input value length in characters, using the HTML5 @maxlength@ attribute. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@. For numeric-based inputs, the maximum input value the field accepts, using the HTML5 @max@ attribute (can be a negative value). Default is @100@. To remove @max@ attribute from the numerical input element entirely, use @max=""@.
; @min="value"@
: For character-based inputs, the minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit. For numeric-based inputs, the minimum input value the field accepts, using the HTML5 @min@ attribute (can be a negative value). Default is @0@. To remove @min@ attribute from the numerical input element entirely, use @min=""@.
; @name="value"@
: Field name, as used in the HTML @<input>@ tag.
; @pattern="regex"@
: Regular expression that governs the format in which the field data is expected. Only used for character-based inputs.
; @placeholder="text"@
: Text to show as a guide, when the @<input>@ field is empty.
; @required="boolean"@
: Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
; @size="value"@<br/>The size, in characters, of the @<input>@ field.
; @step="value"@
: For numeric-based inputs, the interval between min and max.
; @type="value"@
: Type of text input. Default is @text@. Choose from:
: @color@
: @date@
: @datetime@
: @datetime-local@
: @month@
: @number@
: @password@
: @range@
: @search@
: @tel@
: @text@
: @time@
: @url@
: @week@

h4. Examples

h5. Example 1: Text input box

bc(language-markup). <txp:com_connect_text label="Your name" />

h5. Example 2: Range slider

bc(language-markup). <txp:com_connect_text type="range" label="UK shoe size" min="1" max="15" />

h5. Example 3: Telephone input with validation

Create a telephone field with a "validation pattern for UK telephone number":http://html5pattern.com/Phones format:

bc(language-markup). <txp:com_connect_text type="tel" label="Telephone" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" required="1" />

h3(#cc_email). com_connect_email tag

bc(language-markup). <txp:com_connect_email />

@<input>@ field for user's email address.

The entered email address will automatically be validated to make sure it is of the form "abc@xxx.yyy[.zzz]". On non-Windows servers, a test will be done to verify that an A or MX record exists for the domain. Neither test prevents spam, but it does help detect accidental typing errors.

h4. Attributes

; @autocomplete="value"@
: Indicates whether the value of the control can be automatically completed by the browser. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
; @break="tag"@
: Break tag between the @<label>@ and @<input>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
; @class="space-separated values"@
: Set the CSS @class@ name of the tag. Default: @comEmail@. To remove @class@ attribute from the element entirely, use @class=""@.
; @default="value"@
: Default value when no input is provided.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the field is attached. Associated with the contained form by default.
; @label="text"@
: Text label displayed to the user. Default is @Email@.
; @label_position="text"@
: Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @before@.
; @max="integer"@
: Maximum input value length in characters, using the HTML5 @maxlength@ attribute. Default is @100@. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@.
; @min="integer"@
: Minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit.
; @name="value"@
: Field name, as used in the HTML @<input>@ tag.
; @placeholder="text"@
: Text to show as a guide, when the @<input>@ field is empty.
; @required="boolean"@
: Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
; @send_article="boolean"@
: Whether this field is used as the recipient email address when using the send_article function. Available values: @1@ (yes) or @0@ (no). Default is @0@.
; @size="value"@
: The size, in characters, of the @<input>@ field.

h4. Examples

h5. Example 1: Standard email field

bc(language-markup). <txp:com_connect_email label="Your email address" />

h3(#cc_textarea). com_connect_textarea tag

bc(language-markup). <txp:com_connect_textarea />

Creates a @<textarea>@.

h4. Attributes

; @autocomplete="value"@
: Indicates whether the value of the control can be automatically completed by the browser. Possible values are: @off@ (the browser does not automatically complete the entry) or @on@ (the browser can automatically complete the value based on values that the user has entered during previous uses). Default is unset.
; @break="tag"@
: Break tag between the @<label>@ and @<textarea>@. Default is @<br />@. Use @break=""@ to put the @<label>@ and @<input>@ field on the same line.
; @class="space-separated values"@
: Set the CSS @class@ name of the  @<textarea>@. Default: @comTextarea@. To remove @class@ attribute from the element entirely, use @class=""@.
; @cols="integer"@<br/>Number of columns, in characters, of the @<textarea>@. Default is @58@.
; @default="value"@
: Default value when no input is provided.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the @<textarea>@ is attached. Associated with the contained form by default.
; @label="text"@
: Text label displayed to the user. Default is @Message@.
; @label_position="text"@
: Position of the label in relation to the @<textarea>@ field. Available values: @before@ or @after@. Default is @before@.
; @max="integer"@
: Maximum input value length in characters, using the HTML5 @maxlength@ attribute. Default is @10000@. To remove @maxlength@ attribute from the element entirely (not recommended), use @max=""@.
; @min="integer"@
: Minimum input value length in characters, using the HTML5 @minlength@ attribute. Default is unset, i.e., no minimum limit.
; @name="value"@
: Field name, as used in the HTML @<input>@ tag.
; @placeholder="text"@
: Text to show as a guide to users, when the  @<textarea>@ is empty.
; @required="boolean"@
: Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
; @rows="integer"@
: Number of rows, in characters, of the @<textarea>@. Default is @8@.
; @wrap="value"@
: Governs word-wrap. Available values: @hard@ or @soft@. If this attribute is not specified, @soft@ is its default value.

h4. Examples

h5. Example 1: Standard textarea

Create a text area that is 40 characters wide, 10 lines high, with a customised label:

bc(language-markup). <txp:com_connect_textarea cols="40" rows="10" label="Your question" />

h3(#cc_submit). com_connect_submit tag

bc(language-markup). <txp:com_connect_submit />

Creates a submit button. When used as a container tag, a @<button>@ element will be used instead of an @<input>@ element.

h4. Attributes:

; @class="space-separated values"@
: Set the CSS @class@ name of the tag. Default: @comSubmit@. To remove @class@ attribute from the element entirely, use @class=""@.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the button is attached. Associated with the contained form by default.
; @label="text"@
: Text shown on the submit button. Default is @Send@.

h4. Examples

h5. Example 1: Standard submit button

bc(language-markup). <txp:com_connect_submit />

h5. Example 2: Submit button with custom text

bc(language-markup). <txp:com_connect_submit label="To the moooon" />

h5. Example 3:  Usage as a container tag

This allows you to use Textpattern tags and HTML markup in the submit button:

bc(language-markup). <txp:com_connect_submit><strong>Send</strong> question</txp:com_connect_submit>

h5. Example 4: Image button

As example 3 above, but using an image as the button:

bc(language-markup). <txp:com_connect_submit>
    <img src="path/to/img.png" alt="submit">
</txp:com_connect_submit>

h3(#cc_select). com_connect_select tag

bc(language-markup). <txp:com_connect_select />

Container tag that creates a drop-down selection @<select>@ list, or scrolled @<select>@ list box (by utilising the @size@ attribute).

h4. Attributes

; @break="tag"@
: Break tag between the label and @<select>@ field. Default is @<br />@. Use @break=""@ to put the label and input field on the same line.
; @class="space-separated values"@
: Set the CSS @class@ name of the list. Default: @comSelect@. To remove @class@ attribute from the element entirely, use @class=""@.
; @delimiter="character"@
: Separator character between list items if using the @options@ attribute. Default is @,@ (comma). Ignored if this tag is used as a container.
; @label="text"@
: Text label displayed to the user. Default is @Option@.
; @label_position="text"@
: Position of the label in relation to the @<select>@ field. Available values: @before@ or @after@. Default is @before@.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the @<select>@ is attached. Associated with the contained form by default.
; @multiple="boolean"@
: Whether to allow multiple selections to be made from the set of options. Default: unset.
; @name="value"@
: Field name, as used in the HTML @<select>@ tag.
; @options="comma-separated values"@
: List of items (previously @list@) to show in the select box. Surround the first entry with @{Braces}@ to indicate it is an 'empty' placeholder. Alternatively, the @<txp:com_connect_option />@ tag may be used inside this tag's container.
; @required="boolean"@
: Whether this field must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
; @selected="value"@
: List item that is selected by default.
; @size="value"@
: If the @<select>@ is to be presented as a scrolled list box, this attribute represents the number of rows in the list that should be visible at one time. Default is unset (i.e. a drop-down selection @<select>@ list).

h4. Examples

h5. Example 1: Single drop-down select list

A list labeled 'Department', containing three options and a blank option shown by default and labelled with 'Choose dept', forcing the user to make a selection.

bc(language-markup). <txp:com_connect_select label="Department" options="{Choose dept},Marketing,Sales,Support" />

h5. Example 2: Using the com_connect option tag

Same as the above example, but with 'Sales' selected by default.

bc(language-markup). <txp:com_connect_select label="Department" selected="Sales">
    <txp:com_connect_option label="{Choose dept}" />
    <txp:com_connect_option label="Marketing" />
    <txp:com_connect_option label="Sales" />
    <txp:com_connect_option label="Support" />
</txp:com_connect_select>

The advantage to use the option tag is that you can name the options independently of the label. You could also add a boolean @selected@ attribute to the individual option tag, instead of to the containing select tag.

h5. Example 3: Multiple select

bc(language-markup). <txp:com_connect_select label="Ice cream flavours" multiple>
    <txp:com_connect_option label="{Choose your favourites}" />
    <txp:com_connect_option label="Vanilla" />
    <txp:com_connect_option label="Strawberry" />
    <txp:com_connect_option label="Raspberry" />
    <txp:com_connect_option label="Chocolate" />
    <txp:com_connect_option label="Mint choc-chip" name="mint-with-chocolate-chips" />
</txp:com_connect_select>

h3(#cc_option). com_connect_option tag

bc(language-markup). <txp:com_connect_option />

Creates a drop-down selection option. May be used as a single (self-closing) or container tag. Also see @com_connect_select@ tag above.

h4. Attributes

; @class="space-separated values"@
: Set the CSS @class@ name of the option. Default: @comOption@. To remove @class@ attribute from the element entirely, use @class=""@.
; @label="text"@ %(warning)required%
: Text label of this option displayed to the user. Surround the label with {braces} to indicate it is an empty placeholder at the start of the list. Note if you use this braces syntax, the value will be forced to @value=""@, i.e. any supplied value will be ignored.
; @selected="boolean"@
: Whether this item is selected, May also be specified in the container tag's @selected@ attribute. Available values: @1@ (yes) or @0@ (no).
; @value="text"@
: The value associated with this option when submitted. Default is the label.

h5. Example 1: Drop-down select list containing three options

bc(language-markup). <txp:com_connect_select label="Department">
    <txp:com_connect_option label="Marketing" />
    <txp:com_connect_option label="Sales" />
    <txp:com_connect_option label="Support" />
</txp:com_connect_select>

h5. Example 2: Pass different values instead of label

'Sales' is selected by default.

bc(language-markup). <txp:com_connect_select label="Department">
    <txp:com_connect_option value="contact-marketing">Marketing</txp:com_connect_option>
    <txp:com_connect_option value="contact-sales" selected>Sales</txp:com_connect_option>
    <txp:com_connect_option value="contact-support">Support</txp:com_connect_option>
</txp:com_connect_select>

h3(#cc_checkbox). com_connect_checkbox tag

bc(language-markup). <txp:com_connect_checkbox />

Creates a checkbox.

h4. Attributes

; @break="tag"@
: Break tag between the checkbox button and label. Default is one space. Use @break="br"@ to put the checkbox and label on separate lines.
; @checked="boolean"@
: Whether this box is checked when first displayed. Available values: @1@ (yes) or @0@ (no). Default is @0@.
; @class="space-separated values"@
: Set the CSS @class@ name of the option. Default: @comCheckbox@. To remove @class@ attribute from the element entirely, use @class=""@.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the checkbox is attached. Associated with the contained form by default.
; @label="text"@
: Text label displayed to the user. Default is @Checkbox@.
; @label_position="text"@
: Position of the label in relation to the @<input>@ field. Available values: @before@ or @after@. Default is @after@.
; @name="value"@
: Field name, as used in the HTML @<input>@ tag.
; @required="boolean"@
: Whether this checkbox must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@.
; @value="text"@
: Value to send in the email if the option is checked. Uses yes/no if not set.

h4. Examples

h5. Example 1: Accept terms of service

Shrink-wrap agreement which must be checked by the user before the email will be sent.

bc(language-markup). <txp:com_connect_checkbox label="I accept the terms and conditions" />

h5. Example 2: Optional checkboxes

bc(language-markup). With which operating systems are you familiar?<br />
<txp:com_connect_checkbox label="Windows" required="0" /><br />
<txp:com_connect_checkbox label="Unix/Linux/BSD" required="0" /><br />
<txp:com_connect_checkbox label="macOS" required="0" />

h3(#cc_radio). com_connect_radio tag

bc(language-markup). <txp:com_connect_radio />

Creates a radio button.

h4. Attributes

; @break="tag"@
: Break tag between the radio button and label. Default is one space. Use @break="br"@ to put the radio button and label on separate lines.
; @checked="boolean"@
: Whether this radio option is checked when the form is first displayed. Available values: @1@ (yes) or @0@ (no). Default is @0@.
; @class="space-separated values"@
:  Set the CSS @class@ name of the radio button. Default: @comRadio@. To remove @class@ attribute from the element entirely, use @class=""@.
; @group="text"@ %(warning)required%
: Text used in the email to describe this group of radio buttons. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. Default is @Radio@.
; @html_form="id"@
: The HTML @id@ of the @<form>@ tag to which the radio button is attached. Associated with the contained form by default.
; @label="text"@ %(warning)required%
: Text label displayed to the user as radio button option.
; @name="value"@ %(warning)recommended%
: Field name, as used in the HTML @<input>@ tag. This attribute value is remembered for subsequent radio buttons, so you only have to set it on the first radio button of a group. If it hasn't been set at all, it will be derived from the @group@ attribute.
; @required="boolean"@
: Whether this radio set must be filled out. Available values: @1@ (yes) or @0@ (no). Default is whatever is set in the @<txp:com_connect>@ tag's @required@ attribute - if neither attribute is set then default is @1@. *You should set the @required@ attribute on only the first radio button of the group, or set the same identical attribute value on all radio buttons in the group.*
; @value="text"@
: Value to send in the email if the option is checked. Uses label if not set.

h4. Examples

h5. Example 1: Radio set

Group mutually exclusive radio buttons by setting the @group@ attribute on the first radio button in a group. Only the chosen radio button from each group will be used in the email message. The message will be output in the form @group: label@ for each of the chosen radio buttons.

bc(language-markup). <txp:com_connect_radio label="Medium" group="I like my steak" />
<txp:com_connect_radio label="Rare" />
<txp:com_connect_radio label="Well done" />
<txp:com_connect_radio label="Wine" group="With a glass of" />
<txp:com_connect_radio label="Beer" />
<txp:com_connect_radio label="Water" />

h3(#cc_secret). com_connect_secret tag

bc(language-markup). <txp:com_connect_secret />

This tag has no effect on the form or HTML output, but will include additional information in the email. It can be used as a single (self-closing) tag or as a container tag.

h4. Attributes

; @label="text"@
: Used to identify the field in the email. Default is @Secret@.
; @name="text"@
: Used internally. Set this only if you have multiple 'secret' form elements with identical labels.
; @value="value"@
: Some text you want to add to the email.

h4. Examples

h5. Example 1: As a single (self-closing) tag

bc(language-markup). <txp:com_connect_secret value="The answer is 42" />

h5. Example 2: As a container tag

bc(language-markup). <txp:com_connect_secret label="Dear user">
    Please provide a useful example for this tag!
</txp:com_connect_secret>

h3(#cc_serverinfo). com_connect_serverinfo tag

bc(language-markup). <txp:com_connect_serverinfo />

This tag has no effect on the form or HTML output, but will include additional information in the email based on the PHP @$_SERVER@ variable.

h4. Attributes

; @label="text"@
: Used to identify the field in the email. Defaults to the value of the @name@ attribute.
; @name="value"@ %(warning)required%
: Name of the server variable. See the "PHP manual":https://php.net/manual/reserved.variables.php#reserved.variables.server for a full list.

h4. Examples

h5. Example 1: Add the IP address of the visitor to the email

bc(language-markup). <txp:com_connect_serverinfo name="REMOTE_ADDR" label="IP number" />

h5. Example 2: Add the name of the visitor's browser to the email

bc(language-markup). <txp:com_connect_serverinfo name="HTTP_USER_AGENT" label="Browser" />

h3(#cc_send_article). com_connect_send_article tag

bc(language-markup). <txp:com_connect_send_article />

Use this tag in your individual article form, where you want the "send article" link to be displayed.

h4. Attributes

; @linktext="text"@
: Text displayed for the link. Default is @send article@.

h4. Examples

h5. Example 1: On an article form

bc(language-markup). <txp:com_connect_send_article linktext="Send this article" />

h3(#cc_fields). com_connect_fields tag

bc(language-markup). <txp:com_connect_fields />

Iterate over the set of submitted fields. Only really of use in the designated @body_form@ to format the user-supplied content in the email body.

h4. Attributes

; @break="text or tag"@
: Break tag or text to use as a separator between each item. Default is @, @. Use @break=""@ to remove the effect of this attribute.
; @class="space-separated values"@
: Set the CSS @class@ name of the wraptag. Default: unset.
; @label="text"@
: Comma-separated list of field labels to iterate over.
; @name="text"@
: Comma-separated list of field names to iterate over.
; @wraptag="tag"@
: HTML tag (without angle brackets) to wrap the set of fields. Default: unset.

Note that @label@ and @name@ may be used individually or in tandem. If both are omitted, the entire set of fields are iterated.

h4. Examples

h5. Example 1: Create an unordered list of submitted fields

bc(language-markup). <txp:com_connect_fields wraptag="ul" break="li">
   <txp:com_connect_label /> = <txp:com_connect_value />
</txp:com_connect_fields>

h3(#cc_mime). com_connect_mime tag

bc(language-markup). <txp:com_connect_mime />

Use this in the body_form to delineate sections of the message for use in plaintext email clients and/or html-capable email clients.

h4. Attributes

; @type="value"@
: The type of content that follows the tag. Choose from @text@ (plaintext), @html@, or @end@ (to signify the end of the blocks).

h4. Examples

h5. Example 1: Plaintext and HTML body content

bc(language-markup). <txp:com_connect_mime type="text" />
<txp:com_connect_fields break="">
   <txp:com_connect_label />: <txp:com_connect_value />
</txp:com_connect_fields>
<txp:com_connect_mime type="html" />
<txp:com_connect_fields wraptag="ul" break="li">
   <txp:com_connect_label /> = <txp:com_connect_value />
</txp:com_connect_fields>
<txp:com_connect_mime type="end" />

Note that there are three uses of the new <txp:com_connect_mime> tag:

* One to signify the start of the plaintext content (@type="text"@).
* One to signify the start of the html content (@type="html"@).
* One to signify the end of all the content (@type="end"@).

Whether you use one or both of the text/html types, you require the 'end' or you’ll just get garbage messages.

h3(#cc_label). com_connect_label tag

bc(language-markup). <txp:com_connect_label />

Return the label for the given attribute name.

h4. Attributes

; @name="text"@
: The name of the field for which you wish to retrieve the label. If used within a @<txp:com_connect_fields>@ container, the @name@ is optional and will return the current field in the set.

h3(#cc_value). com_connect_value tag

bc(language-markup). <txp:com_connect_value />

Return the value of the given attribute, by name or its label.

h4. Attributes

; @break="text or tag"@
: Break tag or text to use as a separator between each item, if the value is a multiple (e.g. a multi-select option list). Default is @, @. Use @break=""@ to remove the effect of this attribute.
; @class="space-separated values"@
: Set the CSS @class@ name of the wraptag. Default: unset.
; @label="text"@
: The label of the field for which you wish to retrieve the value.
; @name="text"@
: The name of the field for which you wish to retrieve the value.
; @wraptag="tag"@
: HTML tag (without angle brackets) to wrap the field. Default: unset.

If used within a @<txp:com_connect_fields>@ container, the @name@ and @label@ are optional and the tag will use the current field in the set.

h3(#cc_if). com_connect_if tag

bc(language-markup). <txp:com_connect_if />

Conditional tag for checking variable conditions, either by name or label.

h4. Attributes

; @label="text"@
: The label of the field you wish to check.
; @name="text"@
: The name of the field you wish to check.
; @value="text"@
: The value against which to test the given field. Leave blank to just test if there is any value assigned to the field.

If used within a @<txp:com_connect_fields>@ container, the @name@ and @label@ are optional and the tag will test the current field in the set.

h4. Examples

h5. Example 1: Take action if the visitor has entered a particular value

bc(language-markup). <txp:com_connect_if name="delivery" value="courier">
   <txp:com_connect_label name="delivery" />: <txp:com_connect_value name="delivery" />
</txp:com_connect_if>.

h2(#advanced). Advanced examples

h3(#advanced1). Separate input and error forms

Using @show_input@ and @show_error@ to display the form and error messages on different parts of a page. A form is used to make sure the contents of both forms are identical, otherwise they would be seen as two independent forms. The first form only shows errors (no input), the second form only shows the input fields (no errors).

bc(language-markup). <div id="error">
    <txp:com_connect form="contact_form" show_input="0" />
</div>
<div id="inputform">
    <txp:com_connect form="contact_form" show_error="0" />
</div>

Apart from the @show_error@ and @show_input@ attributes, all other attributes must be 100% identical in both forms, otherwise they would be seen as two unrelated forms.

h3(#advanced2). User selectable subject field

Specify the @subject_form@ attribute and create a form which includes a @com_connect_select@ tag:

bc(language-markup). <txp:com_connect to="you@example.com" subject_form="my_subject_form" />
    <txp:com_connect_text label="Name" /><br />
    <txp:com_connect_email /><br />
    <txp:com_connect_select label="Choose Subject" options=",Question,Feedback" /><br />
    <txp:com_connect_textarea label="Message" /><br />
</txp:com_connect>

Create a Textpattern form called "my_subject_form", containing:

bc(language-markup). <txp:php>
    global $com_connect_form;
    echo $com_connect_form['Choose Subject'];
</txp:php>

The @label@ used in the @com_connect_select@ tag must be identical to the corresponding variable in the @subject_form@. Here we used @Choose subject@.

If you'd prefer to add a common prefix for all subjects, use a @subject_form@ containing:

bc(language-markup). <txp:php>
    global $com_connect_form;
    echo 'My common prefix - ' . $com_connect_form['Choose Subject'];
</txp:php>

h3(#advanced3). User selectable recipient, without showing email address

Specify the @to_form@ attribute and create a form which includes a @com_connect_select@ tag:

bc(language-markup). <txp:com_connect to_form="my_com_connect_to_form">
    <txp:com_connect_text label="Name" /><br />
    <txp:com_connect_email /><br />
    <txp:com_connect_select label="Department" options=",Support,Sales" /><br />
    <txp:com_connect_textarea label="Message" /><br />
</txp:com_connect>

Create a Textpattern form called "my_com_connect_to_form", containing:

bc(language-markup). <txp:php>
    global $com_connect_form;
    switch($com_connect_form['Department'])
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

The @label@ used in the @com_connect_select@ tag must be identical to the corresponsing variable in the @to_form@. Here we used @Department@.

A 'default' email address in the @to_form@ is specified to ensure that a valid email address is used in cases where you add or change a select/radio option and forget to update the @to_form@.

p(alert-block warning). *Warning:* Never use tags like @com_connect_text@, @com_connect_email@ or @com_connect_textarea@ for setting the recipient address, otherwise your form can be abused to send spam to any email address!

h2(#styling). Styling

The form itself has a default @class@ of @comConnectForm@ set on the @<form>@ HTML tag.

If a @thanks_form@ template is used, the wrapper around that template has a default @class@ of @comThanks@.

The list of error messages (if any) has a default @class@ of @comError@ set on the @ul@ HTML tag that encloses the list of errors. This class name may be overridden using the @classes@ attribute of the @com_connect@ tag.

All form elements and corresponding labels have the following classes (or ids) set by default:

# One of @comText@, @comEmail@, @comTextarea@, @comSelect@, @comOption@, @comRadio@, @comCheckbox@ or @comSubmit@. By default, it should be obvious which @class@ is used for which form element (and corresponding label). You can override these names by using your own @class@ attribute.
# @comRequired@ and/or @errorElement@, depending on whether the form element is required, an error was found in whatever the visitor entered, or both. Override these using the @classes@ attribute in the @com_connect@ tag.
# An individual @id@ or @class@ set to the value of the @name@ attribute of the corresponding tag. When styling forms based on this @class@, you should explicitly set the @name@ attribute because automatically generated names may change in newer com_connect versions.

h2(#api). com_connect's API

The plugin API of com_connect, originally developed by Tranquillo, allows other plugins to interact with contact forms. This permits extra functionality such as combatting comment spam, HTML email, newsletter delivery and so forth to be bolted onto the base plugin.

Four callback events exist in com_connect:

* @comconnect.submit@ is called after the form is submitted and the values are checked if empty or valid email addresses, but before the mail is sent.
* @comconnect.form@ lets you inject content (fields) in the contact form as displayed to the visitor.
* @comconnect.render@ lets you inject or alter markup of the entire @<form>@. Useful for editing things like @enctype@ (e.g. for file attachment modules that link into this plugin).
* @comconnect.deliver@ is called immediately prior to delivery and advertises the intended payload so you may manipulate it. For example, you could do something as simple as adding CC: or BCC: fields. Or change the MIME type header to @text/html@ and add some HTML content based on the given body data, then let com_connect handle the mailing. Or you could intercept the entire mail process, handle mailing yourself with a third party system, and tell com_connect to skip its internal mailing process.

For reference here are the commands that will be interesting to plugin developers:

bc(language-php).. // This will call your function before the form is submitted so you can analyse the submitted data
register_callback('abc_myfunction', 'comconnect.submit');

// This will call your function and add the output (use @return $mystuff;@) to the contact-form.
register_callback('abc_myotherfunction2', 'comconnect.form');

// To get hold of the form-variables you can use global com_connect_form;
// With the following two lines you can tell com_connect if your plugin found spam.
$evaluator =& get_comconnect_evaluator();

// The passed value must be non-zero to mark the content as spam.
// Value must be a number between 0 and 1.
$evaluator -> add_comconnect_status(1);

p. Multiple plugins can be active at the same time and each of them can mark the submitted content as spam and prevent the form from being submitted.

h4. Examples

bc(language-php).. register_callback('pap_comconnect_form','comconnect.form');
register_callback('pap_comconnect_submit','comconnect.submit');

function pap_comconnect_form()
{
    $field = '<div style="display:none">'.
        finput('text','phone',ps('phone'),'','','','','','phone').'<br />'.
        finput('text','mail',ps('mail'),'','','','','','mail').'</div>';
    return $field;</code>
}

function pap_comconnect_submit()
{
    $checking_mail_field = trim(ps('mail'));
    $checking_phone_field = trim(ps('phone'));
    $evaluation =& get_comconnect_evaluator();

    // If the hidden fields are filled out, the contact form won't be submitted!
    if ($checking_mail_field != '' or $checking_phone_field != '') {
        $evaluation -> add_comconnect_status(1);
    }

    return;
}

p. For the delivery callback, you signal back to the plugin your intentions so that com_connect knows what to do after your delivery plugin has executed. Return the following strings:

* @comconnect.send@ (or no return value) to allow com_connect to continue mailing the content.
* @comconnect.skip@ to skip com_connect's mailing (i.e., the third party handles the mail process) and return 'success' to the visitor.
* @comconnect.fail@ to skip com_connect's mailing and return 'fail' to the visitor.

Or simply @exit@ your plugin to halt the entire operation so no com_connect feedback is given.

h2(#faq). Frequently asked questions

h5. How do I remove the legend and fieldset surrounding the contact form?

Set the @label@ attribute to an empty value (@label=""@) in the @com_connect@ tag.

h5. No email is sent. How do I diagnose and fix the problem?

First try a simple contact form, using only the @com_connect@ tag with the @to@ attribute set to a valid email address. If that doesn't send email, fill out the 'SMTP envelope sender address' field in Textpattern's Admin>Preferences. If that doesn't help either, take a look at your mail server log files to see what the problem is.

h5. Which tag do I use to create the submit button?

Just use normal HTML code to create a submit button. For historical reasons this plugin still provides the @com_connect_submit@ tag, but it provides little extra functionality.

h5. How can I get a unique (order) number in the subject of each email?

Try using the "rvm_counter":http://vanmelick.com/txp tag in the @subject@ attribute of the @com_connect@ tag.

h5. I want to use the contact form in an article list (one form for each article), but how do I make each form unique?

You can make each form unique by making one of its attribute values unique. See previous question for an example of how to do this with the @subject@ attribute.

h5. Send article: can I let people specify multiple recipients?

No. The 'send article' functionality is spammy enough as it is right now.

h5. Send article: can I show the contact form without having to click a link first?

Sure, put this just above the @com_connect@ tag:

bc(language-markup). <txp:php>$_GET['com_connect_send_article']='yes';</txp:php>

h5. How can I use this form to upload files?

You can't, but have a look at the "ext_file_attach":https://github.com/Bloke/ext_file_attach/releases/ module, or "mem_form":https://bitbucket.org/Manfre/txp-plugins/downloads/ plugins.

h5. Can I use this plugin to send HTML email?

Yes.

h5. Can I use this plugin to send newsletters?

Not without a plugin, such as "mem_postmaster":https://bitbucket.org/Manfre/txp-plugins/downloads/.

h5. I have a question that's not listed here

First read the plugin documentation (the page you're on right now) once more. If that doesn't answer your question, visit the "Textpattern forum":https://forum.textpattern.io.

h2. Authors/credits

* *zem* wrote the zem_contact 0.6 plugin on which this plugin was initially based.
* *Mary* completely revised the plugin code.
* *Stuart* turned it into a plugin, added a revised help text and additional code. Maintained all plugin versions until 4.0.3.17.
* *wet* added the @com_connect_radio@ tag.
* *Tranquillo* added the anti-spam API and @zem_contact_send_article@ functionality.
* *aslsw66*, *jdykast* and others provided additional code.
* *Ruud* cleaned up and audited the code to weed out bugs and completely revised the help text. Maintained all versions until 4.0.3.20.
* *Bloke* was the maintainer of v4.5.0.0.
* Adopted as a community plugin and now maintained by the core development team.
* Supported and tested to destruction by the Textpattern community. Many thanks to "all additional contributors":https://github.com/textpattern/com_connect/graphs/contributors.
# --- END PLUGIN HELP ---
-->
<?php
}
?>
