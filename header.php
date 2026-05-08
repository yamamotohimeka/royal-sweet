<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>Royal Sweet（ロイヤルスイート） | 高級メンズエステ</title>
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="description"
    content="大阪・堺筋本町・心斎橋にある癒しの異空間メンズエステ「Royal Sweet（ロイヤルスイート）」。お客様に非日常感を存分に感じられる空間演出と充実した施術内容となっております。厳選されセラピストがお客様の疲れた身体と心を癒します">
  <meta name="keywords" content="大阪,堺筋本町,心斎橋,メンズエステ,Royal Sweet,ロイヤルスイート">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- /////////////////ogp -->
  <meta property="og:url" content="<?php echo esc_url(home_url()); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="Royal Sweet（ロイヤルスイート） | 高級メンズエステ" />
  <meta property="og:description"
    content="大阪・堺筋本町・心斎橋にある癒しの異空間メンズエステ「Royal Sweet（ロイヤルスイート）」。お客様に非日常感を存分に感じられる空間演出と充実した施術内容となっております。厳選されセラピストがお客様の疲れた身体と心を癒します" />
  <meta property="og:site_name" content="Royal Sweet（ロイヤルスイート） | 高級メンズエステ" />
  <meta property="og:image" content="<?php echo esc_url(home_url()); ?>/wp-content/themes/royal-sweet/img/ogp.jpg" />
  <!-- /////////////////ogp -->
  <link rel="shortcut icon" href="<?php echo esc_url(home_url()); ?>/wp-content/themes/royal-sweet/img/favicon.ico">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <script>
    (function(d) {
      var config = {
          kitId: 'doo0xtb',
          scriptTimeout: 3000,
          async: true
        },
        h = d.documentElement,
        t = setTimeout(function() {
          h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
        }, config.scriptTimeout),
        tk = d.createElement("script"),
        f = false,
        s = d.getElementsByTagName("script")[0],
        a;
      h.className += " wf-loading";
      tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
      tk.async = true;
      tk.onload = tk.onreadystatechange = function() {
        a = this.readyState;
        if (f || a && a != "complete" && a != "loaded") return;
        f = true;
        clearTimeout(t);
        try {
          Typekit.load(config)
        } catch (e) {}
      };
      s.parentNode.insertBefore(tk, s)
    })(document);
  </script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZT5NWDSMRD"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'G-ZT5NWDSMRD');
  </script>

  <?php wp_head(); ?>
</head>

<body>
  <header
    class="header <?php if (is_home()) {
                    echo 'front-header';
                  } else {
                    echo 'common-header';
                  } ?> touch-area"
    id="header">
    <div class="header-container">
      <div class="header-container-content">

        <div class="header-container__location">
          <img src="<?php echo get_template_directory_uri() ?>/img/header-location.png" alt="">
        </div>
        <h1 class="header-container__logo">
          <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png"
              alt="高級メンズエステロイヤルスイート"></a>
        </h1>
        <div class="header-flex-sp">
          <p class="header-container__info--medium header-left-space">受付時間<br>10:30~翌12:30</p>
          <p class="header-container__info--medium header-left-space">営業時間<br>12:00～翌2:00</p>
        </div>
        <div class="header-container__info">
          <div class="header-flex">
            <p class="header-container__info--medium header-left-space">営業時間:12:00～翌2:00</p>
          </div>
          <div class="header-flex">
            <p class="header-container__info--xl header-left-space gothic">
              <span class="header-container__info--small">TEL.</span>
              090-4236-1960
            </p>
          </div>
          <div class="header-icon-flex">
            <div class="header-container__info--icon">
              <a href="https://line.me/ti/p/GYQ8KQD6rS" target="_blank" rel="noopener noreferrer"><img
                  class="header-container__info--icon--img"
                  src="<?php echo get_template_directory_uri() ?>/img/LINE.png" alt=""></a>
            </div>
            <div class="header-container__info--icon">
              <a href="http://royalsweet2021.livedoor.blog/" target="_blank" rel="noopener noreferrer"><img
                  class="header-container__info--icon--img"
                  src="<?php echo get_template_directory_uri() ?>/img/livedoor.png" alt=""></a>
            </div>
            <div class="header-container__info--icon">
              <a href="https://twitter.com/RoyalSweet13" target="_blank" rel="noopener noreferrer"><img
                  class="header-container__info--icon--img"
                  src="<?php echo get_template_directory_uri() ?>/img/icon-twitter.png" alt=""></a>
            </div>
          </div>
        </div>
      </div><!-- .header-container-content -->
      <div class="header-menu">
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
                <a href="https://line.me/ti/p/GYQ8KQD6rS" target="_blank" rel="noopener noreferrer">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/img/LINE.png" alt="line">
                </a>
              </li>
              <li>
                <a href="http://royalsweet2021.livedoor.blog/" target="_blank" rel="noopener noreferrer">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/img/livedoor.png" alt="livedoor">
                </a>
              </li>
              <li>
                <a href="https://twitter.com/RoyalSweet13" target="_blank" rel="noopener noreferrer">
                  <img
                    src="<?php echo get_template_directory_uri() ?>/img/icon-twitter.png" alt="twitter">
                </a>
              </li>
            </ul>
          </ul>
        </nav>
      </div>
    </div>
  </header>