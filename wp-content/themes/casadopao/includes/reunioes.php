<?php

    $args = array(
        'post_type' => 'post_reunioes',
        'post_status' => 'publish',
        'order' => 'asc'
    );
    $query = new WP_Query($args);
    
?>
<?php if ($query->have_posts()) : ?>
<div class="row-reunioes">
    <div class="row">
        <div class="col-xs-12">
            <h3><i class="fa fa-users"></i> REUNIÕES</h3>
        </div>
    </div>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
    <div class="box-reunioes">        
        <table>
            <tr>
                <td class="col-md-2 col-reuniao dia"><label><?php echo get_field('reuniao_dia', $query->ID); ?></label></td>
                <td class="col-md-5 col-reuniao descricao"><label><?php echo get_field('reuniao_descricao', $query->ID); ?></label></td>
                <td class="col-md-5 col-reuniao horario"><label><?php echo get_field('reuniao_horario', $query->ID); ?></label></td>
            </tr>
        </table>    
    </div>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
</div>
<?php endif; ?>