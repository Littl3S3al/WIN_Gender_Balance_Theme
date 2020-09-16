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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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

	<!-- lines drawn between devices -->
	<div id="lines" class="d-none d-xl-block">
        <svg width="99vw" height="700vh" xmlns="http://www.w3.org/2000/svg">

        </svg>
    </div>

    <!-- loading screen -->
    <div class="load container-fluid">
        <div id="stripes"><div class="stripe red"></div><div class="stripe teal"></div><div class="stripe yellow"></div><div class="stripe purple"></div>
        </div>

        <div id="loading" class="d-flex justify-content-center align-items-center">
            <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/loader.gif" width="80px">
        </div>
    </div>

    <!-- nav bar -->
    <header class="container-fluid animate__animated animate__fadeInDown animate__delay-1s">
        <div class="row d-flex justify-content-between">
            <!-- main logo -->
            <div id="logo" class="col-2">
                <a href="#landing">
                    <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WIN_logo.png" alt="Women In News">
                </a>
            </div>
            <!-- all menu buttons -->
            <div id="menus" class="col-xs-19 d-flex justify-content-end align-items-center">

                <!-- progress menu button -->
                <button id="progress-menu" class="btn btn-center btn-round btn-warning">
                    <span class="sr-only">Check your progress</span>
                    <i class="fas fa-check"></i>
                </button>
                <!-- label for when menu is open -->
                <span id="menulable" class="d-none"></span>
                <!-- menu button -->
                <button id="menu" class="btn btn-center btn-round btn-secondary">
                    <span class="sr-only">Menu</span>
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- progress menu -->
    <div class="container-fluid menu-container offscreen" id="progress-menu-container">
        <div class="row">
            <!-- white screen -->
            <div id="progress-screen" class="d-none d-md-block col-md-4 col-xl-7 screen"></div>
            
            <!-- yellow portion of menu -->
            <div id="progress-content" class="col-12 col-md-8 col-xl-5 menu-card yellow"> 
                <div class="row sticky-top yellow menu-bar"></div>

                <!-- placeholder for all links -->
                <div class="row" id="progress-icons">

                </div>

                <!-- progress bar at the bottom -->
                <div class="row sticky" id="progress-bar-detailed">
                    <span id="progress-percentage">15%</span>
                    <div class="line-container-detailed">
                        <div class="progress-line-detailed">
                            <div class="progress-detailed"></div>
                        </div>
                    </div>
                    <span id="reset">Want to start over? Reset your progress.</span>
                </div>
            </div>

            
        </div>
    </div>

    <!-- main menu -->
    <nav class="container-fluid menu-container offscreen">
        <div class="row">
            <!-- white screen -->
            <div id="mainScreen" class="d-none d-md-block col-md-4 col-xl-7 screen"></div>
            <!-- menu section -->
            <div class="col-12 col-md-8 col-xl-5 menu purple menu-card"> 
                <div class="row sticky-top purple menu-bar"></div>
                <div class="row">
                    <div class="col-6">
                        <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WN_logo_white.png" alt="Women In News" class="w-100">
                    </div>
                    <div class="col-6">
                        <img src="<?php bloginfo ('stylesheet_directory'); ?>/assets/WANIFRA_LOGO_inverse_web.png" alt="WAN IFRA" class="w-100">
                    </div>
                </div>

                <!-- form row -->
                <div class="row">
                    <form id="keyword-search-form">
                        <div class="form-group  d-flex justify-content-center md-form form-sm mt-0">
                            <label for="search-document" class="sr-only">Search the Guide Book</label>
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <input type="text" class="form-control ml-3 w-100" id="search-document" aria-describedby="search form" placeholder="Search...">
                          </div>
                    </form>
                    <div class="col-12" id="keyword-row"></div>
                </div>

                <!-- links -->
                <div class="accordion row" id="main-menu-accordian">
                   
                </div> <!--accordian end-->
                <hr>
                <!-- additional links row -->
                <div class="row">
                    <div class="col-12">
                        <ul id="additional-items-list">

                            <?php $loop = new WP_Query( array('post_type' => 'additional', 'orderby' => 'post_id', 'order' => 'ASC'));?>

                            <?php while( $loop ->have_posts()) : $loop->the_post(); ?>
                                
                                <li class="additional-link" data-target="<?php the_field('data-target') ?>"><?php the_title(); ?></li>

                            <?php 
                                endwhile; 
                                wp_reset_query();
                            ?>

                            <li class="additional-link" data-target="glossary">Glossary</li>
                        </ul>
                    </div>
                </div>
                <!-- social sharing -->
                <div class="row">
                    <div class="col-12 text-left my-5">
                        <button class="btn btn-light"><i class="fab fa-facebook-f"></i></button>
                        <button class="btn btn-light"><i class="fab fa-twitter"></i></button>
                        <button class="btn btn-light"><i class="fab fa-instagram"></i></button>
                        <button class="btn btn-light"><i class="fab fa-linkedin-in"></i></button>
                        <button class="btn btn-light"><i class="fab fa-whatsapp"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- progress bar at the bottom -->
    <!-- progress bar on small screen -->
    <div id="micro-progress" class="container-fluid d-xl-none">
        <!-- mobile screen progress bar -->
        <div class="line-container">
            <div class="progress-line">
                <div class="progress"></div>
            </div>
        </div>
	</div>
	
    <!-- progress bar big screen -->
    <div  id="entire-progress" class="container-fluid d-none d-xl-block">

        <!-- bigger screen progress bar -->
        <div class="row">
            <div id="progress" class="entire-container col-xl-6 animate__animated animate__fadeInUp animate__delay-1s">
                <div class='line-container'>

                    <div class='progress-line'>
                      <div class='progress'>
                      
                      </div>
                       <div class='status'>
                         <div class='dot'>
                            <i class="fas fa-check"></i>
                         </div>
                      </div>
                      <div class='status'>
                         <div class='dot'>
                            <i class="fas fa-check"></i>
                         </div>
                      </div>
                      <div class='status'>
                         <div class='dot'>
                            <i class="fas fa-check"></i>
                         </div>
                      </div>
                      <div class='status'>
                         <div class='dot'>
                            <i class="fas fa-check"></i>
                         </div>
                      </div>
                      <div class='status'>
                         <div class='dot'>
                            <i class="fas fa-check"></i>
                         </div>
                      </div>
                      <div class='status'>
                        <div class='dot'>
                            <i class="fas fa-check"></i>
                        </div>
                     </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>