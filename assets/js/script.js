jQuery(function(){
    // スムーススクロール
    jQuery('a[href^="#"]').click(function() {
      var speed = 400;
      var href= jQuery(this).attr("href");
      var target = jQuery(href == "#" || href == "" ? 'html' : href);
      var position = target.offset().top + -100;
      jQuery('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
    });

    // TOPに戻るボタンをスクロールで表示
    jQuery(window).scroll(function () {
      var topJump = jQuery('.top_jump');
      if (jQuery(this).scrollTop() > 100) {
        topJump.addClass('js_show');
      } else {
        topJump.removeClass('js_show');
      }
    });
    
  // グループ内を一つずつフワッと表示
  function groupFadeIn(elem) {
    const targetElem = elem.offset().top;
    const windowHeight = jQuery(window).height();
    let scrollVal = jQuery(window).scrollTop();
    // console.log(scrollVal);

    if(scrollVal > targetElem - windowHeight + 200 ) {
      elem.children().each(function(i) {
        jQuery(this).delay(200*i).queue(function(next) {
          jQuery(this).addClass('js_show');
          next();
        });
      });
    } 
  }

  // トップだけ
  function topFadeIn(elem) {
    const targetElem = elem.offset().top;
    const scrollVal = jQuery(window).scrollTop();
    const windowHeight = jQuery(window).height();
    if(scrollVal > targetElem - windowHeight  ) {
      elem.children().each(function(i) {
        jQuery(this).delay(200*i).queue(function(next) {
          jQuery(this).addClass('js_show');
          next();
        });
      });
    } 
  }

  const kv = jQuery('.js_fade_kv');
  const works = jQuery('.js_fade_works');
  const about = jQuery('.js_fade_about');
  const service = jQuery('.js_fade_service');
  const topBtn = jQuery('.top_btn');


  jQuery(window).on('load resize', function() {
    topFadeIn(topBtn);
    groupFadeIn(kv);
    groupFadeIn(about);
    groupFadeIn(works);
    groupFadeIn(service);
  });
  jQuery(window).scroll(function() {
    topFadeIn(topBtn);
    groupFadeIn(kv);
    groupFadeIn(about);
    groupFadeIn(works);
    groupFadeIn(service);
  });

    //ハンバーガーボタン
  const Navbar = jQuery('.menu');
  const Toggler = jQuery('#toggler');
  const Navitem = jQuery('.menu-item');
  const layer = jQuery('main');

  Toggler.on("click",function(){
    jQuery(this).toggleClass('show');
    Navbar.toggleClass('show');

    // クリック後に出現する背景
    if(jQuery(this).hasClass('show')){
      layer.addClass('show');
      setTimeout(function(){
        layer.toggleClass('opacity');
      },100);
    } else {
      layer.removeClass('opacity');
      setTimeout(function(){
        layer.removeClass('show');
      },200);
    };

    // メニューが一つずつフワッと表示
    jQuery('.menu').children().each(function(i) {
      jQuery(this).delay(100*i).queue(function(next) {
      jQuery(this).toggleClass('show');
        next();
      });
    });
  });

  // 解除
  const hide = () => {
    Navbar.removeClass('show');
    Navitem.removeClass('show');
    Toggler.removeClass('show');
    layer.removeClass('show');
  };
  jQuery('main,.menu-link').on("click", function() {
    hide();
  });

  // worksリスト最後の行を左寄せするための処理
  var $grid = jQuery('.top_works_list'),   
    emptyCells = [],
    i;
  for (i = 0; i < $grid.find('.top_works_item').length; i++) {
      emptyCells.push(jQuery('<div>', { class: 'top_works_list empty_top_works' }));
  }
  $grid.append(emptyCells);
});