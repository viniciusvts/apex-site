<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="u-columns col2-set clearfix" id="customer_login">

    <div class="u-column1 col-1">

<?php endif; ?>

    <h2><?php esc_html_e( 'Login', 'burst' ); ?></h2>

	<form class="woocomerce-form woocommerce-form-login login" method="post">

        <?php do_action( 'woocommerce_login_form_start' ); ?>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Username or email', 'burst'); ?>" name="username" id="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
        </p>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <input class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Password', 'burst'); ?>" type="password" name="password" id="password" />
        </p>

        <?php do_action( 'woocommerce_login_form' ); ?>

        <p class="form-row">
			<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
            <input type="submit" class="woocommerce-Button button" name="login" value="<?php esc_html_e( 'Login', 'burst' ); ?>" />
            <a class="lost_password woo-lost_password2" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost Password?', 'burst' ); ?></a>
            <label class="inline woo-my-account-rememberme woocommerce-form__label woocommerce-form__label-for-checkbox">
                <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'burst' ); ?>
            </label>
        </p>

        <?php do_action( 'woocommerce_login_form_end' ); ?>

    </form>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

    </div>

    <div class="u-column2 col-2">

        <h2><?php esc_html_e( 'Register', 'burst' ); ?></h2>

        <form method="post" class="register">

            <?php do_action( 'woocommerce_register_form_start' ); ?>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Username', 'burst'); ?>" name="username" id="reg_username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( $_POST['username'] ) : ''; ?>" />
                </p>

            <?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                <input type="email" class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Email', 'burst'); ?>" name="email" id="reg_email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( $_POST['email'] ) : ''; ?>" />
            </p>

            <?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                    <input type="password" <input type="password" class="woocommerce-Input woocommerce-Input--text input-text placeholder" placeholder="<?php esc_html_e('Password', 'burst'); ?>" name="password" id="reg_password" />
                </p>

            <?php endif; ?>

            <!-- Spam Trap -->
            <div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'burst' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" autocomplete="off" /></div>

            <?php do_action( 'woocommerce_register_form' ); ?>

            <p class="form-row">
                <?php wp_nonce_field( 'woocommerce-register' ); ?>
                <input type="submit" class="woocommerce-Button button" name="register" value="<?php esc_html_e( 'Register', 'burst' ); ?>" />
            </p>

            <?php do_action( 'woocommerce_register_form_end' ); ?>

        </form>

    </div>

    </div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>