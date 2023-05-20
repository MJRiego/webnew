<?php

require_once('config/config.php');
require_once('config/db.php');


if (isset($_POST['allowanceID'])) {
    $memberID = $_POST['memberID'];
    $allowanceID = $_POST['allowanceID'];
    $status = $_POST['status'];
    $date_received = $_POST['date_received'];


  $update = "UPDATE allowances SET allowances.status = '$status', allowances.date_received = '$date_received'
  WHERE allowances.allowanceID = '$allowanceID'";
  $query = mysqli_query($conn, $update);


  if ($query) {
    header('Location: ' . ROOT_URL . 'allowance.php?memberID=' . $_POST['memberID']);
    exit;
  } else {
    echo "Error: " . mysqli_error($conn);
    exit;
  }
}else {
    echo "Error: Allowance ID is not set.";
    exit;
}


?>