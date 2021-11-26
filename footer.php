        </main>

        <footer class="footer">
            <ul class="nav">
                <?php
                $socials = wp_get_nav_menu_items('social');
                foreach ($socials as $social) :
                ?>
                    <li class="nav__item nav__item--footer">
                        <a href="<?= $social->url; ?>" class="link--upper" target="_blank" rel="noopener noreferrer">
                            <?= strtoupper($social->title) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </footer>
    </div>
<?php wp_footer(); ?>
</body>

</html>