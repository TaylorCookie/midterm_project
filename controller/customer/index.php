<?php

$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require('../../model/admin/database.php');
require('../../model/admin/class_db.php');
require('../../model/admin/makes_db.php');
require('../../model/admin/types_db.php');
require('../../model/admin/vehicles_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = '';
    }
}    

$firstName = filter_input(INPUT_GET, 'firstName');
if ($firstName) {
    $isFirstName = true;
    $_SESSION['userid'] = $firstName;
} else {
    $isFirstName = false;
}



switch ($action) {
    case 'sort_category':
        $make = filter_input(INPUT_POST, 'make_name');
        $class = filter_input(INPUT_POST, 'class_name');
        $type = filter_input(INPUT_POST, 'type_name');
        $price = filter_input(INPUT_POST, 'price');
        $year = filter_input(INPUT_POST, 'year');

        if ($year) {
            if ($make && $make != 'View All Makes') {
                $vehicles = get_vehicles_by_make_year($make);
            } else if ($class && $class != 'View All Classes') {
                $vehicles = get_vehicles_by_class_year($class);
            } else if ($type && $type != 'View All Types') {
                $vehicles = get_vehicles_by_type_year($type);
            } else {
                $vehicles = get_vehicles_by_year();
            }
        } else {
            if ($make && $make != 'View All Makes') {
                $vehicles = get_vehicles_by_make($make);
            } else if ($class && $class != 'View All Classes') {
                $vehicles = get_vehicles_by_class($class);
            } else if ($type && $type != 'View All Types') {
                $vehicles = get_vehicles_by_type($type);
            } else {
                $vehicles = get_vehicles();
            }
        }
        
        include '../../view/customer/vehicles_list.php';
        break;


    case 'register':
        if ($isFirstName) {
            include '../../view/customer/register_thanks.php';
        } else {
            include '../../view/customer/register.php';
        }
        break;

    case 'logout':
        include '../../view/customer/logout.php';
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
        break;

    default:
        $vehicles = get_vehicles();
        include '../../view/customer/vehicles_list.php';
        break;
}


?>