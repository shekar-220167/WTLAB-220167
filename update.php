<?php
require '../config/db.php';

$email=$_POST['email'];
$newname=$_POST['name'];

$users->updateOne(
    ['email'=>$email],
    ['$set'=>['name'=>$newname]]
);

echo "Updated";
?>