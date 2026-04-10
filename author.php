<?php

/****************************************
  Template Name: セラピスト詳細ページ
 *****************************************/; ?>
<?php include('load-schedule.php'); ?>
<?php
$get_user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$uid = $get_user->ID;
$udata = get_userdata($uid);
$user_twitter = get_field('twitter_shop', 'user_1');
$newfaceDate = get_the_author_meta('newface', $get_user->ID);
$date = DateTime::createFromFormat('Ymd', $newfaceDate);
$option_fee = get_the_author_meta('option_fee', $val->staff_id);
$ranking = get_the_author_meta('ranking', $val->staff_id);

?>
<?php get_header(); ?>
<main>
  <div class="gold-border double"></div>
  <section class="author common-bg">
    <div class="common-title">
      <h2 class="common-title__main">PROFILE</h2>
      <p class="common-title__sub">プロフィール</p>
    </div>
    <div class="author-container">
      <div class="author-box">
        <div class="author-box__left <?php if (!empty($udata->newface)) echo 'new'; ?>">
          <?php include('author-img.php'); ?>
        </div>
        <div class="author-box__right">
          <?php include('author-data.php'); ?>
          <p class="author-description">
            <?php echo nl2br($udata->description); ?>
          </p>
          <?php include('author-schedule.php'); ?>
        </div>
      </div><!-- .author-box -->
    </div><!-- .author-container -->
  </section>
  <div class="gold-border"></div>
</main>
<?php get_footer(); ?>