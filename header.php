
<!DOCTYPE html>
<html <?php language_attributes(); ?>>  
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">

		<title><?php bloginfo('name'); ?></title>

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(''); ?>>
		<?php do_action( 'after_body_tag' ); ?>

        <header class="site-header w-full relative block z-[100] bg-red-300 h-20">
			<div class="container py-5 px-8 xl:px-0">
				<figure class="logo h-16 lg:h-24 w-52 lg:w-80 relative block z-50 left-0">
					<a href="/">
						<img src="<?php echo get_bloginfo('stylesheet_directory') . '/assets/img/hagemans-logo-svg.svg' ?>" class="h-full w-full object-contain" />
					</a>
				</figure>

				<nav class="top-nav absolute hidden lg:block right-0 lg:right-8 xl:right-0 top-2 w-auto text-base border-b border-mediumgrey pb-1 pl-10 text-mediumgrey hover:text-darkgrey transition-color duration-200">
					<?php wp_nav_menu(array('theme_location' => 'top')) ?>
				</nav>

				<nav class="navigation block nav-main absolute right-auto lg:right-8 xl:right-0 bottom-10 w-auto text-darkgrey transition duration-300 z-[100] -left-[200%] lg:left-auto">
					<?php wp_nav_menu(array('theme_location' => 'main')) ?>
				</nav>

				<div class="js-toggle-nav menu-button cursor-pointer lg:hidden absolute right-8 h-6 w-8 top-1/2 -translate-y-1/2 z-50">
					<i></i>
					<i></i>
					<i></i>
				</div>
			</div>
		</header>	
		
		<main class="wrapper h-full w-full clearfix">
