<?php
/*
YARPP Template: List
Description: This template returns the related posts as a comma-separated list.
Author: mitcho (Michael Yoshitaka Erlewine)
*/
?><h3>Related Posts</h3>

<?php if (have_posts()):
	$postsArray = array();
	while (have_posts()) : the_post();
		$postsArray[] = '<a itemprop=" relatedLink url" href="'.get_permalink().'" rel="bookmark"> <span itemprop="name" >'.get_the_title().'</span></a><!-- ('.get_the_score().')-->';
	endwhile;

echo implode(', '."\n",$postsArray); // print out a list of the related items, separated by commas

else:?>

<p>No related posts.</p>
<?php endif; ?>
