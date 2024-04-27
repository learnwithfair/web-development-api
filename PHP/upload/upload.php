<?php
// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['atlas'], $_FILES['json'], $_FILES['image'])) {
    $atlasFile = $_FILES['atlas'];
    $jsonFile = $_FILES['json'];
    $imageFile = $_FILES['image'];

    // Define upload directory
    $uploadDir = 'uploads/';

    // Create directory if it doesn't exist
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate unique filenames
    $uid = uniqid();
    $udir = $uploadDir . $uid . '/';
    mkdir($udir, 0777, true);

    $atlasFileName = $atlasFile['name'];
    $jsonFileName = $jsonFile['name'];
    $imageFileName = $imageFile['name'];

    // Move the uploaded files to the upload directory
    $atlasFilePath = $udir . $atlasFileName;
    $jsonFilePath = $udir . $jsonFileName;
    $imageFilePath = $udir . $imageFileName;

    move_uploaded_file($atlasFile['tmp_name'], $atlasFilePath);
    move_uploaded_file($jsonFile['tmp_name'], $jsonFilePath);
    move_uploaded_file($imageFile['tmp_name'], $imageFilePath);

    // Return URLs as JSON
    $response = [
        'atlas' => 'http://localhost/game/___PIXI/_F_SlotSimulator/Server/'.$atlasFilePath,
        'json' => 'http://localhost/game/___PIXI/_F_SlotSimulator/Server/'.$jsonFilePath,
        'image' => 'http://localhost/game/___PIXI/_F_SlotSimulator/Server/'.$imageFilePath,
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Invalid request
    http_response_code(400);
    echo 'Invalid request.';
}
?>
