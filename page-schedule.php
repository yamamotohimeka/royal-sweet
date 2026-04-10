<?php

/****************************************
  Template Name: 出勤情報
 *****************************************/; ?>
<?php include('load-schedule.php'); ?>
<?php get_header(); ?>
<main>
  <div class="gold-border double"></div>
  <section class="page-schedule common-bg">
    <div class="common-title">
      <h2 class="common-title__main">SCHEDULE</h2>
      <p class="common-title__sub">出勤情報</p>
    </div>
    <div class="schedule-content">
      <div class="inner">
        <div class="schedule-content__week gothic">
          <?php
          $current_timestamp = current_time('timestamp');
          $week = ['日', '月', '火', '水', '木', '金', '土'];

          for ($i = 0; $i < 7; $i++) {
            $timestamp = strtotime("+$i days", $current_timestamp);
            $day_list = date('Y-m-d', $timestamp);
            $class = ($i == 0) ? 'schedule-content__week--tab selected' : 'schedule-content__week--tab';
            echo '<label class="' . $class . '" for="day' . $i . '">';
            echo date('n', $timestamp) . '月' . date('j', $timestamp) . '日';
            echo '(' . $week[date('w', $timestamp)] . ')</label>';
          }
          ?>
        </div>

        <?php for ($j = 0; $j < 7; $j++): ?>
          <input type="radio" name="date-select" id="day<?php echo $j; ?>" <?php if ($j == 0) echo 'checked'; ?> hidden>
        <?php endfor; ?>

        <section class="schedule-content__day">
          <div class="schedule-therapists-wrap">
            <?php for ($k = 0; $k < 7; $k++): ?>
              <?php $day = date('Y-m-d', strtotime('+' . $k . 'day', current_time('timestamp'))); ?>
              <div class="schedule-box schedule-box-<?php echo $k; ?>">
                <h4 class="schedule-box__top">
                  <?php echo date('n/j', strtotime('+' . $k . 'day', current_time('timestamp'))) . '(' . $week[date('w', strtotime('+' . $k . 'day', current_time('timestamp')))] . ')' . 'の出勤情報'; ?>
                </h4>

                <ul class="schedule-box__main">
                  <?php
                  if (!empty($rows)) {
                    $hasStaff = false; // フラグを追加して、出勤情報があるかどうかを追跡

                    foreach ($rows as $val) {
                      if ($val->date === $day) {
                        $hasStaff = true; // 出勤情報があることを記録

                        $userId = $val->staff_id;
                        $authorUrl = get_author_posts_url($userId) . "?cid=" . $userId;
                        $displayName = get_the_author_meta('display_name', $userId);
                        $age = get_the_author_meta('fage', $userId);
                        $startTime = preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->starttime);
                        $endTime = preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->endtime);
                        $newfaceDate = get_the_author_meta('newface', $userId);
                        $extraFee = get_userdata($userId)->extra_fee;

                        echo '
                        <li class="schedule-box__main--list">
                          <a href="' . esc_url($authorUrl) . '" class="expand-link">
                            <div class="schedule-data__top ' . ($newfaceDate ? 'new' : '') . '">
                              <div class="schedule-data__top--image">
                                <span>' . get_avatar($userId, 420) . '</span>
                              </div>
                              <div class="schedule-data__top--bg">
                                <span class="schedule-data__top--name">' . esc_html($displayName) . '（' . esc_html($age) . '）</span>
                                <span class="schedule-data__top--worktime">' . esc_html($startTime) . '～' . esc_html($endTime) . '</span>
                              </div>
                            </div>
                            <div class="schedule-data__bottom">
                              <span class="schedule-data__bottom--fee">指名料＋' . esc_html($extraFee) . '</span>
                            </div>
                          </a>
                        </li>
                        ';
                      }
                    }

                    if (!$hasStaff) {
                      echo '<li class="panel-nostaff">現在出勤情報はございません。</li>';
                    }
                  } else {
                    echo '<li class="panel-nostaff">現在出勤情報はございません。</li>';
                  }
                  ?>
                </ul>
              </div>
            <?php endfor; ?>
          </div>
        </section>
      </div>
    </div>
  </section>
  <div class="gold-border"></div>
</main>
<?php get_footer(); ?>