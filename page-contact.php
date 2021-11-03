<?php

/**
 * Template Name: Contact
 */
?>

<?php require_once('inc/contact-form-validation.php'); ?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="row">
        <h1><?php the_title() ?></h1>
    </div>

    <div class="row">
        <?php the_content() ?>
    </div>

    <?php if (isset($email_status)) : ?>
        <div class="row">
            <p class="alert alert-<?= $email_status === true ? 'success' : 'danger'; ?>" role="alert">
                <?= $email_status === true ? 'Votre message a été envoyé avec succès' : 'Une erreur est survenue lors de l\'envoi du message'; ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="row">
        <form action="<?php the_permalink() ?>" method="post" id="contactForm" novalidate>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Votre email</label>
                <input type="email" name="email" class="form-control <?= (isset($email_error) && $email_error !== '') ? 'is-invalid' : ''; ?>" id="emailInput" <?= isset($email_value) ? 'value="' . $email_value . '"' : ''; ?> placeholder="<?php the_field('email_placeholder') ?>" />
                <?php if ($email_error !== '') : ?>
                    <p class="invalid-feedback"><?= $email_error ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="objectInput" class="form-label">Objet</label>
                <input type="text" name="object" class="form-control <?= (isset($object_error) && $object_error !== '') ? 'is-invalid' : ''; ?>" id="objectInput" <?= isset($object_value) ? 'value="' . $object_value . '"' : ''; ?> placeholder="<?php the_field('object_placeholder') ?>" />
                <?php if ($object_error !== '') : ?>
                    <p class="invalid-feedback"><?= $object_error ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="messageInput" class="form-label">Votre message</label>
                <textarea name="message" id="messageInput" cols="30" rows="10" class="form-control <?= (isset($message_error) && $message_error !== '') ? 'is-invalid' : ''; ?>" placeholder="<?php the_field('message_placeholder') ?>"><?= isset($message_value) ? $message_value : ''; ?></textarea>
                <?php if ($message_error !== '') : ?>
                    <p class="invalid-feedback"><?= $message_error ?></p>
                <?php endif; ?>
            </div>

            <input type="hidden" name="submitted" id="submitted" value="true" />

            <button type="submit" class="btn btn-primary"><?php the_field('submit_text') ?></button>
        </form>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>