<?php
require_once '../backend/Controller/Company.php';

// enable cors
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller = new CompanyController();
    return $controller->update_email();
}else if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {  
    return 0;    
 }    
 else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method not allowed'));
}
?>