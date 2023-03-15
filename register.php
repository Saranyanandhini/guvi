<?php

if($_POST['mobile']) {
  $mob = intval($_POST['mobile']);
  if (strcmp($mob, $_POST['mobile']) !== 0) {
    echo json_encode(["error" => 'Invalid phone no']); exit;
   }
}

require_once('db.php');

$query = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `mobile`, `password`) VALUES  ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}', '{$_POST['mobile']}', '{$_POST['password']}');"; 
$result1 = mysqli_query($conn,$query);

  if($result1)
  {
    echo json_encode(["success" => 'Registration completed']); exit;
 
  }
  else if($conn->errno == 1062){
    echo json_encode(["error" => 'Mobile no already registered']); exit;

  } else {
    echo json_encode(["error" => $conn->error]); exit;

  }

$conn->close();
