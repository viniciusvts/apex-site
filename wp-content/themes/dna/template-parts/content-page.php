<!-- stilos em content-blog.scss -->
<section class="blog-single container">
    <div class="row">
        <div class="col-lg-10 col-xxl-8 mx-auto">
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