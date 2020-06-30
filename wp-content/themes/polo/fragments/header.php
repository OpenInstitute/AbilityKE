<?php
$output           = '';
$header_class     = array();
$meta_show_header = true;
//Main header options

$header_layout            = reactor_option( 'main_header_layout' );
$classic_header_style     = reactor_option( 'classic_header_style' );
$modern_header_style      = reactor_option( 'modern_header_style' );
$classic_transparent_menu = reactor_option( 'classic_transparent_menu' );
$full_width_header        = reactor_option( 'header_full_width' );
$header_mini              = reactor_option( 'header_mini' );
$header_sticky            = reactor_option( 'header_sticky' );
$header_sticky_mobile     = reactor_option( 'header_sticky_mobile' );
$logo_image               = reactor_option( 'logotype-image' );
$retina_image             = reactor_option( 'logotype-image-retina' );
$hide_cart                = reactor_option( 'header-cart' );
$hide_search              = reactor_option( 'header-search' );
$show_side_menu           = reactor_option( 'header-side-menu' );
$side_menu_style          = reactor_option( 'custom_menu_style' );

$metabox_source = is_singular( 'portfolio' ) ? 'meta_portfolio_heading_options' : 'meta_page_options';

$meta_header_layout = reactor_option( 'main_header_layout', '', $metabox_source );
$meta_hide_logo     = reactor_option( 'header_logo_hide', '', $metabox_source );



$meta_modern_header_style      = reactor_option( 'modern_header_style', '', 'meta_portfolio_heading_options' );
$meta_classic_header_style     = reactor_option( 'classic_header_style', '', $metabox_source );
$meta_classic_transparent_menu = reactor_option( 'classic_transparent_menu', '', $metabox_source );
$meta_modern_header_style      = reactor_option( 'modern_header_style', '', $metabox_source );
$meta_full_width_header        = polo_metaselect_to_switch( reactor_option( 'header_full_width', '', $metabox_source ) );
$meta_header_mini              = polo_metaselect_to_switch( reactor_option( 'header_mini', '', $metabox_source ) );
$meta_header_sticky            = polo_metaselect_to_switch( reactor_option( 'header_sticky', '', $metabox_source ) );
$meta_logo_image               = reactor_option( 'meta-logotype-image', '', $metabox_source );
$meta_retina_image             = reactor_option( 'meta-logotype-image-retina', '', $metabox_source );
$meta_hide_cart                = polo_metaselect_to_switch( reactor_option( 'meta-header-cart', '', $metabox_source ) );
$meta_hide_search              = polo_metaselect_to_switch( reactor_option( 'meta-header-search', '', $metabox_source ) );
$meta_show_side_menu           = polo_metaselect_to_switch( reactor_option( 'meta-header-side-menu', '', $metabox_source ) );
$meta_header_style             = reactor_option( 'header_style', '', $metabox_source );
$meta_side_menu_style          = reactor_option( 'custom_menu_style', '', $metabox_source );

if ( ! empty( $meta_header_layout ) &&  'default' !== $meta_header_layout ) {
	$header_layout = $meta_header_layout;
}

if ( 'classic' === $meta_header_layout  && 'default' !== $meta_classic_header_style ) {
	if ( ! empty( $meta_classic_header_style ) ) {
		$classic_header_style = $meta_classic_header_style;
	}
	if ( ! empty( $meta_classic_transparent_menu ) && ( 'default' !== $meta_classic_transparent_menu )  ) {
		$classic_transparent_menu = $meta_classic_transparent_menu;
	}
}
if ( 'modern' === $meta_header_layout && 'default' !== $meta_modern_header_style ) {
	if ( ! empty( $meta_modern_header_style ) ) {
		$modern_header_style = $meta_modern_header_style;
	}
}

if ( null !== $meta_full_width_header && ! empty( $meta_full_width_header ) ) {
	$full_width_header = $meta_full_width_header;
}
if ( null !== $meta_header_mini && ! empty( $meta_header_mini ) ) {
	$header_mini = $meta_header_mini;
}
if ( null !== $meta_header_sticky && ! empty( $meta_header_sticky ) ) {
	$header_sticky = $meta_header_sticky;
}
if ( isset( $meta_logo_image ) && ! empty( $meta_logo_image ) ) {
	$logo_image = $meta_logo_image;
}
if ( isset( $meta_retina_image ) && ! empty( $meta_retina_image ) ) {
	$retina_image = $meta_retina_image;
}
if ( null !== $meta_hide_cart && ! empty( $meta_hide_cart ) ) {
	$hide_cart = $meta_hide_cart;
}
if ( null !== $meta_hide_search && ! empty( $meta_hide_search ) ) {
	$hide_search = $meta_hide_search;
}
if ( null !== $meta_show_side_menu && 'default' !== $meta_show_side_menu && ! empty( $meta_show_side_menu ) ) {
	$show_side_menu = $meta_show_side_menu;
}
if ( isset( $meta_side_menu_style ) && ! empty( $meta_side_menu_style ) && ! ( 'default' === $meta_side_menu_style ) ) {
	$side_menu_style = $meta_side_menu_style;
}


if ( is_page_template( 'page-templates/maintenance-page.php' ) ) {
	$header_layout        = reactor_option( 'main_header_layout' );
	$classic_header_style = reactor_option( 'classic_header_style' );
	$modern_header_style  = reactor_option( 'modern_header_style' );
	$full_width_header    = reactor_option( 'header_full_width' );
	$header_mini          = reactor_option( 'header_mini' );
	$header_sticky        = reactor_option( 'header_sticky' );
	$logo_image           = reactor_option( 'logotype-image' );
	$retina_image         = reactor_option( 'logotype-image-retina' );
	$hide_cart            = reactor_option( 'header-cart' );
	$hide_search          = reactor_option( 'header-search' );
	$show_side_menu       = reactor_option( 'header-side-menu' );

	$post_meta = get_post_meta( get_the_ID(), 'maintenance_page_options', true );
	if ( isset( $post_meta['maintenance_page_header'] ) ) {
		$meta_show_header = $post_meta['maintenance_page_header'];
	}
}


$logotype_image  = $logo_image ? wp_get_attachment_url( $logo_image ) : get_template_directory_uri() . '/assets/images/logo.png';
$logotype_retina = $retina_image ? wp_get_attachment_url( $retina_image ) : '';

if ( isset( $logotype_retina ) && ! ( $logotype_retina == '' ) ) {
	$image_size = wp_get_attachment_metadata( $retina_image );
	if ( $logotype_retina ) {
		$image_size = absint( $image_size['width'] / 2 );
	}
	$logo_image = '<img src="' . esc_url( $logotype_retina ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';
} elseif ( isset( $logotype_image ) && ! ( $logotype_image == '' ) ) {
	$logo_image = '<img src="' . esc_url( $logotype_image ) . '" alt="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">';
} else {
	$logo_image = '';
}
if ( isset( $logotype_retina ) && ! empty( $logotype_retina ) ) {
	$logo_data = 'data-dark-logo="' . $logotype_retina . '"';
} elseif ( isset( $logotype_image ) && ! empty( $logotype_image ) ) {
	$logo_data = 'data-dark-logo="' . $logotype_image . '"';
} else {
	$logo_data = '';
}

if ( true === $header_sticky_mobile ) {
	$header_class[] = 'mobile-sticky';
}

if ( 'centered' === $header_layout ) {
	$header_class[] = 'header-logo-center';
} else {
	if ( 'modern' === $header_layout ) {
		if ( 'light' === $modern_header_style ) {
			$header_class[] = 'header-modern header-light-transparent';
		} elseif ( 'dark' === $modern_header_style ) {
			$header_class[] = 'header-modern header-dark';
		} elseif ( 'dark_transparent' === $modern_header_style ) {
			$header_class[] = 'header-modern header-dark header-dark-transparent';
		} else {
			$header_class[] = 'header-modern';
		}
	} else {
		if ( 'light' === $classic_header_style ) {
			$header_class[] = 'header-light';
		} elseif ( 'light_transparent' === $classic_header_style ) {
			$header_class[] = 'header-light-transparent';
		} elseif ( 'dark' === $classic_header_style ) {
			$header_class[] = 'header-dark';
		} elseif ( 'dark_transparent' === $classic_header_style ) {
			$header_class[] = 'header-dark-transparent header-dark';
		} else {
			$header_class[] = 'header-transparent';
			if ( 'light' === $classic_transparent_menu ) {
				$header_class[] = 'header-dark white-sticky';
			}
		}
	}

	if ( true === $full_width_header ) {
		$header_class[] = 'header-fullwidth';
	}
	if ( true === $header_mini ) {
		$header_class[] = 'header-mini';
	}

	if ( isset( $logo_image ) && ! empty( $logo_image ) || isset( $retina_image ) && ! empty( $retina_image ) ) {
		$header_logo_position = polo_get_theme_settings( 'header_logo_position', 'header_logo_position', $metabox_source );

		if ( 'right' === $header_logo_position ) {
			$header_class[] = 'header-logo-right';
		}
	}
}

if ( true === $header_sticky && false !== $meta_header_sticky ) {
	$header_class[] = '';
} else {
	$header_class[] = 'header-no-sticky';
}
if ( true === $show_side_menu ) {
	//$header_class[] = 'header-no-sticky';
	//$header_class[] = 'header-dark';
	$header_class[] = 'header-side-panel';
}

$header_class = implode( ' ', $header_class );


$output .= '<header id="header" class="' . $header_class . '">';
$output .= '<div id="header-wrap">';
$output .= '<div class="container">';
// Trying to get the sections working 

// Our menu goes here
$output .= '<div class="col-md-4 mob-hide kadogo-menu">';
if ( ! ( true === $show_side_menu ) ) { //menu
	$output .= '<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">';
	$output .= '<div class="container">';

	$output .= '<nav id="mainMenu" class="main-menu mega-menu">';
	$menu_home   = '<li><a href="' . esc_url( home_url( '/' ) ) . '"><img src="https://sand-box.online/oi-2019/wp-content/uploads/2019/08/oi-new-favi.png" alt="Open Institute" /></a></li>';
	
// 	$menu_home   = '<li><a href="' . esc_url( home_url( '/' ) ) . '">'.$logo_image.'</a></li>';
	
	$menu_output = str_replace( 'class="main-menu nav nav-pills">', 'class="main-menu nav nav-pills">' . $menu_home, polo_main_menu() );
	$output .= $menu_output;
	$output .= '</nav>';

	$output .= '</div>';//container
	$output .= '</div>';//.navbar-collapse
	//endmenu
}

$output .= '</div>';
//End our menu

// Our Logo
$output .= '<div class="col-md-4 col-sm-8 col-xs-8 mob-logo">';

//Logo
if ( ! ( true === $meta_hide_logo ) ) {
	$style = ! empty( $image_size ) ? 'style="width:' . $image_size . 'px"' : '';
	$output .= '<div id="logo"><div class="logo-img-wrap" ' . $style . '>';

	$output .= '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" class="logo" ' . $logo_data . '>';
	$output .= $logo_image;
	$output .= '</a>';
	$output .= '</div></div>';//.logo
}

$output .= '</div>';
//end logo

//Secondary Menu
$output .= '<div class="col-md-4 mob-hide sec-menu right">';
$output .= '<div class="row">';


// $output .= '<div class="col-md-8">';
if ( ! ( true === $show_side_menu ) ) { //menu
	$output .= '<div class="secondary">';
	$output .= '<div class="container">';
	$output .= '<nav id="mainMenu2" class="sec-nav"><ul class="menu-right">';
	
	$menu_home = '<li class="menu-item menu-item-type-custom menu-item-object-custom right" style="margin-top: 5%;"> <a class="vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-flat vc_btn3-color-juicy-pink" href="https://ability.or.ke/wp-content/uploads/2020/01/Ability-Programme-Report_-Sept-2019.pdf" target="_blank" title="Donate" id="donate"> Ability White Paper</a></li>';
	
// 	$menu_home   = '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-btns">
// 	<a class="right-menu" href="' . esc_url( home_url( '/volunteer' ) ) . '" title="Volunteer">
// 	<div class="menu-img">
// 	<img src="https://sand-box.online/oi-2019/wp-content/uploads/2019/08/oi-volunteer-icon.png" alt="volunteer">
// 	</div>
// 	<div class="menu-text">
// 	Join
// 	</div>
// 	</a>
// 	</li>';
	
// 	$menu_home   .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-btns">
// 	<a class="right-menu" title="Donate" id="donate">
// 	<div class="menu-img">
// 	<img src="https://sand-box.online/oi-2019/wp-content/uploads/2019/08/oi-donation-icon.png" alt="Donate">
// 	</div>
// 	<div class="menu-text">
// 	Give
// 	</div>
	
// 	</a>
// 	</li>';
	
// 	$menu_home   .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-btns">
// 	<a class="right-menu" href="' . esc_url( home_url( '/shop' ) ) . '" title="Shop">
// 	<div class="menu-img">
// 	<img src="https://sand-box.online/oi-2019/wp-content/uploads/2019/08/oi-shopping-basket-icon.png" alt="shop">
// 	</div>
	
// 	<div class="menu-text">
// 	Shop
// 	</div>
	
// 	</a>
// 	</li>';


// 	$menu_home   .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-btns">
// 						<div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>
// 						<form action="' . esc_url( home_url( '/' ) ) . '" method="get" role="search">
// 						<input type="search" name="s" class="form-control" value="" placeholder="' . esc_html__( 'Search item e.g. Active Citizens & press ', 'polo' ) . ' &quot;' . esc_html__( 'Enter', 'polo' ) . '&quot;">
// 						</form>
// 						</div>
// 					</li>';

	
// 	$menu_home   .= '<li class="menu-item menu-item-type-custom menu-item-object-custom"> &nbsp; </li>';
	
	
	
	$output .= $menu_home;
	$output .= '</ul> </nav>';

	$output .= '</div>';//container
	
	$output .= '</div>';//.navbar-collapse
	//endmenu
	$output .= '</div>';
	
//     $output .= '<div class="col-md-2">';
// 	$output .=  '<nav id="mainMenu2" class="main-menu social-share"> <ul> <li> <i class="fa fa-share-alt"></i> </li></ul></nav>';
// 	$output .= '</div>';


	// $output .= '<div class="col-md-2 left">';
	
	//search
	// $output .= '<div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>';
	// $output .= '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" role="search">';
	// $output .= '<input type="search" name="s" class="form-control" value="" placeholder="' . esc_html__( 'Search item e.g. Active Citizens & press ', 'polo' ) . ' &quot;' . esc_html__( 'Enter', 'polo' ) . '&quot;">';
	// $output .= '</form>';
	// $output .= '</div>';
	//end search
}
// $output .= '</div>';
// $output .= '</div>';
$output .= '</div>';
//End secondary menu


// My voodoo goes here ;D 
$output .= '<div class="container mob-show">';
$output .= '<div class="col-sm-12 col-xs-12">';
// side A
$output .= '<div class="col-sm-6 col-xs-6">';

// Mobile Menu A
if ( ! ( true === $show_side_menu ) ) { //menu
	$output .= '<div class="navbar-collapse collapse main-menu-collapse navigation-wrap">';
	$output .= '<div class="container">';

	$output .= '<nav id="mainMenu" class="main-menu mega-menu">';
	$menu_home   = '';
	$menu_output = str_replace( 'class="main-menu nav nav-pills">', 'class="main-menu nav nav-pills">' . $menu_home, polo_main_menu() );
	$output .= $menu_output;
	$output .= '</nav>';

	$output .= '</div>';//container
	$output .= '</div>';//.navbar-collapse
	//endmenu
}
// End mobile menu A



$output .= '</div>';
// side B
$output .= '<div class="col-sm-6 col-xs-6 cont mob-show">';

// Mobile Menu side B
if ( ! ( true === $show_side_menu ) ) { //menu
	$output .= '<div class="secondary">';
	$output .= '<div class="container">';
	$output .= '<nav id="mainMenu2" class="sec-nav"><ul>';
	//$menu_home   = '<li><a href="' . esc_url( home_url( '/volunteer' ) ) . '"> Volunteer </a></li>';
	
	//$output .= $menu_home;
	$output .= '</ul></nav>';

	$output .= '</div>';//container
	$output .= '</div>';//.navbar-collapse
	//endmenu
	$output .= '</div>';
	
	$output .= '<div class="col-sm-6">';
	
	//search
	$output .= '<div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>';
	$output .= '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" role="search">';
	$output .= '<input type="search" name="s" class="form-control" value="" placeholder="' . esc_html__( 'Search item e.g. Active Citizens & press ', 'polo' ) . ' &quot;' . esc_html__( 'Enter', 'polo' ) . '&quot;">';
	$output .= '</form>';
	$output .= '</div>';
	//end search
}
// End mobile menu side B

$output .= '</div>';
// end sides
$output .= '</div>';
$output .= '</div>';

// And ends here


if ( ! ( true === $hide_search ) ) {
	//search
	$output .= '<div id="top-search"> <a id="top-search-trigger"><i class="fa fa-search"></i><i class="fa fa-close"></i></a>';
	$output .= '<form action="' . esc_url( home_url( '/' ) ) . '" method="get" role="search">';
	$output .= '<input type="search" name="s" class="form-control" value="" placeholder="' . esc_html__( 'Start typing & press ', 'polo' ) . ' &quot;' . esc_html__( 'Enter', 'polo' ) . '&quot;">';
	$output .= '</form>';
	$output .= '</div>';
	//end search
}

if ( true === $show_side_menu ) {
	if ( 'hidden' === $side_menu_style ) {
		$output .= '<div class="nav-main-menu-responsive shown-button">';
		$output .= '<button type="button" class="lines-button x">';
		$output .= '<span class="lines"></span>';
		$output .= '</button>';
		$output .= '</div>';

		$output .= '<div class="navigation-wrap">';
		$output .= '<nav id="mainMenu" class="style-1 main-menu slide-menu mega-menu">';
		$menu_home   = '<li><a href="' . esc_url( home_url( '/' ) ) . '"><i class="fa fa-home"></i></a></li>';
		$menu_output = str_replace( 'class="main-menu nav nav-pills">', 'class="main-menu nav nav-pills">' . $menu_home, polo_main_menu() );
		$output .= $menu_output;
		$output .= '</nav>';/*#mainMenu*/
		$output .= '</div>';/*navigation-wrap*/

	} else {
		$output .= '<div id="side-panel-button" class="side-panel-button">';
		$output .= '<button class="lines-button x" type="button">';
		$output .= '<span class="lines"></span>';
		$output .= '</button>';
		$output .= '</div>';
		ob_start();
		get_template_part( 'fragments/side-panel' );
		$output .= ob_get_clean();
	}
}


$output .= '</div>';//.container

$output .= '</div>';//#header-wrap



$output .= '</header>';//end header

if ( true === $meta_show_header ) {
	echo $output;
}


// Donate buttons

//$donate = '';

//$donate = '
//<div class="donate" style="min-height: 400px;">
//	<div class="container">
//	
//	<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
//		<center><h3> Donate your contribution</h3></center>
//	</div>
//	
//	<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12 paragraph">
//		<p> Your contribution goes towards enabling us reach out to more citizens and help amplify their voices. Donate from as low as $10 </p>
//	</div>
//	<div class="col-md-offset-3 col-md-6 col-sm-12 col-xs-12">
//		<center> <h5>Donate using Paypal</h5>
//		'.do_shortcode('[paypal]').' </center>
//	</div>
//	
//	</div>
//</div>
//';

//echo $donate;
