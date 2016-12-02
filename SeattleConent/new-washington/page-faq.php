<?php
/**
*Template Name: FAQ Page
*/
global $PAGE_ID;
function faq_styles()
{
wp_register_style('faq-style', get_stylesheet_directory_uri() . '/custom-css/faq.css');
wp_enqueue_style('faq-style');
}
add_action('wp_enqueue_scripts', 'faq_styles');
$prefix = 'tk_';
// Blog Page ID
$tk_blog_id = get_option('id_blog_page');
/* Blog Page title */
$blog_headline = get_post_meta($tk_blog_id, $prefix . 'headline', true);
/* Single Post featured image */
$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
/* Single Post sidebar */
$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);
if($sidebar_postition == ''){$sidebar_postition = get_post_meta($post->ID, $prefix.'sidebar_position', true);};
/* Content padding */
if ($sidebar_postition == 'right'){
$padding = 'style="padding-right:20px;"';
}else if($sidebar_postition == 'left'){
$padding = 'style="padding-left:20px;"';
}else{
$padding = '';
}
/* Selected sidebar */
$sidebar_select = get_post_meta($post->ID, $prefix . 'sidebar', true);
get_header();
?>
<!-- CONTENT STARTS -->
<section>
<div class="container" >
<?php
echo '<div class="span4 pull-right">';
tk_get_sidebar('Right', $sidebar_select);
echo '</div>';
?>
<!-- Page Content -->
<div class="row-fluid">
	<!-- Main Content -->
	<div id="content" class="span8 <?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>
		">
		<!-- Post -->
		<article class="faq" <?php echo $padding; ?>
			style="background: #fff;">
			<?php query_posts('post_type=faq&faq-type=dog-bite-injury&posts_per_page=15&order=DESC'); ?>
			<?php if (have_posts()) : ?>
			<h3 style="padding:15px;"><?php the_title()?></h3>
			<div id="questions"  style="padding:15px;">
				<ul>
					<?php while (have_posts()) : the_post(); ?>
					<li style="line-height:normal"><a onClick="ga('send', 'event', 'FAQ', 'click', '<?php the_title(); ?>']);" href="#answer<?php the_id() ?>"><?php the_title(); ?></a></li>
					<?php endwhile; ?>
				</ul>
			</div>
			<?php else : ?>
			<h3>Not Found</h3>
			<p>Sorry, No FAQs created yet.</p>
			<?php endif; ?>
			<?php rewind_posts(); ?>
			<?php if (have_posts()) : ?></div>
		<br style="clear:both" />
	</div>
</div>
</div>
</div>
</div>
<div id="answers"  style="background: #baba95; padding:15px;">
<div class="container" >
<br style="clear:both" />
<ul>
<?php while (have_posts()) : the_post(); ?>
<li id="answer<?php the_id(); ?>"><h4><?php the_title(); ?></h4><?php the_content(); ?></li>
<?php endwhile; ?></ul>
</div>
<?php endif; ?>
<?php wp_reset_query(); ?></div>
<br />
</article>
<!--/blog_post-->
</div>
<!-- #content -->
<!-- Sidebar Left -->
<?php
if ($sidebar_postition == 'left'){
echo '<div class="span4 pull-left" style="margin-left:0px;">';
tk_get_sidebar('Left', $sidebar_select);
echo '</div>';
}
?>


</div><!-- row-fluid -->
<?php get_footer(); ?>
