<?php
/**
 * Header template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site">
    <header class="site-header" role="banner">
        <div class="site-branding">
            <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </h1>
            <?php else : ?>
                <p class="site-title">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                </p>
            <?php endif; ?>

            <?php
            $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo esc_html( $description ); ?></p>
            <?php endif; ?>
        </div>

        <?php
        // Volume / Issue / Dateline.
        $issue_number = date_i18n( 'n' ); // Month as issue.
        $dateline     = date_i18n( 'l, F j, Y' );
        ?>
        <div class="masthead-meta">
            <span><?php esc_html_e( 'Volume I', 'world-according-to-derrick' ); ?></span>
            <span><?php printf( esc_html__( 'Issue %s', 'world-according-to-derrick' ), esc_html( $issue_number ) ); ?></span>
            <span><?php echo esc_html( $dateline ); ?></span>
        </div>

        <nav class="site-navigation main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'world-according-to-derrick' ); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                )
            );
            ?>
        </nav>
    </header>

    <div class="site-inner">
        <div class="content-area">
            <main class="site-main" role="main">
