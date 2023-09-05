<?php

// CUSTOM PROFILE FIELD
function my_admin_style()
{
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/custom.css');
}
add_filter('admin_enqueue_scripts', 'my_admin_style');


// スケジュール管理ページへのリンクをサイドバーに追加
function admin_attend_manage_menu()
{
  add_menu_page('出勤管理', '出勤管理', 'administrator', 'attendance_manage', -1);
}
add_action('admin_menu', 'admin_attend_manage_menu');

function admin_analytics_menu_link()
{
?>
  <script>
    jQuery(function($) {
      var menu_slug = 'attendance_manage';
      $('a.toplevel_page_' + menu_slug).prop({
        href: "../admin_scheduler/",
        target: "_blank"
      });
    });
  </script>
<?php
}

add_action('admin_print_footer_scripts', 'admin_analytics_menu_link');

function hidden_checkbox()
{
?>
  <script>
    // hidden checkbox relations
    jQuery(function($) {
      var check = $('[data-name="attmgr_ex_attr_staff"]');
      if (check) {
        var checktf = check.find('input[type="checkbox"]').prop('checked');
        if (checktf = true) {
          $('#attmgr_ex_attr_staff').prop('checked', true);
        } else {
          $('#attmgr_ex_attr_staff').prop('checked', false);
        }
      }
    });
  </script>
<?php
}
add_action("admin_print_footer_scripts-user-new.php", 'hidden_checkbox');

function sortable_userlist()
{
?>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/sort-user.js"></script>
  <style>
    .ui-sortable-helper {
      width: 100%;
      white-space: nowrap;
      box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.1);
    }
  </style>
<?php
}
add_action("admin_print_footer_scripts-users.php", 'sortable_userlist');


// ADD COLUMNS
function user_priority_column($columns)
{
  unset($columns['ID']);
  $columns['priority'] = '表示順';
  return $columns;
}
add_filter('manage_users_columns', 'user_priority_column');

// APPLY SORT
function user_sortable_column($columns)
{
  $add_columns = [
    'priority' => '表示順',
  ];
  return array_merge($columns, $add_columns);
}
add_filter('manage_users_sortable_columns', 'user_sortable_column');

function my_pre_get_users($query)
{
  if (!is_admin()) return;
  if ($orderby = $query->get('orderby')) {
    switch ($orderby) {
      case '表示順':
        $query->set('meta_key', 'priority');
        $query->set('orderby', 'meta_value_num');
        break;
    }
  }
}
add_action('pre_get_users', 'my_pre_get_users');

// 一覧で管理者を非表示にする。
function author_archive_redirect()
{
  if (is_author('tribestaff') || is_author('mrs5610')) {
    wp_redirect(home_url());
    exit;
  }
}
add_action('template_redirect', 'author_archive_redirect');

?>
<?php
/**
 * ユーザー編集(ユーザー新規追加、プロフィール含む)の名姓の項目を姓名の順にします。
 */
function lastfirst_name()
{
?><script>
    jQuery(function($) {
      $('#last_name').closest('tr').after($('#first_name').closest('tr'));
    });
  </script>
<?php
}
add_action('admin_footer-user-new.php', 'lastfirst_name');
add_action('admin_footer-user-edit.php', 'lastfirst_name');
add_action('admin_footer-profile.php', 'lastfirst_name');

?>