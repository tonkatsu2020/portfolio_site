<?php	get_header(); ?>
  <main>
    <!-- sec -->
    <section class="top_kv" id="#" >
      <div class="top_kv_wrap">
        <div class="top_kv_container">
          <div class="top_ttl_wrap js_fade_kv">
            <h2 class="top_ttl js_hide">Hello I'm Kenji Matsunaga</h2>
            <p class="top_ttl_txt js_hide">welcome to my portfolio</p>
            <p class="top_ttl_txt js_hide">I love web site coding</p>
            <p class="top_ttl_txt js_hide">I hope I can help you</p>
          </div>
          <div class="top_btn js_fade_btn">
            <?php $shop_obj = get_page_by_path( 'contact' ); ?>
            <div class="js_hide">
              <a class="common_btn" href="<?php echo esc_url( home_url('contact') ); ?>" role="button">Contact</a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /.top_kv -->

    <!-- sec -->
    <section class="top_about" id="about">
      <div class="section_inner">
        <div class="top_about_wrap js_fade_about">
          <h2 class="section_ttl">About</h2>
          <p class="section_ttl_txt">私について</p>
          <p class="top_about_name js_hide">松永健二 / Kenji Matsunaga</p>
          <p class="top_about_txt js_hide">某社会福祉大学を卒業し、国家資格の社会福祉士を取得。介護老人保健施設にて、支援相談員として勤務しながら学習を続け、介護支援専門員の資格も取得。福祉の専門家となる。</p>
          <p class="top_about_txt js_hide">2020年1月、今後必要になるであろうITスキルに着目し、プログラミングを学習。webサイトを作ることや新たな技術を学ぶことが楽しく、毎日パソコンを触る日々を過ごす。</P>
          <p class="top_about_txt js_hide">現在webコーダーとして活動。今後フロントエンドエンジニアを見据えて更なる学習を継続中。</p> 
          <img class="top_about_img js_hide" src="<?php echo get_template_directory_uri(); ?>/assets/img/top_about_img.jpg" alt="サイトオーナーの写真">
        </div>
      </div><!-- /.section_inner -->
    </section><!-- /.top_about -->

    <!-- sec -->
    <section class="top_service" id="service">
      <div class="section_inner">
        <div class="section_ttl_wrap">
          <h2 class="section_ttl">Service</h2>
          <p class="section_ttl_txt">私がお手伝いできること</p>
        </div>
        <ul class="top_service_list js_fade_service">
          <li class="top_service_item js_hide">
            <img class="top_service_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/service_lp_img.png" alt="HTML/CSSコーディングのイメージ画像">
            <h3 class="top_service_ttl">HTML/CSS Coding</h3>
            <p class="top_service_txt">お預かりしたデザインデータを元に正しいタグでマークアップ致します。CSSはScssを用いて、保守性や効率性を高めたコーディングが可能です。</p>
          </li>
          <li class="top_service_item js_hide">
            <img class="top_service_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/jquery.png" alt="jQueryコーディングのイメージ画像">
            <h3 class="top_service_ttl">jQuery Coding</h3>
            <p class="top_service_txt">ハンバーガーやアコーディオンのメニュー、カルーセルスライダー、モーダルなど基本的な実装が可能です</p>
          </li>
          <li class="top_service_item js_hide">
            <img class="top_service_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/service_corporatesite_img.png" alt="WordPressコーディングのイメージ画像">
            <h3 class="top_service_ttl">WordPress Coding</h3>
            <p class="top_service_txt">カスタムフィールドやカスタムポスト、カスタムタクソノミー等によるカスタマイズが可能です。クライアント様の要望に沿った実装を致します。
            </p>
          </li>
        </ul>
      </div><!-- /.section_inner -->
    </section><!-- /.top_service -->

    <!-- sec -->
    <section class="top_works" id="works">
      <div class="section_inner">
        <div class="section_ttl_wrap">
          <h2 class="section_ttl">Works</h2>
          <p class="section_ttl_txt">今までに作ったもの</p>
        </div>
        <ul class="top_works_list js_fade_works">
          <?php
            $works_pages = get_works_pages();
            if( $works_pages -> have_posts(  )):
            while ( $works_pages -> have_posts() ): $works_pages -> the_post();
          ?>
          <li class="top_works_item js_hide">
          <?php 
            $group = 'works'; 
              if( have_rows($group) ):
              while( have_rows($group) ): the_row();
          ?>
            <a class="top_works_link" href="<?php the_permalink(); ?>">
              <?php
                $attachment_id = get_sub_field( 'works_img' );
                echo wp_get_attachment_image(
                  $attachment_id,
                  'top_works',
                  false,
                  array(
                    'class'=>'top_works_img',
                    'alt'=>trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) ),
                  )
                );
              ?>
              <p class="top_works_txt">詳細情報を見る</p>
            </a>
          </li>
          <?php
            endwhile;
            wp_reset_postdata();
            endif;
          ?>
          <?php
            endwhile;
            wp_reset_postdata();
            endif;
          ?>
        </ul><!-- /.top_works_list -->
      </div><!-- /.section_inner -->
    </section><!-- /.top_works -->

    <?php	get_template_part( 'include/common-contact' ); ?>

  </main>
<?php	get_footer(); ?>