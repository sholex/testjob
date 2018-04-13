<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package test
 */

?>

<footer class="container-fluid text-center">
    <div class="container">
        <div class="row">
            <img class="col-md-2" src="<?php echo get_template_directory_uri(); ?>/images/logo-footer.png">
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>