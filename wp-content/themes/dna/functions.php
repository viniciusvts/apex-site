<?php
/** use this in post views */
define('POST_META_COUNT', 'dna_views');
add_theme_support( 'post-thumbnails' );
include("custom-posts/imoveis.php");
include("custom-posts/depoimentos.php");
include("includes/breadcrumbs.php");
include("includes/customizer.php");
include("includes/endpoints.php");
include("includes/gCaptchaVerify.php");
include("includes/loadSources.php");
include("includes/security.php");
include("includes/unloadSources.php");
include("includes/util.php");
include("includes/widgets.php");