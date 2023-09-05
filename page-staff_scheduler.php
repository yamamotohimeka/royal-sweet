<!DOCTYPE html>
<html lang="ja">
  <head>
    <?php include('head-meta.php'); ?>
  </head>
  <body>
  <div class="wrapper">
    <?php include('header.php'); ?>
    <section id="section">
      <?php
        the_content();
      ?>
    </section>
    <?php include('footer.php'); ?>
  </body>
</html>