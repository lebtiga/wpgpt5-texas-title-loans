<?php if (!defined('ABSPATH')) { exit; } ?>
</main>
<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3 class="footer-title">Our Services</h3>
                    <ul class="footer-links">
                        <li><a href="/title-loans/">Title Loans</a></li>
                        <li><a href="/online-title-loans/">Online Title Loans</a></li>
                        <li><a href="/no-credit-check-title-loans/">No Credit Check Loans</a></li>
                        <li><a href="/emergency-title-loans/">Emergency Title Loans</a></li>
                        <li><a href="/vehicle-title-loans/">Vehicle Title Loans</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Major Texas Cities</h3>
                    <ul class="footer-links">
                        <li><a href="/houston-title-loans/">Houston</a></li>
                        <li><a href="/dallas-title-loans/">Dallas</a></li>
                        <li><a href="/san-antonio-title-loans/">San Antonio</a></li>
                        <li><a href="/austin-title-loans/">Austin</a></li>
                        <li><a href="/fort-worth-title-loans/">Fort Worth</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">More Cities</h3>
                    <ul class="footer-links">
                        <li><a href="/el-paso-title-loans/">El Paso</a></li>
                        <li><a href="/arlington-title-loans/">Arlington</a></li>
                        <li><a href="/plano-title-loans/">Plano</a></li>
                        <li><a href="/corpus-christi-title-loans/">Corpus Christi</a></li>
                        <li><a href="/lubbock-title-loans/">Lubbock</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-links">
                        <li><strong>Call:</strong> <a href="tel:18882248177">888-224-8177</a></li>
                        <li><strong>Hours:</strong> Mon-Fri 9AM-6PM</li>
                        <li><strong>Saturday:</strong> 9AM-2PM</li>
                        <li><a href="#apply">Apply Online Now</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?> - Texas Title Loans</p>
                <nav class="footer-nav" aria-label="Footer">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'menu menu--footer',
                        'fallback_cb'    => false,
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
