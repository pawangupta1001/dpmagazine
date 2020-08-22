<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Power_Magazine
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function power_magazine_body_classes( $classes ) {
    global $post;
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-home' ) ) {
		$classes[] = 'no-sidebar';
	}

    if ( is_page() || is_single() ){
         $sidebar_layout = get_post_meta( $post->ID, 'power_magazine_meta', true );
         if ( '' == $sidebar_layout ){
            $sidebar_layout = 'right-sidebar';
         }
    } else{
        $sidebar_layout = power_magazine_get_option( 'sidebar_layout' ); 
    }

    $archive_layout = power_magazine_get_option( 'archive_layout' ); 

    $classes[] = esc_attr( $sidebar_layout );

    $classes[] = esc_attr( $archive_layout );

    $site_layout = power_magazine_get_option( 'site_layout' ); 
    
    $classes[] = esc_attr( $site_layout );

	return $classes;
}
add_filter( 'body_class', 'power_magazine_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function power_magazine_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'power_magazine_pingback_header' );

if ( ! function_exists( 'power_magazine_fonts_url' ) ) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Font URL.
     */
    function power_magazine_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat: on or off', 'power-magazine' ) ) {
            $fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;

    }

endif;

if( ! function_exists( 'power_magazine_primary_navigation_fallback' ) ) :

    /**
     * Fallback for primary navigation.
     */
    function power_magazine_primary_navigation_fallback() {
        echo '<ul>';
        echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'power-magazine' ). '</a></li>';
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 1,
            'number'   => 5,
        ) );
        echo '</ul>';

    }

endif;
if ( ! function_exists( 'power_magazine_navigation' ) ) :

    /**
     * Posts navigation.
     *
     * @since 1.0.0
     */
    function power_magazine_navigation() {

        $pagination_option = power_magazine_get_option( 'pagination_option' );        

        if ( 'default' == $pagination_option) {

            the_posts_navigation(); 

        } else{

            the_posts_pagination( array(
                'mid_size' => 5,
                'prev_text' => esc_html__( 'Prev', 'power-magazine' ),
                'next_text' => esc_html__( 'Next', 'power-magazine' ),
            ) );
        }

    }
endif;

add_action( 'power_magazine_action_navigation', 'power_magazine_navigation' );

if ( ! function_exists( 'power_magazine_posted_description' ) ) :
    /**
     *  Author Desc
     */
    function power_magazine_posted_description() {
        $enable_author_info = power_magazine_get_option( 'enable_author_info' );   
        if ( false == $enable_author_info){
            return;
        }
        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'VIEW ALL POSTS BY %s', 'post author', 'power-magazine' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );      

    ?>

        <aside class="widget widget-post-author">
            <figure class="avatar"><?php echo wp_kses_post( get_avatar(get_the_author_meta( 'ID' ) ) )?></figure>
            <div class="author-details">
                <h3><?php echo esc_html( get_the_author() ) ?></h3>
                <p><?php echo wp_kses_post(get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ) )?></p>
                <div class="author-info-wrap">
                    <div class="author-info">
                        <?php echo wp_kses_post( $byline ); ?>
                    </div>
                </div>
            </div>
        </aside> 
    <?php }
endif;

if ( ! function_exists( 'power_magazine_the_excerpt' ) ) :
    /**
     * Generate excerpt.
     *
     * @since 1.0.0
     *
     * @param int     $length Excerpt length in words.
     * @param WP_Post $post_obj WP_Post instance (Optional).
     * @return string Excerpt.
     */
    function power_magazine_the_excerpt( $length = 0, $post_obj = null ) {

        global $post;

        if ( is_null( $post_obj ) ) {
            $post_obj = $post;
        }

        $length = absint( $length );

        if ( 0 === $length ) {
            return;
        }

        $source_content = $post_obj->post_content;

        if ( ! empty( $post_obj->post_excerpt ) ) {
            $source_content = $post_obj->post_excerpt;
        }

        $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
        $trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
        return $trimmed_content;

    }

endif;

if ( ! function_exists( 'power_magazine_register_required_plugins' ) ) :
    /**
     * Register the required plugins for this theme.
     * 
     * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
     */
    function power_magazine_register_required_plugins() {
        /*
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(
            array(
                'name'      => esc_html__( 'Theme Once Click Demo Importer', 'power-magazine' ), //The plugin name
                'slug'      => 'theme-one-click-demo-import',  // The plugin slug (typically the folder name)
                'required'  => false,  // If false, the plugin is only 'recommended' instead of required.
                'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
                'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            ),                         
        );

        $config = array(
            'id'           => 'power-magazine',        // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.     
            'has_notices'  => true,                    // Show admin notices or not.
            'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => false,                   // Automatically activate plugins after installation or not.
            'message'      => '',                      // Message to output right before the plugins table.
            );

        tgmpa( $plugins, $config );
    }
endif; 
add_action( 'tgmpa_register', 'power_magazine_register_required_plugins' );
