<?php
  function my_enqueue_scripts() {
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'script_js', get_template_directory_uri(). '/assets/js/script.js',array() );
    wp_enqueue_style( 'style_css', get_template_directory_uri(). '/assets/css/style.css',array() );
    wp_enqueue_style( 'destyle_css', get_template_directory_uri(). '/assets/css/destyle.css',array() );
  }
  add_action( 'wp_enqueue_scripts','my_enqueue_scripts' );


  // カスタムメニューの設定
  register_nav_menus(
    array(
    'place_global' => 'グローバル',
    )
  );


  // カスタムメニューでaタグにclass付与
  function add_class($item_output){
    $search = array(
      '/(<a.?)/',
    );
    $replace = array(
      '$1'."class='menu-link'",
    );
    $item_output = preg_replace($search, $replace, $item_output);
    return $item_output;
  };
  add_filter('wp_nav_menu', 'add_class');



  // worksページを取得する関数
  function get_works_pages( $number = -1, $specified_id = null ){
    if ( isset( $specified_id ) ):
      $parent_id = $specified_id;
    else:
      $parent_id = get_the_ID();
    endif; 
    
    $args = array(
      'posts_per_page' => $number,
      'post_type' => 'page',
      'orderby' => 'menu_order',
      'order' => 'DESC',
      'post_parent' => $parent_id,
    );
    $works_pages = new WP_Query($args);
    return $works_pages;
  }

  // アイキャッチ画像を利用できるようにする
  add_theme_support( 'post-thumbnails' );
  // worksページの制作品イメージの画像用サイズ
  add_image_size( 'works', 600, 450, true );
  // トップページの制作品イメージ画像用サイズ
  add_image_size( 'top_works', 260, 195, true );


