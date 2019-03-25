<ul class="footer-menu">
    <?php
        if ( function_exists( 'wp_nav_menu' ) ){
          wp_nav_menu( array( 
          'theme_location' => 'bottom-menu',
          'container' => '',
          'menu_class' => '' , 
           'items_wrap' => '%3$s'
          ));
        }
    ?>            
</ul>