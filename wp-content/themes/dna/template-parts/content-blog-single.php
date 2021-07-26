<?php
// Atenção: stilos em content-blog.scss
$catList = get_the_terms(get_the_ID(), 'category');
$catNames = array_map(function($item){
    return $item->name;
}, $catList);
?>
<section class="blog-single container">
    <div class="row">
        <div class="col-lg-10 col-xxl-8 mx-auto">
            <div class="row">
                <div class="col-12 col-lg-6 redes-sociais">
                    <?php echo do_shortcode('[TheChamp-Sharing]'); ?>
                </div>
                <div class="d-none d-lg-block col-lg-4 offset-lg-2 cat-list">
                    - <?php echo join(' - ', $catNames); ?>
                </div>
                <div class="col-12 order-first order-lg-last">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row crumbs">
                <div class="col-12 mb-3 mb-lg-5">
                <?php
                wp_custom_breadcrumbs();
                ?>
                </div>
            </div>
            <div class="row">
                <article class="col-12">
                    <?php the_content(); ?>
                </article>
            </div>
        </div>
    </div>
</section>