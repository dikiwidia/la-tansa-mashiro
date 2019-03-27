	<footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; <?php echo date('Y'); ?> <a target="_blank" href="https://www.facebook.com/dikiwidia" title="Perguruan Tinggi La Tansa Mashiro">La Tansa Mashiro</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
					<?php wp_nav_menu( 
						array(
							'menu'              => 'secondary',
							'theme_location'    => 'secondary',
							'depth'             => 1,
							'container'         => 'ul',
							'container_class'   => '',
							'menu_class'        => 'pull-right',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker()
						)
					);?>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.isotope.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/wow.min.js"></script>
</body>
</html>