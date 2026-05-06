<?php
/**
 * Main template file (home / blog index)
 */

get_header();
?>

<?php if ( have_posts() ) : ?>

    <?php if ( is_home() && ! is_front_page() ) : ?>
        <header class="page-header">
            <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
        </header>
    <?php endif; ?>

    <div class="post-grid">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
                <header class="entry-header">
                    <h2 class="post-card-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                    <div class="post-card-meta">
                        <span class="post-date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></span>
                        <span class="post-author"><?php the_author(); ?></span>
                    </div>
                </header>

                <div class="post-card-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div><!-- .post-grid -->

    <div class="pagination">
        <?php
        the_posts_pagination(
            array(
                'mid_size'  => 2,
                'prev_text' => __( '&laquo; Previous', 'world-according-to-derrick' ),
                'next_text' => __( 'Next &raquo;', 'world-according-to-derrick' ),
            )
        );
        ?>
    </div>

<?php else : ?>

    <article class="no-posts">
        <header class="entry-header">
            <h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'world-according-to-derrick' ); ?></h1>
        </header>
        <div class="entry-content">
            <p><?php esc_html_e( 'It seems we can’t find what you’re looking for.', 'world-according-to-derrick' ); ?></p>
        </div>
    </article>

<?php endif; ?>

<?php
get_footer();
