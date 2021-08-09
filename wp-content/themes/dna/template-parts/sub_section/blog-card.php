<?php
$permalink = get_the_permalink();
$thumb = get_the_post_thumbnail(get_the_ID(),
                    'post-thumbnail',
                    array( 'class' => 'fundo w-100' )
);
$categorias = get_the_category();
?>
<div class="blog-card">
    <a href="<?php echo $permalink; ?>">
        <div class="post-col">
            <?php
            if(strlen($thumb)){
                echo $thumb;
            } else{
            ?>
            <img src="<?php echo get_template_directory_uri() . '/assets/img/apex-blog-card-bg-1.jpg'; ?>"
            class="fundo w-100"
            alt="Família apex felix">
            <?php
            }
            ?>
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