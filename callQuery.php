<?php
//
// Run passed-in query running resutl set (PDOStatement object)) on 
// success or exit on failure.
//
function callQuery($pdo, $query, $error) {
    try {
        return $pdo->query($query);
    } catch (Exception $ex) {
        //NOTE:
        // We would get rid of all system-generated error data
        // before putting this code into production.

        $error .= $ex->getMessage();
        include 'error.html.php';
        throw $ex; // also show SQL system (syntax) errors
        //exit();
    }
}
