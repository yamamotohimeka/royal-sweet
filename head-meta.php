  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/img/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?ver052003">

  <?php /*サーチコンソール*/ ?>
  <meta name="google-site-verification" content="7XBOvLGOA-WFHq1kmStVkB7Vz35jqch03Ck_1PbK_3k" />
  <?php /*///////////サーチコンソール*/ ?>

  <?php /*アナリティクス*/ ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZT5NWDSMRD"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-ZT5NWDSMRD');
  </script>
  <?php /*////////////アナリティクス*/ ?>

  <?php wp_head(); ?>