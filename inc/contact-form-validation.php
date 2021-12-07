<?php
if (isset($_POST['submitted'])) {
    $has_error = false;

    $email_value = esc_html(trim($_POST['email']));
    $valid_email = filter_var($email_value, FILTER_VALIDATE_EMAIL);
    $email_error = '';
    if ($email_value === '') {
        $email_error = 'Veuillez renseigner votre adresse email';
        $has_error = true;
    } elseif (!$valid_email) {
        $email_error = 'Le format de l\'adresse email n\'est pas valide';
        $has_error = true;
    }

    $object_value = esc_html(trim($_POST['object']));
    $object_error = '';
    if ($object_value === '') {
        $object_error = 'Veuillez renseigner un objet';
        $has_error = true;
    }

    $message_value = esc_html(trim($_POST['message']));
    $message_error = '';
    if ($message_value === '') {
        $message_error = 'Veuillez écrire un contenu pour votre message';
        $has_error = true;
    }

    if (!$has_error) {
        $email_to = get_option('admin_email');
        $body = 'From: ' . $email_value . '<br /><br />Message:<br />' . $message_value;
        $email_status = wp_mail($email_to, $object_value, $body);
        if ($email_status === true) {
            unset($email_value, $object_value, $message_value);
            unset($_POST['email'], $_POST['object'], $_POST['message'], $_POST['submitted']);
        }
    }
}
