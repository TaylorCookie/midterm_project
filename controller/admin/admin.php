<?php

switch ($action) {
    case 'login':
        if (username_exists($username) == 0) {
            echo "This username does not exist.";
            include ('../../view/admin/login.php');
        } else if (!is_valid_admin_login($username, $password)) {
            echo "The username and password do not match";
            include ('../../view/admin/login.php');
        } else {
            if (is_valid_admin_login($username, $password)) {
                $_SESSION['is_valid_admin'] = true;
                include('./vehicles.php');
            } else {
                $login_message = "You need to login to access this.";
                include ('../../view/admin/login.php');
            }
        }
        break;

        case 'show_login':
            include ('../../view/admin/login.php');
            break;

        case 'register':
            include ('../../model/util/valid_register.php');
            $errors = valid_registration($username, $password, $confirm_password);
            if(empty($errors)) {
                add_admin($username, $password, $confirm_password);
                $_SESSION['is_valid_admin'] = true;
                include('./vehicles.php');
                
            } else {
                include ('../../view/admin/register.php');
            }
            break;

        case 'show_register':
            include ('../../view/admin/register.php');
            break;

        case 'logout':
            //unset session variable
            $_SESSION = array();
            //destroy the session
            session_destroy();
            //delete the session cookie
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];
            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);

            include ('../../view/admin/login.php');
            break;

}


?>