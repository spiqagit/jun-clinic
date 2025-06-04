<?php
/* ---------- デフォルト設定 ---------- */
// titleタグの出力
add_theme_support('title-tag');
// 固定ページで抜粋を有効化
add_post_type_support('page', 'excerpt');
// アイキャッチ画像を有効化
add_theme_support('post-thumbnails');
//自動更新を無効化
add_filter('automatic_updater_disabled', '__return_true');

/* ---------- 管理画面 ---------- */
// サイドメニューを非表示
function remove_menus()
{
    remove_menu_page('edit.php'); // 投稿
    remove_menu_page('edit-comments.php'); // コメント
}
add_action('admin_menu', 'remove_menus', 999);

/* ---------- 投稿関連 ---------- */
// single生成制御

// アーカイブの表示条件
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query())
        return;
    if ($query->is_post_type_archive('news')) {
        $query->set('posts_per_page', '12');
        $query->set('orderby', 'date');
    }
    if ($query->is_post_type_archive('column')) {
        $query->set('posts_per_page', '8');
        $query->set('orderby', 'date');
    }
    if ($query->is_tax('column-cat')) {
        $query->set('posts_per_page', '8');
        $query->set('orderby', 'date');
    }
    if ($query->is_tax('column-key')) {
        $query->set('posts_per_page', '8');
        $query->set('orderby', 'date');
    }
    if ($query->is_post_type_archive('case')) {
        $query->set('posts_per_page', '12');
        $query->set('orderby', 'date');
    }
}
add_action('pre_get_posts', 'change_posts_per_page');

// the_archive_title 余計な文字を削除
add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_date()) {
        $title = get_the_time('Y年n月');
    } elseif (is_search()) {
        $title = '検索結果：' . esc_html(get_search_query(false));
    } elseif (is_404()) {
        $title = '「404」ページが見つかりません';
    } else {
    }
    return $title;
});


// 一覧・single生成制御
function disable_faq_pages()
{
    if (is_singular('faq') || is_singular('price') || is_tax('faq-cat') || is_tax('menu-cat')) {
        global $wp_query;
        $wp_query->set_404();
        status_header(404);
        get_template_part(404);
        exit;
    }
}
add_action('template_redirect', 'disable_faq_pages');



/* ---------- 検索機能 ---------- */
add_filter('template_include', 'searchform_recruit');
function searchform_recruit($template)
{
    if (is_search()) {
        $post_types = get_query_var('post_type');
        foreach ((array) $post_types as $post_type)
            $templates[] = "search-{$post_type}.php";
        $templates[] = 'search.php';
        $template = get_query_template('search', $templates);
    }
    return $template;
}

function my_custom_search($search, $wp_query)
{
    global $wpdb;
    if (!$wp_query->is_search)
        return $search;
    if (!isset($wp_query->query_vars))
        return $search;
    $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
    if (count($search_words) > 0) {
        $search = '';
        foreach ($search_words as $word) {
            if (!empty($word)) {
                $search_word = '%' . esc_sql($word) . '%';
                $search .= " AND (
                    {$wpdb->posts}.post_title LIKE '{$search_word}'
                    OR {$wpdb->posts}.post_content LIKE '{$search_word}'
                    OR {$wpdb->posts}.ID IN (
                        SELECT distinct tr.object_id
                        FROM {$wpdb->term_relationships} AS tr
                        INNER JOIN {$wpdb->term_taxonomy} AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id
                        INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                        WHERE t.name LIKE '{$search_word}'
                        OR t.slug LIKE '{$search_word}'
                        OR tt.description LIKE '{$search_word}'
                    )
                    OR {$wpdb->posts}.ID IN (
                        SELECT distinct post_id
                        FROM {$wpdb->postmeta}
                        WHERE meta_value LIKE '{$search_word}'
                    )
                ) ";
            }
        }
    }
    return $search;
}
add_filter('posts_search', 'my_custom_search', 10, 2);
if (isset($_GET['s'])) $_GET['s'] = mb_convert_kana($_GET['s'], 's', 'UTF-8');


function my_custom_taxonomy_template($template): mixed
{
    if (is_tax('menu-cat')) {


        $type = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';

        // typeが空の場合はトップページへリダイレクト
        if ($type === '') {
            wp_redirect(home_url('/'));
            exit;
        }

        if ($type === 'price') {
            $new_template = locate_template('taxonomy-menu-cat_price.php');
            if ($new_template) {
                return $new_template;
            }
        } else {
            $new_template = locate_template('taxonomy-menu-cat-menu.php');
            if ($new_template) {
                return $new_template;
            }
        }
    }
    return $template;
}
add_filter('template_include', 'my_custom_taxonomy_template');


/* ---------- 
ブロックスタイル 
---------- */
function mytheme_register_block_styles()
{

    register_block_style(
        'core/list',
        array(
            'name'  => 'checklist',
            'label' => 'チェックリスト',
        )
    );

    register_block_style(
        'core/list',
        array(
            'name'  => 'image-list',
            'label' => '画像付きリスト',
        )
    );

    register_block_style(
        'core/group',
        array(
            'name'  => 'white-bg-group',
            'label' => '白背景付きグループ',
        )
    );
}
add_action('init', 'mytheme_register_block_styles');

/* ---------- 
エディター用CSS 
---------- */
function mytheme_editor_styles()
{
    add_theme_support('editor-styles');
    add_editor_style('assets/editor.css');
}
add_action('after_setup_theme', 'mytheme_editor_styles');



// 1. カテゴリー追加（コメント解除推奨）
// カテゴリーをまとめて追加
add_filter('block_categories_all', function ($categories) {
    $new_categories = [
        [
            'slug'  => 'menu-price',
            'title' => '施術メニュー料金表',
        ],
        [
            'slug'  => 'menu-case',
            'title' => '施術メニュー 症例',
        ],
        [
            'slug'  => 'menu-faq',
            'title' => 'よくある質問',
        ],
        [
            'slug'  => 'menu-img-details',
            'title' => '使用機器紹介リスト',
        ],
    ];
    // 2番目の位置にまとめて挿入
    array_splice($categories, 1, 0, $new_categories);
    return $categories;
});

// ACFブロック登録
add_action('acf/init', function () {
    $blocks_dir = get_template_directory() . '/block-list/';
    $blocks = [
        'menu-price',
        'menu-case',
        'menu-faq',
        'menu-img-details',
    ];

    foreach ($blocks as $block_name) {
        register_block_type(trailingslashit($blocks_dir) . $block_name);
    }
});
