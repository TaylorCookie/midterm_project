<?php
//Start session management and include necessary functions
$lifetime = 60 * 60 * 24 * 14; //2 weeks in seconds
session_set_cookie_params($lifetime, '/');
session_start();

require('../../model/admin/database.php');
require('../../model/admin/class_db.php');
require('../../model/admin/makes_db.php');
require('../../model/admin/types_db.php');
require('../../model/admin/vehicles_db.php');
require('../../model/admin/admin_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = '';
    }
}     

//If the user isn't logged in, force the user to log in
if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
}

switch ($action) {
    case 'class':
    case 'add_class':
    case 'delete_class':
        include('./class.php');
        break;

    case 'types':
    case 'add_type':
    case 'delete_type':
        include('./types.php');
        break;

    case 'makes':
    case 'add_make':
    case 'delete_make':
        include('./makes.php');
        break;

    case 'login':
    case 'show_login':
    case 'register':
    case 'show_register':
    case 'logout':

        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password = filter_input(INPUT_POST, 'confirm_password');

        include('./admin.php');
        break;
    

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
        
        include ('../../view/admin/vehicles_list.php');
        break;

    default:
        include('./vehicles.php');
        break;
}


?>