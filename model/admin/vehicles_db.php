<?php
function get_vehicles() {
    global $db;
    $query = 'SELECT * FROM vehicles
                ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_year() {
    global $db;
    $query = 'SELECT * FROM vehicles
                ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make_year($make) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE make_id = :make_id
                ORDER BY year DESC';
    $statement = $db->prepare($query);
    $make_id = get_make_id($make);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class_year($class) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE class_id = :class_id
                ORDER BY year DESC';
    $statement = $db->prepare($query);
    $class_id = get_class_id($class);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type_year($type) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE type_id = :type_id
                ORDER BY year DESC';
    $statement = $db->prepare($query);
    $type_id = get_type_id($type);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_make($make) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE make_id = :make_id
                ORDER BY price DESC';
    $statement = $db->prepare($query);
    $make_id = get_make_id($make);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_class($class) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE class_id = :class_id
                ORDER BY price DESC';
    $statement = $db->prepare($query);
    $class_id = get_class_id($class);
    $statement->bindValue(':class_id', $class_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_type($type) {
    global $db;
    $query = 'SELECT * FROM vehicles
                WHERE type_id = :type_id
                ORDER BY price DESC';
    $statement = $db->prepare($query);
    $type_id = get_type_id($type);
    $statement->bindValue(':type_id', $type_id);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
    global $db;
    $query = "INSERT INTO vehicles
                    (year, model, price, type_id, class_id, make_id, vehicle_id)
                VALUES
                    (:year, :model, :price, :type_id, :class_id, :make_id, :vehicle_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $vehicle_id = rand(10, 99999);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($vehicle_id) {
    global $db;
    $query = 'DELETE FROM vehicles
                WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id);
    $statement->execute();
    $statement->closeCursor();
}

?>