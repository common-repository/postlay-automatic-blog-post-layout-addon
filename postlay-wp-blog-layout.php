<?php
/**
 * Plugin Name:       PostLay - Automatic Blog Post Layout Addon
 * Plugin URI:        https://wordpress.org/plugins/postlay-automatic-blog-post/
 * Description:       🔥 PostLay is an Automatic Blog Post Layout Addon for Wordpress. This plugin gives you more flexibility to handle easily the blog posts with PostLay. 
 * Version:           1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Netro Soft
 * Author URI:        https://netroics.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ncmbp
 */



require_once 'inc/functions.php';
require_once 'inc/netroics-dynamic-style.php';

 /**
 * Netroics enqueue scripts and styles
 */

function ncmbp__enqueue_scripts() {
    wp_enqueue_style( 'ncmbp-style', plugin_dir_url(__FILE__). 'css/ncmbp-style.css' );
    wp_enqueue_style( 'ncmbp-font-awesome-min', plugin_dir_url(__FILE__). 'css/ncmbp-font-awesome.min.css' );
    wp_enqueue_style( 'ncmbp-google-font', 'https://fonts.googleapis.com/css2?family=Signika+Negative:wght@300;400;500;600;700&display=swap' );
    // wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'ncmbp__enqueue_scripts' );

/**
 * Register and enqueue a custom stylesheet in the WordPress admin.
 */
function ncmbp_custom_admin_style() {
    //wp_register_style( 'ncmbp_admin_style', plugin_dir_url(__FILE__). 'css/ncmbp-admin-style.css' );
    wp_enqueue_style('ncmbp_admin_style', plugins_url('css/ncmbp-admin-style.css',  __FILE__ )  );
    wp_enqueue_style( 'ncmbp_admin_style' );
}
add_action( 'admin_enqueue_scripts', 'ncmbp_custom_admin_style' );


// Netroics Color Picker

add_action( 'admin_enqueue_scripts', 'ncmbp_enqueue_color_picker' );
function ncmbp_enqueue_color_picker( $hook_suffix ) {
    // first check that $hook_suffix is appropriate for your admin page
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'my-script-handle', plugins_url('js/my-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
    
    wp_enqueue_script( 'iris', admin_url( 'js/iris.min.js' ), array( 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch' ), false, 1 );
    wp_enqueue_script( 'cp-active', plugins_url('/js/cp-active.js', __FILE__), array('jquery'), '', true );
    
    }

// ncmbp custom post type

    if ( ! function_exists('ncmbp_custom_post') ) {

        // Register Custom Post Type
        function ncmbp_custom_post() {
        
            $labels = array(
                'name'                  => _x( 'PostLay', 'Post Type General Name', 'ncmbp' ),
                'singular_name'         => _x( 'PostLay Post Type', 'Post Type Singular Name', 'ncmbp' ),
                'menu_name'             => __( 'PostLay', 'ncmbp' ),
                'name_admin_bar'        => __( 'Post Type', 'ncmbp' ),
                'archives'              => __( 'Item Archives', 'ncmbp' ),
                'attributes'            => __( 'Item Attributes', 'ncmbp' ),
                'parent_item_colon'     => __( 'Parent Item:', 'ncmbp' ),
                'all_items'             => __( 'All Items', 'ncmbp' ),
                'add_new_item'          => __( 'Add New Item', 'ncmbp' ),
                'add_new'               => __( 'Add New', 'ncmbp' ),
                'new_item'              => __( 'New Item', 'ncmbp' ),
                'edit_item'             => __( 'Edit Item', 'ncmbp' ),
                'update_item'           => __( 'Update Item', 'ncmbp' ),
                'view_item'             => __( 'View Item', 'ncmbp' ),
                'view_items'            => __( 'View Items', 'ncmbp' ),
                'search_items'          => __( 'Search Item', 'ncmbp' ),
                'not_found'             => __( 'Not found', 'ncmbp' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'ncmbp' ),
                'featured_image'        => __( 'Featured Image', 'ncmbp' ),
                'set_featured_image'    => __( 'Set featured image', 'ncmbp' ),
                'remove_featured_image' => __( 'Remove featured image', 'ncmbp' ),
                'use_featured_image'    => __( 'Use as featured image', 'ncmbp' ),
                'insert_into_item'      => __( 'Insert into item', 'ncmbp' ),
                'uploaded_to_this_item' => __( 'Uploaded to this item', 'ncmbp' ),
                'items_list'            => __( 'Items list', 'ncmbp' ),
                'items_list_navigation' => __( 'Items list navigation', 'ncmbp' ),
                'filter_items_list'     => __( 'Filter items list', 'ncmbp' ),
            );
            $args = array(
                'label'                 => __( 'PostLay Post Type', 'ncmbp' ),
                'description'           => __( 'PostLay Post Description', 'ncmbp' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'thumbnail' ),
                'taxonomies'            => array( 'category', 'post_tag' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'           => plugins_url('img/menu-icon.png', __FILE__),
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => true,
                'exclude_from_search'   => false,
                'publicly_queryable'    => true,
                'capability_type'       => 'page',
            );
            register_post_type( 'ncmbp', $args );
        
        }
        add_action( 'init', 'ncmbp_custom_post', 0 );
        
        }


// ncmbp posts loop

function ncmbp__custom_posts_loop() {?>


<!-- Start features Lists section -->
<div class="features__lists_main">
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$data= new WP_Query(array(
    'post_type'=>'ncmbp', 
    'posts_per_page' => get_option('ncmbp__blog_posts_number'),
    'paged' => $paged,
));

if($data->have_posts()) : ?>
    <div class="features__lists">

    <?php while($data->have_posts())  : $data->the_post(); ?>
        <div class="feature__single">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>" alt="img">
            <div class="feature_single_details">
                <a href="<?php echo get_the_permalink()?>"><h3><?php the_title();?></h3></a>
                <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                <a href="<?php echo get_the_permalink();?>" class="ncmbp_read_btn">Read More<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div>
        </div>

<?php endwhile; ?>

</div>

<div class="ncmbp_pagination">


<?php
    $total_pages = $data->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('« Prev'),
            'next_text'    => __('Next »'),
        ));
    }

    ?>  
        
</div>

<?php else :?>
<h3><?php _e('404 Error&#58; Not Found', ''); ?></h3>

<?php endif;

wp_reset_postdata();?>

</div>
<!-- End features Lists section -->


<?php
}

// ncmbp added custom shortcode

function ncmbp_custom_shortcode() {
    add_shortcode( 'postlay_posts', 'ncmbp__custom_posts_loop' );
}

add_action( 'init', 'ncmbp_custom_shortcode' );

// ncmbp Redirect to plugin setting page

register_activation_hook(__FILE__, 'ncmbp_plugin_activation');
add_action('admin_init', 'ncmbp_plugin_redirect');

function ncmbp_plugin_activation() {
    add_option('ncmbp_plugin_activation_redirect', true);
}

function ncmbp_plugin_redirect() {
    if(get_option('ncmbp_plugin_activation_redirect', false)) {
        delete_option('ncmbp_plugin_activation_redirect');
        if(!isset($_GET['activate-multi'])) {
            wp_redirect("edit.php?post_type=ncmbp");
        }
    }
}

