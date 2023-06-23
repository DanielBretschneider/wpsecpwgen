<?php
/*
Plugin Name:  WPSecPWGen - Wordpress Secure Password Generator
Plugin URI:   https://github.com/DanielBretschneider/wpsecpwgen
Description:  Simple Password Generator for secure Passwords
Version:      1.0
Author:       Daniel Bretschneider
Author URI:   https://www.bretschneider.cc
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  pwgen
Domain Path:  /pwgen
*/

/** Displays the randomly generated password */
function display_secure_password() 
{
    $secure_random_password = generate_random_password();

    return "<center>$secure_random_password</center>";
}

/** Generates a random string with length of 22 characters using a fixed alphabet */
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

/** add shortcode to wp site */
add_shortcode('wpsecpwgen', 'display_secure_password');

?>
