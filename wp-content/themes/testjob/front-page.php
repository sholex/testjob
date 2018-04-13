<?php
/**
 * The template for displaying static frontpage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package test
 */

get_header();
?>

<div class="container main-content">

    <div class="row row-info">
        <div class="col-md-4">
            <?php get_template_part('template-parts/frontpage', 'about');?>
        </div>

        <div class="col-md-8">
            <?php get_template_part('template-parts/frontpage', 'news');?>
        </div>
    </div>

</div>

<?php

get_footer();