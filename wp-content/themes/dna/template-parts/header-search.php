<?php
// stilos em header-title-sub
/** pego as informações da página de blog */
$pageId = get_option( 'page_for_posts' );
$thumb = get_the_post_thumbnail($pageId,
                    'post-thumbnail',
                    array( 'class' => 'fundo w-100 h-100' )
);
$subtitle = get_field('subtitle', $pageId);
$headerContent = get_field('header_content', $pageId);
$hasHeaderContent = strlen($headerContent) > 0;
?>
<header class="header-title-sub <?php if($hasHeaderContent){ echo 'has-header-cont'; } ?>">
    <?php echo $thumb; ?>
    <div class="container">
        <div class="row content">
            <div class="<?php echo $hasHeaderContent ? 'col-md-4' : 'col-md-6'; ?> col-xl-4 title">
                <h1>Busca</h1>
                <p class="subtitle"><?php echo $subtitle; ?></p>
            </div>
            <?php
            if($hasHeaderContent){
            ?>
            <div class="col-md-5 offset-md-3">
                <div class="h-content">
                    <?php echo $headerContent; ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</header>