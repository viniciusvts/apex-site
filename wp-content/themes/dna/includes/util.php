<?php
function getNoAcentsString($string){
    $caracters = array('Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                    'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                    'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                    'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                    'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'A'=>'a', 'B'=>'b', 'A'=>'a', ' ' => '-');
    $str = strtr( $string, $caracters );
    return strtolower($str); 
}

/**
 * Itera o contador de views do post
 * @author Vinicius de Santana
 * @param string|int $postID ID do post ao qual deseja iterar
 */
function ssw_addViewToPost($postID) {
    $count = get_post_meta($postID, POST_META_COUNT, true);
    if($count==''){
        $count = 1;
        delete_post_meta($postID, POST_META_COUNT);
        add_post_meta($postID, POST_META_COUNT, $count);
    }else{
        $count++;
        update_post_meta($postID, POST_META_COUNT, $count);
    }
}
/**
 * Retorna a quantidade de views do post
 * @author Vinicius de Santana
 * @param string|int $postID ID do post
 */
function ssw_getPostViewCount($postID) {
    return get_post_meta($postID, POST_META_COUNT, true);
}
/**
 * Retorna os posts pela quantidade de views
 * @param string|int $qtd qtd de post, default:10
 * @author Vinicius de Santana
 */
function ssw_getPostByViews($qtd = 10) {
    //query no banco
    global $wpdb;
    $query = "SELECT * FROM {$wpdb->prefix}postmeta";
    $query .= " WHERE meta_key = '" . POST_META_COUNT . "'";
    $query .= " ORDER BY meta_value DESC";
    $query .= " LIMIT 0, ".$qtd.";";
    $orderedMetaKeys = $wpdb->get_results( $query, ARRAY_A );
    //monta resposta
    $resp = array();
    foreach ($orderedMetaKeys as $key => $value) {
      $post = get_post($value['post_id']);
      $resp[] = $post;
    }
    return $resp;
}