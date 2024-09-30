<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include('head-meta.php'); ?>
</head>

<body>
  <div class="wrapper">
    <?php include('header.php'); ?>
    <?php
    global $wpdb;
    $rows = $wpdb->get_results("SELECT * FROM $wpdb->attmgr_schedule ORDER BY date, starttime");
    $day = current_time('Y-m-d');
    $week = ['日', '月', '火', '水', '木', '金', '土'];

    /*ユーザーデータ取得*/
    $get_user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    $uid = $get_user->ID;
    $udata = get_userdata($uid);

    $newusers = get_users(array(
      'orderby' => 'ID',
      'order' => 'ASC',
      'meta_key' => 'newface'
    ));
    ?>
    <main>
      <!-- <div class="top-video-wrap">
        <div class="top-video">
          <video playsinline loop autoplay muted src="<?php echo get_template_directory_uri(); ?>/assets/img/aqua_back.mp4"></video>
        </div>
      </div> -->


      <!--//////////////////////////// 仮で画像 -->
      <div class="mv">
        <div class="mv-inner">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mv.jpg" alt="">
        </div>
        <div class="mv-logo">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/mv-logo.png" alt="">
        </div>
      </div>
      <!--//////////////////////////// 仮で画像 -->


      <!-- top-swiper -->

      <div class="swiper-container">
        <div class="swiper-wrapper">
          <?php
          $args = array(
            'post_type' => 'bnr', //カスタム投稿の場合は投稿名を入れる
            'posts_per_page' => 5,
          );
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) :
            while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <div class="swiper-slide">
            <div class="swiper-slide__img">
              <img src="<?php the_field('bnr-image'); ?>" alt="">
            </div>
          </div>
          <?php endwhile; else : ?>
          <div>
          </div>
          <?php endif;?>
        </div>
        <div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-prev.png"
            alt="alt"></div>
        <div class="swiper-button-next"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-next.png"
            alt="alt"></div>
      </div>

      <div class="gold-border"></div>

      <section class="contents">
        <div class="contents-wrapper">
          <div class="contents-container touch-area">
            <h2 class="contents__title">メンズエステ<br>ロイヤルスイート</h2>
            <span class="contents__title--small">
              大阪・堺筋本町・心斎橋にある癒しの異空間メンズエステ。お客様に非日常感を存分に感じられる空間演出と充実した施術内容となっております。厳選されセラピストがお客様の疲れた身体と心を癒します。高級水溶性ホットオイルを全身にたっぷりと贅沢に使用。<br>
              極上の空間で洗練されたセラピストと2人きりの特別なお時間をお楽しみ下さいませ。</span>
          </div><!-- .contents-container -->
          <div class="newstaff">
            <p class="newstaff__heading">NEW <span class="newstaff__heading-br">FACE</span></p>
            <div class="swiper-container02">
              <div class="swiper-wrapper">
                <?php foreach ($newusers as $newuser) {
                  $user_id = $newuser->ID;
                  if ($newuser->newface == true && $newuser->attmgr_ex_attr_staff == true) { //チェックボックスが入力あるか
                ?>
                <div class="swiper-slide">
                  <?php print('<a href="' . home_url() . '?author=' . $user_id . '" class="expand-link">'); ?>
                  <div class="swiper-slide__img">
                    <?= get_avatar($user_id, 420); ?>
                  </div>
                  <!-- <p class="swiper-slide__title">入店日：<?php $date = $newuser->date;
                                                              $date2 = strtotime($date);
                                                              $date3 = $week[date('w', $date2)];
                                                              echo date('n月j日', $date2);
                                                              print '(' . $date3 . ')'; ?></p> -->
                  <p class="swiper-slide__title--small"><?= $newuser->display_name ?></p>
                  <p class="swiper-slide__title--small">（<?= $newuser->fage ?>）</p>
                  </a>
                </div>
                <?php
                  }
                }
                ?>
              </div>
              <div class="swiper-button-prev02"></div>
              <div class="swiper-button-next02"></div>
            </div><!-- .swiper-container02 -->
          </div><!-- .newstaff -->
        </div><!-- .contents-wrapper -->
      </section><!-- .contents -->

      <section class="information touch-area">
        <div class="info-wrapper">
          <div class="commuting">
            <div class="commuting__box">
              <p class="commuting__box--medium"><?php
                                                $week = [
                                                  '日', '月', '火', '水', '木', '金', '土'
                                                ];
                                                $date = date('w');
                                                $today = date("n月j日（$week[$date]）");
                                                print($today); ?>の出勤情報</p>

              <div class="girls-list">

                <?php
                if ($rows) {
                  $count = 0;
                  foreach ($rows as $val) { //DBのセレクトを回す
                    ///////////////ここから時間変換
                    $startTmp = date_parse_from_format('h:i', $val->starttime);
                    $endTmp = date_parse_from_format('h:i', $val->endtime);
                    $startTime = strftime('%H:%M', mktime($startTmp['hour'], $startTmp['minute']));
                    $endTime = strftime('%H:%M', mktime($endTmp['hour'], $endTmp['minute']));
                    $users = get_users(array('order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => 'priority', 'exclude' => '1 2'));
                    ///////////////ここまで時間変換
                    $deli = get_the_author_meta('delivery', $val->staff_id); //デリバリー取得
                    $twitter = get_the_author_meta('twitter', $val->staff_id); // twitter取得
                    $newface = get_the_author_meta('newface', $val->staff_id); //新人取得
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) { //当日の一致と削除されたユーザーの判定
                      $count += 1;
                ?>
                <div class="girls <?php echo "day" . $k; ?>">
                  <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                  <div class="girls__box <?php if ($newface) echo 'new'; ?>">
                    <div class="girls__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                    <div class="girls__box--bg">
                      <p class="girls__box--small">
                        <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                      </p>
                      <p class="girls__box--small">
                        <?= $startTime ?>～<?= $endTime ?>
                      </p>
                    </div><!-- .girls__box--bg -->
                  </div><!-- .girls__box -->
                  <p class="girls__fee">
                    指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                  </p>
                  <!-- <p class="girls__place">
                          <?= $val->workplace ?>
                        </p> -->
                  </a>
                </div><!-- .girls -->
                <?php
                    } elseif ($val == end($rows) && $count == 0) {
                      // 出勤情報なし
                    }
                  }
                }
                ?>
              </div><!-- .girls-list -->
            </div><!-- .ommuting__box -->
          </div><!-- .commuting -->

          <aside class="sidebar touch-area">

            <div class="twitter">
              <p class="twitter__heading">ツイッター</p>
              <div class="timeline">
                <a class="twitter-timeline" href="https://twitter.com/RoyalSweet13">Tweets by TwitterJP</a>
                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div><!-- .timeline -->
            </div><!-- .twitter -->
          </aside>
        </div><!-- .info-wrapper -->
      </section><!-- .information -->
      <div class="gold-border"></div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>