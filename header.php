<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gender_Balance_Content_WIN
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- bootstrap js -->
    <link rel="stylesheet" href="<?php bloginfo ('stylesheet_directory'); ?>/bootstrap-4.1.3-dist/css/bootstrap.min.css">

    <!-- animate on scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- link to fontawesome -->
    <link rel="stylesheet" href="<?php bloginfo ('stylesheet_directory'); ?>/assets/fontawesome/css/all.min.css">

    <?php wp_head(); ?>
    
    <style>
        @import url("https://fast.fonts.net/lt/1.css?apiType=css&c=94e59f4e-16c2-44e3-81d2-766aa67b34fd&fontids=1475512,1475536");
        @font-face{
            font-family:"Avenir LT W04_45 Book1475512";
            src:url("<?php bloginfo ('stylesheet_directory'); ?>/Fonts/1475512/fe2d00d9-aadd-40f7-a144-22a6f695aa8f.woff2") format("woff2"),url("<?php bloginfo ('stylesheet_directory'); ?>/Fonts/1475512/c3795fc9-e264-4795-9a19-b57086aa6f7b.woff") format("woff");
        }
        @font-face{
            font-family:"Avenir LT W04_65 Medium1475536";
            src:url("<?php bloginfo ('stylesheet_directory'); ?>/Fonts/1475536/7839a002-2019-46e4-8db8-c8335356ceee.woff2") format("woff2"),url("<?php bloginfo ('stylesheet_directory'); ?>/Fonts/1475536/28433854-a1b7-4a30-b6a4-10c3a5c75494.woff") format("woff");
        }
    </style>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text sr-only" href="#primary"><?php esc_html_e( 'Skip to content', 'gender-balance-content-win' ); ?></a>

	