<?php /* Template Name: 出勤情報 */ ?>
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
    $date = date('w');

    /*ユーザーデータ取得*/
    $get_user = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    $uid = $get_user->ID;
    $udata = get_userdata($uid);
    ?>
    <main>
      <div class="gold-border"></div>
      <section class="schedule">
        <h2 class="schedule__heading touch-area">SCHEDULE</h2>
        <p class="schedule__heading--small touch-area">出勤情報</p>
        <div class="tabs">
          <div class="tab-flex">
            <?php for ($i = 0; $i < 7; $i++) {
              $day_list = date('Y-m-d', strtotime("+" . $i . "day"));
              if ($i == 0) {
                echo '<input id="mon" type="radio" name="tab-item" onclick="change();" checked><label class="tab-item gothic tab' . $i . '" for="mon">';
              } elseif ($i == 1) {
                echo '<input id="tue" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="tue">';
              } elseif ($i == 2) {
                echo '<input id="wed" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="wed">';
              } elseif ($i == 3) {
                echo '<input id="thu" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="thu">';
              } elseif ($i == 4) {
                echo '<input id="fri" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="fri">';
              } elseif ($i == 5) {
                echo '<input id="sat" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="sat">';
              } elseif ($i == 6) {
                echo '<input id="sun" type="radio" name="tab-item" onclick="change();"><label class="tab-item gothic tab' . $i . '" for="sun">';
              }
              echo date("n月j日", strtotime("+" . $i . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+" . $i . "day", current_time('timestamp')))] .  ")";
              echo '</label>';
            } ?>
          </div>

          <div class="schedule-container touch-area" id="mon-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+0"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+0" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 0 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 0; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="tue-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+1"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+1" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 1 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 1; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="wed-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+2"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+2" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 2 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 2; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="thu-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+3"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+3" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 3 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 3; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="fri-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+4"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+4" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 4 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 4; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="sat-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+5"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+5" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 5 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 5; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
          <div class="schedule-container touch-area" id="sun-content">
            <h3 class="schedule-container__heading"><?php echo date("n月j日", strtotime("+6"  . "day", current_time('timestamp'))) . "(" . $week[date('w', strtotime("+6" . "day", current_time('timestamp')))] .  ")" ?>の出勤情報</h3>
            <div class="tab-content">
              <?php
                $day = date('Y-m-d', strtotime('+' . 6 . 'day', current_time('timestamp'))); //当日日付
                $daycount = 1;
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
                    if ($val->date === $day && !empty(get_the_author_meta('display_name', $val->staff_id))) {
                      //当日日付と出勤日が合致する女の子を出力
                      $count += 1;
              ?>
                      <div class="schedule-list <?php echo "day" . 6; ?>">
                        <?php print('<a href="' . home_url() . '?author=' . $val->staff_id . '" class="expand-link">'); ?>
                        <div class="schedule-list__box <?php if ($newface == true) echo 'new'; ?>">
                          <div class="schedule-list__box--img"><?= get_avatar($val->staff_id, 420); ?></div>
                          <div class="schedule-list__box--bg">
                            <p class="schedule-list__box--small">
                              <?= get_the_author_meta('display_name', $val->staff_id) ?>（<?= get_the_author_meta('fage', $val->staff_id) ?>）
                            </p>
                            <p class="schedule-list__box--small">
                              <?= $startTime ?>～<?= $endTime ?>
                            </p>
                          </div><!-- .schedule__box--bg -->
                        </div><!-- .schedule__box -->
                        <p class="schedule-list__fee">
                          指名料+<?= get_the_author_meta('extra_fee', $val->staff_id) ?>円
                        </p>
                        <!-- <p class="schedule-list__place">
                          <?= $val->workplace ?>
                        </p> -->
                        </a>
                      </div><!-- .schedule-list -->
              <?php
                    }
                  }
                }
              ?>
            </div><!-- .tab-content -->
          </div><!-- .schedule-container -->
        </div><!-- .tabs -->
      </section>
      <div class="gold-border"></div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>