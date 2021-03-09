<?php

switch ($action) {
    case 'add_class':
        $new_class_name = filter_input(INPUT_POST, 'class');
        if ($new_class_name == NULL || $new_class_name == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../../view/admin/error.php');
            break;
        }   
        add_class($new_class_name);
        break;

    case 'delete_class':
        $class_id_delete = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($class_id_delete == NULL || $class_id_delete == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../../view/admin/error.php');
            break;
        }
        delete_class($class_id_delete);
        break;
}

$class = get_classes();
include '../../view/admin/class_list.php';
?>