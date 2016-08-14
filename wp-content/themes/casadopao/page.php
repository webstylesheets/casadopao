<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- main page -->
<div class="container">
    <div>
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    <div class="row ">
        <div class="col-xs-12">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>