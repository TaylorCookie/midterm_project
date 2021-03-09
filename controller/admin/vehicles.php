<?php

switch ($action) {
    case 'add_vehicle':
        $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
        $model = filter_input(INPUT_POST, 'model');
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
        $type_name = filter_input(INPUT_POST, 'type_name');
        $class_name = filter_input(INPUT_POST, 'class_name');
        $make_name = filter_input(INPUT_POST, 'make_name');
        $type_id = get_type_id($type_name);
        $class_id = get_class_id($class_name);
        $make_id = get_make_id($make_name);
 
        add_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
        break;

    case 'delete_vehicle':
        $vehicle_id_delete = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($vehicle_id_delete == NULL || $vehicle_id_delete == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../../view/admin/error.php');
            break;
        }
        delete_vehicle($vehicle_id_delete);
        break;
}

$vehicles = get_vehicles();
include '../../view/admin/vehicles_list.php';
?>