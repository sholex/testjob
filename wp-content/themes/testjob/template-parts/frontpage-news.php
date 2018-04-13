<?php
//Getting frontpage news data from options page
$news_group = get_field('news_group', 'option');

?>


<h2><?php echo $news_group['title']; ?></h2>

<?php
// setting args
$args = array(
	'posts_per_page' => $news_group['news_to_show'],
	'post_type' => 'news'
);

$wp_query = new WP_Query( $args );

// news loop
if ( $wp_query->have_posts() ) {
	while ( $wp_query->have_posts() ) {
		$wp_query->the_post();
		get_template_part('template-parts/frontpage_news', 'content');
	}
} else {
	// nothing
}
/* Resetting $post. */
wp_reset_postdata();
?>