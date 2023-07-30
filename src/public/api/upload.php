<?php
require_once '../backend/Controller/Company.php';
require_once '../backend/Utils/cors.php';

// enable cors
enableCors();
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new CompanyController();
    return $controller->uploadCsv();
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
}
?>