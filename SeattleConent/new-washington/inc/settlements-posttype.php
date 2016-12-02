<?php


/*-----------------------------------------------------------------------------------*/
/*  custom taxonomy cases
/*-----------------------------------------------------------------------------------*/
add_action('init', 'cptui_register_my_taxes_cases');
function cptui_register_my_taxes_cases() {
register_taxonomy( 'cases',array (
  0 => 'payouts',
),
array( 'hierarchical' => true,
	'label' => 'Case Types',
	'show_ui' => true,
	'query_var' => true,
	'show_admin_column' => true,
	'labels' => array (
  'search_items' => 'Case Type',
  'popular_items' => '',
  'all_items' => '',
  'parent_item' => '',
  'parent_item_colon' => '',
  'edit_item' => '',
  'update_item' => '',
  'add_new_item' => '',
  'new_item_name' => '',
  'separate_items_with_commas' => '',
  'add_or_remove_items' => '',
  'choose_from_most_used' => '',
)
) );
}

/*-----------------------------------------------------------------------------------*/
/*  custom post type payouts
/*-----------------------------------------------------------------------------------*/
add_action('init', 'cptui_register_my_cpt_payouts');
function cptui_register_my_cpt_payouts() {
register_post_type('payouts', array(
'label' => 'Payout',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'post',
'map_meta_cap' => true,
'hierarchical' => true,
'rewrite' => array('slug' => 'payouts', 'with_front' => true),
'query_var' => true,
'has_archive' => true,
'supports' => array('title','excerpt','author'),
'taxonomies' => array('cases'),
'labels' => array (
  'name' => 'Payout',
  'singular_name' => 'Payouts',
  'menu_name' => 'Settements',
  'add_new' => 'Add Payouts',
  'add_new_item' => 'Add New Payouts',
  'edit' => 'Edit',
  'edit_item' => 'Edit Payouts',
  'new_item' => 'New Payouts',
  'view' => 'View Payouts',
  'view_item' => 'View Payouts',
  'search_items' => 'Search Payout',
  'not_found' => 'No Payout Found',
  'not_found_in_trash' => 'No Payout Found in Trash',
  'parent' => 'Parent Payouts',
)
) ); }

/*-----------------------------------------------------------------------------------*/
/*  meta and field info
/*-----------------------------------------------------------------------------------*/


// Registers the 'settlements' metabox
function rc_wctg_add_settlements_metabox() {
	add_meta_box('settlements', 'Please enter the type of settlement and payout as well as the attorney and date', 'rc_wctg_get_metabox_settlements_fields', 'payouts', 'normal', 'high');

}
add_action('add_meta_boxes', 'rc_wctg_add_settlements_metabox');

// Creates the 'settlements' metabox content
function rc_wctg_get_metabox_settlements_fields() {

	global $post;

	?>
	<style>
	#rc_wctg_metabox th {
		width: 150px;
	}
	#rc_wctg_metabox input[type="text"], #rc_wctg_metabox textarea {
		padding: 4px 8px;
		border: 1px solid #ccc;
		width: 400px;
	}
	#side-sortables .form-table th {
		width: 60px !important;
	}
	#side-sortables #rc_wctg_metabox input[type="text"], #side-sortables #rc_wctg_metabox textarea {
		width: 100%;
	}
	#rc_wctg_metabox input[type="checkbox"] {
		float: left;
		margin: 8px 8px 0 0;
		width: 20px;
	}
	</style>

	<table class="form-table" id="rc_wctg_metabox">
		<tbody>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="payout">Payout</label>
			</th>
			<?php $payout = ( get_post_meta($post->ID, 'payout', true) ) ? get_post_meta($post->ID, 'payout', true) : ''; ?>
			<td>
				<input type="text" id="payout" name="rc_wctg_meta_field[payout]" value="<?php echo $payout; ?>" title="What was the amount ALSO ADD THIS TO THE EXCERPT">
				<span class="description">What was the amount ALSO ADD THIS TO THE EXCERPT</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="settledby">Attorney</label>
			</th>
			<?php $settledby = ( get_post_meta($post->ID, 'settledby', true) ) ? get_post_meta($post->ID, 'settledby', true) : ''; ?>
			<td>
				<input type="text" id="settledby" name="rc_wctg_meta_field[settledby]" value="<?php echo $settledby; ?>" title="Attorney that settled the payout ALSO ADD THE SAME AUTHOR">
				<span class="description">Attorney that settled the payout ALSO ADD THE SAME AUTHOR</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="reviewer">Reviewer</label>
			</th>
			<?php $reviewer = ( get_post_meta($post->ID, 'reviewer', true) ) ? get_post_meta($post->ID, 'reviewer', true) : ''; ?>
			<td>
				<input type="text" id="reviewer" name="rc_wctg_meta_field[reviewer]" value="<?php echo $reviewer; ?>" title="Enter the name of the person or company you want as author of the review">
				<span class="description">Enter the name of the person or company you want as author of the review</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="review">Review</label>
			</th>
			<?php $review = ( get_post_meta($post->ID, 'review', true) ) ? get_post_meta($post->ID, 'review', true) : ''; ?>
			<td>
				<input type="text" id="review" name="rc_wctg_meta_field[review]" value="<?php echo $review; ?>" title="Enter a review here REQUIRED">
				<span class="description">Enter a review here REQUIRED</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="ratingValue">Rating Value</label>
			</th>
			<td>
			<select name="rc_wctg_meta_field[ratingValue]" id="ratingValue">
			<option value=" 1 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 1 Stars' ); ?>> 1 Stars</option>
			<option value=" 1.5 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 1.5 Stars' ); ?>> 1.5 Stars</option>
			<option value=" 2 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 2 Stars' ); ?>> 2 Stars</option>
			<option value=" 2.5 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 2.5 Stars' ); ?>> 2.5 Stars</option>
			<option value=" 3 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 3 Stars' ); ?>> 3 Stars</option>
			<option value=" 3.5 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 3.5 Stars' ); ?>> 3.5 Stars</option>
			<option value=" 4 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 4 Stars' ); ?>> 4 Stars</option>
			<option value=" 4.5 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 4.5 Stars' ); ?>> 4.5 Stars</option>
			<option value=" 5 Stars" <?php selected( get_post_meta($post->ID, 'ratingValue', true), ' 5 Stars' ); ?>> 5 Stars</option>
			<option value="" <?php selected( get_post_meta($post->ID, 'ratingValue', true), '' ); ?>></option>
			</select><br /><p class="description">select a value for the review</p>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="reviewCount">Review Count</label>
			</th>
			<?php $reviewCount = ( get_post_meta($post->ID, 'reviewCount', true) ) ? get_post_meta($post->ID, 'reviewCount', true) : ''; ?>
			<td>
				<input type="text" id="reviewCount" name="rc_wctg_meta_field[reviewCount]" value="<?php echo $reviewCount; ?>" title="Add a number for times reviewed. over 35">
				<span class="description">Add a number for times reviewed. over 35</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="description">Description</label>
			</th>
			<?php $description = ( get_post_meta($post->ID, 'description', true) ) ? get_post_meta($post->ID, 'description', true) : ''; ?>
			<td>
				<input type="text" id="description" name="rc_wctg_meta_field[description]" value="<?php echo $description; ?>" title="description">
				<span class="description">description</span>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="itemreviewed">Item Reviewed</label>
			</th>
			<td>
			<select name="rc_wctg_meta_field[itemreviewed]" id="itemreviewed">
			<option value="Motorcycle Accident " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), 'Motorcycle Accident ' ); ?>>Motorcycle Accident </option>
			<option value=" Car - Automobile Accident " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Car - Automobile Accident ' ); ?>> Car - Automobile Accident </option>
			<option value=" Slip and Fall Accident " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Slip and Fall Accident ' ); ?>> Slip and Fall Accident </option>
			<option value=" Truck - Semi Accident " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Truck - Semi Accident ' ); ?>> Truck - Semi Accident </option>
			<option value=" Bike - Bicycle Accident " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Bike - Bicycle Accident ' ); ?>> Bike - Bicycle Accident </option>
			<option value=" Wrongful Death " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Wrongful Death ' ); ?>> Wrongful Death </option>
			<option value=" Dog Bite Injury  " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Dog Bite Injury  ' ); ?>> Dog Bite Injury  </option>
			<option value=" Defective Drugs " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Defective Drugs ' ); ?>> Defective Drugs </option>
			<option value=" Brain Injury  " <?php selected( get_post_meta($post->ID, 'itemreviewed', true), ' Brain Injury  ' ); ?>> Brain Injury  </option>
			<option value="" <?php selected( get_post_meta($post->ID, 'itemreviewed', true), '' ); ?>></option>
			</select><br /><p class="description">ex: Motorcycle accident case settlement in salt lake</p>
			</td>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="datePublished">Date Settled</label>
			</th>
			<?php $datePublished = ( get_post_meta($post->ID, 'datePublished', true) ) ? get_post_meta($post->ID, 'datePublished', true) : ''; ?>
			<td>
				<input type="text" id="datePublished" name="rc_wctg_meta_field[datePublished]" value="<?php echo $datePublished; ?>" title="">
				<span class="description"></span>
			</td>
		</tr>
	</tbody>
	</table>

	<?php
}

// Creates the 'save' function
// ---------------------------------------------------------------------------------
// NOTE: this function must be used only ONCE
//       If you declare this function more than once you will get an error message
// ---------------------------------------------------------------------------------

function rc_wctg_save_post_meta($post_id, $post) {

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	$post_meta =  array();

	// place all meta fields into a single array
	if( isset($_POST['rc_wctg_meta_field'] ) ) {
		$meta_fields = $_POST['rc_wctg_meta_field'];
		foreach( $meta_fields as $meta_key => $meta_value ) {
			$post_meta[$meta_key] = $meta_value;
		}
	}

	// Add values of $post_meta as custom fields
	foreach ($post_meta as $key => $value) {
		if( $post->post_type == 'revision' ) return;
		$value = implode(',', (array)$value);
		if(get_post_meta($post->ID, $key, FALSE)) {
			update_post_meta($post->ID, $key, $value);
		} else {
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}

}

add_action('save_post', 'rc_wctg_save_post_meta', 1, 2); // save the custom fields
 ?>