<?php

/**

 * Template part for displaying posts

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Power_Magazine

 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'featured-post' ); ?>>

    <div class="post-content">
        <div class="heading">

            <header class="page-header">

                <?php
                 $getId = get_cat_ID(get_the_category( $id )[0]->name);
                echo '<h2><a href="'. get_category_link($getId). '">'. get_the_category( $id )[0]->name .'</a></h2>';

                ?>

            </header><!-- .page-header -->

        </div>
        <header class="entry-header">

            <h1 class="entry-title">

                <?php the_title();

                ?>

            </h1>

        </header>
        <?php the_excerpt(); ?>
    </div>
    <div class="entry-meta">

            <?php

                power_magazine_posted_on();

                power_magazine_posted_by();

                //the_time('M d, y');

            ?>

        </div>
        <div class="social-icons-wrap">
        <ul class="social-icons">

            <!-- Facebook Button-->
            <li class="social-icon facebook">
                <a target="blank"><img src="https://www.grihshobha.in/wp-content/themes/caravanmag/images/social-icons/facebook-custom.png" ></a>
            </li>

            <!-- Twitter Button -->
            <li class="social-icon twitter">
                <a target="blank"><img src="https://www.grihshobha.in/wp-content/themes/caravanmag/images/social-icons/twitter-custom.png"></a>
            </li>

        </ul>
  </div>
    <?php power_magazine_post_thumbnail(); ?>
    <hr style="height: 2px; color: gray;">

    <div class="post-content">

        <!-- <header class="entry-header">

            <h4 class="entry-title">

                <?php //the_title();?>

            </h4>

        </header> -->

        <div class="entry-content custom-col-8 single-post-desc">

            <?php the_content(); ?>

            <?php wp_link_pages( array(

                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'power-magazine' ),

                'after'  => '</div>',

            ) );?>

        </div>
        <div class="custom-col-4">
            <p> Add section</p>
        </div>
        <div class="clearfix" style="clear: both"></div>

    </div>

</article><!-- #post-<?php the_ID(); ?> -->



