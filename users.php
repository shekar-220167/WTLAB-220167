<?php
require 'config/db.php';

$data=$users->find();

foreach($data as $row){
    echo $row['name']." - ".$row['email'];
    echo " <a href='delete.php?email=".$row['email']."'>Delete</a>";
    echo "<br>";
}
?>
