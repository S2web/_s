
		<nav id="menu" class="nav nav-reveal" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<?php wp_nav_menu( 
				array( 
					'theme_location'	=> 'primary',
					'container'			=> false,
					'menu_id'			=> 'nav-primary',
					'menu_class'		=> 'menu-wrap'
				)
			); ?>
        </nav>