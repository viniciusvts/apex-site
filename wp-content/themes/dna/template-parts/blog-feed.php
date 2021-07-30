<?php
$blogPosts = get_posts(
    array(
        'posts_per_page'=>'3',
    )
);
?>
<section class="container blog-feed">
    <div class="row">
        <?php
        foreach ($blogPosts as $key => $blogPost) {
            $colummClass = $key == 0 ? 'col-md-12' : 'col-md-6';
            $permalink = get_permalink($blogPost->ID);
            $thumb = get_the_post_thumbnail($blogPost->ID,
                                'post-thumbnail',
                                array( 'class' => 'fundo w-100 h-100' )
            );
            $categorias = get_the_category($blogPost->ID);
        ?>
        <div class="d-flex <?php echo $colummClass; ?>">
            <a href="<?php echo $permalink; ?>">
                <div class="post-col">
                    <?php echo $thumb; ?>
                    <div class="intern">
                        <h3><?php echo $blogPost->post_title; ?></h3>
                        <p class="category"><?php echo $categorias[0]->name; ?></p>
                    </div>
                </div>
            </a>
        </div>
        <?php
        }
        ?>
    </div>
</section>