<?php
header('Content-Type: application/json');
require 'connection.php';

$id = filter_input(INPUT_GET, 'id');
$sql = 'SELECT * FROM products ';

if(!empty($id)){
    $sql .= "WHERE id = {$id}";
}

if(!$query = mysqli_query($link, $sql)) {
    json_encode(['status'=>'Error', 'msg'=>'Query failed']);
        exit();
}

$products = [];

while($row = mysqli_fetch_assoc($query)){
    $products[] = $row;
};

echo json_encode($products);

