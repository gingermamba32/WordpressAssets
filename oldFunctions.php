<?php
if ( !is_admin() ){
if(extension_loaded("zlib") && (ini_get("output_handler") != "ob_gzhandler"))
   add_action('wp', create_function('', '@ob_end_clean();@ini_set("zlib.output_compression", 1);'));
}


require_once get_stylesheet_directory() . '/inc/post-types.php';
require_once (get_stylesheet_directory() . '/inc/twitter_bootstrap_nav_walker.php');
function load_child_class(){
require_once locate_template( '/inc/meta-boxes.php' );
}
add_action( 'after_setup_theme', 'load_child_class' );

//////////////////////////////////////////////////////////////////////////////
//  Get google fonts and cache them    on_sent_ok: "ga('send', 'pageview', '/your/url');"
/////////////////////////////////////////////////////////////////////////////
if ( !is_admin() ){
function epic_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'Arimo-font', "$protocol://fonts.googleapis.com/css?family=Arvo" );
    wp_enqueue_style( 'Oswald-font', "$protocol://fonts.googleapis.com/css?family=PT Sans" );
}
add_action( 'wp_enqueue_scripts', 'epic_fonts' );
}

//////////////////////////////////////////////////////////////////////////////
//  fix excerpt pm
/////////////////////////////////////////////////////////////////////////////


if ( !is_admin() ){

}
//////////////////////////////////////////////////////////////////////////////
//  fix excerpt pm
/////////////////////////////////////////////////////////////////////////////
if ( !is_admin() ){
function the_excerpt_dynamic($length) { // Outputs an excerpt of variable length (in characters)
global $post;
$text = $post->post_exerpt;
if ( '' == $text ) {
$text = get_the_content('');
$text = apply_filters('the_content', $text);
$text = str_replace(']]>', ']]>', $text);
}
$text = strip_shortcodes( $text ); // optional, recommended
$text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' to keep some formats; optional

$text = substr($text,0,$length).' [...]';
echo apply_filters('the_excerpt',$text);
}
}

if ( !is_admin() ){
function tk_child_add_stylesheet() {
    // wp_register_style('fancybox', get_template_directory_uri() . '/script//fancybox/source/jquery.fancybox.css');
    // wp_enqueue_style('fancybox');
    // if (is_archive() || is_search() || is_single() || is_page_template('page-templates/_blog.php') || is_category()) {
    //     wp_register_style('jplayer', get_template_directory_uri() . '/script/jplayer/skin/blue.monday/jplayer.blue.monday.css');
    //     wp_enqueue_style('jplayer');
 }
add_action('wp_enqueue_scripts', 'tk_child_add_stylesheet');
}
/*************************************************************/

//////////////////////////////////////////////////////////////////////////////
//  force_compress
/////////////////////////////////////////////////////////////////////////////
// add_action('wp_enqueue_scripts', 'force_compress');
// function force_compress()
// {
//     global $compress_scripts, $concatenate_scripts;
//     $compress_scripts = 1;
//     $concatenate_scripts = 1;
if ( !is_admin() ){

              /*************************************************************/
               function load_external_jQuery() { // load external file
               //if (is_page_template('taxonomy-faqtype.php')  ) {
                 if (is_page_template('taxonomy-faqtype.php') || is_archive()) {
                // if (is_archive()){
              // if (is_page_template('taxonomy-faqtype.php') ) {
                   wp_deregister_script( 'jquery' );
               wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js', false, false, true); // register the external file
              wp_enqueue_script('jquery');
              }
                }
              add_action('wp_enqueue_scripts', 'load_external_jQuery');



              function tk_child_scripts() {
                wp_enqueue_script('jquery');
               wp_enqueue_script('jquery.ga.min', get_stylesheet_directory_uri() . '/js/jquery.ga.min.js', array( 'jquery' ), false, false, true);
 wp_enqueue_script('responsive-elements', get_stylesheet_directory_uri() . '/js/responsive-elements.js', array( 'jquery' ), false, true, true);
               // wp_enqueue_script('jquery.form-tracker.min', get_stylesheet_directory_uri() . '/js/jquery.form-tracker.min.js', array( 'jquery' ), false, false, true);
             // wp_enqueue_script('flowtype', get_stylesheet_directory_uri() . '/js/flowtype.js', array( 'jquery' ), false, false, true);
            //      wp_enqueue_script('jquery.responsivetext', get_stylesheet_directory_uri() . '/js/jquery.responsivetext.js', array( 'jquery' ), false, false, true);
                  // if (is_page_template('page-faq.php') || is_page()) {
                 if (is_page_template('taxonomy-faqtype.php') || is_archive()) {
                 // wp_enqueue_script('schema', get_stylesheet_directory_uri() . '/js/jquery.microdata.js', array( 'jquery' ), false, false, true);
                 //    wp_enqueue_script('micro', get_stylesheet_directory_uri() . '/js/schemas.js', array( 'jquery' ), false, false, true);
                     // wp_enqueue_script('willy', get_stylesheet_directory_uri() . '/js/jquery-ui-1.8.4.custom.min.js', array( 'jquery' ), false, false, true);
                     //   wp_enqueue_script('scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.js', array( 'jquery' ), false, false, true);
                     //     wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), false, false, true);
                  }
               if (is_page_template('page-small-banner.php') ) {
                 // wp_enqueue_script('schema', get_stylesheet_directory_uri() . '/js/jquery.microdata.js', array( 'jquery' ), false, false, true);
                 //    wp_enqueue_script('micro', get_stylesheet_directory_uri() . '/js/schemas.js', array( 'jquery' ), false, false, true);
                     // wp_enqueue_script('willy', get_stylesheet_directory_uri() . '/js/jquery-ui-1.8.4.custom.min.js', array( 'jquery' ), false, false, true);
                     //   wp_enqueue_script('scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.js', array( 'jquery' ), false, false, true);
                     //     wp_enqueue_script('main', get_stylesheet_directory_uri() . '/js/main-h2.js', array( 'jquery' ), false, false, true);
                  }
              }
              add_action('wp_enqueue_scripts', 'tk_child_scripts');

}  /// end if admin
/////////////////////////////////////////////////////////////////////////////



/* Blog */
add_image_size('serviceshomebox', 300, 233, true);
add_image_size('blog-page', 606, 338, true);
add_image_size('blog-full', 963, 537, true);
add_image_size('lower-blog-header', 1040, 350);
set_post_thumbnail_size( 1040, 99999 );

function register_my_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Menu' ),
      'disclosure-menu' => __( 'Disclosure Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Injury Menu Area',
        'id'   => 'injurymenuwid',
        'before_title' => '<h3 class="widget_title">',
        'after_title' => '</h3>')
    );
}



if ( ! function_exists( 'injury_navigation_menus' ) ) {
function injury_navigation_menus() {
  $locations = array(
    'sidebarinjurymenu' => 'Sidebar Injury Menu', 'container_class' => 'injury'
  );
register_nav_menus( $locations );
}
add_action( 'init', 'injury_navigation_menus' );
}





add_filter( 'wp_nav_menu_container_allowedtags', 'my_menu_allowed_tags' );

function my_menu_allowed_tags( $tags ) {
  $tags[] = 'p, span';
  return $tags;
}


add_image_size('serviceshomebox', 300, 233, true);

add_filter( 'term_description', 'shortcode_unautop');
add_filter( 'term_description', 'do_shortcode' );
add_filter( 'comment_text', 'shortcode_unautop');
add_filter( 'comment_text', 'do_shortcode' );
add_filter( 'the_excerpt', 'shortcode_unautop');
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'widget_text', 'shortcode_unautop');
add_filter( 'widget_text', 'do_shortcode');


/*-----------------------------------------------------------------------------------*/
/*  add first last */
add_filter('wp_nav_menu', 'add_first_last_menu_classes');
function add_first_last_menu_classes($output) {
    $output= preg_replace('/menu-item /', 'first-menu-item menu-item ', $output, 1);
    $output=substr_replace($output, "last-menu-item menu-item", strripos($output, "menu-item"), strlen("menu-item"));
    return $output;
}
/*-----------------------------------------------------------------------------------*/
// function redirect_all_404s() {
//   global $wp_query;
//     if ($wp_query->is_404) {
//        wp_redirect(get_bloginfo('wpurl'),301);exit;
//   }
// }
// add_action('wp', 'redirect_all_404s', 1);
/*--------------------------------------------------------------------------------------------*/
function add_alt_tags($content)
{
        global $post;
        preg_match_all('/<img (.*?)\/>/', $content, $images);
        if(!is_null($images))
        {
                foreach($images[1] as $index => $value)
                {
                        if(!preg_match('/alt=/', $value))
                        {
                                $new_img = str_replace('<img', '<img alt="'.$post->post_title.'"', $images[0][$index]);
                                $content = str_replace($images[0][$index], $new_img, $content);
                        }
                }
        }
        return $content;
}
add_filter('the_content', 'add_alt_tags', 99999);
/*--------------------------------------------------------------------------------------------*/
//////////////////////////////////////////////////////////////////////////////
//  count page visit function pm
/////////////////////////////////////////////////////////////////////////////

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}



function html_tag_schema()
{
    $schema = 'http://schema.org/';
    if( is_single(array( 187, 703, 524, 521, 701, 532, 1229 ) ) ){
        $type = 'ProfilePage';
    }
    // Is single post
    else if(is_single()){
        $type = "Article";
    }
    // Contact form page ID
    else if( is_page(925) ){
        $type = 'ContactPage';
    }
     else if( is_page(940) ){
        $type = 'ContactPage';
    }
     else if( is_page(941) ){
        $type = 'ContactPage';
    }
     else if( is_page(942) ){
        $type = 'ContactPage';
    }
    // Is author page
    elseif( is_author() ){
        $type = 'ProfilePage';
    }
     else if( is_page(187) ){
        $type = 'ContactPage';
    }
   // elseif( 'team-members' == get_post_type() ) {
    //elseif(is_singular('team-members')){

    // Is search results page
    elseif( is_search() ){
        $type = 'SearchResultsPage';
    }
    // Is of movie post type
    elseif(is_singular('movies')){
        $type = 'Movie';
    }
    // Is of book post type
    elseif(is_singular('books')){
        $type = 'Book';
    }else{
        $type = 'WebPage';
    }
    echo 'itemscope="itemScope" itemtype="' . $schema . $type . '"';
}

if ( !is_admin() ){
if( !function_exists( 'mp_custom_userfields' ) ):
//////////////////////////////////////////////////////////////////////////////
// add custom user field
/////////////////////////////////////////////////////////////////////////////
function mp_custom_userfields( $contactmethods ) {
// ADD CONTACT CUSTOM FIELDS
$contactmethods['user_twitter']     = 'Twitter URL <br/> for schema';
$contactmethods['user_facebook']    = 'Facebook URL <br/> for schema';
$contactmethods['user_googleplus']  = 'Google Plus URL <br/> for schema';
$contactmethods['user_linkedin']    = 'Linkedin URL <br/> for schema';
return $contactmethods;
}
add_filter('user_contactmethods','mp_custom_userfields',10,1);
endif;

/////////////////////////////////////////////////////////////////////////////
// CUSTOM USER PROFILE FIELDS
   function my_custom_userfields( $contactmethods ) {
    // ADD CONTACT CUSTOM FIELDS
    $contactmethods['google_pm_author_url']     = 'Google Plus Author Profile Link <br> ';
    $contactmethods['google_pm_author_name']     = 'Google Plus Author Profile Name  <br> ';
    $contactmethods['contact_phone_office']     = 'Office Phone';
    $contactmethods['contact_phone_mobile']     = 'Mobile Phone';
    $contactmethods['contact_office_fax']       = 'Office Fax';
    // ADD ADDRESS CUSTOM FIELDS
    $contactmethods['address_line_1']       = 'Address Line 1';
    $contactmethods['address_line_2']       = 'Address Line 2 (optional)';
    $contactmethods['address_city']         = 'City';
    $contactmethods['address_state']        = 'State';
    $contactmethods['address_zipcode']      = 'Zipcode';
    return $contactmethods;
   }
   add_filter('user_contactmethods','my_custom_userfields',10,1);

}



// Enqueue Chat Script
  // function chat_script() {
  //   wp_register_script( 'chat_script', get_stylesheet_directory_uri() . '/chat.js', array(), '1.0.0', true );
  //   wp_enqueue_script( 'chat_script' );
  // }

  // add_action( 'wp_enqueue_scripts', 'chat_script' );



  //Gravity Forms Field Label Filter

  add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

//remove nav menu titles
  
function my_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );

}
add_filter( 'wp_nav_menu', 'my_menu_notitle' );
add_filter( 'wp_page_menu', 'my_menu_notitle' );
add_filter( 'wp_list_categories', 'my_menu_notitle' );
