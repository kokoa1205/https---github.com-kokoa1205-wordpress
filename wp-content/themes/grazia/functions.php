 <?php if (is_admin()) { ?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <script src="https://kit.fontawesome.com/60c46142bb.js" crossorigin="anonymous"></script>
 <?php   }


function twpp_enqueue_styles()
{
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('header-style', get_template_directory_uri().'/css/header.css');
    wp_enqueue_style('footer-style', get_template_directory_uri().'/css/footer.css');
    wp_enqueue_script('custom_script', get_template_directory_uri() . '/script/index.js', );
}

add_action('wp_enqueue_scripts', 'twpp_enqueue_styles');


function enable_thumbnail()
{
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'enable_thumbnail');


// スタイル投稿画面追加
function add_custom_post_type()
{
    // 制作実績
    register_post_type(
        'style', // 1.投稿タイプ名
        array(   // 2.オプション
            'label' => '制作実績', // 投稿タイプの名前
            'public'        => true, // 利用する場合はtrueにする
            'has_archive'   => true, // この投稿タイプのアーカイブを有効にする
            'menu_position' => 5, // この投稿タイプが表示されるメニューの位置
            'supports' => array( // サポートする機能
                'title'
            )
        )
    );
}
add_action('init', 'add_custom_post_type');


// カレンダー管理画面
add_action('admin_menu', 'calendar_menu_page');
function calendar_menu_page()
{
    add_menu_page('カレンダー管理', 'カレンダー管理', 'manage_options', 'calendar_menu_page', 'add_calendar_menu_page', 'dashicons-admin-generic', 6);
}
function add_calendar_menu_page()
{
    ?>
 <div class="wrap">
   <h2>カレンダー管理</h2>
 </div>
 <?php

// カレンダーサブ画面
}add_action('admin_menu', 'add_custom_submenu_page');
function add_custom_submenu_page()
{
    add_submenu_page('calendar_menu_page', '定休日追加画面', '定休日追加', 'manage_options', 'custom_submenu_page_1', 'add_holiday_menu_page', 1);
}

function add_holiday_menu_page()
{
    require 'calendar/holiday.php';
}
