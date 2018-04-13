<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">


    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/solid.js" integrity="sha384-P4tSluxIpPk9wNy8WSD8wJDvA8YZIkC6AQ+BfAFLXcUZIPQGu4Ifv4Kqq+i2XzrM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/regular.js" integrity="sha384-BazKgf1FxrIbS1eyw7mhcLSSSD1IOsynTzzleWArWaBKoA8jItTB5QR+40+4tJT1" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/fontawesome.js" integrity="sha384-2IUdwouOFWauLdwTuAyHeMMRFfeyy4vqYNjodih+28v2ReC+8j+sLF9cK339k5hY" crossorigin="anonymous"></script>


    <?php wp_head(); ?>
</head>
<body>
<div class="container">
    <div class="row header-info">
        <a href="<?php echo home_url();?>">
            <img class="col-md-2" src="<?php echo get_template_directory_uri(); ?>/images/logo.png">
        </a>

        <span class="col-md-3">+380 789 45 32</span>
    </div>
</div>


<!-- Static navbar -->
<div class="container-fluid bg-grey">
    <div class="container">
        <div class="frontpage-wrapper">
            <nav class="navbar navbar-default">
                <div class="">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontpage-navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <div id="frontpage-navbar" class="navbar-collapse collapse">

	                        <?php
	                        wp_nav_menu( array(
		                        'items_wrap'        => '<ul id="%1$s" class="nav navbar-nav">%3$s</ul>',
                                'container'         => false,
                                'theme_location'    => 'menu-1',
                                'menu_id'           => 'primary-menu',
	                        ) );
	                        ?>



                        <div class="col-md-3 navbar-right-custom pull-right">
	                        <?php dynamic_sidebar( 'top-sidebar' ); ?>

<!--                            <form>-->
<!--                                <div class="form-group searchform">-->
<!--                                    <input type="text" class="form-control" placeholder="Поиск">-->
<!--                                </div>-->
<!--                            </form>-->
                        </div>
                    </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>


	        <?php if(is_front_page()) get_template_part('template-parts/frontpage', 'slider');?>

        </div><!-- !frontpage-wrapper -->
    </div><!-- !container -->
</div><!--!container-fluid -->


