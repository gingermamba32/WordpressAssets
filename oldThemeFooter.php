<?php
$prefix = 'tk_';
?>
</div><!-- .container -->
</section><!-- CONTENT ENDS -->

<!-- Div for styling purpose only -->
<div class="blank_separator"></div>
                    <!-- Pre Footer -->
                    <?php
                    // ONE TWEET
                    $enable_twitter = get_theme_option(tk_theme_name . '_general_enable_home_twitter');
                    if ($enable_twitter == 'yes') { ?>
                    <?php twitter_script('home', 1); ?>
                    <?php } // if Twitter  ?>
<!-- Footer -->
<footer role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="container">
        <div class="row-fluid">
            <!-- Footer Widget 1 -->
            <div role="complementary" class="span4 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                <?php endif; ?>
            </div>
            <!-- Footer Widget 2 -->
            <div role="complementary" class="span4 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <div class="pricing-table-one-top" style="background: #6d6a4c;">
                    <span style="color: #fff;">Settlements &amp; Payouts </span>
                    <p style="color: #fff;">RECENT</p>
                </div>
                <?php
                $args = array( 'post_type' => 'payouts', 'posts_per_page' => 5 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                    //  $permalink = get_permalink( $id );
                echo '<div class="pricing-table-one-center pricing-table-white">
                ';
                //echo post_permalink( $ID );
                echo '
                <?php echo $payout; ?>
                <span class="arvo">';
                        //echo esc_html(get_post_meta($post->ID, 'settledby', true));
                    the_title();
                    echo '</span>
                 <p class="arvo"> ';
                echo esc_html(get_post_meta($post->ID, 'payout', true));
                echo '</p>';
                echo '</div>';
                endwhile
                ?>
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                <?php endif; ?>
            </div>
            <!-- Footer Widget 3 -->
            <div role="complementary" class="span4 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <div class="row-fluid">
            <div class="span12">
                <img src="<?php echo get_template_directory_uri(); ?>/style/images/separator.png" alt="separator" />
            </div>
        </div>
        <div id="menu-main-menu" class="nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php  wp_nav_menu( array( 'theme_location' =>'disclosure-menu' ) ); ?>
        </div>
    </div>    <!-- / pm container -->
    <div class="row-fluid copyright_wrap" style="background: #004865;">
        <div class="container">
                            <?php                        // COPYRIGHT
                            $copyright = get_theme_option(tk_theme_name . '_general_footer_copy');
                            if (empty($copyright)) {
                                $copyright =  __("&copy; Copyright 2013. ", tk_theme_name);
                            }
                            ?>
            <div class="span8">
<!--old disclaimer here-->
<br>

                <p style="color:gray;">  <?php echo $copyright ; ?>   </p>
 <center>    <!--            <a href="http://www.copyscape.com/online-plagiarism/">
 <img src="http://banners.copyscape.com/images/cs-bk-3d-234x16.gif" alt="protected by copyscape online plagiarism checker" title="protected by copyscape plagiarism checker - do not copy content from this page." width="234" height="16" border="0"/></a>  -->
 <!-- Begin MagicYellow.com Link -->
<!-- <a href="http://www.magicyellow.com/profile/b33180101/" title="Utah Advocates">Utah Advocates</a> -->
<!-- End MagicYellow.com Link -->
</center>







            </div>
            <div class="span4">

                <div class="pull-right">
                    <?php /*---SOCIAL ICONS---*/
                    $twitter_acc = get_theme_option(tk_theme_name.'_social_twitter');
                    $facebook_acc = get_theme_option(tk_theme_name.'_social_facebook');
                    $rss_acc = get_theme_option(tk_theme_name.'_social_rss_url');
                    $google_acc = get_theme_option(tk_theme_name.'_social_google_plus');
                    $linkedin_acc = get_theme_option(tk_theme_name.'_social_linkedin');
                    $instagram_acc = get_theme_option(tk_theme_name . '_social_instagram');
                    $flickr_acc = get_theme_option(tk_theme_name . '_social_flickr');
                    if ($twitter_acc != '' || $facebook_acc != '' || $rss_acc != '' || $google_acc != '' || $linkedin_acc != '' || $instagram_acc != '' || $flickr_acc != '') {
                        ?>
                        <ul class="social pull-left rounded">
                            <?php if (!empty($flickr_acc)) { ?>
                            <li>
                                <div class="soc-ikons-1 left">
                                    <a class="social_flickr" href="http://flickr.com/<?php echo $flickr_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (!empty($instagram_acc)) { ?>
                            <li>
                                <div class="soc-ikons-2 left">
                                    <a class="social_instagram" href="http://instagram.com/<?php echo $instagram_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (!empty($twitter_acc)) { ?>
                            <li>
                                <div class="soc-ikons-3 leftt">
                                    <a class="social_twitter" href="http://twitter.com/<?php echo $twitter_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (!empty($facebook_acc)) { ?>
                            <li>
                                <div class="soc-ikons-4 left">
                                    <a class="social_facebook" href="http://facebook.com/<?php echo $facebook_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (($rss_acc != '')) { ?>
                            <li>
                                <div class="soc-ikons-5 left">
                                    <a class="social_rss" href="<?php echo $rss_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (!empty($linkedin_acc)) { ?>
                            <li>
                                <div class="soc-ikons-6 left">
                                    <a class="social_linkedin" href="<?php echo $linkedin_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                            <?php if (!empty($google_acc)) { ?>
                            <li>
                                <div class="soc-ikons-7 left">
                                    <a class="social_google_plus" href="http://plus.google.com/<?php echo $google_acc; ?>">
                                    </a>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } // if check one by one ?>
                        <div id="top" class="pull-left">
                            <a class="top_btn rounded" href="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>          <!-- /container -->
</footer>
    <!-- Google +1 -->



<!-- Marketing Method -->
<script type="text/javascript"> 
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://methodapi.com//";
    _paq.push(['setTrackerUrl', u+'tracker.php']);
    _paq.push(['setSiteId', 117]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'tracker.js'; s.parentNode.insertBefore(g,s);
  })();

</script>
<noscript><p><img src="http://methodapi.com/tracker.php?idsite=117" style="border:0" alt="" /></p></noscript>
<!-- End Marketing Method Code -->


        <?php wp_footer();?>
</body>
</html>