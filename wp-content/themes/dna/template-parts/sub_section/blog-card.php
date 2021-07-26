<?php
$permalink = get_the_permalink();
$thumb = get_the_post_thumbnail(get_the_ID(),
                    'post-thumbnail',
                    array( 'class' => 'fundo w-100 h-100' )
);
$categorias = get_the_category();
?>
<div class="blog-card d-flex <?php echo strlen($thumb)?'':'no-thumb' ?>">
    <a href="<?php echo $permalink; ?>">
        <div class="post-col">
            <?php echo $thumb; ?>
            <div class="intern">
                <h3><?php the_title(); ?></h3>
                <?php
                if($categorias[0]->name){
                ?>
                <p class="category"><?php echo $categorias[0]->name; ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </a>
</div>