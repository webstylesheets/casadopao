<?php get_header(); ?>
<?php
$cont = 0;
$args = array(
			'post_type' => 'media-coverage',
			'posts_per_page' => 3
			); 
$custom_query = new WP_Query($args); 

while($custom_query->have_posts()) : $custom_query->the_post();
	$post_title[$cont] = get_the_title();
	$post_content[$cont] = get_the_content();
	$post_image[$cont] = get_post_thumbnail_id();
	$post_link[$cont] = get_permalink();
	$post_ID[$cont] = get_the_ID();
	$cont++;
endwhile; wp_reset_postdata();
?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>
<?php

$post_object = get_field('author');

if( $post_object ):

	$author_ID = $post_object->ID;

endif; ?>
<!-- main page -->
<div class="page-blog">
	<div class="container">
		<ol class="breadcrumb">
		<?php include("breadcrumb.php"); ?>
	</ol>
		
		<div class="row header-post-blog">
			<div class="col-md-8 col-xs-12">
				<p class="post-date"><?php the_date('Y-m-d'); ?></p>
				<h3><?php the_title(); ?></h3>
			</div>
		</div>
		<hr>
		<div class="row social-post-blog">
			<div class="col-md-8 col-xs-12">
				<p class="post-author"><?php echo get_the_title($author_ID); ?></p>
				<div id="share"></div>
			</div>
		</div>
		<hr>
		
		<div class="row main-post-blog">
			<div class="col-md-8 col-xs-12 content-post-blog">
				<?php the_content(); ?>
				
				<div class="author-post-biography">
					<hr><br>
					<?php
					$content_post = get_post($author_ID);
					$content = $content_post->post_content;
					$content = apply_filters('the_content', $content);
					$content = str_replace(']]>', ']]&gt;', $content);
					$attachment_id = get_post_thumbnail_id($author_ID);
					$size = "img-author"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<img src="<?php echo $image[0]; ?>" class="img-responsive pull-left" alt=""/>
					<p><strong><?php echo get_the_title($author_ID); ?> – <?php echo get_field("office",$author_ID); ?></strong></p>
					<?php echo $content; ?>
					<a href="<?php echo get_field("linkedin",$author_ID); ?>" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 sidebar-blog">
			<?php for($i=0;$i<sizeof($post_link);$i++) { ?>
				<div class="box-post-blog">
					<a href="<?php echo $post_link[$i]; ?>">
					<?php
					$attachment_id = $post_image[$i];
					$size = "img-posts"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					?>
					<div class="img-post-blog"><img src="<?php echo $image[0]; ?>" class="img-responsive" alt=""/></div>
					<h6><?php echo $post_title[$i]; ?></h6>
					<p><?php echo limited(20,$post_content[$i]); ?></p>
					</a>
				</div>
			<?php } ?>
			</div>
		</div>
		
		<div class="row-blog-newsletter">
			<div class="col-md-6 col-xs-12 col-nav-blog">
				<a href="/blog/"><i class="fa fa-angle-right"></i> Articles, Blog Posts and Industry Trends</a>
			</div>
			<div class="col-md-6 col-xs-12 col-newsletter-subscribe">
				<?php echo do_shortcode('[contact-form-7 id="302" title="Subscribe"]'); ?>
			</div>
		</div>
	</div>
</div>


<?php endwhile; endif; wp_reset_query(); ?>
<?php get_footer(); ?>