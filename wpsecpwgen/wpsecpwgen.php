<?php
/*
Plugin Name:  WPSecPWGen - Wordpress Secure Password Generator
Plugin URI:   https://bretschneider.cc/wpsecpwgen.php
Description:  Simple Password Generator for secure Passwords
Version:      1.0
Author:       Daniel Bretschneider
Author URI:   https://www.bretschneider.cc
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  wpsecpwgen-wordpress-secure-password-generator
Domain Path:  /wpsecpwgen-wordpress-secure-password-generator
*/

function display_simple_message() 
{
    $secure_random_password = generate_random_password();

    return "<center>$secure_random_password</center>";
}

function generate_random_password($length=22) 
{
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!?._-+&';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }

    return $result;
}

add_shortcode('wpsecpwgen', 'display_simple_message');

?>
