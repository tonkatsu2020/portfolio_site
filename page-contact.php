<?php	get_header(); ?>
  <main>
    <!-- sec -->
    <section class="common_kv" id="#" >
      <div class="common_kv_container contact_img">
        <div class="common_kv_wrap">
          <h2 class="common_kv_ttl">Contact</h2>
          <p class="common_kv_txt">お問い合わせ</p>
        </div>
      </div>
      <!-- パンくずリスト -->
      <?php	get_template_part('include/common-bread-crumbs') ?>
    </section><!-- /.common_kv -->

    <section class="contact_form">
      <div class="section_inner">
        <?php	the_content(); ?>
      </div>
    </section>

  </main>
  <?php	get_footer(); ?>