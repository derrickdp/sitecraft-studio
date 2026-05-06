<?php
/**
 * Page template
 */

get_header();
?>

<?php
while ( have_posts() ) :
    the_post();

    // Body classes for specific pages.
    $page_classes = '';
    if ( is_page( array( 'about-us', 'about' ) ) ) {
        $page_classes = 'page-about';
    } elseif ( is_page( array( 'contact-us', 'contact' ) ) ) {
        $page_classes = 'page-contact';
    }
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( $page_classes ); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

        <div class="entry-content">
            <?php the_content(); ?>

            <?php if ( is_page( array( 'contact-us', 'contact' ) ) ) : ?>
                <div class="contact-form">
                    <form method="post" action="">
                        <label for="twad-name"><?php esc_html_e( 'Name', 'world-according-to-derrick' ); ?></label>
                        <input type="text" id="twad-name" name="twad-name" required>

                        <label for="twad-email"><?php esc_html_e( 'Email', 'world-according-to-derrick' ); ?></label>
                        <input type="email" id="twad-email" name="twad-email" required>

                        <label for="twad-message"><?php esc_html_e( 'Message', 'world-according-to-derrick' ); ?></label>
                        <textarea id="twad-message" name="twad-message" required></textarea>

                        <input type="submit" value="<?php esc_attr_e( 'Send Message', 'world-according-to-derrick' ); ?>">
                    </form>
                    <!-- Note: For real email handling, connect this form to a plugin or custom processing. -->
                </div>
            <?php endif; ?>
        </div>
    </article>

<?php endwhile; ?>

<?php
get_footer();
