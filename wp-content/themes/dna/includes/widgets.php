<?php
/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class ssw_face_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'ssw_face_widget',
      // widget name
      "Face Widget SSW",
      // widget description
      array( 'description' => __( 'Face widget SSW', 'ssw_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "FaceBook Feed";
    $faceUrl = isset($instance[ 'faceUrl' ]) ? $instance[ 'faceUrl' ] : "https://www.facebook.com/";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'faceUrl' ); ?>">Url do perfil do FaceBook</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'faceUrl' ); ?>" name="<?php echo $this->get_field_name( 'faceUrl' ); ?>" type="text" value="<?php echo esc_attr( $faceUrl ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // facebook
    ?>
    <div 
      class="fb-page" 
      data-href="<?php echo($instance['faceUrl']); ?>"
      data-tabs="timeline" data-width="340" data-height="" 
      data-small-header="false" data-adapt-container-width="true" 
      data-hide-cover="false" data-show-facepile="false"
      >
      <blockquote cite="<?php echo($instance['faceUrl']); ?>" class="fb-xfbml-parse-ignore">
        <a href="<?php echo($instance['faceUrl']); ?>">Prestes Construtora e Incorporadora</a>
      </blockquote>
    </div>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" 
    src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v4.0"></script>
    <?php
    echo $args['after_widget'];
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['faceUrl'] = ( ! empty( $new_instance['faceUrl'] ) ) ? strip_tags( $new_instance['faceUrl'] ) : '';
    return $instance;
  }
}

/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class ssw_listaCategoriasBlog_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'ssw_listaCategorias_widget',
      // widget name
      "Lista categorias de Imóveis SSW",
      // widget description
      array( 'description' => __( 'SSWForMarketing  blog categorias', 'ssw_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "Categorias";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // corpo
    ?>
    <ul class="row categorias">
            <?php
            $categorias = get_categories();
            foreach ($categorias as $cat) {
                $permalink = get_term_link($cat);
            ?>
            <li class="col-12">
                <a href="<?php echo $permalink; ?>">
                    <?php echo $cat->name; ?>
                </a>
            </li>
            <?php
            }
            ?>
        </ul>
    <ul>
    <style>
    ul.categorias{
        list-style: none;
        padding: 0;
    }
    ul.categorias li{
        font-size: 18px;
        text-align: center;
        color: #768791;
        transition: all .3s;
        margin-bottom: 20px;
    }
    ul.categorias li:hover{
        font-weight: bold;
        color: #263843;
    }
    </style>
    <?php
    echo $args['after_widget'];
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}

/**
 * registra widget para mostrar facebook
 * @author Vinicius de Santama
 */
class ssw_listaMaisVisitados_widget extends WP_Widget {

  public function __construct(){
    parent::__construct(
      // widget ID
      'ssw_listaMaisVisitados_widget',
      // widget name
      "Lista os posts mais visitados do blog SSW",
      // widget description
      array( 'description' => __( 'Mais visitados SSW', 'ssw_widget_domain' ), )
    );
  }

  public function form($instance) {
    $title = isset($instance[ 'title' ]) ? $instance[ 'title' ] : "Mais Visitados";
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Título</label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }
  
  public function widget($args, $instance) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    echo $args['before_widget'];
    //if title is present
    echo $args['before_title'];
    if(empty($instance['title'])){
      echo("");
    } else{
      echo($instance['title']);
    }
    echo $args['after_title'];
    // corpo: Atenção as funções de adicionar e resgatar post views está em outro arquivo
    $blogPosts = ssw_getPostByViews();
    $query_trending = new WP_Query( $argsQuery );
    ?>
    <div class="col mais-visitados">
        <?php
        foreach ($blogPosts as $blogPost) {
            $permalink = get_permalink($blogPost->ID);
            $thumb = get_the_post_thumbnail($blogPost->ID,
                                'post-thumbnail'
            );
            $postDate = get_the_date('d/m/Y',$blogPost->ID);
        ?>
        <a href="<?php echo $permalink; ?>">
            <div class="row item">
                <div class="col-4">
                    <?php echo $thumb; ?>
                </div>
                <div class="col-8 row">
                    <p class="title col-12 mt-auto"><?php echo $blogPost->post_title ?></p>
                    <p class="date col-12 mb-auto"><?php echo $postDate ?></p>
                </div>
            </div>
        </a>
        <?php
        }
        ?>
    </div>
    <style>
    .mais-visitados .item{
        margin-bottom: 30px;
    }
    .mais-visitados .item img{
        width: 100px;
        height: 100px;
        border-radius: 50%;
    }
    .mais-visitados .item p.title{
        font-size: 14px;
        color: #768791;
        margin-bottom: 5px;
    }
    .mais-visitados .item p.date{
        font-size: 14px;
        line-height: 18px;
        color: #C3CCD3;
        margin-bottom: 0;
    }
    </style>
    <?php
    echo $args['after_widget'];
    wp_reset_postdata();
  }

  public function update($new_instance, $old_instance) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}


/**
 * função para o registro dos widgets
 * @author Vinicius de Santana
 */
function ssw_register_widget() {
  register_widget('ssw_face_widget');
  register_widget('ssw_listaCategoriasBlog_widget');
  register_widget('ssw_listaMaisVisitados_widget');
}

add_action( 'widgets_init', 'ssw_register_widget' );