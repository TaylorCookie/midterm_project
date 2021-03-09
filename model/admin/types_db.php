<?php
function get_types() {
    global $db;
    $query = 'SELECT * FROM type
                ORDER BY type_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_type_name($type_id) {
    global $db;
    $query = 'SELECT * FROM type
                WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $types = $statement->fetch();
    $statement->closeCursor();
    $types_name = $types['types'];
    return $types_name;
}

function get_type_id($types_name) {
    global $db;
    $query = 'SELECT * FROM type
                WHERE types = :types';
    $statement = $db->prepare($query);
    $statement->bindValue(':types', $types_name);
    $statement->execute();
    $types = $statement->fetch();
    $statement->closeCursor();
    $type_id = $types['type_id'];
    return $type_id;
}

function add_type($new_type_name) {
    global $db;
    $query = "INSERT INTO type
                    (types, type_id)
                VALUES
                    (:types, :type_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':types', $new_type_name);
    $type_id = rand(10, 99999);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($type_id) {
    global $db;
    $query = 'DELETE FROM type
                WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $statement->closeCursor();
}

?>