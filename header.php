<header class="header <?php if (is_front_page()) {
                        echo 'front-header';
                      } ?> touch-area">
  <div class="header-container">
    <div class="header-container-content">

      <div class="header-container__location">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/header-location.png" alt="">
      </div>
      <h1 class="header-container__logo">
        <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png"
            alt="高級メンズエステロイヤルスイート"></a>
      </h1>
      <div class="header-flex-sp">
        <p class="header-container__info--medium left-space">受付時間<br>10:30~翌12:30</p>
        <p class="header-container__info--medium left-space">営業時間<br>12:00～翌2:00</p>
      </div>
      <div class="header-container__info">
        <div class="header-flex">
          <!-- <p class="header-container__info--medium">営業時間:12:00～翌日2:00</p> -->
          <p class="header-container__info--medium left-space">営業時間:12:00～翌2:00</p>
        </div>
        <div class="header-flex">
          <!-- <p class="header-container__info--large">日本橋･心斎橋･堺筋本町店</p> -->
          <p class="header-container__info--xl left-space gothic">
            <span class="header-container__info--small">TEL.</span>
            090-4236-1960
          </p>
        </div>
        <div class="icon-flex">
          <div class="header-container__info--icon">
            <a href="https://line.me/ti/p/6GV7QoHXlq" target="_blank" rel="noopener noreferrer"><img
                class="header-container__info--icon--img"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/LINE.png" alt=""></a>
          </div>
          <div class="header-container__info--icon">
            <a href="http://royalsweet2021.livedoor.blog/" target="_blank" rel="noopener noreferrer"><img
                class="header-container__info--icon--img"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/livedoor.png" alt=""></a>
          </div>
          <div class="header-container__info--icon">
            <a href="https://twitter.com/RoyalSweet13" target="_blank" rel="noopener noreferrer"><img
                class="header-container__info--icon--img"
                src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-twitter.png" alt=""></a>
          </div>
        </div>
      </div><!-- .info -->
    </div><!-- .header-container -->
    <div class="hamburger-menu">
      <input type="checkbox" id="menu-btn-check">
      <label for="menu-btn-check" class="menu-btn"><span></span></label>
      <nav class="nav-container">
        <ul class="navlist gothic">
          <li><a href="<?php echo home_url(); ?>">ホーム</a></li>
          <li><a href="<?php echo home_url('therapist'); ?>">セラピスト</a></li>
          <li><a href="<?php echo home_url('schedule'); ?>">出勤情報</a></li>
          <li><a href="<?php echo home_url('system'); ?>">システム</a></li>
          <li><a href="<?php echo home_url('access'); ?>">アクセス</a></li>
          <li><a href="http://royalsweet2021.livedoor.blog/" target="_blank">ブログ</a></li>
          <li><a href="<?php echo home_url('recruit'); ?>">求人情報</a></li>
          <ul class="menu-tab">
            <li>
              <a href="https://line.me/ti/p/6GV7QoHXlq" target="_blank" rel="noopener noreferrer"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/LINE.png" alt="line"></a>
            </li>
            <li>
              <a href="http://royalsweet2021.livedoor.blog/" target="_blank" rel="noopener noreferrer"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/livedoor.png" alt="livedoor"></a>
            </li>
            <li>
              <a href="https://twitter.com/RoyalSweet13" target="_blank" rel="noopener noreferrer"><img
                  src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-twitter.png" alt="twitter"></a>
            </li>
          </ul>
        </ul>
      </nav>

    </div>
  </div>
  <div class="gold-border"></div>
</header>