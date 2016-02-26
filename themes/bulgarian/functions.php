<?php
// Connect style's on site head
function bulgarian_theme_header_style() {
    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . 		'/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap-responsive-style', get_stylesheet_directory_uri() . 		'/css/bootstrap-responsive.css' );
    wp_enqueue_style( 'bootstrap-theme-style', get_stylesheet_directory_uri() . 		'/css/bootstrap-theme.min.css' );
    wp_enqueue_style( 'bootstrap-select-style', get_stylesheet_directory_uri() . 		'/css/bootstrap-select.min.css' );
    wp_enqueue_style( 'bootstrap-owesome-style', get_stylesheet_directory_uri() . 		'/css/font-awesome.min.css' );
    wp_enqueue_style( 'lightgallery-theme-style', get_stylesheet_directory_uri() . 		'/js/lightgallery/css/lightgallery.min.css' );
    wp_enqueue_style( 'lightslider-theme-style', get_stylesheet_directory_uri() . 		'/css/lightslider/css/lightslider.css' );
    wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() . 		'/css/main-style.css' );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() .          '/js/bootstrap.min.js', '', '3.0', false );
    wp_enqueue_script( 'bootstrap-select-js', get_stylesheet_directory_uri() .          '/js/bootstrap-select.min.js', '', '3.0', false );
    wp_enqueue_script( 'lightgallery-js', get_stylesheet_directory_uri() . 			'/js/lightgallery/js/lightgallery.min.js', '', '', false );
    wp_enqueue_script( 'lightslider-js', get_stylesheet_directory_uri() . 			'/js/lightslider/js/lightslider.min.js', '', '', false );
    wp_enqueue_script( 'all', get_stylesheet_directory_uri() . 			'/js/all.js', '', '3.0', false );
}
add_action( 'wp_head', 'bulgarian_theme_header_style' );

function true_style_backend() {
    wp_enqueue_style( 'true_style', get_stylesheet_directory_uri() . '/assets/css/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'true_style_backend' );

// Optimization CMS
remove_action('wp_head','feed_links_extra', 3); // ссылки на дополнительные rss категорий
remove_action('wp_head','feed_links', 2); //ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // для сервиса Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // для Windows Live Writer
remove_action('wp_head','wp_generator');  // убирает версию wordpress
// убираем разные ссылки при отображении поста - следующая, предыдущая запись, оригинальный url и т.п.
remove_action('wp_head','start_post_rel_link',10,0);
remove_action('wp_head','index_rel_link');
remove_action('wp_head','rel_canonical');
remove_action( 'wp_head','adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head','wp_shortlink_wp_head', 10, 0 );

// Rus to lat
$chars = array(
//rus
    "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
    "Е"=>"E","Ё"=>"YO","Ж"=>"ZH",
    "З"=>"Z","И"=>"I","Й"=>"Y","К"=>"K","Л"=>"L",
    "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
    "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
    "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"",
    "Ы"=>"Y","Ь"=>"","Э"=>"YE","Ю"=>"YU","Я"=>"YA",
    "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
    "е"=>"e","ё"=>"yo","ж"=>"zh",
    "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
    "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
    "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
    "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
    "ы"=>"y","ь"=>"","э"=>"ye","ю"=>"yu","я"=>"ya",
//spec
    "—"=>"-","«"=>"","»"=>"","…"=>"","№"=>"N",
    "—"=>"-","«"=>"","»"=>"","…"=>"",
    "!"=>"","@"=>"","#"=>"","$"=>"","%"=>"","^"=>"","&"=>"",
//ukr
    "Ї"=>"Yi","ї"=>"i","Ґ"=>"G","ґ"=>"g",
    "Є"=>"Ye","є"=>"ie","І"=>"I","і"=>"i",
//kazakh
    "Ә"=>"A","Ғ"=>"G","Қ"=>"K","Ң"=>"N","Ө"=>"O","Ұ"=>"U","Ү"=>"U","H"=>"H",
    "ә"=>"a","ғ"=>"g","қ"=>"k","ң"=>"n","ө"=>"o", "ұ"=>"u","h"=>"h"
);

function rutranslit($title) {
    global $chars;

    if (seems_utf8($title)) $title = urldecode($title);

    $title = preg_replace('/\.+/','.',$title);
    $r = strtr($title, $chars);

    return $r;
}

add_filter('sanitize_file_name','rutranslit');
add_filter('sanitize_title','rutranslit');



register_nav_menus(array(
    'main_menu'    => __('Главное меню','marg-theme'),    // Main Menu
));

// Подключаем нужные классы
include_once('inc/breadcrumb.php');
/*require_once('inc/object.php');*/
include_once('plugins/acf-repeater/acf-repeater.php');


function pagination() { // функция вывода пагинации
    global $wp_query; // текущая выборка должна быть глобальной
    $big = 999999999; // число для замены
    $pages = paginate_links(array( // вывод пагинации с опциями ниже
        'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
        'format' => '?paged=%#%', // формат, %#% будет заменено
        'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
        'type' => 'list', // ссылки в ul
        'prev_text'    => '<-', // текст назад
        'next_text'    => '->', // текст вперед
        'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
        'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
        'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
        'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
        'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
        'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
        'before_page_number' => '', // строка перед цифрой
        'after_page_number' => '', // строка после цифры
        'type'  => 'array'
    ));
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<div class="content-pagination"><ul class="list-inline text-center content-pagination">';
        foreach ( $pages as $page ) {
            echo "<li>$page</li>";
        }
        echo '</ul></div>';
    }
}

