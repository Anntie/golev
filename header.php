<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="HandheldFriendly" content="True" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>
<body>
<nav class="pushy pushy-right">
	    <? wp_nav_menu(array('menu' => 'golev-menu', 'menu_class' => 'golev-menu')); ?>
		<div id="madeinua"></div>
</nav>
<div class="site-overlay"></div>
<div id="wrapper">
	<header>
		<div id="logo" class="float-left"><a style="text-decoration:none;" href="/"><h1 class="logo-h1">Golev</h1></a></div>
		<div class="float-right menu-btn" id="menu"></div>
	</header>
	<?php if(is_home() || is_front_page()) include("top.php"); ?>