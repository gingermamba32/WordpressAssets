<?php
/**
*Template Name: snippets Page
*/

global $PAGE_ID;
	function faq_styles()
	{
		wp_register_style('faq-style', get_stylesheet_directory_uri() . '/custom-css/faq.css');
		wp_enqueue_style('faq-style');
	}
add_action('wp_enqueue_scripts', 'faq_styles');
 // wp_enqueue_script("jquery");
// function faq_scripts_method() {
// 	wp_enqueue_script( 	'custom-script', CHILD_URL . '/js/jquery-ui-1.8.4.custom.min.js', array( 'jquery' ) );
// 	wp_enqueue_script( 	'scrollTo', CHILD_URL . '/js/jquery.scrollTo.js', array( 'jquery' ) );
// 	wp_enqueue_script( 	'main', CHILD_URL . '/js/main.js', array( 'jquery' ) );
// }
// add_action( 'wp_enqueue_scripts', 'fag_scripts_method' );
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
<script   type="text/javascript">
	jQuery(document).ready(function($){
	$("div#questions ul li a").click(function(){
		var selected = $(this).attr('href');
		selected += '"'+selected+'"'
		$('.top-button').remove();
		$('.current-faq').removeClass();
		$.scrollTo(selected, 400 ,function(){
			$(selected).addClass('current-faq',400,function(){
				$(this).append('<a href="#" class="top-button">TOP</a>');
			});
		});
		return false;
	});
	$('.top-button').live('click',function(){
		$('.top-button').remove();
		$('.current-faq').removeClass('current-faq',400,function(){
			$.scrollTo('0px', 800);
		});
		return false;
	})
	$('.top-button').live('click',function(){
		$(this).remove();
		$('.current-faq').removeClass('current-faq',400,function(){
			$.scrollTo('0px', 800);
		});
		return false;
	})
});


;(function( $ ){

	var $scrollTo = $.scrollTo = function( target, duration, settings ){
		$(window).scrollTo( target, duration, settings );
	};
	$scrollTo.defaults = {
		axis:'xy',
		duration: parseFloat($.fn.jquery) >= 1.3 ? 0 : 1
	};
	// Returns the element that needs to be animated to scroll the window.
	// Kept for backwards compatibility (specially for localScroll & serialScroll)
	$scrollTo.window = function( scope ){
		return $(window)._scrollable();
	};
	// Hack, hack, hack :)
	// Returns the real elements to scroll (supports window/iframes, documents and regular nodes)
	$.fn._scrollable = function(){
		return this.map(function(){
			var elem = this,
				isWin = !elem.nodeName || $.inArray( elem.nodeName.toLowerCase(), ['iframe','#document','html','body'] ) != -1;
				if( !isWin )
					return elem;
			var doc = (elem.contentWindow || elem).document || elem.ownerDocument || elem;

			return $.browser.safari || doc.compatMode == 'BackCompat' ?
				doc.body :
				doc.documentElement;
		});
	};
	$.fn.scrollTo = function( target, duration, settings ){
		if( typeof duration == 'object' ){
			settings = duration;
			duration = 0;
		}
		if( typeof settings == 'function' )
			settings = { onAfter:settings };

		if( target == 'max' )
			 target = 9e9;

		settings = $.extend( {}, $scrollTo.defaults, settings );
		// Speed is still recognized for backwards compatibility
		duration = duration || settings.speed || settings.duration;
		// Make sure the settings are given right
		settings.queue = settings.queue && settings.axis.length > 10;

		if( settings.queue )
			// Let's keep the overall duration
			duration /= 5;
		settings.offset = both( settings.offset );
		settings.over = both( settings.over );
		return this._scrollable().each(function(){
			var elem = this,
				$elem = $(elem),
				targ = target, toff, attr = {},
				win = $elem.is('html,body');
			switch( typeof targ ){
				// A number will pass the regex
				case 'number':
				case 'string':
					if( /^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ) ){
						targ = both( targ );
						// We are done
						break;
					}
					// Relative selector, no break!
					targ = $(targ,this);
				case 'object':
					// DOMElement / jQuery
					if( targ.is || targ.style )
						// Get the real position of the target
						toff = (targ = $(targ)).offset();
			}
			$.each( settings.axis.split(''), function( i, axis ){
				var Pos	= axis == 'x' ? 'Left' : 'Top',
					pos = Pos.toLowerCase(),
					key = 'scroll' + Pos,
					old = elem[key],
					max = $scrollTo.max(elem, axis);
				if( toff ){// jQuery / DOMElement
					attr[key] = toff[pos] + ( win ? -100 : old - $elem.offset()[pos] );
					// If it's a dom element, reduce the margin
					if( settings.margin ){
						attr[key] -= parseInt(targ.css('margin'+Pos)) || 0;
						attr[key] -= parseInt(targ.css('border'+Pos+'Width')) || 0;
					}

					attr[key] += settings.offset[pos] || 0;

					if( settings.over[pos] )
						// Scroll to a fraction of its width/height
						attr[key] += targ[axis=='x'?'width':'height']() * settings.over[pos];
				}else{
					var val = targ[pos];
					// Handle percentage values
					attr[key] = val.slice && val.slice(-1) == '%' ?
						parseFloat(val) / 100 * max
						: val;
				}
				// Number or 'number'
				if( /^\d+$/.test(attr[key]) )
					// Check the limits
					attr[key] = attr[key] <= 0 ? 0 : Math.min( attr[key], max );
				// Queueing axes
				if( !i && settings.queue ){
					// Don't waste time animating, if there's no need.
					if( old != attr[key] )
						// Intermediate animation
						animate( settings.onAfterFirst );
					// Don't animate this axis again in the next iteration.
					delete attr[key];
				}
			});
			animate( settings.onAfter );
			function animate( callback ){
				$elem.animate( attr, duration, settings.easing, callback && function(){
					callback.call(this, target, settings);
				});
			};
		}).end();
	};

	// Max scrolling position, works on quirks mode
	// It only fails (not too badly) on IE, quirks mode.
	$scrollTo.max = function( elem, axis ){
		var Dim = axis == 'x' ? 'Width' : 'Height',
			scroll = 'scroll'+Dim;

		if( !$(elem).is('html,body') )
			return elem[scroll] - $(elem)[Dim.toLowerCase()]();

		var size = 'client' + Dim,
			html = elem.ownerDocument.documentElement,
			body = elem.ownerDocument.body;
		return Math.max( html[scroll], body[scroll] )
			 - Math.min( html[size]  , body[size]   );

	};
	function both( val ){
		return typeof val == 'object' ? val : { top:val, left:val };
	};
	// var second_child = document.getElementById('container').firstChild.nextSibling;
	// 		$('#container').scrollTo( second_child, { duration:500, axis:'x', onAfter:function(){
	// 			alert('scrolled!!');
	// 		}});
})( jQuery );
</script>
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
            <div id="content" class="span8 <?php if($sidebar_postition == 'right'){echo 'span8 pull-left';}elseif($sidebar_postition == 'left'){echo 'span8 pull-right';}elseif($sidebar_postition == 'fullwidth'){echo 'span12';}?>">
                <!-- Post -->
                <article class="faq" <?php echo $padding; ?> style="background: #fff;">

<?php query_posts('post_type=faq&name=dog-bite-injury'); ?>
http://utah.dev/wp-admin/edit-tags.php?action=edit&taxonomy=faq-type&tag_ID=1769
<?php
$args = array(
  'post_type'   => 'faq',
  'tax_query' => array(
		array(
			'taxonomy' => 'faq-type',
			 'tag_ID' => '1769'
			// 'terms' => 'bannertop'
		)
	)
);
query_posts($args);

while ( have_posts() ) : the_post(); ?>
<h3><?php the_title()?></h3>
<?php the_content()?>
<?php endwhile; wp_reset_query(); ?>

the title attribute: <?php the_title_attribute(); ?><br />
the title: <?php the_title(); ?><br />
the author: <?php the_author();?><br />
tk headline: <?php echo esc_html(get_post_meta($post->ID, 'tk_headline', true));?><br />
the category: <?php the_category(); ?><br />
postdate2: <?php echo $postDate2; ?><br />
<?php $postDate = get_the_date('c'); $postDate2 = get_the_date('d.m.Y'); echo $postDate ?><br />
Posted in <?php the_category(', '); ?> <br />
<br />

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="post hentry hnews"><!-- START OF POST -->
<h1 class="entry-title url"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
<span class="meta"><time class="updated" datetime="<?php $postDate = get_the_date('c'); $postDate2 = get_the_date('d.m.Y'); echo $postDate ?>" pubdate>
<?php echo $postDate2; ?></time> | <span class="byline vcard"><span class="fn author"><?php the_author();?></span> | <?php the_category(''); ?></span> | <span class="org"><?php bloginfo('name'); ?></span></span>
     <div class="postContent entry-content">
     <?php the_content(); ?>
     <p class="postmetadata">Posted in <?php the_category(', '); ?> | Tags: <?php the_tags(); ?></p>
     </div>
                </article><!-- END OF POST -->
<?php endwhile; endif;?>


<?php
// $args=array(
//   'taxonomy' => 'factorytype'
//   'term' => 'small-factory',
//   'post_type' => 'factory',
//   'posts_per_page' => 10,
//   'caller_get_posts'=> 1http://utah.dev/wp-admin/edit-tags.php?action=edit&taxonomy=faq-type&tag_ID=1769
// );
query_posts('faq-type=1769&post_type=faq&order=ASC'); ?>
	<?php if (have_posts()) : ?>
		<h3 style="padding:15px;">FAQs</h3>
		<div id="questions"  style="padding:15px;">
			<ul>
				<?php while (have_posts()) : the_post(); ?>
					<li><a onClick="ga('send', 'event', 'FAQ', 'click', '<?php the_title(); ?>']);" href="#answer<?php the_id() ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php else : ?>
		<h3>Not Found</h3>
		<p>Sorry, No FAQs created yet.</p>
	<?php endif; ?>
	<?php rewind_posts(); ?>
	<?php if (have_posts()) : ?>	</div>	  <br style="clear:both" />			</div>		</div>	</div>	</div>	</div>
		<div id="answers"  style="background: #baba95; padding:15px;">
		   <div class="container" >
		   <br style="clear:both" />
			<ul>
				<?php while (have_posts()) : the_post(); ?>
					<li id="answer<?php the_id(); ?>"><h4><?php the_title(); ?></h4><?php the_content(); ?></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
</div>
                </article><!--/blog_post-->
            </div><!-- #content -->
            <!-- Sidebar Left -->
            <?php
                if ($sidebar_postition == 'left'){
                    echo '<div class="span4 pull-left" style="margin-left:0px;">';
                        tk_get_sidebar('Left', $sidebar_select);
                    echo '</div>';
                }
            ?>
            <!-- Sidebar Right -->

<?php
// $args = array( 'post_type' => 'faq', 'posts_per_page' => 5 );
// $loop = new WP_Query( $args );
// while ( $loop->have_posts() ) : $loop->the_post();
// echo '<div class="">'. the_title() .'<span class="arvo">';
// the_content();
// echo '</span><p class="arvo"> ';
//     the_title();
//     echo '</p>';
//     echo '</div>';
// endwhile
 ?>
        </div><!-- row-fluid -->
<?php get_footer(); ?>
