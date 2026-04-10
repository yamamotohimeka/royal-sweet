<!-- 出勤スケジュール -->
<div class="author-schedule">
  <p class="author-schedule__title">出勤予定</p>
  <ul class="author-schedule__content">
    <?php for ($i = 0; $i < 7; $i++): ?>
      <li class="author-schedule__content--list">
        <span class="cell cell-date" id="cellDate"
          data-date="<?php echo date('Y-m-d', strtotime("+" . $i . "day", current_time('timestamp'))); ?>">
          <?php echo date("m/d", strtotime("+" . $i . "day", current_time('timestamp'))); ?>
          <?php echo "(" . $week[date("w", strtotime("+" . $i . "day", current_time('timestamp')))] . ")"; ?>
        </span>
        <span class="cell cell-hour">
          <?php
          if ($rows) {
            foreach ($rows as $val) {
              if ($val->staff_id == $uid && $val->date == date('Y-m-d', strtotime('+' . $i . 'day', current_time('timestamp')))) {
                echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->starttime);
                echo '<span class="tilde">～</span>';
                echo preg_replace('/([0-9]{2})\:([0-9]{2})\:(00)/', '$1:$2', $val->endtime);
                break;
              } elseif ($val == end($rows)) {
                echo "-";
              }
            }
          } else {
            echo "-";
          } ?>
        </span>
      </li>
    <?php endfor; ?>
  </ul>
</div><!-- .author-schedule -->