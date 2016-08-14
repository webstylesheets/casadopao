<?php

/* 
    Template Name: Musicas
*/

?>

<?php get_header(); ?>

<div class="container">
    <div>
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div> 
</div>

<?php

    $args = array(
        'post_type' => 'post_musicas',
        'post_status' => 'publish',
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    
?>

<div class="container">
    <div class="row">
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        
        <?php $capa = get_field('musicas_capa'); ?>
        <?php $link = wp_get_attachment_image_src($capa['id'], 'img-resources'); ?> 
        <?php $musicas = get_field('cds_faixas'); ?>
        
        <div class="col-lg-6 col-md--6 col-sm-12 col-xs-12 box-musicas">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <img src="<?php echo $link[0]; ?>" class="img img-responsive center-block" />
                            <p><?php //echo the_content(); ?></p>
                        </div>
                        <?php if ($musicas) : ?>
                        <div class="col-lg-7">
                            <ul>
                                <?php foreach ($musicas as $key => $musica) : ?>
                                <li>
                                    <?php echo do_shortcode("[mp3j track='{$musica['cds_faixas_mp3']['url']}' caption='by Matt Jones'']"); ?>                                    
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
    <?php endwhile; endif; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>

