<?php

/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
function optionsframework_option_name() {
    // This gets the theme name from the stylesheet (lowercase and without spaces)
    $themename = get_theme_data(TEMPLATEPATH . '/style.css');
    $themename = $themename['Name'];
    $themename = preg_replace("/\W/", "", strtolower($themename));
    $optionsframework_settings = get_option('optionsframework');
    $optionsframework_settings['id'] = $themename;
    update_option('optionsframework', $optionsframework_settings);
    // echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */
function optionsframework_options() {
    $themename = get_theme_data(TEMPLATEPATH . '/style.css');
    $themename = $themename['Name'];
    $shortname = "of";
    // Background Defaults
    $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
    //Stylesheet Reader
    $alt_stylesheets = array("black" => "black", "blue" => "blue", "green" => "green", "grass" => "grass", "maroon" => "maroon", "orange" => "orange", "purple" => "purple", "red" => "red");

    // Multicheck Array
    $multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
    // Multicheck Defaults
    // Pull all the categories into an array
    $options_categories = array();
    $options_categories_obj = get_categories('hide_empty=0');
    foreach ($options_categories_obj as $category) {
        $options_categories[$category->cat_ID] = $category->cat_name;
    }
    // Pull all the pages into an array
    $options_pages = array();
    $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
    $options_pages[''] = 'Select a page:';
    foreach ($options_pages_obj as $page) {
        $options_pages[$page->ID] = $page->post_title;
    }
    // If using image radio buttons, define a directory path
    $imagepath = get_template_directory_uri() . '/images/';
    $options = array();
    $options[] = array("name" => "General Settings",
        "type" => "heading");
    $options[] = array("name" => "Собственное лого",
        "desc" => "Загрузите собственный логотип. Оптимальный размер: 300px в ширину и 90px в высоту.",
        "id" => "85415415",
        "type" => "upload");

    $options[] = array("name" => "Собственный Favicon",
        "desc" => "Размер должен быть 16px x 16px",
        "id" => "inkthemes_favicon",
        "type" => "upload");

    $options[] = array("name" => "Фоновое изображение",
        "desc" => "Выберите фоновое изображение для сайта",
        "id" => "inkthemes_bodybg",
        "std" => "",
        "type" => "upload");

    $options[] = array("name" => "Код Аналитики Google",
        "desc" => "Сюда вставьте код Аналитики Google",
        "id" => "inkthemes_analytics",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Правая часть хедера",
        "desc" => "Вы можете сюда вставить баннер или другое изображение",
        "id" => "inkthemes_topright",
        "std" => "",
        "type" => "textarea");
    //Slider Setting
    $options[] = array("name" => "Slider Setting",
        "type" => "heading");
    $options[] = array("name" => "Изображение 1",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "inkthemes_image1",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 2 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "4534",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 3 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "4345324",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 4 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "448258",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 5 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "42414242",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 6 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "4242758",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 7 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "72757271",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Изображение 8 (Доступно в премиум версии)",
        "desc" => "Оптимальный размер: 600px на 420px",
        "id" => "7727274",
		"class" => "trialhint",
        "std" => "",
        "type" => "upload");
    //Feature Section
    $options[] = array("name" => "Homepage Feature ",
        "type" => "heading");
    //First Heading
    $options[] = array("name" => "Нижняя часть хедера",
        "desc" => "введите сюда текст",
        "id" => "inkthemes_first_head",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Изображения",
        "type" => "saperate",
        "class" => "saperator");
    //First Feature Image
    $options[] = array("name" => "Изображение 1",
        "desc" => "Загрузите сюда ваше изображение. Размер 202px x 134px.",
        "id" => "inkthemes_feature_img1",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Ссылка 1",
        "desc" => "Введите здесь адрес ссылки",
        "id" => "inkthemes_first_link",
        "std" => "",
        "type" => "text");
    //Second Feature Image
    $options[] = array("name" => "Изображение 2",
        "desc" => "Загрузите сюда ваше изображение. Размер 202px x 134px.",
        "id" => "inkthemes_feature_img2",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Ссылка 2",
        "desc" => "Введите здесь адрес ссылки",
        "id" => "inkthemes_second_link",
        "std" => "",
        "type" => "text");
    //Third Feature Image
    $options[] = array("name" => "Изображение 3",
        "desc" => "Загрузите сюда ваше изображение. Размер 202px x 134px.",
        "id" => "inkthemes_feature_img3",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Ссылка 3",
        "desc" => "Введите здесь адрес ссылки",
        "id" => "inkthemes_third_link",
        "std" => "",
        "type" => "text");
    //Fourth Feature Image
    $options[] = array("name" => "Изображение 4",
        "desc" => "Загрузите сюда ваше изображение. Размер 202px x 134px.",
        "id" => "inkthemes_feature_img4",
        "std" => "",
        "type" => "upload");
    $options[] = array("name" => "Ссылка 4",
        "desc" => "Введите здесь адрес ссылки",
        "id" => "inkthemes_fourth_link",
        "std" => "",
        "type" => "text");
    //Property Listing Category
    $options[] = array("name" => "Обзор списка недвижимости",
        "type" => "heading");
    $options[] = array("name" => "Включите категории в список 1",
        "desc" => "Выберите элементы, которые вы хотите включить",
        "id" => "listings1",
        "type" => "multicheck",
        "options" => $options_categories);

    $options[] = array("name" => "Включите категории в список 2",
        "id" => "65458454",
        "type" => "multicheck",
        "std" => "",
        "desc" => "Выберите элементы, которые вы хотите включить",
        "usefor" => "categories",
        "excludeDefault" => 'true',
        "options" => $options_categories);

    $options[] = array("name" => "Включите категории в список 3",
        "id" => "8456156",
        "type" => "multicheck",
        "std" => "false",
        "desc" => "Выберите элементы, которые вы хотите включить",
        "usefor" => "categories",
        "excludeDefault" => 'true',
        "options" => $options_categories);

    $options[] = array("name" => "Включите категории в список 4",
        "id" => "54545454",
        "type" => "multicheck",
        "std" => "",
        "desc" => "Выберите элементы, которые вы хотите включить",
        "usefor" => "categories",
        "excludeDefault" => 'true',
        "options" => $options_categories);

    //Homepage Bottom Section
    $options[] = array("name" => "Homepage Bottom Section",
        "type" => "heading");
    $options[] = array("name" => "Заголовок левой колонки",
        "desc" => "Заголовок левой колонки",
        "id" => "inkthemes_leftcolhead",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Описание левой колонки",
        "desc" => "Описание левой коноки",
        "id" => "inkthemes_leftcoldesc",
        "std" => "",
        "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
    $options[] = array("name" => "Styling Options",
        "type" => "heading");
    $options[] = array("name" => "Собственные CSS",
        "desc" => "введите сюда собственные стили",
        "id" => "inkthemes_customcss",
        "std" => "",
        "type" => "textarea");
    //------------------------------------------------------------------//
//-------------This code is used for creating SEO description-------//							
//------------------------------------------------------------------//						
    $options[] = array("name" => "SEO Options",
        "type" => "heading");
    $options[] = array("name" => "Ключевые слова (разделяйте запятой)",
        "desc" => "Лимит - 8 слов",
        "id" => "inkthemes_keyword",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Описание",
        "desc" => "Максимальная длина - 155 символов.",
        "id" => "inkthemes_description",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Биография автора",
        "desc" => "Опишите себя",
        "id" => "inkthemes_author",
        "std" => "",
        "type" => "textarea");
    $options[] = array("name" => "Footer Settings",
        "type" => "heading");
    $options[] = array("name" => "Текст футера (тольок для премиум версии) ",
        "desc" => "",
        "id" => "5451545425",
		"class" => "trialhint",
        "std" => "",
        "type" => "textarea");
    update_option('of_themename', $themename);
    return $options;
}