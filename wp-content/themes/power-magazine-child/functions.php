<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
   // wp_enqueue_style( 'custom-style', get_template_directory_uri().'/css/custom.css');
}

function my_custom_scripts() {
    wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom-modals.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'register-wall', get_stylesheet_directory_uri() . '/js/register-wall.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_custom_scripts' );
//function power_magazine_action_featured_slider1() {



  //register_widget( 'Power_magazine_Featured_Slider' );
  remove_action('widgets_init', 'power_magazine_widgets_init');



//}

if ( ! function_exists( 'power_magazine_widgets_init' ) ) :
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function power_magazine_widgets_init_new() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'power-magazine' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'power-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Sidebar', 'power-magazine' ),
        'id'            => 'sidebar-home',
        'description'   => esc_html__( 'Add widgets here.', 'power-magazine' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title"><span>',
        'after_title'   => '</span></h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Header Advertisement', 'power-magazine' ),
        'id'            => 'header-advertisement',
        'description'   => esc_html__( 'Add widgets here.', 'power-magazine' ),
        'before_widget' => '<section id="%1$s" class="%2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Home Content', 'power-magazine' ),
        'id'            => 'home-content',
        'description'   => esc_html__( 'Add widgets here.', 'power-magazine' ),
        'before_widget' => '<section id="%1$s" class="default-margin %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="entry-title">',
        'after_title'   => '</h3>',
    ) );
    for ( $i= 1; $i <=5; $i++ ) {
        register_sidebar( array(
            'name'          => 'Footer ' . absint( $i ),
            'id'            => 'footer-' . absint( $i ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title"><span>',
            'after_title'   => '</h3></span>',
        ) );
    }

}
endif;
add_action( 'widgets_init', 'power_magazine_widgets_init_new' );
//override footer
if ( ! function_exists( 'power_magazine_footer_copyright' ) ) :
    /**
     * Footer Copyright
     *
     * @since 1.0.0
     */
    function power_magazine_footer_copyright() { ?>
        <!-- <div class="site-generator">
            <div class="container">
                <div class="row">
                    <div class="custom-col-12">
                        <div class="copy-right"> -->
                            <?php
                                $copyright_footer = power_magazine_get_option( 'copyright_text' );

                                // Powered by content.
                                $powered_by_text = sprintf( __( 'Theme of %s', 'power-magazine' ), '<a target="_blank" rel="designer" href="'.esc_url( 'https://theme404.com/' ).'">'. esc_html__( 'Theme404', 'power-magazine' ). '</a>' );
                            ?>
                            <?php //echo wp_kses_post( $powered_by_text );?>&nbsp;
                            <?php //echo esc_html( $copyright_footer ); ?>
                        <!-- </div>
                    </div> -->
                    <!-- <div class="custom-col-6">
                        <div class="footer-menu">
                            <?php
                            //wp_nav_menu( array(
                              //  'theme_location' => 'footer-menu',
                                //'depth'          => 1,
                                //'fallback_cb'    => false,
                            //) );
                            ?>
                        <!-- </div>
                    </div> -->
               <!--  </div>
            </div>
        </div> -->
    <?php
    }
endif;
if ( ! function_exists( 'power_magazine_footer_widget' ) ) :
    /**
     * Footer Widget
     *
     * @since 1.0.0
     */
function power_magazine_footer_widget() {
        if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) || is_active_sidebar( 'footer-5' ) ) : ?>
            <div class="footer-widget-holder">
                <div class="container">
                    <div class="row">
                        <?php
                        $column_count = 0;
                        $class_coloumn =12;
                        for ( $i = 1; $i <= 4; $i++ ) {
                            if ( is_active_sidebar( 'footer-' . $i ) ) {
                                $column_count++;
                                $class_coloumn = 12/$column_count;
                            }
                        } ?>

                        <?php

                        for ( $i = 1; $i <= 5 ; $i++ ) {
                            if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
                                <?php if ($i == 1){
                                    $column_class = 'full-width custom-col-' . absint( 4 );
                                 }else{
                                    $column_class = 'custom-col-' . absint( $class_coloumn-1 ) . ' custom-footer';
                                 } ?>
                                <div class="<?php echo esc_attr( $column_class ); ?>">
                                    <?php dynamic_sidebar( 'footer-' . $i ); ?>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
        <?php endif;
    }
endif;
add_action( 'power_magazine_action_footer', 'power_magazine_footer_widget', 15 );







add_action( 'power_magazine_action_footer', 'power_magazine_footer_copyright', 20 );

/**

 * Featured Slider.

 */

//limit short desciption
function my_excerpt_length($length){
  return 50;
}
add_filter('excerpt_length', 'my_excerpt_length');
//remove_filter('get_the_excerpt', 'wp_trim_excerpt');
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


//category name filter
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});

//pgination
function custom_posts_per_page( $query ) {

    if ( $query->is_archive('cpt_name') || $query->is_category() ) {
        set_query_var('posts_per_page', 15);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

//footer scroll remove
if ( ! function_exists( 'power_magazine_footer_scroll' ) ) :
    /**
     * Footer Scroll to Top
     *
     * @since 1.0.0
     */
    function power_magazine_footer_scroll() {
    $enable_scroll_to_top = power_magazine_get_option( 'enable_scroll_to_top' );
        if ( true == $enable_scroll_to_top ): ?>
            <!-- footer ends here -->
            <!-- <div class="back-to-top">
                <a href="#masthead" title="<?php echo esc_attr__('Go to Top', 'power-magazine');?>" class="fa-angle-up"></a>
            </div> -->
        <?php endif; ?>
    <?php
    }
endif;
add_action( 'power_magazine_action_scroll', 'power_magazine_footer_scroll', 10 );

//number pagination......
function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="custom">' . "\n";
    echo '<div class="navigation"><ul>' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></div></div>' . "\n";

}
//end number pagination
//
//Custom registration
// add_action('wp_ajax_register_user_front_end', 'register_user_front_end', 0);
// add_action('wp_ajax_nopriv_register_user_front_end', 'register_user_front_end');
// function register_user_front_end() {
//       $new_user_name = stripcslashes($_POST['new_user_name']);
//       $new_user_email = stripcslashes($_POST['new_user_email']);
//       $new_user_password = $_POST['new_user_password'];
//       $user_nice_name = strtolower($_POST['new_user_email']);
//       $user_data = array(
//           'user_login' => $new_user_name,
//           'user_email' => $new_user_email,
//           'user_pass' => $new_user_password,
//           'user_nicename' => $user_nice_name,
//           'display_name' => $new_user_first_name,
//           'role' => 'subscriber'
//         );
//       $user_id = wp_insert_user($user_data);
//         if (!is_wp_error($user_id)) {
//           echo 'we have Created an account for you.';
//         } else {
//             if (isset($user_id->errors['empty_user_login'])) {
//               $notice_key = 'User Name and Email are mandatory';
//               echo $notice_key;
//             } elseif (isset($user_id->errors['existing_user_login'])) {
//               echo'User name already exixts.';
//             } else {
//               echo'Error Occured please fill up the sign up form carefully.';
//             }
//         }
//     die;
// }

function my_setcookie() {
    if(is_single()){
        if(isset($_COOKIE['dp-nid']) && !isset($_COOKIE[get_the_ID()])){
            $cookieVal = $_COOKIE['dp-nid'] + 1;
        }else if(isset($_COOKIE['dp-nid'])){
            $cookieVal = $_COOKIE['dp-nid'];
        }else{
            $cookieVal = 1;
        }
    setcookie( 'dp-nid', $cookieVal, time() + 3600 * 24 * 365, COOKIEPATH, COOKIE_DOMAIN   );
    setcookie( get_the_ID(), 'visited', time() + 3600 * 24 * 365, COOKIEPATH, COOKIE_DOMAIN   );
    }
}
add_action( 'template_redirect', 'my_setcookie' );


require  'inc/widget/featured-slider.php';

require  'inc/widget/grid.php';
require  'inc/widget/grid-mix.php';
require  'inc/widget/grid-mix-two.php';

