<?php
header('Content-Type: application/json');
require 'connection.php';

$title = filter_input(INPUT_POST, 'title');
$price = filter_input(INPUT_POST, 'price');
$description = filter_input(INPUT_POST, 'description');


$title = mysqli_escape_string($link, $title);
$price = mysqli_escape_string($link, $price);
$description = mysqli_escape_string($link, $description);

$id = filter_input(INPUT_POST, 'id'); // Not sure how to get id since there is not in the form - autoincremented in the DB
$sql = '';

if(!empty($id)) {

    $sql = "UPDATE products SET title='{$title}', description='{$description}', price='{$price}'  WHERE id='{$id}'"; // In case id not empty update the existing record

} else {

    $sql = "INSERT INTO products VALUES (null, '{$title}', '{$description}', '{$price}')"; // In case id is empty, create a new record
}

if(!empty($title) && !empty($price) && !empty($description)){

    if($query = mysqli_query($link, $sql)){
        echo json_encode([ "status" => "ok", "msg" => "ok" ]);
    }
    
}else{
    echo json_encode([ "status" => "error", "msg" => "Complete all required fields" ]);
}
