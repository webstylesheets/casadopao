
<!-- footer -->
<div id="footer">
    <div class="container">
        <div class="menu-footer">
            <?php
            $defaults = array(
                'theme_location' => '',
                'menu' => 'header',
                'container' => '',
                'container_class' => '',
                'container_id' => '',
                'menu_class' => '',
                'menu_id' => '',
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,
                'walker' => ''
            );
            wp_nav_menu($defaults);
            ?>
            <!--<ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="who.html">Who</a></li>
                    <li><a href="what.html">What</a></li>
                    <li><a href="case-studies.html">Case Studies</a></li>
                    <li><a href="resources.html">Resources</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="contact.html">Contact</a></li>
            </ul>-->
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-contacts-footer">
                <?php if (CustomOption::get_site_meta("telefone")) : ?>
                <a href="#" class="contact-info phone"><?php echo CustomOption::get_site_meta("telefone"); ?></a>
                <?php endif; ?>
                <?php if (CustomOption::get_site_meta("email")) : ?>
                <a href="mailto:<?php echo CustomOption::get_site_meta("email"); ?>" class="contact-info mail"><?php echo CustomOption::get_site_meta("email"); ?></a>                
                <?php endif; ?>
                <?php if (CustomOption::get_site_meta("endereco")) : ?>
                <a href="#" class="contact-info pin" data-toggle="modal" data-target="#myModal"><?php echo CustomOption::get_site_meta("endereco"); ?></a>                
                <?php endif; ?>
            </div>
            <div class="col-sm-6 col-md-4 col-contacts-footer blog-subscribe">
                <h4>Receba nossas notícias</h4>
                <div class="input-group-subscribe">
                    <input type="text" class="form-control" placeholder="Informe seu e-mail*">
                    <input type="image" src="<?php bloginfo('template_directory'); ?>/images/btn-arrow.png" class="btn-subscribe">
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-contacts-footer">
                CASA MÃE MARIA NUNES LOGO
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row-copyright">
            <p>© Copyright - Casa do Pão - todos os direiros reservados</p>
        </div>
    </div>
    <div class="container">
        <div class="row-stylesheets-signature">
            <p>
                <span>Desenvolvido por </span>
                <a href="http://stylesheets.com.br" target="_blank">Stylesheets Sistemas Web</a>
            </p>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="<?php echo CustomOption::get_site_meta("mapa"); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/animenu.js"></script> 
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.vide.js"></script> 

<!-- IE form placeholder -->
<script type="text/javascript">
    $(document).ready(function () {
        function add() {
            if ($(this).val() == '') {
                $(this).val($(this).attr('placeholder')).addClass('placeholder');
            }
        }
        function remove() {
            if ($(this).val() == $(this).attr('placeholder')) {
                $(this).val('').removeClass('placeholder');
            }
        }
        if (!('placeholder' in $('<input>')[0])) { // Create a dummy element for feature detection
            $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add); // Select the elements that have a placeholder attribute
            $('form').submit(function () {
                $(this).find('input[placeholder], textarea[placeholder]').each(remove);
            }); // Remove the placeholder text before the form is submitted
        }
    });
</script>

<?php wp_footer(); ?>

</body>
</html>
