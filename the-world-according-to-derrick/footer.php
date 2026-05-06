<?php
/**
 * Footer template
 */
?>
            </main><!-- .site-main -->

            <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <aside class="widget-area" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </aside>
            <?php endif; ?>
        </div><!-- .content-area -->

        <footer class="site-footer" role="contentinfo">
            <div class="footer-social">
                <!-- Replace # with your actual social URLs -->
                <a href="#" target="_blank" rel="noopener noreferrer">Twitter</a>
                <a href="#" target="_blank" rel="noopener noreferrer">Facebook</a>
                <a href="#" target="_blank" rel="noopener noreferrer">Instagram</a>
                <a href="#" target="_blank" rel="noopener noreferrer">LinkedIn</a>
            </div>

            <div class="site-info">
                &copy; <?php echo esc_html( date_i18n( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>.
                <?php esc_html_e( 'All rights reserved.', 'world-according-to-derrick' ); ?>
            </div>
        </footer>
    </div><!-- .site-inner -->
</div><!-- .site -->

<?php wp_footer(); ?>
</body>
</html>
