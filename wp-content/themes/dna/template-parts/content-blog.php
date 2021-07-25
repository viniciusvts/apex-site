<section class="content-blog container">
    <div class="row">
        <div class="col-md-8">
            <?php
            if(have_posts()){
                while(have_posts()){
                    the_post();
                    include get_template_directory().'/template-parts/sub_section/blog-card.php';
                }
                $args = array(
                    'screen_reader_text' => ' ',
                    'mid_size' => 3,
                    'prev_next' => true,
                    'prev_text' => __('<'),
                    'next_text' => __('>'),
                );
                the_posts_pagination($args);
            } else {
                echo '<h2>Não há posts para exibir.</h2>';
            }
            ?>
        </div>
        <div class="col-md-4">
            <?php include get_template_directory().'/template-parts/sub_section/blog-sidebar.php'; ?>
        </div>
    </div>
</section>