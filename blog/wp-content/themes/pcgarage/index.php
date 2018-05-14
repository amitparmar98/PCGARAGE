<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

	<main role="main-wrapper" class="inner-page-holder blog-page py-70">
		<div class="container">
			<div class="main-box">
				<div class="row">
					<div class="col-md-12">
						<div class="main-box-head">
							<h1 class="main-box-title">Our Blog</h1>
						</div>
					</div>
				</div>
				<div class="main-box-inside">
				<div class="row">
					<?php 
							query_posts( array(
								'cat' => 3,
								'posts_per_page' => -1,
								'order'=>'ASC'
							) );
							while ( have_posts() ) : the_post(); 
							$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
							 $content = get_the_content();
							$author_id = get_post_field ('post_author', $post->ID);
							$display_name = get_the_author_meta( 'display_name' , $author_id ); 
						?>
					<div class="col-md-4">
						<div class="blog-box text-center">
							<figure>
								<a href="<?php the_permalink(); ?>"><img alt="" src="<?php echo $feat_image; ?>" class="b-skipped"></a>
							</figure>
							<div class="hp-article-info">
								<!--div class="hp-cat">
									<a class="hp-category" href="">Resources</a>
								</div-->   
								<h2 class="hp-article-title"><a href="<?php the_permalink(); ?>" class="anim-link"><?php the_title(); ?></a></h2>
								<div class="hp-post-pub-info">
									<!--<a class="haa-lnk" href=""><img src="https://www.gravatar.com/avatar/c34d81b64b06bf499052eed11662564a?s=48" alt="Charlie Furphy" class="hpppi-author-avatar"></a>-->
									<span class="hpppi-author">By <a href=""><?php echo $display_name; ?></a></span>
									<span class="hpppi-separator">•</span> 
									<span class="hppi-time"><span class="icon-clock-1"></span><?php wp_days_ago_v3(); ?></span>  
								</div>
								<p>Contributing a small time to go on a yoga retreat is such a unique and great gift that you can give...</p>
							</div>
						</div>
					</div>
					<?php
						endwhile; 
						wp_reset_query();
					?>
									
				</div>
				</div>
			</div>
		</div>
	</main>


<?php get_footer();
