<?php
// desabilitar o endpoint users
add_filter ('rest_endpoints', function($endpoints) {
    if (isset($endpoints['/wp/v2/users'])) {
        unset($endpoints['/wp/v2/users']);
    }
    if (isset($endpoints['/wp/v2/users/(?P<id>[\d]+)'])) {
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
    }
    return $endpoints;
});
// remover versão do wordpress do front
// <meta name=”generator” content=”WordPress <?php bloginfo(‘version’); >” />
remove_action('wp_head', 'wp_generator');