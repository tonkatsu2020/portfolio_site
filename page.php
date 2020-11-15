<?php	get_header(); ?>
  <main>
    <!-- sec -->
    <section class="common_kv" id="#" >
      <div class="common_kv_container works_img">
        <div class="common_kv_wrap">
          <h2 class="common_kv_ttl">Works</h2>
          <p class="common_kv_txt">私が今までに作ったもの</p>
        </div>
      </div>
      <!-- パンくずリスト -->
      <?php	get_template_part('include/common-bread-crumbs') ?>
    </section><!-- /.common_kv -->

    <!-- sec -->
    <section class="works_details">
      <div class="section_inner">
        <?php 
          $group = 'works'; 
          if( have_rows($group) ):
            while( have_rows($group) ): the_row();
        ?>
        <?php if( get_sub_field( 'works_link' ) ): ?>
        <a class="works_link_img" href="<?php	the_sub_field( 'works_link' ); ?>" target="_blank" >
          <?php
            $attachment_id = get_sub_field( 'works_img' );
            echo wp_get_attachment_image(
              $attachment_id,
              'works',
              false,
              array(
                'class'=>'works_img',
                'alt'=>trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
              )
            );
          ?>
          <p class="works_txt">実際の制作品を見る</p>
        </a>
        <!-- 制作品URLがない場合 -->
        <?php	else: ?>
        <div class="works_img">
          <?php
            $attachment_id = get_sub_field( 'works_img' );
            echo wp_get_attachment_image(
              $attachment_id,
              'works',
              false,
              array(
                'class'=>'works_img',
                'alt'=>trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
              )
            );
          ?>
        </div>
        <?php	endif; ?>
        <h1 class="section_ttl"><?php the_sub_field( 'works_ttl' );?></h1>
        <table class="works_details_table">
          <tbody class="works_details_tbody">
            <tr class="works_details_tr">
              <th class="works_details_ttl">制作日</th>
              <td class="works_details_data"><?php the_sub_field( 'works_day' );?></td>
            </tr>
            <tr class="works_details_tr">
              <th class="works_details_ttl">制作時間</th>
              <td class="works_details_data"><?php the_sub_field( 'works_time' );?></td>
            </tr>
            <tr class="works_details_tr">
              <th class="works_details_ttl">使用スキル</th>
              <td class="works_details_data">
                <ul class="works_skill_list">
                  <?php
                    $skills = get_sub_field( 'works_skill' );
                    foreach( $skills as $skill ):
                  ?>
                    <?php if( $skill == "html"): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/HTML_img.png" alt="HTMLのロゴ">
                      </li>
                    <?php elseif( $skill == "css"): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/CSS_img.png" alt="CSSのロゴ">
                      </li>
                    <?php elseif( $skill == "sass"): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/Sass_img.png" alt="Sassのロゴ">
                      </li>
                    <?php elseif( $skill == "jq"): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/jQuery_img.png" alt="jQueryのロゴ">
                      </li>
                    <?php elseif( $skill == "wp"): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/WordPress_img.png" alt="WordPressのロゴ">
                      </li>
                    <?php elseif( $skill == "xd" ): ?>
                      <li class="works_skill_items">
                        <img class="works_skill_img" src="<?php	echo get_template_directory_uri(); ?>/assets/img/xd_img.png" alt="WordPressのロゴ">
                      </li>
                    <?php	endif; ?>
                  <?php endforeach; ?>
                </ul>
              </td>
            </tr>

            <?php if( get_sub_field( 'works_copyright' ) ): ?>
            <tr class="works_details_tr">
              <th class="works_details_ttl">著作権</th>
              <td class="works_details_data">
                <?php	
                  $link = get_sub_field( 'works_copyright' );
                  if( $link ): 
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <a class="works_details_copyright" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" >
                  <?php echo ($link_title); ?>
                </a>
                <?php	endif; ?>
              </td>
            </tr>
            <?php	endif; ?>

            <tr class="works_details_tr">
              <th class="works_details_ttl">ソースコード</th>
              <td class="works_details_data">
                <a class="works_details_copyright" href="<?php the_sub_field( 'works_code' );?>" target="_blank">Githubへのリンク</a>
              </td>
            </tr>

            <tr class="works_details_tr">
              <th class="works_details_ttl">備考</th>
              <td class="works_details_data">
                <p class="works_details_txt"><?php the_sub_field( 'works_txt' );?></p>
              </td>
            </tr>
          </tbody>
        </table>

        <div class="more_news">
        <?php 
          // 親ページを取得
          $parent = $post->post_parent;
          if ( $parent ) {
            // 現在表示しているページの順番を取得
            $menu_order = $post->menu_order;
            // 次のページ
            $next_post = $wpdb->get_row(
              "SELECT * FROM wp_posts
              WHERE post_parent = $parent
              AND post_status = 'publish'
              AND menu_order > $menu_order
              ORDER BY menu_order"
            );
            // 前のページ
            $prev_post = $wpdb->get_row(
              "SELECT * FROM wp_posts
              WHERE post_parent = $parent
              AND post_status = 'publish'
              AND menu_order < $menu_order
              ORDER BY menu_order DESC"
            );
          }
        ?>
        <?php	if( $next_post ): ?>
          <a class="more_news_content next" href="<?php echo get_page_link($next_post->ID); ?>">
            <img class="more_news_arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/arr-left.png" alt="左矢印">
            <p class="more_news_txt">次の制作品</p>
          </a>
        <?php	else: ?>
          <div class="empty_works"></div>
        <?php	endif; ?>
       
        <?php	if( $prev_post ): ?>
          <a class="more_news_content prev" href="<?php echo get_page_link($prev_post->ID); ?>">
            <p class="more_news_txt">前の制作品</p>
            <img class="more_news_arrow" src="<?php echo get_template_directory_uri(); ?>/assets/img/arr-right.png" alt="右矢印">
          </a>
        <?php	else: ?>
          <div class="empty_works"></div>
        <?php	endif; ?>
        </div>

        <div class="common_btn_container">
          <a class="common_btn" href="<?php echo esc_url( home_url()); ?>#works">一覧へ戻る</a>
          <?php if( get_sub_field( 'works_link' ) ): ?>
          <a class="common_btn" href="<?php	the_sub_field( 'works_link' ); ?>" target="_blank" >制作品を見る</a>
          <?php	endif; ?>
        </div>
        <?php
          endwhile;
          endif;
        ?>
      </div><!-- /.section_inner -->
    </section><!-- /.common_kv -->

    <!-- sec -->
    <section class="common_contact">
      <div class="section_inner">
        <div class="common_contact_container">
          <div class="common_contact_wrap">
            <p class="common_contact_txt_en">Please contact us anytime</p>
            <p class="common_contact_txt">気になる事があれば、いつでもご相談下さい。</p>
            <div class="common_btn_container">
              <a class="common_btn" href="#">contact</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /.common_contact -->

  </main>
<?php	get_footer(); ?>