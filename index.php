<?php include('load-schedule.php'); ?>
<?php get_header(); ?>

<main>
  <div class="wrapper">
    <!-- メインビジュアル -->
    <div class="mv">
      <div class="mv-inner">
        <img src="<?php echo get_template_directory_uri() ?>/img/mv.jpg" alt="">
      </div>
      <div class="mv-logo">
        <img src="<?php echo get_template_directory_uri() ?>/img/mv-logo.png" alt="">
      </div>
    </div>

    <!-- イベントバナー -->
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
                <img src="<?php echo esc_url(get_field('bnr-image')); ?>" alt="">
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div></div>
        <?php endif; ?>
      </div>
      <div class="swiper-button-prev"><img src="<?php echo get_template_directory_uri() ?>/img/arrow-prev.png"
          alt="alt"></div>
      <div class="swiper-button-next"><img src="<?php echo get_template_directory_uri() ?>/img/arrow-next.png"
          alt="alt"></div>
    </div>

    <div class="gold-border"></div>

    <!-- 説明文と新人画像スライド -->
    <section class="contents">
      <div class="contents-wrapper">
        <!-- 説明文 -->
        <div class="contents-container touch-area">
          <h2 class="contents__title">メンズエステ<br>ロイヤルスイート</h2>
          <span class="contents__title--small">
            大阪・堺筋本町・心斎橋にある<br class="tab">癒しの異空間メンズエステ。<br>
            お客様に非日常感を<br class="tab">存分に感じられる空間演出と<br class="tab">充実した施術内容となっております。<br><br>
            厳選されセラピストがお客様の疲れた<br class="tab">身体と心を癒します。<br>
            高級水溶性ホットオイルを全身に<br class="tab">たっぷりと贅沢に使用する<br>ドバドバエステは五感を刺激…<br><br>
            極上の空間で洗練されたセラピストと<br class="tab">2人きりの特別なお時間を<br>お楽しみ下さいませ。
          </span>
        </div><!-- .contents-container -->

        <!-- 新人画像スライド -->
        <div class="newstaff">
          <p class="newstaff__top">NEW <span class="newstaff__top-br">FACE</span></p>
          <div class="newstaff__main swiper-container02">
            <div class="swiper-wrapper">
              <?php
              $users = get_users(array('order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => 'priority', 'exclude' => '1 2'));
              foreach ($users as $user):
                $uid = $user->ID;
                $userData = get_userdata($uid);
                $newfaceDate = get_the_author_meta('newface', $uid);
                if ($userData->attmgr_ex_attr_staff && $newfaceDate):
              ?>
                  <div class="swiper-slide">
                    <div class="newstaff-image">
                      <a href="<?php echo esc_url(get_author_posts_url($uid)); ?>" class="expand-link">
                        <?php echo get_avatar($uid, 420); ?>
                      </a>
                    </div>
                    <div class="newstaff-info">
                      <p><?php echo $user->display_name; ?></p>
                      <p>（<?php echo $user->fage; ?>）</p>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev02"></div>
            <div class="swiper-button-next02"></div>
          </div><!-- .swiper-container02 -->
        </div>
      </div><!-- .contents-wrapper -->
    </section><!-- .contents -->

    <!-- 本日の出勤情報 -->
    <section class="information touch-area">
      <div class="information__wrapper">
        <div class="today-therapist">
          <div class="today-therapist__wrapper">
            <!-- 本日の出勤情報 title -->
            <p class="today-therapist__wrapper--title"><?php
                                                        $week = ['日', '月', '火', '水', '木', '金', '土'];
                                                        $date = date('w');
                                                        $today = date("n月j日（$week[$date]）");
                                                        print(esc_html($today)); ?>の出勤情報
            </p>
            <!-- 本日の出勤情報 content -->
            <ul class="today-therapist__wrapper--content">
              <?php
              if ($rows) {
                $count = 0;

                foreach ($rows as $val) {
                  if ($val->date === $day) {
                    $count++;
                    $user_id = get_the_author_meta('ID', $val->staff_id);

                    if ($user_id) {
                      echo renderTherapistListItem($val, $user_id);
                    }
                  } elseif ($val == end($rows) && $count == 0) {
                    echo '<li class="panel-nostaff">現在出勤情報はございません。</li>';
                  }
                }
              }

              function renderTherapistListItem($val, $user_id)
              {
                $user_link = get_author_posts_url($user_id);
                $user_avatar = get_avatar($val->staff_id, 420);
                $user_name = get_the_author_meta('display_name', $val->staff_id);
                $user_age = get_the_author_meta('fage', $val->staff_id);
                $worktime = preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->starttime) . '～' . preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->endtime);
                $newfaceDate = get_the_author_meta('newface', $user_id);

                return '
                        <li class="today-list">
                          <a class="today-link" href="' . $user_link . '?cid=' . $user_id . '">
                            <div class="today-link__top ' . ($newfaceDate ? 'new' : '') . '">
                              <div class="today-link__top--image">
                                <span>' . $user_avatar . '</span>
                              </div>
                              <div class="today-link__top--bg">
                                <span>' . $user_name . '（' . $user_age . '）</span>
                                <span>' . $worktime . '</span>
                              </div>
                            </div>
                            <div class="today-link__bottom">
                              <span>指名料' . esc_html(get_the_author_meta('extra_fee', $val->staff_id)) . '円</span>
                            </div>
                          </a>
                        </li>
                      ';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
</main>
<?php get_footer(); ?>