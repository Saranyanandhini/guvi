<?php


require_once('db.php');

$query = "select * from `users` where `userid` = '{$_GET['profileid']}';"; 

$res = ["error" => 'Invalid credencials'];
if ($result = $conn -> query($query)) {
  if($row = $result -> fetch_row()) {
    $res = ["success" => "
    <tr><th>UserId</th><td>{$row[0]}</td></tr>
    <tr><th>First Name</th><td>{$row[1]}</td></tr>
    <tr><th>Last Name</th><td>{$row[2]}</td></tr>
    <tr><th>Email</th><td>{$row[3]}</td></tr>
    <tr><th>Mobile No</th><td>{$row[4]}</td></tr>
    <tr><th>Created</th><td>{$row[6]}</td></tr>
    "];
  }
  $result -> free_result();
}
echo json_encode($res);

$conn->close();
