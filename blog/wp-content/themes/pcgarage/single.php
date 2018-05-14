<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<main role="main-wrapper" class="inner-page-holder blog-single-page py-70">
	<?php while ( have_posts() ) : the_post();

		$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
	?>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="white-holder main-box">
						<div class="how-it-work-box">
							<img style="max-width:100%; margin-bottom:20px;" src="<?php echo $feat_image; ?>"/>
							<div class="how-it-work-box">
								<h2><?php the_title(); ?></h2>
							</div>
							<?php
							/* Start the Loop */
							
							//get_template_part( 'template-parts/post/content', get_post_format() );
								the_content();
							?>
							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							/* the_post_navigation( array(
								'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
								'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
							) );
							*/
							// End of the loop.
							?>
						</div>
					</div>
				</div>
				<div class="col-md-4 sidebar">
					<div class="main-box mb-5">
						<div class="main-box-inside p-0">
							<div class="main-box-head">
								<h1 class="main-box-title">Categories</h1>
							</div>
							<div id="categories-2" class="widget widget_categories">
								<ul class="m-0">
									<li class="cat-item "><a href=""><span class="category-text">Fitness</span><span class="count"><span class="count-hidden">1</span></span></a></li>
									<li class="cat-item "><a href=""><span class="category-text">Fitness</span><span class="count"><span class="count-hidden">1</span></span></a></li>
									<li class="cat-item "><a href=""><span class="category-text">Fitness</span><span class="count"><span class="count-hidden">1</span></span></a></li>
									<li class="cat-item "><a href=""><span class="category-text">Fitness</span><span class="count"><span class="count-hidden">1</span></span></a></li>
									<li class="cat-item "><a href=""><span class="category-text">Fitness</span><span class="count"><span class="count-hidden">1</span></span></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="main-box mb-5">
						<div class="main-box-head">
							<h1 class="main-box-title">Featured Posts</h1>
						</div>
						<div class="main-box-inside">
							<div id="categories-2" class="widget vce_posts_widget widget_categories">
								<ul class="vce-post-list">
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
									<li>
										<a href="" class="featured_image_sidebar"><span class="vce-post-img"><img src="http://yogyogi.com/blog/wp-content/uploads/2017/11/What-is-a-Yoga-Retreat.jpg"></span></a>
										<div class="vce-posts-wrap">
											<a href="" title="What is a Yoga Retreat" class="vce-post-link">What is a Yoga Retreat</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 	endwhile; ?>
	</main>

<?php get_footer();
