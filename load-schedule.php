<?php
  global $wpdb;
  $rows = $wpdb->get_results("SELECT * FROM $wpdb->attmgr_schedule ORDER BY date, starttime");
  $day = current_time('Y-m-d');
	$week = ['日','月','火','水','木','金','土'];
?>