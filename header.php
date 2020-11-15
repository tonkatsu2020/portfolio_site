<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php bloginfo('name'); ?></title>
  <meta name="description" content=" <?php bloginfo('description'); ?>" />
  <meta name="keywords" content="①,②,③,④" />
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="robots" content="noindex,nofollow">
  <!-- Twitterカード -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@アカウント">
  <!-- OGP -->
  <meta property="og:title" content="" />
  <meta property="og:description" content="" />
  <meta property="og:url" content="https://〜〜.com" />
  <meta property="og:image" content="img/〜.jpg" />
  <meta property="og:site_name" content="">
  <meta property="og:type" content="website">
  <meta property="og:locale" content="ja_JP">
  <!--site icon-->
  <link rel="icon" href="img/favicon.ico">
  <!--touch icon-->
  <link rel="apple-touch-icon-precomposed" href="img/touch-icon.png">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&family=Oranienbaum&display=swap" rel="stylesheet">
  <!-- font awesome -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <?php	wp_head(); ?>
</head>

<body>
  <!-- 右下のトップへ戻るボタン -->
  <?php	if(is_front_page()): ?>
    <a href="#" class="top_jump js_hide">
    <i class="fas fa-angle-up"></i>
    <p class="jump_btn_text">TOPへ戻る</p>
  </a>
  <?php	endif; ?>

  <header>
    <nav class="nav_container section_inner">
    <?php	if(is_front_page()): ?>
      <h1 class="logo" ><a class="logo_link" href="<?php echo esc_url( home_url()); ?>">KM portfolio</a></h1>
      <?php
         wp_nav_menu(
          array(
            'theme_location' => 'place_global',
            'container' => false,
            'menu' => 'menu 1'
          )
        )
      ?>
    <?php	else: ?>
      <div class="logo" ><a class="logo_link" href="<?php echo esc_url( home_url()); ?>">KM portfolio</a></div>
      <?php 
        wp_nav_menu(
          array(
            'theme_location' => 'place_global',
            'container' => false,
            'menu' => 'menu 2'
          )
        );
      ?>
    <?php	endif; ?>
      <!-- ハンバーガーボタン -->
      <button id="toggler">
        <i class="toggler_icon"></i>
        <i class="toggler_icon"></i>
        <i class="toggler_icon"></i>
      </button>
    </nav>
  </header>