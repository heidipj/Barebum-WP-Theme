<?php
/**
 * The template for displaying all pages.
Template Name: Homepage
 *
 * @package bbum
 */

get_header(); ?>

	<div id="primary" class="content-area full-width">
        
        <main id="main" class="site-main" role="main">
            
                <div class="flexsliderwrapper">
                    <div class="flexslider">
                      <ul class="slides">
                        <li>
                            <a href="http://www.bouldermedia.tv/wp/our-work/danger-mouse/">
                              <div class="flex_img"><img src="http://www.bouldermedia.tv/wp/wp-content/uploads/2015/11/new_danger-mouse.jpg" />
                                  <div class="flex-caption">
                                      <h2>Danger Mouse</h2>
                                  </div>
                              </div><!-- end flex_img -->
                            </a>
                        </li>
                        <li>
                            <a href="http://www.bouldermedia.tv/wp/our-work/the-amazing-world-of-gumball/">
                              <div class="flex_img"><img src="http://www.bouldermedia.tv/wp/wp-content/uploads/2015/10/gumball-boulder.jpg" />
                                  <div class="flex-caption">
                                      <h2>The Amazing world of Gumball</h2>
                                  </div>
                              </div><!-- end flex_img -->
                            </a>
                        </li>
                        <li>
                            <a href="http://www.bouldermedia.tv/wp/our-work/wander-over-yonder/">
                                <div class="flex_img"><img src="http://www.bouldermedia.tv/wp/wp-content/uploads/2015/11/new_01.jpg" />
                                  <div class="flex-caption">
                                      <h2>Wander Over Yonder</h2>
                                  </div>
                                </div><!-- end flex_img -->
                            </a>
                        </li>
                      </ul>
                    </div> 
                    <!-- end flexslider -->
            </div><!-- end flexwrapper-->
            
            <!-- show main content -->
            <?php if( have_posts() ): ?>
                <div class="homepage-content">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'template-parts/content', 'page' ); ?>

                    <?php endwhile; // end of the loop. ?>
                </div><!-- end content -->
            <?php endif; // end of the loop. ?>
            <!-- end main content -->
            
            <?php
    
            //wp_reset_postdata();
            $args = array (
                'post_type' => 'post',
                'posts_per_page' => 3
            );

            $the_query = new WP_Query( $args ); ?>
            
            <?php if( $the_query->have_posts() ): ?>
            
            <h2 class="section-header">Blog Feed</h2>
            
            <!-- show 3 posts -->
            <div class="post-list col3">

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                 <?php get_template_part( 'template-parts/content', 'mini' ); ?>
            <?php endwhile; // end of the loop. ?>
                
            <?php wp_reset_postdata(); ?>
            
            </div><!-- end post-list -->
            <?php endif; // end of the loop. ?>
            		
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
