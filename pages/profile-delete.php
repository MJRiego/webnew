<?php

require_once('config/config.php');
require_once('config/db.php');

if (isset($_GET['memberID'])) {
    $memberID = mysqli_real_escape_string($conn, $_GET['memberID']);

    $delete_personal = "DELETE FROM personal_info WHERE memberID = '$memberID'";
    $delete_grades = "DELETE FROM grades WHERE memberID = '$memberID'";
    $delete_allowance = "DELETE FROM allowances WHERE memberID = '$memberID'";
    $delete_requirements = "DELETE FROM requirements WHERE memberID = '$memberID'";
    $delete_members = "DELETE FROM members WHERE memberID = '$memberID'";

    $query_personal = mysqli_query($conn, $delete_personal);
    $query_grades = mysqli_query($conn, $delete_grades);
    $delete_allowance = mysqli_query($conn, $delete_allowance);
    $delete_requirements = mysqli_query($conn, $delete_requirements);
    $query_members = mysqli_query($conn, $delete_members);

    if ($query_personal && $query_grades && $delete_allowance &&  $delete_requirements && $query_members) {
        header('Location: ' . ROOT_URL . 'members.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}

mysqli_close($conn);
?>