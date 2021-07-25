<?php
$blogPosts = ssw_getPostByViews();
?>
<div class="blog-sidebar">
    <div class="mais-visitados">
        <h2>Mais Visitados</h2>
        <hr>
        <div class="row">
            <div class="col">
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
        </div>
    </div>
</div>