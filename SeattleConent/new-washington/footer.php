<?php
$prefix = 'tk_';
?>
</div><!-- .container -->
</section><!-- CONTENT ENDS -->

<!-- Div for styling purpose only 
<div class="blank_separator"></div>-->
                    <!-- Pre Footer -->
                  
<!-- Footer -->
<footer class="newfooter" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

<!-- Mobile Footer Design -->
<div class="container mobileFooterNew">

<div class="mobileFooterForm" style="width: 80%; margin: auto; text-align: center;">
            <div role="complementary" class="footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                <?php endif; ?>
            </div>
</div>

<div class="mobileFooterImage">
<img src="/wp-content/uploads/2016/11/footerLogoMobile.png" alt="The Advocates" />
</div>

      <div class="mobileFooterTextWrapper">
      <div class="mobileFooterDivLeft">
            <div class="mobileFooterAddress">
            Driggs Bill & Day PC<br>331 South 600 East<br>Salt Lake City, Utah 84102
            </div>
      </div>
      <div class="mobileFooterDivRight">
            <a style="color: #d6d4a4; text-decoration: none;" href="tel:+18013260809">801-326-0809</a>
      </div>

      </div>

      <div class="mobileSocialFooter">

      <a href="https://www.facebook.com/AdvocatesDriggsBillsDay" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-footer.jpg" /></a> <a href="https://twitter.com/utahadvocates" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter-footer.jpg" /></a><a href="https://www.linkedin.com/company/the-utah-advocates" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin-footer.jpg" /></a><a href="https://plus.google.com/+Utahadvocatesaccidentlawyers" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-plus-footer.jpg" /></a>
      </div>


</div>
<!-- END Mobile Footer Design -->



    <div class="container desktopFooter">
        <div class="row-fluid">
            <!-- Footer Widget 1 -->
            <div role="complementary" class="span3 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 1')) : ?>
                <?php endif; ?>
            </div>



            <!-- Static Footer Social 2-->
            <div role="complementary" class="span3 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <p>
                    <a href="https://www.facebook.com/TheWashingtonAdvocates/" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook-footer.jpg" /></a> <a href="https://twitter.com/DriggsBillsDay" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter-footer.jpg" /></a><a href="https://www.linkedin.com/company/driggs-bills-&-day-pc" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin-footer.jpg" /></a><a href="https://plus.google.com/114507120580881941004/posts" rel="nofollow" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/google-plus-footer.jpg" /></a>

                </p>
            </div>


            <!-- Footer Widget 3 -->
            <div role="complementary" class="span3 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">

               
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 2')) : ?>
                <?php endif; ?>
            </div>
            <!-- Footer Widget 4 -->
            <div role="complementary" class="span3 footer_widget" itemscope itemtype="http://schema.org/wpsidebar">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Widget 3')) : ?>
                <?php endif; ?>
            </div>



        </div>

    </div>  


<div style="width:100%;height:1px;background-color:#80a4b2;"></div>


      <!-- / pm container -->
    <div class="fullwidth footerNotes" style="background: #004865;text-align:center;">
        <div class="fullwidth"><br />
                    <div id="menu-main-menu" class="nav" itemscope itemtype="http://schema.org/SiteNavigationElement">
            <?php  wp_nav_menu( array( 'theme_location' =>'disclosure-menu' ) ); ?>
        </div>
                            <?php                        // COPYRIGHT
                            $copyright = get_theme_option(tk_theme_name . '_general_footer_copy');
                            if (empty($copyright)) {
                                $copyright =  __("&copy; Copyright 2013. ", tk_theme_name);
                            }
                            ?>
            <div class="fullwidth">
<!--old disclaimer here-->
<br>

                <div style="color:gray;text-align:center;">  <?php echo $copyright ; ?>   </div>
 <center>    <!--            <a href="http://www.copyscape.com/online-plagiarism/">
 <img src="http://banners.copyscape.com/images/cs-bk-3d-234x16.gif" alt="protected by copyscape online plagiarism checker" title="protected by copyscape plagiarism checker - do not copy content from this page." width="234" height="16" border="0"/></a>  -->
 <!-- Begin MagicYellow.com Link -->
<!-- <a href="http://www.magicyellow.com/profile/b33180101/" title="Utah Advocates">Utah Advocates</a> -->
<!-- End MagicYellow.com Link -->
</center>







            </div>
            <div class="fullwidth">


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