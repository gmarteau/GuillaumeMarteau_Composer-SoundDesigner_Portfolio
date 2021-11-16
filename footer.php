</main>

<footer class="footer">
    <ul class="nav nav--footer">
        <?php
        $socials = wp_get_nav_menu_items('social');
        foreach ($socials as $social) :
        ?>
            <li class="nav__item nav__item--footer">
                <a href="<?= $social->url; ?>" class="link--footer" target="_blank" rel="noopener noreferrer">
                    <?php
                    $title = $social->title;
                    if (str_contains($title, 'soundcloud')) :
                    ?>
                        <i class="fab fa-soundcloud fa-2x"></i>
                    <?php elseif (str_contains($title, 'facebook')) : ?>
                        <i class="fab fa-facebook-f fa-2x"></i>
                    <?php elseif (str_contains($title, 'linkedin')) : ?>
                        <i class="fab fa-linkedin-in fa-2x"></i>
                    <?php elseif (str_contains($title, 'youtube')) : ?>
                        <i class="fab fa-youtube fa-2x"></i>
                    <?php elseif (str_contains($title, 'vimeo')) : ?>
                        <i class="fab fa-vimeo-v fa-2x"></i>
                    <?php else : echo $title; ?>
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</footer>

<?php wp_footer(); ?>
</body>

</html>