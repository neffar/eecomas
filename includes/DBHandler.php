<?php

//Insert Data within table by accepting TableName and Table column => Data as associative array
function create($connection, $tblname, array $val_cols) {

    //array_keys _ return the keys of an associative array
    //implode _ Join array elements with a string
    $keysString = implode(", ", array_keys($val_cols));

    //print key and value for the array
    $i = 0;
    foreach ($val_cols as $key => $value) {
        $StValue[$i] = "'" . mysqli_real_escape_string($connection, $value) . "'";
        $i++;
    }
    $StValues = implode(", ", $StValue);

    return mysqli_query($connection, "INSERT INTO $tblname ($keysString) VALUES ($StValues)") ? mysqli_insert_id($connection) : false;
}

//Delete data form table
//Accepting Table Name and Keys=>Values as associative array
function delete($connection, $tblname, array $val_cols) {

    $i = 0;
    foreach ($val_cols as $key => $value) {
        $exp[$i] = $key . " = '" . $value . "'";
        $i++;
    }
    $Stexp = implode(" AND ", $exp);

    return mysqli_query($connection, "DELETE FROM $tblname WHERE $Stexp") ? true : false;
}

//Update data within table; Accepting Table Name and Keys=>Values as associative array
function update($connection, $tblname, array $set_val_cols, array $condition) {

    $i = 0;
    foreach ($set_val_cols as $key => $value) {
        $set[$i] = $key . " = '" . $value . "'";
        $i++;
    }
    $Stset = implode(", ", $set);

    $j = 0;
    foreach ($condition as $key => $value) {
        $cod[$j] = $key . " = '" . $value . "'";
        $j++;
    }
    $Stcod = implode(" AND ", $cod);

    return mysqli_query($connection, "UPDATE $tblname SET $Stset WHERE $Stcod") ? true : false;
}

//Fetch data by accepting table name and columns(1 dimentional array) name
function read($connection, $table, array $columns, array $condition) {
    $columns = implode(",", $columns);

    if (!empty($condition)) {
        $j = 0;
        foreach ($condition as $key => $value) {
            $cod[$j] = $key . " = '" . $value . "'";
            $j++;
        }
        $Stcod = implode(" AND ", $cod);
        $result = mysqli_query($connection, "SELECT $columns FROM $table WHERE $Stcod");
    } else {
        $result = mysqli_query($connection, "SELECT $columns FROM $table");
    }
    return mysqli_fetch_all($result, MYSQLI_BOTH);
}

function read_with_limit($connection, $table) {
    return mysqli_fetch_all(mysqli_query($connection, "SELECT * FROM $table LIMIT 0, 3"), MYSQLI_BOTH);
}

function read_membres($connection) {
    $sql = "SELECT * FROM ENSEIGNANT e
            INNER JOIN PRESENTATION pr ON e.ID_ENS = pr.ID_ENS
            INNER JOIN PARCOURS pa ON e.ID_ENS = pa.ID_ENS
            INNER JOIN PUBLICATION pu ON e.ID_ENS = pu.ID_ENS";
    return mysqli_fetch_all(mysqli_query($connection, $sql), MYSQLI_BOTH);
}

function close($connection) {
    return mysqli_close($connection);
}

function total_rows_table($connection, $table) {
    $result = mysqli_query($connection, "SELECT * FROM  $table");
    return mysqli_num_rows($result);
}

//Redirection
function redirect($url, $permanent = false) {
    if (headers_sent() === false) {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
