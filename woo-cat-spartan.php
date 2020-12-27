<?php
/**
 * Plugin Name:       Woo Cat Spartan
 * Plugin URI:        https://www.facebook.com/hamza.maraj.56/
 * Description:       Manage woocommerce product category pages
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Muhammad Hamza Mairaj
 * Author URI:        https://www.facebook.com/hamza.maraj.56/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       woo-cat-spartan
 * Domain Path:       /languages
 */
 
 /*==============
 * ADD LAGUAGES
 ================*/
 
 add_action( 'init', 'myplugin_load_textdomain' );
function myplugin_load_textdomain() {
  load_plugin_textdomain( 'woo-cat-spartan', false, basename( dirname( __FILE__ ) ) . '/languages' );
}
$woo_notice = "";
 if ( is_plugin_active( 'wp-content/plugins/woocommerce/woocommerce.php' ) ) {
	$woo_notice = "Please Install/Activate WooCommerce and Elementor";
	echo $woo_notice;
} 

/*==============
 * ENQUEUE CSS
 ================*/
 
function spartan_enqueue_style() {
	 wp_enqueue_style( 'fontawesome', plugin_dir_url(__FILE__) . 'assets/css/style.css' );
 }
 add_action('admin_enqueue_scripts', 'spartan_enqueue_style');
 
/*==============
* RECENT PRODUCTS
================*/
function woo_spartan_recent_products() {
global $wp_query;
$cat_slug = $wp_query->query_vars['product_cat'];
$slug = $cat_slug;
echo do_shortcode('[recent_products limit="5" columns="5" category=" '. $slug .' "]');
}
add_shortcode('woo_cat_recent', 'woo_spartan_recent_products');

/*==============
 * SALE PRODUCTS
 ================*/

function woo_spartan_sale_products() {
global $wp_query;
$cat_slug = $wp_query->query_vars['product_cat'];
$slug = $cat_slug;
echo do_shortcode('[sale_products limit="5" columns="5" category=" '. $slug .' "]');
}
add_shortcode('woo_cat_sale', 'woo_spartan_sale_products');

/*====================
 * FEATURED PRODUCTS
 ====================*/

function woo_spartan_featured_products() {
global $wp_query;
$cat_slug = $wp_query->query_vars['product_cat'];
$slug = $cat_slug;
echo do_shortcode('[featured_products limit="5" columns="5" category=" '. $slug .' "]');
}
add_shortcode('woo_cat_featured', 'woo_spartan_featured_products');

/*====================
 * TOP RATED PRODUCTS
 ====================*/

function woo_spartan_top_rated_products() {
global $wp_query;
$cat_slug = $wp_query->query_vars['product_cat'];
$slug = $cat_slug;
echo do_shortcode('[top_rated_products limit="5" columns="5" category=" '. $slug .' "]');
}
add_shortcode('woo_cat_top_rated', 'woo_spartan_top_rated_products');

/*==============
 * REVOLUTION SLIDER
 ================*/

function woo_spartan_rev() {
global $wp_query;
$cat_slug = $wp_query->query_vars['product_cat'];
$slug = $cat_slug;
echo do_shortcode('[rev_slider alias="'.$slug.'"][/rev_slider]');
}
add_shortcode('woo_cat_rev_slider', 'woo_spartan_rev');

/*================
 * ADMIN HOMEPAGE
 =================*/

function woo_cat_spartan_page() { 
global $woo_notice;
?>
<div class="woo-cat-spartan-admin-page">
	<div class="container">
		<div class="spartan-notice">
		<h4><?php echo $woo_notice ?></h4>
		</div>
			<div class="spartan-title">
				<h1>Woo Cat Spartan</h1>
			</div>
		<div class="about-woo-cat-spartan">
			<h2><?php echo __('About', 'woo-cat-spartan')?></h2>
			<p><?php echo __('Woo Cat Spartan Only works with woocommerce plugin. You can use Woo Cat Spartan to get the recent, sale, top rated and featured products from current category to product category page. You can also add category specific revolution slider on product category page. You can use Elementor Pro to customize woocommerce category template. Use Woo Cat Spartan shortcodes to enhance product category page.', 'woo-cat-spartan'); ?></p>
		</div>
			<ul class="woo-cat-spartan">
				<li>
					<h2><?php echo __('Recent Products', 'woo-cat-spartan'); ?></h2>
					<p><?php echo __('Use this shortcode to display recent products on current category page', 'woo-cat-spartan'); ?><br><strong>[woo_cat_recent]</strong></p>
				</li>
				<li>
					<h2><?php echo __('Sale Products', 'woo-cat-spartan'); ?></h2>
					<p><?php echo __('Use this shortcode to display sales products on current category page', 'woo-cat-spartan'); ?><br><strong>[woo_cat_sale]</strong></p>
				</li>
				<li>
					<h2><?php echo __('Featured Products', 'woo-cat-spartan'); ?></h2>
					<p><?php echo __('Use this shortcode to display featured products on current category page', 'woo-cat-spartan'); ?><br><strong>[woo_cat_featured]</strong></p>
				</li>
				<li>
					<h2><?php echo __('Top Rated Products', 'woo-cat-spartan'); ?></h2>
					<p><?php echo __('Use this shortcode to display top rated products on current category page', 'woo-cat-spartan'); ?><br><strong>[woo_cat_top_rated]</strong></p>
				</li>
				<li>
					<h2><?php echo __('Revolution Slider', 'woo-cat-spartan'); ?></h2>
					<p><?php echo __('Use this shortcode to display Revolution Slider relevant to current category page', 'woo-cat-spartan'); ?><br><strong>[woo_cat_rev_slider]</strong></p>
				</li>
			</ul>
	</div>
</div>
<?php	
}

/*==========================
 * ADMIN DOCUMENTATION PAGE
 ==========================*/
 
function woo_cat_spartan_documentation_page() { ?>
<div class="woo-cat-spartan-admin-page">
	<div class="container">
	<div class="spartan-title">
		<h1><?php _e('Documentation', 'woo-cat-spartan'); ?></h1>
	</div>
	<h2><?php _e('How to add category specific slider on product category page', 'woo-cat-spartan'); ?></h2>
	<ol>
	<li><?php _e('Create a slider with revolution slider', 'woo-cat-spartan')?></li>
	<li><?php _e('Before Saving the changes copy the slug of category (on which slider be display)', 'woo-cat-spartan')?></li>
	<li><?php _e('Paste the slug on "Alais" of your slider', 'woo-cat-spartan')?></li>
	<li><?php _e('Add Woo Cat Spartan revolution slider shortcode ([woo_cat_rev_slider]) on you category template. That\'s it', 'woo-cat-spartan')?></li>
	</ol>
	
	</div>
</div>
<?php	
}

/*==============
 * ADMIN MENU
 ================*/
 
function woo_cat_spartan_menu_page() {
    add_menu_page(
        'Woo Cat Spartan',
        'Woo Cat Spartan',
        'manage_options',
        'woo-cat-spartan',
        'woo_cat_spartan_page',
		'dashicons-networking',
        //plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
	add_submenu_page(
        'woo-cat-spartan',
        __("Documentation", "woo-cat-spartan"),
        __("Documentation", "woo-cat-spartan"),
        'manage_options',
		'documentation',
        'woo_cat_spartan_documentation_page',
        //plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}
add_action('admin_menu', 'woo_cat_spartan_menu_page');