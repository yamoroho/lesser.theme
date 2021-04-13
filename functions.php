<?php
// Добавление расширенных возможностей

add_theme_support( 'post-thumbnails', array( 'blog', 'post', 'page' ) );      

if ( ! function_exists( 'lesser_theme_setup' ) ) :
  function lesser_theme_setup() {
    // Регистрация меню
    register_nav_menus( [
      'header_menu' => 'Menu in header',
      'footer_menu' => 'Menu in footer',      
    ] );    

    add_action( 'init', 'register_post_types' );
    function register_post_types(){
      register_post_type( 'blog', [
        'label'  => null,
        'labels' => [
          'name'               => 'Блог', // основное название для типа записи
          'singular_name'      => 'Запись', // название для одной записи этого типа
          'add_new'            => 'Добавить запись', // для добавления новой записи
          'add_new_item'       => 'Добавление записи', // заголовка у вновь создаваемой записи в админ-панели.
          'edit_item'          => 'Редактирование записи', // для редактирования типа записи
          'new_item'           => 'Новой записи', // текст новой записи
          'view_item'          => 'Смотреть записи', // для просмотра записи этого типа.
          'search_items'       => 'Искать запись', // для поиска по этим типам записи
          'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
          'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
          'parent_item_colon'  => '', // для родителей (у древовидных типов)
          'menu_name'          => 'Блог', // название меню
        ],
        'description'         => 'Раздел с блогами',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-book-alt',
        'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor', 'thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => ['blog_category'],
        'has_archive'         => true,
        'rewrite'             => true,
        'query_var'           => true,
      ] );
    
    register_post_type( 'reviews', [
      'label'  => null,
      'labels' => [
        'name'               => 'Отзывы', // основное название для типа записи
        'singular_name'      => 'Отзыв', // название для одной записи этого типа
        'add_new'            => 'Добавить отзыв', // для добавления новой записи
        'add_new_item'       => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item'          => 'Редактирование отзыва', // для редактирования типа записи
        'new_item'           => 'Нового отзыва', // текст новой записи
        'view_item'          => 'Смотреть отзывы', // для просмотра записи этого типа.
        'search_items'       => 'Искать отзыв', // для поиска по этим типам записи
        'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
        'parent_item_colon'  => '', // для родителей (у древовидных типов)
        'menu_name'          => 'Отзывы', // название меню
      ],
      'description'         => 'Раздел с отзывами',
      'public'              => true,
      // 'publicly_queryable'  => null, // зависит от public
      // 'exclude_from_search' => null, // зависит от public
      // 'show_ui'             => null, // зависит от public
      // 'show_in_nav_menus'   => null, // зависит от public
      'show_in_menu'        => true, // показывать ли в меню адмнки
      // 'show_in_admin_bar'   => null, // зависит от show_in_menu
      'show_in_rest'        => true, // добавить в REST API. C WP 4.7
      'rest_base'           => null, // $post_type. C WP 4.7
      'menu_position'       => 5,
      'menu_icon'           => 'dashicons-format-quote',
      'capability_type'   => 'post',
      //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
      //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
      'hierarchical'        => false,
      'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
      'has_archive'         => true,
      'rewrite'             => true,
      'query_var'           => true,
    ] );
  }

    // хук, через который подключается функция
    // регистрирующая новые таксономии (create_blog_taxonomies)
    add_action( 'init', 'create_blog_taxonomies' );

    // функция, создающая таксономии 
    function create_blog_taxonomies(){

      // Добавляем древовидную таксономию 
      register_taxonomy('blog_category', array('blog'), array(
        'hierarchical'  => true,
        'labels'        => array(
          'name'              => _x( 'Categories', 'taxonomy general name' ),
          'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
          'search_items'      =>  __( 'Search Categories' ),
          'all_items'         => __( 'All Categories' ),
          'parent_item'       => __( 'Parent Category' ),
          'parent_item_colon' => __( 'Parent Category:' ),
          'edit_item'         => __( 'Edit Categorye' ),
          'update_item'       => __( 'Update Category' ),
          'add_new_item'      => __( 'Add New Category' ),
          'new_item_name'     => __( 'New Category Name' ),
          'menu_name'         => __( 'Категории' ),
        ),
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => array( 'slug' => 'blog_category' ), // свой слаг в URL

        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => true, // добавить в REST API
        'rest_base'             => 'blog_category',
      ));
    }

  }
endif;
add_action( 'after_setup_theme', 'lesser_theme_setup');

function lesser_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar in single-page blog', 'lessertheme' ),
			'id'            => 'sidebar-single-blog',
			'description'   => esc_html__( 'Добавьте виджеты сюда.', 'lessertheme' ),
			'before_widget' => '<div class="row"><div class="col-md-12 side">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
    )
	);
  register_sidebar(
    array(
			'name'          => esc_html__( 'Sidebar in single-page portfolio', 'lessertheme' ),
			'id'            => 'sidebar-single-portfolio',
			'description'   => esc_html__( 'Добавьте виджеты сюда.', 'lessertheme' ),
			'before_widget' => '<div class="row"><div class="col-md-12 side">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'lesser_theme_widgets_init' );

/**
 * Добавление нового виджета Category_Links_Widget.
 */
class Category_Links_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'category_links_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: category_linksr_widget
			'Ссылки на категории',
			array( 'description' => 'Ссылки на категории на странице товара', 
      'classname' => 'widget-category_links', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_category_links_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_category_links_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = $instance['title'];
    $description = $instance['description'];
    $link = $instance['link'];


		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
    if ( ! empty( $number_of_links ) ) {
			
		}
    
    // wp_list_categories(array(
    //   'taxonomy'     => 'blog_category', // название таксономии
    //   'orderby'      => 'name',  // сортируем по названиям
    //   'title_li'     => ''       // список без заголовка
    // ));

    $categories = get_categories( [
      'taxonomy'     => 'category',
      'type'         => 'post',
      'child_of'     => 0,
      'parent'       => '',
      'orderby'      => 'name',
      'order'        => 'ASC',
      'hide_empty'   => 1,
      'hierarchical' => 1,
      'exclude'      => '',
      'include'      => '',
      'number'       => 0,
      'pad_counts'   => false,
    ] );

   

    echo '<ul>';
    foreach( $categories as $category ){
      echo '<li><i class="icon-check"></i><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </li> ';
    }
    echo '</ul>';

    // var_dump($categories);
	

		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Категории';
    $number_of_links = @ $instance['number_of_links'] ?: '8';
    // $post_type = @ $instance['post_type'] ?: 'blog';


		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'number_of_links' ); ?>"><?php _e( 'Максимальное количество:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'number_of_links' ); ?>" name="<?php echo $this->get_field_name( 'number_of_links' ); ?>" type="text" value="<?php echo esc_attr( $number_of_links ); ?>">
		</p>
    <!-- <p>
			<label for="<?php echo $this->get_field_id( 'post_type' ); ?>"><?php _e( 'Тип поста (blog или portfolio):' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'post_type' ); ?>" name="<?php echo $this->get_field_name( 'post_type' ); ?>" type="text" value="<?php echo esc_attr( $post_type ); ?>">
		</p> -->
		<?php 
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['number_of_links'] = ( ! empty( $new_instance['number_of_links'] ) ) ? strip_tags( $new_instance['number_of_links'] ) : '';
   // $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_category_links_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_category_links_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('category_links_widget_script', $theme_url .'/category_links_widget_script.js' );
	}

	// стили виджета
	function add_category_links_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_category_links_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.my_widget a{ display:inline; }
		</style>
		<?php
	}

} 
// конец класса Category_Links_Widget

// регистрация Category_Links_Widget в WordPress
function register_category_links_widget() {
	register_widget( 'Category_Links_Widget' );
}
add_action( 'widgets_init', 'register_category_links_widget' );

// Подключение стилей и скриптов
add_action( 'wp_enqueue_scripts', 'enqueue_lesser_style' );
function enqueue_lesser_style() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css?family=Roboto:400,100,300,700,900');
  wp_enqueue_style( 'Playfair', '//fonts.googleapis.com/css?family=Playfair+Display:400,700');
  wp_enqueue_style( 'swiper-slider', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css', 'lesser-theme', time());  
  wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', 'lesser-theme', time());
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', 'lesser-theme', time());
  wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/assets/css/icomoon.css', 'lesser-theme', time());
  wp_enqueue_style( 'simple-line-icons', get_template_directory_uri() . '/assets/css/simple-line-icons.css', 'lesser-theme', time());
  wp_enqueue_style( 'lesser-theme', get_template_directory_uri() . '/assets/css/lesser-theme.css', 'style', time());
  
  wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.6.0.min.js');
	wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', null, time(), true);
  wp_enqueue_script( 'google-map', get_template_directory_uri() . '/assets/js/google-map.js', null, time(), true);
  wp_enqueue_script( 'easing', get_template_directory_uri() . '/assets/js/jquery.easing.1.3.js', 'jquery', time(), true); 
  wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', 'jquery', time(), true); 
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr-2.6.2.min.js', null, time(), true); 
  wp_enqueue_script( 'respond', get_template_directory_uri() . '/assets/js/respond.min.js', null, time(), true); 
  wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', null, time(), true); 
}
