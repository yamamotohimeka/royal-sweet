  <footer class="footer touch-area">
    <div class="footer-container">
      <div class="footer-container-content">

        <div class="footer__left">
          <div class="footer__left--flex">
            <h3 class="footer__left--logo">
              <a href="index.php"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt=""></a>
            </h3>
            <div>
              <p class="footer__left--small gothic"><span class="time">営業時間</span>12:00～翌2:00</p>
              <!-- <p class="footer__left--small gothic"><span class="time">受付時間</span>10:30～翌日12:30</p> -->
            </div>
          </div>
          <nav class="footer-nav">
            <ul class="footer-navlist gothic">
              <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
              <li><a href="<?php echo home_url('therapist'); ?>">セラピスト</a></li>
              <li><a href="<?php echo home_url('schedule'); ?>">出勤情報</a></li>
              <li><a href="<?php echo home_url('system'); ?>">システム</a></li>
              <li><a href="<?php echo home_url('access'); ?>">アクセス</a></li>
              <li><a href="http://royalsweet2021.livedoor.blog/" target="_blank">ブログ</a></li>
              <li><a href="<?php echo home_url('recruit'); ?>">求人情報</a></li>
            </ul>
          </nav>
          <div class="banner-flex">
            <div class="banner-flex__img"><a href="https://osaka.refle.info/" target="_blank"
                rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner01.png"
                  alt="リフナビ大阪"></a></div>
            <div class="banner-flex__img"><a href="https://tokyo.aroma-tsushin.com/" target="_blank"
                rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner02.png"
                  alt="大阪アロマパンダ通信"></a></div>
            <div class="banner-flex__img"><a href="https://panda-job.com/" target="_blank"
                rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/banner03.png"
                  alt="パンダエステショップ"></a></div>
            <div class="banner-flex__img"><a href="https://eslove.jp/kansai/osaka" target="_blank"><img
                  src="https://eslove.jp/eslove_front_theme/banner/banner_200x40.jpg" alt="大阪のメンズエステ情報ならエステラブ" /></a>
            </div>
            <div class="banner-flex__img"><a href="https://job.eslove.jp/kansai/osaka" target="_blank"><img
                  src="https://job.eslove.jp/eslove_job_front_theme/banner/banner_200x40.jpg"
                  alt="大阪のメンズエステ求人情報ならエステラブワーク" /></a></div>
            <div>
              <a href="https://www.kking.jp/ippan/220719/" title="メンズエステ・マッサージ エステアイ" target="_blank">
                <img src="https://www.kking.jp/img/esuteai200.gif" width="200" height="40"
                  alt="メンズエステ・マッサージ エステアイ" /></a>
            </div>
            <div>
              <a href="https://www.kking.jp/job/71401/" title="メンズエステ・マッサージ エステアイ" target="_blank">
                <img src="https://www.kking.jp/img/esuteai200.gif" width="200" height="40"
                  alt="メンズエステ・マッサージ エステアイ" /></a>
            </div>
          </div>
        </div><!-- footer-left -->

        <div class="footer__right">
          <div class="footer__right--flex">
            <div>

              <p class="footer__right--medium gothic"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/tell.png" alt="tell"><span
                  class="footer__right--small">TEL<span class="none-colon">:</span></span><a href="tel:090-4236-1960"
                  class="sp-block">090-4236-1960</a></p>
              <p class="footer__right--medium gothic"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/LINE.png" alt="tell"><span
                  class="footer__right--small">LINE ID<span class="none-colon">:</span></span><span
                  class="sp-block">royal-sweet</span></p>
            </div>
            <div class="qr-icon"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/qrcode.png" alt="qr">
            </div>
          </div>
        </div><!-- .footer__right -->
      </div>
    </div><!-- .footer-container -->
  </footer>
  <ul class="footer-sp-listwrap">
    <li class="footer-sp-list">
      <a href="tel:090-4236-1960">
        <div class="footer-sp-list-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-tel.png" alt="電話アイコン">
        </div>
        <span>TEL</span>
      </a>
    </li>
    <li class="footer-sp-list">
      <a href="https://line.me/ti/p/6GV7QoHXlq" target="_blank">
        <div class="footer-sp-list-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-line.png" alt="LINEアイコン">
        </div>
        <span>LINE</span>
      </a>
    </li>
    <li class="footer-sp-list">
      <a href="sms:090-4236-1960">
        <div class="footer-sp-list-img">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-sms.png" alt="SMSアイコン">
        </div>
        <span>SMS</span>
      </a>
    </li>
  </ul>
  </div><!-- .wrapper -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/common.js"></script>
  <script>
$(function() {
  var target = $('.attmgr_admin_scheduler tr:first-child');
  var flag = true;
  if (target.length) {
    $('.fixed-button').hide(0);
    $(window).on('load scroll resize', function() {
      if (flag) {
        flag = false;
        var target_position = $('.attmgr_admin_scheduler').offset().top;
        setTimeout(function() {
          var sp = parseInt($(window).scrollTop());
          if (sp > target_position) {
            target.addClass('fixed');
          } else {
            target.removeClass('fixed');
          }
          flag = true;
          return flag;
        }, 300);
      }
    });
  }
});
  </script>
  <?php wp_footer(); ?>