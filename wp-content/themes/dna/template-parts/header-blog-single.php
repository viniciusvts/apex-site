<?php
$thumb = get_the_post_thumbnail(get_the_ID(),
                    'post-thumbnail',
                    array( 'class' => 'fundo' ));

?>
<header class="blog-single">
    <?php
    echo strlen($thumb) ?
        $thumb:
        '<img src="'.get_template_directory_uri().'/assets/img/apex-blog-card-bg-1.jpg" alt="'.get_the_title().'" class="fundo">';
    ?>
</header>