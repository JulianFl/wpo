<?php


// Ensure it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON data from the request body
    $json_data = json_decode(file_get_contents('php://input'), true);

    if ($json_data !== null) {
        // Append JSON data to a local file
        file_put_contents('lazy.json', json_encode($json_data) . PHP_EOL, FILE_APPEND);

        // Respond with a success message
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    } else {
        // Respond with an error if JSON decoding fails
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(['error' => 'Invalid JSON data']);
        exit;
    }
} else {
    // Respond with an error if it's not a POST request
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['error' => 'Method Not Allowed']);
    exit;
}
// Diese Datei sollte im "site" Verzeichnis von Kirby platziert werden.
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//echo 'test';
// Sicherstellen, dass die Anfrage eine POST-Anfrage ist
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//
//    header('Access-Control-Allow-Origin: *');
//    header('Content-Type: application/json');
//    header('Access-Control-Allow-Methods: PUT');
//    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
//
//    $post_body = file_get_contents('php://input');
//
//    file_put_contents("post.log", print_r($_POST["key"], true));
//    file_put_contents("gpc.log", print_r($_REQUEST, true));
//
////    file_put_contents("post.log", file_get_contents('php://input'), FILE_APPEND);
//
//    // Daten aus dem POST-Anfragekörper abrufen
////    $postData = json_decode(file_get_contents('php://input'), true);
//
//    // Hier können Sie die Daten verarbeiten, speichern oder was auch immer Sie benötigen
//    // Beispiel: Speichern der Daten in einer Textdatei
////    file_put_contents('test.json', json_encode($postData));
//
//    // Beispiel: Eine einfache Antwort senden
//
////    echo json_encode(['success' => true]);
////    exit;
//
//    $file = file_get_contents("test.json");
//    $content = json_decode($file);
//    $content[] = $_POST['key'];
//    $jsonContent = json_encode($content);
//    file_put_contents("test.json",$jsonContent);
//
//    // Daten aus dem POST-Anfragekörper abrufen
////    $postData = json_decode(file_get_contents('php://input'), true);
//
//    // Hier können Sie die Daten verarbeiten, speichern oder was auch immer Sie benötigen
//    // Beispiel: Speichern der Daten in einer Textdatei
////    file_put_contents('data.txt', json_encode($postData));
//
//    // Beispiel: Eine einfache Antwort senden
////    header('Content-Type: application/json');
//
////    return json_encode(['success' => true]);
////    exit;
////} else {
//    // Wenn keine POST-Anfrage, eine Fehlermeldung senden
////    header('HTTP/1.1 405 Method Not Allowed');
////    echo json_encode(['error' => 'Method Not Allowed']);
////    exit;
//}
