<?php
//Getting frontpage about us data from options page
$about_group = get_field('about_group', 'option');
?>

<h2><?php echo $about_group['title']; ?></h2>

<div class="text-wrapper">
	<?php echo $about_group['content']; ?>
</div>