</div>

<footer class="container-fluid mt-5 p-5">
    <div class="row">
        <ul class="nav nav-pills justify-content-center">
            <?php
            $socials = wp_get_nav_menu_items('social');
            foreach ($socials as $social) :
            ?>
                <li class="nav-item">
                    <a href="<?= $social->url; ?>" class="nav-link" target="_blank" rel="noopener noreferrer">
                        <?php
                        $title = $social->title;
                        if (str_contains($title, 'soundcloud')) :
                        ?>
                            <?php if (str_contains($title, 'gm')) : ?>
                                <i class="fab fa-soundcloud fa-2x" style="color: red;"></i>
                            <?php else : ?>
                                <i class="fab fa-soundcloud fa-2x" style="color: blue;"></i>
                            <?php endif; ?>
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
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>