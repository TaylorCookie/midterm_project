<?php

switch ($action) {
    case 'add_type':
        $new_type_name = filter_input(INPUT_POST, 'type');
        if ($new_type_name == NULL || $new_type_name == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
            break;
        }        
        add_type($new_type_name);
        break;

    case 'delete_type':
        $type_id_delete = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($type_id_delete == NULL || $type_id_delete == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
            break;
        }
        delete_type($type_id_delete);
        break;
}

$types = get_types();
include '../../view/admin/types_list.php';
?>