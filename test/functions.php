<?php
// Эта функция помещает файл Normalize.css в очередь для использования. Первый параметр это имя таблицы стилей, второе это URL. Здесь мы
// используем онлайн версию css файла.
function add_normalize_CSS() {
    wp_enqueue_style( 'normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
// Регистрирует новую боковую панель под названием 'sidebar'
function add_widget_Support() {
                register_sidebar( array(
                                'name' => 'Sidebar',
                                'id' => 'sidebar',
                                'before_widget' => '<div>',
                                'after_widget' => '</div>',
                                'before_title' => '<h2>',
                                'after_title' => '</h2>',
                ) );
}
// Подхватывает(hook) инициацию виджета и запускает нашу функцию
add_action( 'widgets_init', 'add_Widget_Support' );
// Регистрирует новое навигационное меню
function add_Main_Nav() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
// Подхватывает (hook) init хук-событие, запускает функцию нашего навигационного меню
add_action( 'init', 'add_Main_Nav' );
add_action('init', 'my_custom_init');
function my_custom_init(){
	register_post_type('picture', array(
		'labels'             => array(
			'name'               => 'Картина', // Основное название типа записи
			'singular_name'      => 'Картина', // отдельное название записи типа picture
			'add_new'            => 'Добавить новую',
			'add_new_item'       => 'Добавить новую картину',
			'edit_item'          => 'Редактировать картину',
			'new_item'           => 'Новая картина',
			'view_item'          => 'Посмотреть картину',
			'search_items'       => 'Найти картину',
			'not_found'          => 'Картин не найдено',
			'not_found_in_trash' => 'В корзине картин не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Картины'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt','comments')
	) );
}