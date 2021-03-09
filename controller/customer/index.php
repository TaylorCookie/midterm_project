<?php
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

    default:
        $vehicles = get_vehicles();
        include '../../view/customer/vehicles_list.php';
        break;
}


?>