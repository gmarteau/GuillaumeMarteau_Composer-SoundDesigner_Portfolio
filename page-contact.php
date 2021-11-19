<?php

/**
 * Template Name: Contact
 */
?>

<?php require_once('inc/contact-form-validation.php'); ?>

<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>
    <div class="contact__title flex-centered">
        <h1 class="title"><?php the_title() ?></h1>
    </div>

    <div class="contact">
        <div class="contact__text">
            <?php the_content() ?>
        </div>

        <div class="contact__form">
            <?php if (isset($email_status)) : ?>
                <p class="alert alert-<?= $email_status === true ? 'success' : 'danger'; ?>" role="alert">
                    <?= $email_status === true ? 'Votre message a été envoyé avec succès' : 'Une erreur est survenue lors de l\'envoi du message'; ?>
                </p>
            <?php endif; ?>

            <form class="form" action="<?php the_permalink() ?>" method="post" id="contactForm" novalidate>
                <div class="form__group">
                    <label for="emailInput" class="form__group__label">Votre email</label>
                    <input type="email" name="email" class="form__group__input <?= (isset($email_error) && $email_error !== '') ? 'is-invalid' : ''; ?>" id="emailInput" <?= isset($email_value) ? 'value="' . $email_value . '"' : ''; ?> placeholder="<?php the_field('email_placeholder') ?>" />
                    <?php if ($email_error !== '') : ?>
                        <p class="invalid-feedback"><?= $email_error ?></p>
                    <?php endif; ?>
                </div>
                <div class="form__group">
                    <label for="objectInput" class="form__group__label">Objet</label>
                    <input type="text" name="object" class="form__group__input <?= (isset($object_error) && $object_error !== '') ? 'is-invalid' : ''; ?>" id="objectInput" <?= isset($object_value) ? 'value="' . $object_value . '"' : ''; ?> placeholder="<?php the_field('object_placeholder') ?>" />
                    <?php if ($object_error !== '') : ?>
                        <p class="invalid-feedback"><?= $object_error ?></p>
                    <?php endif; ?>
                </div>
                <div class="form__group">
                    <label for="messageInput" class="form__group__label">Votre message</label>
                    <textarea name="message" id="messageInput" cols="30" rows="10" class="form__group__input <?= (isset($message_error) && $message_error !== '') ? 'is-invalid' : ''; ?>" placeholder="<?php the_field('message_placeholder') ?>"><?= isset($message_value) ? $message_value : ''; ?></textarea>
                    <?php if ($message_error !== '') : ?>
                        <p class="invalid-feedback"><?= $message_error ?></p>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="submitted" id="submitted" value="true" />

                <div class="flex-centered">
                    <button type="submit" class="btn"><?php the_field('submit_text') ?></button>
                </div>
            </form>
        </div>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>