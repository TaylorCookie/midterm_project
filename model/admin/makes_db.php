<?php
function get_makes() {
    global $db;
    $query = 'SELECT * FROM make
                ORDER BY make_id';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($make_id) {
    global $db;
    $query = 'SELECT * FROM make
                WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $make_name = $make['make'];
    return $make_name;
}

function get_make_id($make_name) {
    global $db;
    $query = 'SELECT * FROM make
                WHERE make = :make';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make_name);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    $make_id = $make['make_id'];
    return $make_id;
}

function add_make($new_make_name) {
    global $db;
    $query = "INSERT INTO make
                    (make, make_id)
                VALUES
                    (:make, :make_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $new_make_name);
    $make_id = rand(10, 99999);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($make_id) {
    global $db;
    $query = 'DELETE FROM make
                WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

?>