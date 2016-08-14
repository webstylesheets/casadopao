<?php

/* 
    Template Name: Home
*/

?>

<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<!-- SOBRE A CASA DO PAO -->
<?php include 'includes/a-casa.php'; ?>

<div class="container">     
    <!-- MENSAGENS -->
    <?php include 'includes/mensagens.php'; ?>
    
    <!-- -->
    <div class="row">
        <!-- MUSICAS -->
        <div class="col-lg-6">
            <?php include 'includes/musicas.php'; ?>       
        </div>
        <!-- REUNIOES -->
        <div class="col-lg-6">
            <?php include 'includes/reunioes.php'; ?>        
        </div>
    </div>
    
</div>

<!-- EVENTOS -->
<?php include 'includes/eventos.php'; ?>

<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>