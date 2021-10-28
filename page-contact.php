<?php
/**
 * Template Name: Contact
 */

?>

<?php get_header(); ?>

<?php while (have_posts()): the_post() ?>
    <div class="row">
        <h1><?php the_title() ?></h1>
    </div>

    <div class="row">
        <?php the_content() ?>
    </div>

    <div class="row">
        <form action="<?php the_permalink() ?>" methode="post" id="contactForm">
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="emailInput" placeholder="ridley.scott@gmail.com" />
            </div>
            <div class="mb-3">
                <label for="objectInput" class="form-label">Objet</label>
                <input type="text" name="object" class="form-control" id="objectInput" placeholder="Demande de devis" />
            </div>
            <div class="mb-3">
                <label for="messageInput" class="form-label">Votre message</label>
                <textarea name="message" id="messageInput" cols="30" rows="10" class="form-control" placeholder="Exprimez-vous..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
<?php endwhile; ?>

<?php get_footer(); ?>