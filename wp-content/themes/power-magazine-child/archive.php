<?php

/**

 * The template for displaying archive pages

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Power_Magazine

 */



get_header();

?>

<div class="container">

	<div class="row">

		<div id="primary" class="content-area">

			<main id="main" class="site-main category-section">



			<?php if ( have_posts() ) : ?>

				<div class="heading">

					<header class="page-header">

						<?php

						the_archive_title( '<h3 class="page-title">', '</h3>' );

						the_archive_description( '<div class="archive-description">', '</div>' );

						?>

					</header><!-- .page-header -->

				</div>



				<div id="post-item-wrapper" class="post-item-wrapper">

					<div class="default-margin business-section category-section">

						<?php

						/* Start the Loop */

						while ( have_posts() ) : ?>


							<?php the_post();



							/*

							 * Include the Post-Type-specific template for the content.

							 * If you want to override this in a child theme, then include a file

							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.

							 */

							get_template_part( 'template-parts/content', get_post_type() );



						endwhile;

                        ?>

						<div class="clearfix" style="clear: both;"></div>

                    <?php

						//do_action( 'power_magazine_action_navigation' );
                    	wpbeginner_numeric_posts_nav();


					else :



						get_template_part( 'template-parts/content', 'none' );



					endif;

					?>


				</div>
			</div>


			</main><!-- #main -->
			<?php
					$widget = 'Power_magazine_Grid_Mix';
				//the_widget( $widget ); ?>
				<?php
				$category = 12;
				$args = array(
            'posts_per_page' => absint( 1 ),
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => get_option( 'sticky_posts' ),
        );

        if ( absint( $category ) > 0 ) {
          //$args['cat'] = absint( $category );
          $args['cat'] =  array(16);
        }
        $the_query = new WP_Query( $args );
        	?>
        	<section id="power_magazine_grid-1" class="default-margin business-section">
        	<?php
        if ($the_query->have_posts()) : $count= 0; ?>
            <div class="business-wrap">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>
                    <article class="featured-post post hentry category-featured">
                       <div class="heading">
                            <header class="entry-header">
                                <h3 class="entry-title">Relationship</h3>
                            </header>
                        </div>
                    	<?php if ( has_post_thumbnail() ){ ?>
	                        <figure class="featured-post-image">
	                            <?php the_post_thumbnail( 'power-magazine-mixed-large' );?>
	                        </figure>
                        <?php } ?>
                        <div class="post-content">
                            <?php if ( true == $show_category ):
                            	power_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h4>
                            </header>
                            <div class="entry-content">
								<?php
                                    $excerpt = power_magazine_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div>
                            <?php if ( true == $show_post_meta): ?>
		                        <div class="entry-meta">
			                        <?php power_magazine_posted_on(); ?>
		                        </div>
	                        <?php endif; ?>
                    	</div>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <!-- </div> -->
        <?php endif;?>
        <?php
        if ( absint( $category ) > 0 ) {
          //$args['cat'] = absint( $category );
          $args['cat'] =  array(14);
        }
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) : $count= 0; ?>
            <!-- <div class="business-wrap"> -->
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>
                    <article class="featured-post post hentry category-featured">
                        <div class="heading">
                            <header class="entry-header">
                                <h3 class="entry-title">Story</h3>
                            </header>
                        </div>
                    	<?php if ( has_post_thumbnail() ){ ?>
	                        <figure class="featured-post-image">
	                            <?php the_post_thumbnail( 'power-magazine-mixed-large' );?>
	                        </figure>
                        <?php } ?>
                        <div class="post-content">
                            <?php if ( true == $show_category ):
                            	power_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h4>
                            </header>
                            <div class="entry-content">
								<?php
                                    $excerpt = power_magazine_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div>
                            <?php if ( true == $show_post_meta): ?>
		                        <div class="entry-meta">
			                        <?php power_magazine_posted_on(); ?>
		                        </div>
	                        <?php endif; ?>
                    	</div>
                    </article>
                    <?php if($count ==1){ ?>
                        <article class="featured-post post hentry category-featured">

                            <figure class="featured-post-image">
                                 <img class="article-image" src="<?php echo home_url(); ?>/wp-content/uploads/2020/07/5896349404192071633.jpg">
                            </figure>

                    </article>
                    <?php } ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php endif;?>
		</section>
		<section id="power_magazine_grid-5" class="default-margin business-section">
		<?php	if ( absint( $category ) > 0 ) {
          //$args['cat'] = absint( $category );
          $args['cat'] =  array(18);
        }
        $the_query = new WP_Query( $args );

        if ($the_query->have_posts()) : $count= 0; ?>
            <div class="business-wrap">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); $count++; ?>
                    <article class="featured-post post hentry category-featured left-80">
                        <div class="heading">
                            <header class="entry-header">
                                <h3 class="entry-title">Bollywood</h3>
                            </header>
                        </div>
                    	<?php if ( has_post_thumbnail() ){ ?>
	                        <figure class="featured-post-image">
	                            <?php the_post_thumbnail( 'power-magazine-mixed-large' );?>
	                        </figure>
                        <?php } ?>
                        <div class="post-content">
                            <?php if ( true == $show_category ):
                            	power_magazine_category();
                            endif; ?>
                            <header class="entry-header">
                                <h4 class="entry-title">
                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                </h4>
                            </header>
                            <div class="entry-content">
								<?php
                                    $excerpt = power_magazine_the_excerpt( 20 );
                                    echo wp_kses_post( wpautop( $excerpt ) );
                                ?>
                            </div>
                            <?php if ( true == $show_post_meta): ?>
		                        <div class="entry-meta">
			                        <?php power_magazine_posted_on(); ?>
		                        </div>
	                        <?php endif; ?>
                    	</div>
                    </article>
                    <?php if($count ==1){ ?>
                        <article class="featured-post post hentry category-featured">

                            <figure class="featured-post-image">
                                 <img class="article-image" src="<?php echo home_url(); ?>/wp-content/uploads/2020/07/5896349404192071633.jpg">
                            </figure>

                    </article>
                    <?php } ?>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <!-- </div>		             -->
        <?php endif;?>
		</section>
		</div><!-- #primary -->

		<?php get_sidebar();?>

	</div>

</div>

<?php

get_footer();

