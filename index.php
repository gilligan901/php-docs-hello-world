<?php
function adminer_object()
{
    include_once "plugins/plugin.php";
    include_once "plugins/login-password-less.php";

    class AdminerCustomization extends AdminerPlugin
    {
        function loginFormField($name, $heading, $value)
        {
            if ($name == 'server') {
                return; // server field is not needed for SQLite
            }
            return parent::loginFormField($name, $heading, $value);
        }
        function database()
        {
            // Replace 'database.db' with the path to your database file
            return "mydatabase.db";
        }
    }

    return new AdminerCustomization(array(
        // Specify the plugins you want to use
        new AdminerLoginPasswordLess(password_hash("12345-a", PASSWORD_DEFAULT)),
    ));
}

include "adminer.php";
