<?php

function my_setup()
{
add_theme_support('post-thumbnails'); 
add_theme_support('automatic-feed-links'); 
add_theme_support('title-tag'); 
add_theme_support(
'html5',
array( 
'search-form',
'comment-form',
'comment-list',
'gallery',
'caption',
)
);
}

add_action('after_setup_theme', 'my_setup');

function my_script_init()
{
wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2', 'all');
wp_enqueue_style('my', get_template_directory_uri() . '/sass/style.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'my_script_init');

function admin_attend_manage_menu() {
	add_menu_page( '出勤管理', '出勤管理' , 'administrator', 'attendance_manage', -1);
}
add_action('admin_menu', 'admin_attend_manage_menu');

function admin_analytics_menu_link() {
	?>
<script>
jQuery(function($) {
  var menu_slug = 'attendance_manage';
  $('a.toplevel_page_' + menu_slug).prop({
    href: "../admin_scheduler/",
    target: "_blank"
  });
});
</script><?php
}
add_action('admin_print_footer_scripts', 'admin_analytics_menu_link');

function hidden_checkbox() {
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





// ADD COLUMNS
function user_priority_column($columns) {
  unset($columns['ID']);
  $columns['priority']='表示順';
  return $columns;
}
add_filter( 'manage_users_columns', 'user_priority_column' );

// APPLY SORT
function user_sortable_column($columns) {
  $add_columns = [
    'priority' => '表示順',
  ];
  return array_merge($columns, $add_columns);
}
add_filter('manage_users_sortable_columns', 'user_sortable_column');

function my_pre_get_users($query) {
  if(!is_admin()) return;
  if($orderby = $query->get('orderby')) {
    switch($orderby) {
      case '表示順':
        $query->set('meta_key', 'priority');
        $query->set('orderby', 'meta_value_num');
        break;
    }
  }
}
add_action('pre_get_users', 'my_pre_get_users');


function sortable_userlist() {
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

//投稿画面のすぐに公開ボタンを非表示
function hide_publishing_actions(){
    $my_post_type = 'diary';//カスタム投稿タイプの場合ここに名前を指定する
    global $post;
    if($post->post_type == $my_post_type){
        echo '
                <style type="text/css">
                    .misc-pub-curtime
                    {
                        display:none;//非表示にしたいアクションのidを指定する
                    };
                </style>
            ';
    }
}
add_action('admin_head-post.php', 'hide_publishing_actions');
add_action('admin_head-post-new.php', 'hide_publishing_actions');


//記事タイトルを公開日＋投稿者に設定
add_action('save_post', 'change_diary_title', 10, 3);
function change_diary_title($post_ID, $post, $update) {
    if($post->post_type == 'diary' && $post->post_status == 'publish') {
        $user_id = get_field('user', $post_ID); // Get the user ID from ACF field
        if ($user_id) {
            $user_info = get_userdata($user_id);
            $display_name = $user_info->display_name;
            $new_title = get_the_date('Y-m-d', $post_ID) . ' - ' . $display_name;

            // Avoid infinite loops of save_post action
            remove_action('save_post', 'change_diary_title');
            wp_update_post(array(
                'ID' => $post_ID,
                'post_title' => $new_title
            ));
            add_action('save_post', 'change_diary_title', 10, 3);
        }
    }
}

//管理画面 投稿一覧の日時を日本のUTCで
// カスタム投稿タイプ 'diary' の一覧ページに 'display_name' カラムを追加
add_filter('manage_diary_posts_columns', 'add_display_name_column');
function add_display_name_column($columns) {
    $new_columns = array();

    foreach ($columns as $key => $title) {
        $new_columns[$key] = $title;
        if ($key == 'title') {
            $new_columns['display_name'] = '表示名'; // 新しいカラム 'display_name' を追加
        }
    }

    return $new_columns;
}

// 'display_name' カラムにユーザーの表示名を表示
add_action('manage_diary_posts_custom_column', 'show_acf_user_column', 10, 2);
function show_acf_user_column($column_name, $post_id) {
    if ($column_name == 'display_name') {
        $user_id = get_field('user', $post_id); // ACFフィールド 'user' からユーザーIDを取得
        if ($user_id) {
            $user_info = get_userdata($user_id);
            $display_name = $user_info->display_name;
            if ($display_name) {
                echo esc_html($display_name);
            }
        }
    }
}

// 'display_name' カラムでソート可能にする
add_filter('manage_edit-diary_sortable_columns', 'custom_diary_sortable_columns');
function custom_diary_sortable_columns($columns) {
    $columns['display_name'] = 'display_name'; // カラム名を指定
    $columns['diary_date_japan'] = 'diary_date_japan'; // カラム名を指定
    return $columns;
}

// カスタム投稿タイプ 'diary' の一覧ページのカラムを変更
function custom_diary_columns($columns) {
    // 既存の日付列を削除
    unset($columns['date']);

    // 新しいカラム 'diary_date_japan' を追加
    $columns['diary_date_japan'] = '日付';

    return $columns;
}
add_filter('manage_edit-diary_columns', 'custom_diary_columns');

// カラムの内容を表示
function custom_diary_column_content($column, $post_id) {
    if ($column === 'diary_date_japan') {
        // ACFフィールド 'diary_date_japan' の値を取得して表示
        echo esc_html(get_field('diary_date_japan', $post_id));
    }
}
add_action('manage_diary_posts_custom_column', 'custom_diary_column_content', 10, 2);




/**
 * ユーザー編集(ユーザー新規追加、プロフィール含む)の名姓の項目を姓名の順にします。
 */
function lastfirst_name() {
	?><script>
jQuery(function($) {
  $('#last_name').closest('tr').after($('#first_name').closest('tr'));
});
</script><?php
}
add_action( 'admin_footer-user-new.php', 'lastfirst_name' );
add_action( 'admin_footer-user-edit.php', 'lastfirst_name' );
add_action( 'admin_footer-profile.php', 'lastfirst_name' );

add_action( 'admin_print_scripts-profile.php', 'my_custom_order' );

//remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

//プロフィール表示項目編集（My WP Customize Admin/Frontendを使用するとプロフィール一覧のページごと表示数が変更できないため下記で代替）
function user_profile_hide_script( $hook ) {
$script = <<<SCRIPT
jQuery(function($) {
  jQuery('#your-profile .user-role-wrap').hide(); //権限グループ
  jQuery('#your-profile .user-rich-editing-wrap').hide(); //ビジュアルエディター
  jQuery('#your-profile .user-syntax-highlighting-wrap').hide(); //シンタックスハイライト
  jQuery('#your-profile .user-admin-color-wrap').hide(); //管理画面の配色
  jQuery('#your-profile .user-comment-shortcuts-wrap').hide(); //キーボードショートカット
  jQuery('#your-profile .show-admin-bar').hide(); //ツールバー
  jQuery('#your-profile .user-language-wrap').hide(); //言語
  jQuery('#your-profile .user-user-login-wrap').hide(); //ユーザー名
  jQuery('#your-profile .user-email-wrap').hide(); //メールアドレス
  jQuery('#your-profile .user-url-wrap').hide(); //サイト
  jQuery('#your-profile .user-aim-wrap').hide(); //AIM
  jQuery('#your-profile .user-pass1-wrap').hide(); //新しいパスワード
  jQuery('#your-profile .user-sessions-wrap').hide(); //セッション
	jQuery('#attmgr_ex_fields_title').hide(); //Attendance Manager の拡張項目
	jQuery('.attmgr_ex_fields_title').hide(); //スタッフ


});
SCRIPT;
wp_add_inline_script( 'jquery-core', $script );
}
add_action( 'admin_enqueue_scripts', 'user_profile_hide_script' );


add_action('wp_footer', function() {

  wp_enqueue_script( 'lazeload_twitter', get_stylesheet_directory_uri() .'/js/lazyload-twitter.js', [], 'v1.0.0' );

}, 11);


//記事内の最初の画像を取得
function catch_that_image() {
    global $post;
    $first_img = '';

    // ACFで設定された画像のURLを取得
    $image = get_field('image_1', $post->ID);

    if ($image) {
        $first_img = $image;
    } else {
        // デフォルトの画像を指定
        $first_img = "https://frog-spa.com/wp-content/themes/frogspa/images/noimage.jpg";
    }

    return $first_img;
}




// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'diary'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

//archiveページについて
function custom_pre_get_posts($query) {
  if(is_admin() || !$query->is_main_query()) {
    return;
  }
  if($query->is_author()) {
    $query->set('post_type', array('post', 'diary'));
  }
}
add_action('pre_get_posts', 'custom_pre_get_posts');





//diaryの記事スラッグ変更
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );



function custom_disable_redirect_canonical($redirect_url)
{
    if (is_author()) {
        return false;
    }
    return $redirect_url;
}

add_filter('redirect_canonical', 'custom_disable_redirect_canonical');






function fix_author_paged_query($query) {
    if ($query->is_main_query() && is_author() && is_archive()) {
        if (get_query_var('paged')) {
            $query->set('post_type', 'diary');
            $query->set('meta_query', array(
                array(
                    'key'   => 'user',
                    'value' => get_query_var('author'),
                ),
            ));
        }
    }
}
add_action('pre_get_posts', 'fix_author_paged_query');

// ページネーションのリンク修正
function custom_pagination_links($args) {
    $user_id = get_query_var('author');
    $args['base'] = add_query_arg(array('author' => $user_id, 'paged' => '%#%'), home_url('/diary/'));
    return $args;
}
add_filter('paginate_links', 'custom_pagination_links');

// 投稿者別アーカイブページ作成
function author_search_filter($query) {
    if (is_author() && $query->is_main_query()) {
        $user_id = get_query_var('author');
        $query->set('post_type', array('diary'));
        $query->set('meta_query', array(
            array(
                'key'   => 'user',
                'value' => $user_id,
            ),
        ));
    }
}
add_action('pre_get_posts', 'author_search_filter');


function custom_diary_template($template) {
    // 特定の条件を満たす場合
    if (isset($_GET['author']) && is_numeric($_GET['author'])) {
        // 'archive-author.php' テンプレートファイルが存在するか確認
        $new_template = locate_template(array('archive-author.php'));

        // 'archive-author.php' が存在する場合、そのテンプレートを使用
        if (!empty($new_template)) {
            return $new_template;
        }
    }

    // 元のテンプレートを使用
    return $template;
}
add_filter('template_include', 'custom_diary_template');


//記事のUTCを日本に設定
function enqueue_custom_admin_scripts() {
    global $post_type;

    // "diary" カスタム投稿タイプの場合にのみスクリプトを読み込む
    if ('diary' === $post_type) {
        wp_enqueue_script('custom-diary-timezone', get_template_directory_uri() . '/js/custom-diary-timezone.js', array('jquery'), null, true);
    }
}
add_action('admin_enqueue_scripts', 'enqueue_custom_admin_scripts');


//?cid= のパラメーターがある場合リアルタイム情報が出る
function custom_rewrite_rule() {
    add_rewrite_rule(
        '^frog-spa/author/([^/]+)/?$',
        'index.php?pagename=frog-spa&cid=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_rewrite_rule');

//?cid= のパラメーターを削除してサイトを表示
function remove_query_string_redirect() {
    if (is_author() && isset($_GET['cid'])) {
        $author_url = get_author_posts_url(get_queried_object_id());
        wp_redirect(remove_query_arg('cid', $author_url), 301);
        exit();
    }
}
add_action('template_redirect', 'remove_query_string_redirect');
?>
<?php // ユーザー一覧のアバターを非表示にする
add_action('admin_head', function() {
    echo '<style>
        .wp-user-avatar {
            display: none !important;
        }
    </style>';
});?>