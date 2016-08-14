<?php

/* 
    Template Name: Contato
*/

?>

<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- main page -->
<div class="container">
    
    <div>
        <div>
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
    
    <div class="row row-content-box">
        <div class="col-md-6 col-content-box col-content-box-2 clearfix" id="box-contato-form">
            <div class="content-col col-xs-12">
                <?php echo do_shortcode('[contact-form-7 id="5" title="Formulário de contato 1"]'); ?>
            </div>
        </div>
        <div class="col-md-6 google-map">
            <iframe id="box-contato-mapa" src="<?php echo CustomOption::get_site_meta("mapa"); ?>" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe> 
        </div>        
    </div>    
    
    <div class="row row-contato-box">
        <?php if (CustomOption::get_site_meta("telefone")) : ?>
        <div class="col-md-4 col-xs-12 text-center">                        
            <div class="well contato">
                <h2><i class="fa fa-phone"></i> Telefone:</h2>
                <p><?php echo CustomOption::get_site_meta("telefone"); ?></p>            
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (CustomOption::get_site_meta("email")) : ?>
        <div class="col-md-4 col-xs-12 text-center"> 
            <div class="well contato">
                <h2><i class="fa fa-envelope"></i> E-mail:</h2>
                <p><?php echo CustomOption::get_site_meta("email"); ?></p>            
            </div>
        </div>
        <?php endif; ?>
        
        <?php if (CustomOption::get_site_meta("endereco")) : ?>
        <div class="col-md-4 col-xs-12 text-center">                        
            <div class="well contato">
                <h2><i class="fa fa-map-marker"></i> Endereço:</h2>
                <p><?php echo CustomOption::get_site_meta("endereco"); ?></p>            
            </div>
        </div>
        <?php endif; ?>            
    </div>
</div>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>

<script>    
    jQuery("#box-contato-mapa").height(jQuery("#box-contato-form").height() + 150);
</script>