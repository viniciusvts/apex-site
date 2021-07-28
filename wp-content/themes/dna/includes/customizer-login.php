<?php
// Altera a logo e o bg:
function sswCustomizeLoginLogo() {
?>
    <style type="text/css">
        :root{
            --bg-color: #002333;
            --hover-color: #0a384d;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo_apex.svg);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            background-size: contain;
        	padding-bottom: 30px;
        }
        body.login {
            background: var(--bg-color);
        }
        input#wp-submit{
            background-color: var(--bg-color);
            border-color: var(--bg-color);
        }
        input#user_login:focus{
            border-color: var(--bg-color);
        }
        input#user_pass:focus{
            border-color: var(--bg-color);
        }
        input#wp-submit:hover{
            background-color: var(--hover-color);
        }
        /* icone da senha */
        .login .button.wp-hide-pw .dashicons::before{
            color: var(--bg-color);
        }
        /* links footer */
        .login #backtoblog a, .login #nav a{
            color: white!important;
        }
    </style>
<?php
}
add_action( 'login_enqueue_scripts', 'sswCustomizeLoginLogo' );

// altera o link do header
function sswLoginLogoUrl() {
    return home_url();
}
add_filter( 'login_headerurl', 'sswLoginLogoUrl' );