<nav id="site-navigation" class="navbar navbar-expand-lg navbar-dark bg-darken">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>

      <?php
        wp_nav_menu( array(
          'theme_location'  => 'menu-1',
          'menu_id'         => 'primary-menu',
          'container'       => 'div',
          'container_class' => 'navbar-collapse offcanvas-collapse',
          'container_id'    => 'primary-menu-wrap',
          'menu_class'      => 'nav navbar-nav mr-auto',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new Bootstrap_Navwalker()
        ) );
      ?>
  </div>
</nav>
