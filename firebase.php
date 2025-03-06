<?php
include 'config.php';

// Create a new diary entry
function firebase_create($data) {
    global $databaseURL;
    $url = $databaseURL . "/entries.json";
    $jsonData = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $result = curl_exec($ch);
    if(curl_errno($ch)){
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    return json_decode($result, true);
}

// Read all diary entries
function firebase_read() {
    global $databaseURL;
    $url = $databaseURL . "/entries.json";
    $result = file_get_contents($url);
    return json_decode($result, true);
}

// Get single diary entry by ID
function firebase_get_single($id) {
    global $databaseURL;
    $url = $databaseURL . "/entries/" . $id . ".json";
    $result = file_get_contents($url);
    return json_decode($result, true);
}

// Update a diary entry by its ID
function firebase_update($id, $data) {
    global $databaseURL;
    $url = $databaseURL . "/entries/" . $id . ".json";
    $jsonData = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));
    $result = curl_exec($ch);
    if(curl_errno($ch)){
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    return json_decode($result, true);
}

// Delete a diary entry by its ID
function firebase_delete($id) {
    global $databaseURL;
    $url = $databaseURL . "/entries/" . $id . ".json";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    if(curl_errno($ch)){
        curl_close($ch);
        return false;
    }
    curl_close($ch);
    return json_decode($result, true);
}
?>
