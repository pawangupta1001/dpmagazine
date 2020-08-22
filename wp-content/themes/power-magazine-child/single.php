<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Power_Magazine
 */

get_header();

?>
<div class="container">
	<div class="row single-page">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
                <!-- <p><?php //echo 'hello' . $_COOKIE['dp-nid']; ?> -->
				<?php
                if(isset($_COOKIE['dp-nid']) && $_COOKIE['dp-nid'] <= 10){
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'single' );

					//the_post_navigation();
					?>
					<div class="custom-col-8">
					<?php
					power_magazine_posted_description();
                    //}
                    //}

					// If comments are open or we have at least one comment, load up the comment template.


					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

					<div class="story-fb-twitter clear-block">
					<div class="social-text">
					आप इस लेख को सोशल मीडिया पर भी शेयर कर सकते हैं
					</div>

					<div class="st_social-sharing">

					  <div class="social-icons-wrap">
						<ul class="social-icons">

							<!-- Facebook Button-->
							<li class="social-icon facebook">
								<a><img src="data:image/webp;base64,UklGRgYEAABXRUJQVlA4TPoDAAAvJUAJEP8DIZIkxVb13eP3TJB/X8wfB9qG40i2VWXOFxzWxED+STkrv3IcBmCbNrLTjvGDvbT/f2COKwlubduqqok7ZFCAZ0QUQz+k1AONeCTf3eV5ANjObMiULuk226osU7rEgG3xp8vlLVL+vpPfb+myDPp+l0w6n98i6edVIgXb9fbx9+UK9Gkz7c7573cSf4qgSrGh7SMgBfzZjCsxw5AlXZYltmUA+A+cB1QwGABDAEEYTuDHtrtuMwD6svWLW88OtiDH3ShWWgSN83OPfhcNepKGtoQQgmgNqVWkLIssSVEdhlkVMhg0dCAjPPTHMUAkgB8p2xABQkUkKawOz3V1DyKfp6z3719cNlX/r9czp3arZ6gyTP2h+vdS1QOkoPr/311/4Kj7/9dWUtUjm6GpwOb/ZI5osuDXyLY3X/fr4/lW2x7PC2nRPZxqCY4269NsPh8nUhYg0dr2tG2kdszMzCt/v5RPNWypy8z1ZjsZMzPDxUdRegkR/Z8AFf7l9dP55fX1pdknb3+oTX8zvZYX+YDIQF7cWfn5fnNeLzWKYQQOVNXch86+TDdzdFyUT7538H69QqC04XBz/kvQm7u5CEQgIgIRAcRbrX4LeHc3twYADEEDm6SJNQAoLFa/tPm8liM0Hs/6evrS8Rjeav67b6aqge3S9MT+Pbv27D3SmwAg0HzuedWU0Dg5pP0XR8Q7XH5USn1dyRE6flxr3X3w8N7tF+vwV7+UUi8bjgRIErT1vVrrYxPj9Yu9MQCSRPlRqYVCRAQiIpC0Z4fWWy5nsPUYIgIRQeOp+jgoAvHDjt/cqvXO/rGsDgFERADJJ78/LxBo+y+c2qL1jnMXzl+METr6ZyZvIUCgfnGLbu3q0vvHDEAABDDydx3GL0ayi7r9vjErXiMiI/8GERr3njzarfX2Y8ePn0oMArOzCI8nerZpvRsT42MIzk6TNCDFGFJM/fJWrXf1pDSkIQlDY0x2eohEK9EaQIJEK8nszBrCPTt7EnQ48n9+AA7WOdQcwDYpHMQBcM7z93lhgz27elLb1llrrWS/Pwwi2LOzJ0F4PvlVLeYgYEgAbJN6SLCl8UypF02ShIGACCBohKQBcOeDUj/WchAAAYSAaCWIYkYppV40SRpDQkz9ktZ6W09KIwYgDYnyQ8v3hYKEAwGkNw7s33+oNwZIsAai1nyqvJ+iAQfnnDgHOzY2Nmadq1nnnIOzxeJXn3pTDsArgDFGEFqsfVPtX5W5p3NXrH1UoW+iwrlajSAAOjigBqCx9EmFf5pv5ui4aPz8oTp+udIsgoaLxsJbtZlfX07d2tiIkyRNNjY2bv96ozb926MH965duXr9/sPHX1Q4"></a>
							</li>

							<!-- Twitter Button -->
							<li class="social-icon twitter">
								<a ><img src="https://www.grihshobha.in/wp-content/themes/caravanmag/images/social-icons/twitter-custom.png"></a>
							</li>
						</ul>
					  </div><!-- .social-icons-wrap -->

					</div><!-- /st_social-sharing -->

					</div>
					</div>
					<div class="clearfix" style="clear: both"></div>
					<?php

					// $enable_related_post  = power_magazine_get_option( 'enable_related_post' );
					// if ( true == $enable_related_post) :
					// 	get_template_part( 'template-parts/content', 'related-posts' );
					// endif;

				endwhile; // End of the loop.
            }else{
                ?>
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
                  <div class="entry-content custom-col-8 single-post-desc">

                    <?php echo wp_trim_words(the_content(), 100, '...'); ?>
                </div>
                <div class="custom-col-8" style="">
                    <section id="page-83853" class="bdr clear-block">
                        <div class="sub-02 clear-block">
                        <div class="banner clear-block">
                        <div class="content">
                        <h1>महिलाओं से जुड़ी हर खबर और संजीदा कहानियां पढ़ने के लिए सब्सक्राइब करें.</h1>
                        <h3>गृहशोभा डिजिटल एडिशन</h3>
                        <div class="plan-head">Digital Plans</div>
                        <div class="plan plan-1 clear-block"></div>
                        <div class="plan plan-2 clear-block"></div>
                        <div class="clear-block"></div>
                        <div class="plan-head plan-mrgn">Print + Digital Plans</div>
                        <div class="pd-block">
                        <div class="plan-pd plan-3 clear-block"></div>
                        </div>
                        </div>
                        </div>
                        <div class="inclusion clear-block">
                        <div class="custom-col-12">
                        <h2>साथ ही मिलेगी ये खास सौगात</h2>
                        <ul class="green-bullets">
                            <li>2000 से ज्यादा <b>कहानियां</b></li>
                            <li><b>‘कोरोना वायरस’</b> से जुड़ी सभी लेटेस्ट अपडेट</li>
                            <li><b>हेल्थ</b> और <b>लाइफ स्टाइल</b> के 3000 से ज्यादा टिप्स</li>
                            <li><b>‘गृहशोभा’ मैगजीन</b> के सभी नए आर्टिकल</li>
                            <li>2000 से ज्यादा <b>ब्यूटी टिप्स</b></li>
                            <li>1000 से भी ज्यादा <b>टेस्टी फूड रेसिपी</b></li>
                            <li><b>लेटेस्ट फैशन</b> ट्रेंड्स की जानकारी</li>
                        </ul>
                        </div>
                        </div>
                        </div>
                        <div class="clear-block"></div>
                        <div class="faq-block clear-block">
                        <div class="head main">
                        <div class="super-big float-left" style="line-height: 1.25; margin-bottom: 25px;">
                        <h2><a href="#">गृहशोभा डिजिटल सब्सक्रिप्शन से जुड़े सवाल</a></h2>
                        </div>
                        </div>
                        <div class="clear-block"></div>
                        <button class="accordion active">सवाल 1: मैं डिजिटल सब्सक्रिप्शन कैसे लूं?</button>
                        <div class="panel" style="display: block; max-height: 120px;">

                        आप grihshobha.in पर जाकर Subscribe टैब पर क्लिक करें और अपना पसंदीदा प्लान चुने. ज्यादा जानकारी के लिए हमारी कस्टमर केयर टीम से संपर्क करें.

                        </div>
                        <button class="accordion">सवाल 2. मेरा ओटीपी नहीं आ रहा है?</button>
                        <div class="panel">

                        अगर फोन पर आपका ओटीपी नहीं आ रहा है तो आप अपनी ईमेली आईडी पर भी ओटीपी मंगा सकते हैं. या फिर हमारी कस्टमर केयर टीम से संपर्क करें.

                        </div>
                        <button class="accordion">सवाल 3. ओटीपी डालने के बाद भी मैं लॉग इन नहीं कर पा रहा हूं, मैं क्या करूं?</button>
                        <div class="panel">

                        अगर ओटीपी डालने के बाद भी आप लॉग.इन नहीं कर पा रहा हैं तो अपनी रजिस्टर आईडी हमारी सब्सक्रिप्शन टीम से शेयर करें? वो आपकी सहायता करेंगे.

                        </div>
                        <button class="accordion active">सवाल 4. मैं पेमेंट नहीं कर पा रहा हूं, मेरी सहायता कीजिए?</button>
                        <div class="panel" style="max-height: 267px;">

                        आप थोड़ी बाद फिर से ट्राय करें. अगर फिर भी आप पेमेंट नहीं कर पा रहे तो आप हमे 08588843408 पर पेटीएम कर सकते है या नीचे दी गई बैंक डीटेल है पर आप NEFT कर सकते हैं. ज्यादा सहायता के लिए हमारी हेल्प लाइन पर कॉन्टैक्ट करें.

                        <b>Bank Detail</b>
                        Account Name: Delhi Prakashan Vitran Pvt. Ltd
                        Account Number: 10080530405
                        IFSC Code: SBIN0009371
                        Bank Name: State Bank Of India

                        &nbsp;

                        </div>
                        <button class="accordion">सवाल 5. मेरा पेमेंट हो गया है, लेकिन सब्सक्रिप्शन स्टार्ट नहीं हो रहा है?</button>
                        <div class="panel">

                        आप अपना रजिस्टर ईमेल आईडी, फोन नंबर और ट्रांजैक्शन आईडी हमारी सब्सक्रिप्शन टीम से साझा कर सहायता ले सकते हैं.

                        </div>
                        <button class="accordion">सवाल 6. मेरी पेमेंट हो चुकी है अब मैं लॉग.इन कैसे करूं?</button>
                        <div class="panel">

                        लॉग.इन डीटेल में अपना रजिस्टकर फोन नंबर या ईमेल आईडी डाले. आपके नंबर या मेल पर ओटीपी आएगा, जिसे डालकर आप अपना अकाउंट ओपन कर सकते हैं.

                        </div>
                        <button class="accordion">सवाल 7. क्या मैं अपनी रजिस्ट्रेशन डीटेल किसी और के साथ शेयर कर सकते हूं?</button>
                        <div class="panel">

                        नहीं, गोपनीयता को ध्यान में रखते हुए आपको ऐसा नहीं करना चाहिए.

                        </div>
                        <button class="accordion">सवाल 8. हम इसे कितनी डिवाइस पर एक्सेस कर सकते हैं?</button>
                        <div class="panel">

                        आप इसे तीन डिवाइस या फिर तीन अलग-अलग ब्राउजर पर एक्सेस कर सकते हैं.

                        </div>
                        <button class="accordion">सवाल 9. क्या इसकी एप है?</button>
                        <div class="panel">

                        नहीं अभी इसकी एप नहीं है. लेकिन आप कहानियों के लिए कहानी गृहशोभा एप पढ़ सकते हैं. (हम जल्द ही गृहशोभा वेबसाइट की एप भी लाएंगे.)

                        </div>
                        <button class="accordion">सवाल 10. मैं अपना प्लान ऑनलाइन कैसे रीन्यू करूं?</button>
                        <div class="panel">

                        आप जो भी प्लान लेना चाहते हैं उसे अपनी रजिस्टर मोबाइल नंबर/ईमेल आईडी से सब्सक्राइब करें, जिसके बाद वो आटोमैटिक रीन्यू हो जाएगा या फिर आप नीचे दिए अकाउंट पर पैसा ट्रांसफर करने के बाद अपनी रजिस्टर मोबाइल नंबर/ईमेल आईडी सब्सक्रिप्शन टीम के साथ शेयर करें. वो आपकी सहायता करेंगे.

                        </div>
                        <div style="font-weight: bold; margin: 25px 0;">सब्सक्रिप्शन से संबंधित किसी भी जानकारी या सुझाव के लिए subscription@delhipress.in पर मेल करें या फिर इस हेल्पलाइन नंबर 08588843408 पर कॉल करें.</div>
                        </div>
                        </section>
                    <?php


                    // If comments are open or we have at least one comment, load up the comment template.


                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                    ?>

                    <div class="story-fb-twitter clear-block">
                    <div class="social-text">
                    आप इस लेख को सोशल मीडिया पर भी शेयर कर सकते हैं
                    </div>

                    <div class="st_social-sharing">

                      <div class="social-icons-wrap">
                        <ul class="social-icons">

                            <!-- Facebook Button-->
                            <li class="social-icon facebook">
                                <a><img src="data:image/webp;base64,UklGRgYEAABXRUJQVlA4TPoDAAAvJUAJEP8DIZIkxVb13eP3TJB/X8wfB9qG40i2VWXOFxzWxED+STkrv3IcBmCbNrLTjvGDvbT/f2COKwlubduqqok7ZFCAZ0QUQz+k1AONeCTf3eV5ANjObMiULuk226osU7rEgG3xp8vlLVL+vpPfb+myDPp+l0w6n98i6edVIgXb9fbx9+UK9Gkz7c7573cSf4qgSrGh7SMgBfzZjCsxw5AlXZYltmUA+A+cB1QwGABDAEEYTuDHtrtuMwD6svWLW88OtiDH3ShWWgSN83OPfhcNepKGtoQQgmgNqVWkLIssSVEdhlkVMhg0dCAjPPTHMUAkgB8p2xABQkUkKawOz3V1DyKfp6z3719cNlX/r9czp3arZ6gyTP2h+vdS1QOkoPr/311/4Kj7/9dWUtUjm6GpwOb/ZI5osuDXyLY3X/fr4/lW2x7PC2nRPZxqCY4269NsPh8nUhYg0dr2tG2kdszMzCt/v5RPNWypy8z1ZjsZMzPDxUdRegkR/Z8AFf7l9dP55fX1pdknb3+oTX8zvZYX+YDIQF7cWfn5fnNeLzWKYQQOVNXch86+TDdzdFyUT7538H69QqC04XBz/kvQm7u5CEQgIgIRAcRbrX4LeHc3twYADEEDm6SJNQAoLFa/tPm8liM0Hs/6evrS8Rjeav67b6aqge3S9MT+Pbv27D3SmwAg0HzuedWU0Dg5pP0XR8Q7XH5USn1dyRE6flxr3X3w8N7tF+vwV7+UUi8bjgRIErT1vVrrYxPj9Yu9MQCSRPlRqYVCRAQiIpC0Z4fWWy5nsPUYIgIRQeOp+jgoAvHDjt/cqvXO/rGsDgFERADJJ78/LxBo+y+c2qL1jnMXzl+METr6ZyZvIUCgfnGLbu3q0vvHDEAABDDydx3GL0ayi7r9vjErXiMiI/8GERr3njzarfX2Y8ePn0oMArOzCI8nerZpvRsT42MIzk6TNCDFGFJM/fJWrXf1pDSkIQlDY0x2eohEK9EaQIJEK8nszBrCPTt7EnQ48n9+AA7WOdQcwDYpHMQBcM7z93lhgz27elLb1llrrWS/Pwwi2LOzJ0F4PvlVLeYgYEgAbJN6SLCl8UypF02ShIGACCBohKQBcOeDUj/WchAAAYSAaCWIYkYppV40SRpDQkz9ktZ6W09KIwYgDYnyQ8v3hYKEAwGkNw7s33+oNwZIsAai1nyqvJ+iAQfnnDgHOzY2Nmadq1nnnIOzxeJXn3pTDsArgDFGEFqsfVPtX5W5p3NXrH1UoW+iwrlajSAAOjigBqCx9EmFf5pv5ui4aPz8oTp+udIsgoaLxsJbtZlfX07d2tiIkyRNNjY2bv96ozb926MH965duXr9/sPHX1Q4"></a>
                            </li>

                            <!-- Twitter Button -->
                            <li class="social-icon twitter">
                                <a ><img src="https://www.grihshobha.in/wp-content/themes/caravanmag/images/social-icons/twitter-custom.png"></a>
                            </li>
                        </ul>
                      </div><!-- .social-icons-wrap -->

                    </div><!-- /st_social-sharing -->

                    </div>
                    </div>

                    <div class="custom-col-4">Add section</div>
                    <div class="clearfix" style="clear: both"></div>
            <?php } ?>


			</main><!-- #main -->
		</div><!-- #primary -->

		<?php //get_sidebar(); ?>
	</div>
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
                            <div class="entry-content" style="display: none">
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
                            <div class="entry-content" style="display: none">
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
                            <div class="entry-content" style="display: none;">
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
</div>
<?php
get_footer();
