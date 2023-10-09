<!DOCTYPE html>
<html lang="ja">

<head>
  <?php include('head-meta.php'); ?>
</head>

<body>
  <div class="wrapper">
    <?php include('header.php'); ?>
    <?php
    /*スケジュール取得*/
    global $wpdb;
    $rows = $wpdb->get_results("SELECT * FROM $wpdb->attmgr_schedule ORDER BY date, starttime");
    $day = current_time('Y-m-d');
    $week = ["日", "月", "火", "水", "木", "金", "土"];

    /*ユーザーデータ取得*/
    $get_user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    $uid = $get_user->ID;
    $userData = get_userdata($uid);
    ?>
    <main>
      <div class="gold-border"></div>
      <section class="profile">
        <h2 class="profile__heading touch-area">PROFILE</h2>
        <p class="profile__heading--small touch-area">プロフィール</p>
        <div class="profile-container">
          <div class="profile-box">
            <div class="profile-box__left <?php if ($userData->newface) echo 'new'; ?>">
              <div class="profile-box__left--bigimg touch-area">
                <?= get_avatar($uid, 420) ?>
              </div>
              <div class="profile-flex">
                <div class="profile-box__left--thumb">
                  <?= get_avatar($uid, 420) ?>
                </div>
                <div class="profile-box__left--thumb">
                  <?php $ctm = get_field('subimage1'); ?>
                  <?php if (!empty($ctm)) : ?>
                  <img src="<?php the_field('subimage1'); ?>" alt="">
                  <?php endif; ?>
                </div>
                <div class="profile-box__left--thumb">
                  <?php $ctm = get_field('subimage2'); ?>
                  <?php if (!empty($ctm)) : ?>
                  <img src="<?php the_field('subimage2'); ?>" alt="">
                  <?php endif; ?>
                </div>
              </div><!-- .profile-flex -->

              <p class="profile-box__tablet--large touch-area">
                <?= $userData->display_name ?>(<?php echo $userData->fage; ?>)</p>
              <div class="profile-box__flex touch-area">
                <p class="profile-box__tablet--medium">T:<?php echo $userData->staff_tall; ?></p>
                <p class="profile-box__tablet--bg-gold">指名料+<?php echo $userData->extra_fee; ?></p>
              </div>
              <p class="profile-box__tablet--small touch-area">
                <?php echo nl2br($userData->user_description); ?></p>

              <table class="profile-box__table touch-area">
                <caption class="profile-box__table--medium">出勤予定</caption>
                <tbody>
                  <?php for ($i = 0; $i < 7; $i++) : ?>
                  <tr>
                    <th class="profile-box__table--date">
                      <?php echo date('m/d', strtotime('+' . $i . 'day', current_time('timestamp'))) . "(" . $week[date('w', strtotime('+' . $i . 'day', current_time('timestamp')))] . ")" ?>
                    </th>
                    <!-- <td class="profile-box__table--place">
                        <?php
                        if ($rows) {
                          foreach ($rows as $val) {
                            if ($val->staff_id == $uid && $val->date == date('Y-m-d', strtotime('+' . $i . 'day')) && $val->workplace) {
                              echo $val->workplace;
                              break;
                            } elseif ($val == end($rows)) {
                              echo "-";
                            }
                          }
                        } else {
                          echo '-';
                        }
                        ?>
                      </td> -->
                    <td class="profile-box__table--time touch-area">
                      <?php
                        if ($rows) {
                          foreach ($rows as $val) {
                            ///////////////ここから時間変換
                            $startTmp = date_parse_from_format('h:i', $val->starttime);
                            $endTmp = date_parse_from_format('h:i', $val->endtime);
                            $startTime = strftime('%H:%M', mktime($startTmp['hour'], $startTmp['minute']));
                            $endTime = strftime('%H:%M', mktime($endTmp['hour'], $endTmp['minute']));
                            $users = get_users(array('order' => 'ASC', 'orderby' => 'meta_value_num', 'meta_key' => 'priority', 'exclude' => '1 2'));
                            ///////////////ここまで時間変換
                            if ($val->staff_id == $uid && $val->date == date('Y-m-d', strtotime('+' . $i . 'day'))) {
                              echo $startTime . "~" . $endTime;
                              break;
                            } elseif ($val == end($rows)) {
                              echo "-";
                            }
                          }
                        } else {
                          echo "-";
                        }
                        ?>
                    </td>
                  </tr>
                  <?php endfor; ?>
                </tbody>
              </table>
            </div><!-- .profile-box__left -->

            <div class="profile-box__right">
              <p class="profile-box__right--large"><?= $userData->display_name ?>(<?php echo $userData->fage; ?>)</p>
              <div class="profile-box__flex border-bottom">
                <p class="profile-box__right--medium">T:<?php echo $userData->staff_tall; ?></p>
                <p class="profile-box__right--bg-gold">指名料+<?php echo $userData->extra_fee; ?></p>
              </div>
              <p class="profile-box__right--small">

                <?php echo nl2br($userData->user_description); ?>
              </p>
              <div class="prof-twitter">
                <div class="prof-timeline">
                  <?php if (get_field('twitter')) : ?>
                  <div class="twitter">
                    <a class="twitter-timeline" data-tweet-limit="10" data-chrome="nofooter" data-chrome="noheader"
                      data-lang="ja" width="100%" href="<?php the_field('twitter'); ?>"></a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                  </div>
                  <?php endif; ?>
                </div><!-- .prof-timeline -->
              </div><!-- .prof-twitter -->
            </div><!-- .profile-box__right -->

          </div><!-- .profile-box -->
        </div><!-- .profile-container -->
      </section>

      <div class="gold-border"></div>

    </main>
    <?php include('footer.php'); ?>
</body>

</html>