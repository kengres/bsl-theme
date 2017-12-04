<?php

// paths
$theme_path = get_template_directory();
$inc_path = $theme_path . '/inc/';
// require customizer
require_once($inc_path . 'custom-editable.php');

// bootstrap navwalker
if ( ! file_exists( get_template_directory() . '/wp-bootstrap-navwalker.php' ) ) {
	// file does not exist... return an error.
	return new WP_Error( 'wp-bootstrap-navwalker-missing', __( 'It appears the wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	// file exists... require it.
    require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
}

// loading css
function parasoil_enqueue_css() {
  // bootstrap
  // wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css');
  // wp_enqueue_style('bootstrap.min');

  // custom styles
  wp_register_style( 'parasoil_styles', get_template_directory_uri() . '/style.css', array(), filemtime( get_stylesheet_directory() . '/style.css'), all);
  wp_enqueue_style( 'parasoil_styles');
  }
add_action( 'wp_enqueue_scripts', 'parasoil_enqueue_css' );


// loading JavaScript
function parasoil_load_js() {
  // jQuery
  // wp_enqueue_script('jquery')
  // bootstrap js
  wp_register_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), NULL, true );
  wp_enqueue_script('bootstrap_js');
  // carousel js
  wp_register_script( 'carousel_js', get_template_directory_uri() . '/js/owl.carousel.min.js');
  wp_enqueue_script('carousel_js');
  // autoplay js
  wp_register_script( 'autoplay_js', get_template_directory_uri() . '/js/owl.autoplay.js');
  wp_enqueue_script('autoplay_js');
  // custom js
  wp_register_script( 'custom_js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), NULL, true );
  wp_enqueue_script('custom_js');
}
add_action('wp_enqueue_scripts', 'parasoil_load_js');

// menus
// register nav menus
register_nav_menus(array(
  'footer' => __('Footer Menu'),
));

// the excerpt length 
function pt_custom_excerpt_length( $length ) {
    return 20;
}
// read more
if( !function_exists( "ptxs_excerpt_more" ) ) {
    function ptxs_excerpt_more( $more ) {
        return '...' . '<div><a href="'. get_permalink($post->ID) . '" class="excerptLink" title="Читать '
        .get_the_title($post->ID).'">Читать&nbsp;дальше&nbsp;&raquo;</a></div>';
    }
}
add_filter( 'excerpt_more', 'ptxs_excerpt_more' );


add_filter( 'excerpt_length', 'pt_custom_excerpt_length', 999 );
/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {
            register_nav_menu( 'primary', __( 'Primary Menu', 'wp_parasoil' ) );
        } endif;


if ( ! current_user_can( 'administrator' ) ) {
    show_admin_bar( false );
}
add_theme_support( 'post-thumbnails' );
function wpdocs_after_setup_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'wpdocs_after_setup_theme' );
set_post_thumbnail_size( 380, 197, true ); // default Post Thumbnail dimensions (cropped)

  function colorCloud($text) {
    $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text);
    return $text;
    }
    function colorCloudCallback($matches) {
    $text = $matches[1];
    #Цвет фона тегов
    $colors = array('CCCCCC','CCCCCC','CCCCCC','CCCCCC','CCCCCC','CCCCCC','CCCCCC','CCCCCC',);
    $color=$colors[dechex(rand(0,7))];
    $pattern = '/style=(\'|\")(.*)(\'|\")/i';
    #Стили тегов
    $text = preg_replace($pattern, "style=\"display: inline-block; *display: inline; *zoom: 1; color:  #fff; text-shadow: 1px 1px 1px #989898; padding: 1px 5px; margin: 0 5px 5px 0; background-color: #{$color}; border-radius: 2px;  text-decoration: none!important; -webkit-transition: background-color .4s linear; -moz-transition: background-color .4s linear; transition: background-color .4s linear;\"", $text);
    $pattern = '/style=(\'|\")(.*)(\'|\")/i';
    return "<a $text>";
    }
    add_filter('wp_tag_cloud', 'colorCloud', 1);
	add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }

    return $title;

});


function do_excerpt($string, $word_limit) {
  $words = explode(' ', $string, ($word_limit + 1));
  if (count($words) > $word_limit)
  array_pop($words);
  echo implode(' ', $words).' ...';
}


//Doctors
add_theme_support('post-thumbnails');
add_image_size('banner', 800, 200, true);


// post type

add_action( 'init', 'create_post_type' );

function create_post_type() {
  register_post_type( 'banners',
    array(
      'labels' => array( 'name' => 'Баннеры', 'add_new' => 'Добавить баннер' ),
      'public' => true,
      'menu_position' => 5,
      'has_archive' => true,
      'rewrite' => array( 'slug' => 'bancat', 'with_front' => true ),
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields' )
  ));
}

function my_rewrite_flush() {
    create_post_type();
    flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'my_rewrite_flush' );





/**
 * Adds a meta box to the post editing screen
 */

function prfx_featured_meta() {
    add_meta_box( 'prfx_meta', 'Отображение туров', 'prfx_meta_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'prfx_featured_meta' );

function prfx_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
    $prfx_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <div class="prfx-row-content" style="display: inline;margin-right:50px;">
        <label for="featured-checkbox">
            Отображать 1 тур&nbsp;-&nbsp;
            <input type="checkbox" name="featured-checkbox" id="featured-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured-checkbox'] ) ) checked( $prfx_stored_meta['featured-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>
    <div class="prfx-row-content" style="display: inline;margin-right:50px;">
        <label for="feat-checkbox">
            Отображать 2 тур&nbsp;-&nbsp;
            <input type="checkbox" name="feat-checkbox" id="feat-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['feat-checkbox'] ) ) checked( $prfx_stored_meta['feat-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>
    <div class="prfx-row-content" style="display: inline;margin-right:50px;">
        <label for="see-checkbox">
            Отображать 3 тур&nbsp;-&nbsp;
            <input type="checkbox" name="see-checkbox" id="see-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['see-checkbox'] ) ) checked( $prfx_stored_meta['see-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>

    <div class="prfx-row-content" style="display: inline;margin-right:50px;">
        <label for="featured4-checkbox">
            Отображать 4 тур&nbsp;-&nbsp;
            <input type="checkbox" name="featured4-checkbox" id="featured4-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['featured4-checkbox'] ) ) checked( $prfx_stored_meta['featured4-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>
    <div class="prfx-row-content" style="display: inline;margin-right:50px;">
        <label for="feat5-checkbox">
            Отображать 5 тур&nbsp;-&nbsp;
            <input type="checkbox" name="feat5-checkbox" id="feat5-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['feat5-checkbox'] ) ) checked( $prfx_stored_meta['feat5-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>
    <div class="prfx-row-content" style="display: inline;">
        <label for="see6-checkbox">
            Отображать 6 тур&nbsp;-&nbsp;
            <input type="checkbox" name="see6-checkbox" id="see6-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['see6-checkbox'] ) ) checked( $prfx_stored_meta['see6-checkbox'][0], 'yes' ); ?> />
        </label>
    </div>
</p>

    <?php
}

function prfx_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

if( isset( $_POST[ 'featured-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured-checkbox', 'no' );
}

if( isset( $_POST[ 'feat-checkbox' ] ) ) {
    update_post_meta( $post_id, 'feat-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'feat-checkbox', 'no' );
}

if( isset( $_POST[ 'see-checkbox' ] ) ) {
    update_post_meta( $post_id, 'see-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'see-checkbox', 'no' );
}

if( isset( $_POST[ 'featured4-checkbox' ] ) ) {
    update_post_meta( $post_id, 'featured4-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'featured4-checkbox', 'no' );
}

if( isset( $_POST[ 'feat5-checkbox' ] ) ) {
    update_post_meta( $post_id, 'feat5-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'feat5-checkbox', 'no' );
}

if( isset( $_POST[ 'see6-checkbox' ] ) ) {
    update_post_meta( $post_id, 'see6-checkbox', 'yes' );
} else {
    update_post_meta( $post_id, 'see6-checkbox', 'no' );
}

}
add_action( 'save_post', 'prfx_meta_save' );





// Блок post meta

add_action('admin_init', 'my_extra_fields', 1);

function my_extra_fields() {
  add_meta_box( 'doc_fields', 'Поле для ссылки', 'doc_fields_box_func', 'banners', 'side', 'low'  );
  add_meta_box( 'tour1_fields', 'Тур 1', 'tour1_fields_box_func', 'post', 'normal', 'low'  );
  add_meta_box( 'tour2_fields', 'Тур 2', 'tour2_fields_box_func', 'post', 'normal', 'low'  );
  add_meta_box( 'tour3_fields', 'Тур 3', 'tour3_fields_box_func', 'post', 'normal', 'low'  );
  add_meta_box( 'tour4_fields', 'Тур 4', 'tour4_fields_box_func', 'post', 'normal', 'low'  );
  add_meta_box( 'tour5_fields', 'Тур 5', 'tour5_fields_box_func', 'post', 'normal', 'low'  );
  add_meta_box( 'tour6_fields', 'Тур 6', 'tour6_fields_box_func', 'post', 'normal', 'low'  );
}

function doc_fields_box_func( $post ) { ?>
  <p><label>Вставьте нужную ссылку <input type="text" name="extra[banner]" value="<?php echo get_post_meta($post->ID, 'banner', 1); ?>" style="width: 100%" /></label></p>
  <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour1_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour1-name]" value="<?php echo get_post_meta($post->ID, 'tour1-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour1-time]" value="<?php echo get_post_meta($post->ID, 'tour1-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour1-cost]" value="<?php echo get_post_meta($post->ID, 'tour1-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour1-date]" value="<?php echo get_post_meta($post->ID, 'tour1-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour1-hotel]" value="<?php echo get_post_meta($post->ID, 'tour1-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour1-fly]" value="<?php echo get_post_meta($post->ID, 'tour1-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour1-eat]" value="<?php echo get_post_meta($post->ID, 'tour1-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour1-transfer]" value="<?php echo get_post_meta($post->ID, 'tour1-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour1-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour1-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour1-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour1-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour1-buy]" value="<?php echo get_post_meta($post->ID, 'tour1-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour1-another]" value="<?php echo get_post_meta($post->ID, 'tour1-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour2_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour2-name]" value="<?php echo get_post_meta($post->ID, 'tour2-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour2-time]" value="<?php echo get_post_meta($post->ID, 'tour2-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour2-cost]" value="<?php echo get_post_meta($post->ID, 'tour2-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour2-date]" value="<?php echo get_post_meta($post->ID, 'tour2-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour2-hotel]" value="<?php echo get_post_meta($post->ID, 'tour2-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour2-fly]" value="<?php echo get_post_meta($post->ID, 'tour2-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour2-eat]" value="<?php echo get_post_meta($post->ID, 'tour2-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour2-transfer]" value="<?php echo get_post_meta($post->ID, 'tour2-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour2-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour2-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour2-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour2-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour2-buy]" value="<?php echo get_post_meta($post->ID, 'tour2-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour2-another]" value="<?php echo get_post_meta($post->ID, 'tour2-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour3_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour3-name]" value="<?php echo get_post_meta($post->ID, 'tour3-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour3-time]" value="<?php echo get_post_meta($post->ID, 'tour3-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour3-cost]" value="<?php echo get_post_meta($post->ID, 'tour3-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour3-date]" value="<?php echo get_post_meta($post->ID, 'tour3-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour3-hotel]" value="<?php echo get_post_meta($post->ID, 'tour3-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour3-fly]" value="<?php echo get_post_meta($post->ID, 'tour3-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour3-eat]" value="<?php echo get_post_meta($post->ID, 'tour3-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour3-transfer]" value="<?php echo get_post_meta($post->ID, 'tour3-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour3-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour3-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour3-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour3-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour3-buy]" value="<?php echo get_post_meta($post->ID, 'tour3-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour3-another]" value="<?php echo get_post_meta($post->ID, 'tour3-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour4_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour4-name]" value="<?php echo get_post_meta($post->ID, 'tour4-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour4-time]" value="<?php echo get_post_meta($post->ID, 'tour4-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour4-cost]" value="<?php echo get_post_meta($post->ID, 'tour4-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour4-date]" value="<?php echo get_post_meta($post->ID, 'tour4-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour4-hotel]" value="<?php echo get_post_meta($post->ID, 'tour4-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour4-fly]" value="<?php echo get_post_meta($post->ID, 'tour4-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour4-eat]" value="<?php echo get_post_meta($post->ID, 'tour4-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour4-transfer]" value="<?php echo get_post_meta($post->ID, 'tour4-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour4-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour4-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour4-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour4-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour4-buy]" value="<?php echo get_post_meta($post->ID, 'tour4-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour4-another]" value="<?php echo get_post_meta($post->ID, 'tour4-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour5_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour5-name]" value="<?php echo get_post_meta($post->ID, 'tour4-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour5-time]" value="<?php echo get_post_meta($post->ID, 'tour5-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour5-cost]" value="<?php echo get_post_meta($post->ID, 'tour5-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour5-date]" value="<?php echo get_post_meta($post->ID, 'tour5-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour5-hotel]" value="<?php echo get_post_meta($post->ID, 'tour5-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour5-fly]" value="<?php echo get_post_meta($post->ID, 'tour5-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour5-eat]" value="<?php echo get_post_meta($post->ID, 'tour5-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour5-transfer]" value="<?php echo get_post_meta($post->ID, 'tour5-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour5-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour5-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour5-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour5-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour5-buy]" value="<?php echo get_post_meta($post->ID, 'tour5-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour5-another]" value="<?php echo get_post_meta($post->ID, 'tour5-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

function tour6_fields_box_func( $post ) { ?>
  <table width="100%" cellpadding="5">
	  <tr><td>
  <p><label>Курорт <input type="text" name="extra[tour6-name]" value="<?php echo get_post_meta($post->ID, 'tour6-name', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Длительность <input type="text" name="extra[tour6-time]" value="<?php echo get_post_meta($post->ID, 'tour6-time', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Стоимость <input type="text" name="extra[tour6-cost]" value="<?php echo get_post_meta($post->ID, 'tour6-cost', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Вылет <input type="text" name="extra[tour6-date]" value="<?php echo get_post_meta($post->ID, 'tour6-date', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Проживание <input type="text" name="extra[tour6-hotel]" value="<?php echo get_post_meta($post->ID, 'tour6-hotel', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr>
	  <tr><td>
  <p><label>Перелет <input type="text" name="extra[tour6-fly]" value="<?php echo get_post_meta($post->ID, 'tour6-fly', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Питание <input type="text" name="extra[tour6-eat]" value="<?php echo get_post_meta($post->ID, 'tour6-eat', 1); ?>" style="width: 100%" /></label></p>
	  </td><td>
  <p><label>Трансфер <input type="text" name="extra[tour6-transfer]" value="<?php echo get_post_meta($post->ID, 'tour6-transfer', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Страховка <input type="text" name="extra[tour6-strahovka]" value="<?php echo get_post_meta($post->ID, 'tour6-strahovka', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td>
  <p><label>Виза <textarea name="extra[tour6-visa]" style="width: 100%"><?php echo get_post_meta($post->ID, 'tour6-visa', 1); ?></textarea></label></p>
	  </td></tr>
	  <tr><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Купить"<input type="text" name="extra[tour6-buy]" value="<?php echo get_post_meta($post->ID, 'tour6-buy', 1); ?>" style="width: 100%" /></label></p>
  	  </td><td colspan="2">
  <p><label>Вставьте нужную ссылку для кнопки "Другие варианты"<input type="text" name="extra[tour6-another]" value="<?php echo get_post_meta($post->ID, 'tour6-another', 1); ?>" style="width: 100%" /></label></p>
	  </td></tr></table>
    <input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }

add_action('save_post', 'my_extra_fields_update', 0);

function my_extra_fields_update( $post_id ){
  if ( !wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__) ) return false; // проверка
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE  ) return false; // если это автосохранение
  if ( !current_user_can('edit_post', $post_id) ) return false; // если юзер не имеет право редактировать запись

  if( !isset($_POST['extra']) ) return false;

  // Все ОК! Теперь, нужно сохранить/удалить данные
  $_POST['extra'] = array_map('trim', $_POST['extra']);
  foreach( $_POST['extra'] as $key=>$value ){
    if( empty($value) ){
      delete_post_meta($post_id, $key); // удаляем поле если значение пустое
      continue;
    }
    update_post_meta($post_id, $key, $value); // add_post_meta() работает автоматически
  }
  return $post_id;
}
