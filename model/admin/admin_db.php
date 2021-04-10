<?php
function add_admin($username, $password) {
    global $db;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO administrators (username, password)
        VALUES (:username, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();
}

function is_valid_admin_login($username, $password) {
    global $db;

    //check if username is valid
    if (username_exists($username) == 0) {
        echo "This username does not exist.";
        return NULL;
    } else {
        $query = "SELECT password FROM administrators
            WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if (isset($row)) {
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                return password_verify($password, $hash);
            } 
        } else {
            echo "The username and password do no match.";
            return NULL;
        }
    }
}

function username_exists($username) {
    global $db;
    $query = "select case when EXISTS 
        ( select 1 from administrators where 
        username = :username ) then 1 else 0 end as product";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $exists = $statement->fetch();
    $statement->closeCursor();
    return $exists['product'];
}


