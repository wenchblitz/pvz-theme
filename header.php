<?php
	/**
	 * The Header for our theme.
	 *
	 * Displays all of the <head> section and everything up till <div id="main">
	 *
	 * @package WordPress
	 * @subpackage Twenty_Ten
	 * @since Twenty Ten 1.0
	 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
    

    <meta name="title" content="PlantsVsZombies" />
    <meta name="description" content="PVZ Theme" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="image_src" type="image/jpeg" href="<?php bloginfo('template_url');?>/images/PVZ-logo.png" />
    <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon"/>

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/html5.js"></script>
    <!--<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.inputhints.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/scripts/jquery.inputhints.min.js"></script>

	<!--Conditional Stylesheets-->
        <!--[if !IE]><!-->
	        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/reset.css"/>
            <link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/> 
        <!--<![endif]-->
        
        <!--[if IE]>  
	        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/reset.css"/>
            <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_directory'); ?>/ie-style.css"/>  
        <![endif]--> 
	<!--//Conditional Stylesheets-->

<script type="text/javascript">
	//Textbox Description
	$(document).ready(function(){
		$('input[title]').inputHints();
		$('textarea[title]').inputHints();
	});
</script>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

<div id="outer-wrapper">
    <div id="inner-wrapper">
    	<header>
        	<div class="header-logo"><h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><h2>"<?php bloginfo('description'); ?>"</h2></div><!--.header-logo-->
            
            <div class="pvz-logo"><h1>PVZ Logo</h1></div><!--.pvz-logo-->
            
            <div class="pvz-searhform">
                <?php get_search_form(); ?>
                <span><div class="snail">Snail</div></span>
            </div>
        </header>
        
        	<div class="clear"></div>
        
        <nav>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
        </nav>
        	
            <div class="clear"></div>
            
		<div id="container">
        	<div class="border-top">&nbsp;</div>
            <div id="content-wrapper">