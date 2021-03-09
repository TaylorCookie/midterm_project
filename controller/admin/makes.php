<?php

switch ($action) {
    case 'add_make':
        $new_make_name = filter_input(INPUT_POST, 'make');
        if ($new_make_name == NULL || $new_make_name == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
            break;
        }
        add_make($new_make_name);
        break;

    case 'delete_make':
        $make_id_delete = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($make_id_delete == NULL || $make_id_delete == FALSE) {
            $error = "Invalid item data. Check all fields and try again.";
            include('../view/error.php');
            break;
        }
        delete_make($make_id_delete);
        break;
}

$makes = get_makes();
include '../../view/admin/makes_list.php';
?>