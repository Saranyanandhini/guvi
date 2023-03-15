<?php

if($_POST['mobile']) {
  $mob = intval($_POST['mobile']);
  if (strcmp($mob, $_POST['mobile']) !== 0) {
    echo json_encode(["error" => 'Invalid phone no']); exit;
   }
}

require_once('db.php');

$query = "select * from `users` where `mobile` = '{$_POST['mobile']}' and `password` = '{$_POST['password']}';"; 

$res = ["error" => 'Invalid credencials'];
if ($result = $conn -> query($query)) {
  if($row = $result -> fetch_row()) {
    $res = ["success" => $row[0]];
  }
  $result -> free_result();
}
echo json_encode($res);

$conn->close();
