<footer class="footer touch-area">
  <div class="footer-container">
    <?php include('footer-top.php'); ?>
    <?php include('footer-main.php'); ?>
    <?php include('footer-bottom.php'); ?>
  </div>
</footer>
<ul class="footer-sp__wrap">
  <li class="footer-sp__list">
    <a class="footer-sp__list--link" href="tel:090-4236-1960">
      <img src="<?php echo get_template_directory_uri() ?>/img/icon-tel.png" alt="電話アイコン">
      <span>TEL</span>
    </a>
  </li>
  <li class="footer-sp__list">
    <a class="footer-sp__list--link" href="https://line.me/ti/p/GYQ8KQD6rS" target="_blank">
      <img src="<?php echo get_template_directory_uri() ?>/img/icon-line.png" alt="LINEアイコン">
      <span>LINE</span>
    </a>
  </li>
  <li class="footer-sp__list">
    <a class="footer-sp__list--link" href="sms:090-4236-1960">
      <img src="<?php echo get_template_directory_uri() ?>/img/icon-sms.png" alt="SMSアイコン">
      <span>SMS</span>
    </a>
  </li>
</ul>
</div><!-- .wrapper -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/swiper.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/index.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/hamburger.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/author.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/js/schedule.js"></script>
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
</body>

</html>