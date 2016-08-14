<?php get_header(); ?>
<?php
$cont = 0;
$args = array(
			'post_type' => 'list_resources',
			'posts_per_page' => 1
			); 
$custom_query = new WP_Query($args); 

while($custom_query->have_posts()) : $custom_query->the_post();
	$categories = get_categories("exclude=1&orderby=id&orderasc");
endwhile; wp_reset_postdata();
//var_dump($resources_category);
//echo $categories[0]->category_description;
?>
<?php if (have_posts()) : while(have_posts()) : the_post(); ?>

<!-- banner -->
<div id="banner-pages">
	<div id="title-banner-pages">
		<div><h1><?php echo get_the_title(25); ?></h1></div>
	</div>
	<?php
	$attachment_id = get_post_thumbnail_id(25);
	$size = "img-banner-int"; // (thumbnail, medium, large, full or custom size)
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	?>
	<img src="<?php echo $image[0]; ?>" class="img-responsive" alt=""/>
</div>

<!-- main page -->

<div class="container container-800">
	<ol class="breadcrumb">
		<?php include("breadcrumb.php"); ?>
	</ol>
	
	<h4><?php the_title(); ?></h4>
	
	<hr>
	
	<?php the_content(); ?>
</div>

<div class="container-fluid container-download-form">
	<div class="container container-800">
		<h5>Download <?php foreach((get_the_category()) as $category) { echo $category->cat_name . ' '; } ?></h5>
		<hr>
		<?php echo do_shortcode('[contact-form-7 id="363" title="Download"]'); ?>
	</div>
</div>

<div class="container menu-resources">
	<div class="row">
		<h4>All Resources</h4>
		<div class="col-xs-12">
		<?php for($i=0;$i<sizeof($categories);$i++) { ?>
			<div class="col-xs-12 col-1-5">
				<div class="col-menu-resources">
					<a href="/resources/#resource-<?php echo $i; ?>">
						<div class="icon-menu-resources">
							<i class="fa <?php echo str_replace("</p>", "", str_replace("<p>", "", $categories[$i]->category_description)); ?>"></i>
						</div>
						<div class="label-menu-resources">
							<div><?php echo $categories[$i]->name; ?></div>
						</div>
					</a>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>

<?php endwhile; endif; wp_reset_query(); ?>
<?php get_footer(); ?>