<?php

/**
 * Template Name: Contact
 */
?>

<?php require_once('inc/contact-form-validation.php'); ?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <h1><?php the_title() ?></h1>

    <?php the_content() ?>

    <?php if (isset($email_status)) : ?>
        <p class="alert alert-<?= $email_status === true ? 'success' : 'danger'; ?>" role="alert">
            <?= $email_status === true ? 'Votre message a été envoyé avec succès' : 'Une erreur est survenue lors de l\'envoi du message'; ?>
        </p>
    <?php endif; ?>

    <form action="<?php the_permalink() ?>" method="post" id="contactForm" novalidate>
        <div>
            <label for="emailInput" class="form-label">Votre email</label>
            <input type="email" name="email" class="form-control <?= (isset($email_error) && $email_error !== '') ? 'is-invalid' : ''; ?>" id="emailInput" <?= isset($email_value) ? 'value="' . $email_value . '"' : ''; ?> placeholder="<?php the_field('email_placeholder') ?>" />
            <?php if ($email_error !== '') : ?>
                <p class="invalid-feedback"><?= $email_error ?></p>
            <?php endif; ?>
        </div>
        <div>
            <label for="objectInput" class="form-label">Objet</label>
            <input type="text" name="object" class="form-control <?= (isset($object_error) && $object_error !== '') ? 'is-invalid' : ''; ?>" id="objectInput" <?= isset($object_value) ? 'value="' . $object_value . '"' : ''; ?> placeholder="<?php the_field('object_placeholder') ?>" />
            <?php if ($object_error !== '') : ?>
                <p class="invalid-feedback"><?= $object_error ?></p>
            <?php endif; ?>
        </div>
        <div>
            <label for="messageInput" class="form-label">Votre message</label>
            <textarea name="message" id="messageInput" cols="30" rows="10" class="form-control <?= (isset($message_error) && $message_error !== '') ? 'is-invalid' : ''; ?>" placeholder="<?php the_field('message_placeholder') ?>"><?= isset($message_value) ? $message_value : ''; ?></textarea>
            <?php if ($message_error !== '') : ?>
                <p class="invalid-feedback"><?= $message_error ?></p>
            <?php endif; ?>
        </div>

        <input type="hidden" name="submitted" id="submitted" value="true" />

        <button type="submit" class="btn"><?php the_field('submit_text') ?></button>
    </form>
<?php endwhile; ?>

<?php get_footer(); ?>