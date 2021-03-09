<?php
function get_classes() {
    global $db;
    $query = 'SELECT * FROM class
                ORDER BY class_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($class_id) {
    global $db;
    $query = 'SELECT * FROM class
                WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $class_name = $class['class'];
    return $class_name;
}

function get_class_id($class_name) {
    global $db;
    $query = 'SELECT * FROM class
                WHERE class = :class';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class_name);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    $class_id = $class['class_id'];
    return $class_id;
}

function add_class($new_class_name) {
    global $db;
    $query = "INSERT INTO class
                    (class, class_id)
                VALUES
                    (:class, :class_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $new_class_name);
    $class_id = rand(10, 99999);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($class_id) {
    global $db;
    $query = 'DELETE FROM class
                WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $statement->closeCursor();
}

?>