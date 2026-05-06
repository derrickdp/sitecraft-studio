<?php
/**
 * Single post template
 */

get_header();
?>

<?php
while ( have_posts() ) :
    the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <div class="entry-meta">
                <span class="byline">
                    <?php
                    printf(
                        /* translators: %s: author name */
                        esc_html__( 'By %s', 'world-according-to-derrick' ),
                        esc_html( get_the_author() )
                    );
                    ?>
                </span>
                <span class="posted-on">
                    <?php echo esc_html( get_the_date( 'l, F j, Y' ) ); ?>
                </span>
                <span class="post-section">
                    <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo esc_html( $categories[0]->name );
                    }
                    ?>
                </span>
            </div>
        </header>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'world-according-to-derrick' ),
                    'after'  => '</div>',
                )
            );
            ?>
        </div>

        <footer class="entry-footer">
            <?php the_tags( '<p class="post-tags"><strong>' . esc_html__( 'Filed under: ', 'world-according-to-derrick' ) . '</strong>', ', ', '</p>' ); ?>
        </footer>
    </article>

    <div class="rule-thin"></div>

    <?php
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;

endwhile;
?>

<?php
get_footer();
