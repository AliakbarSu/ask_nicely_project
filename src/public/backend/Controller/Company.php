<?php

require_once 'Controller.php';

class CompanyController extends Controller {

    public function __construct() {
        require_once '../backend/Model/Company.php';
        $this->model = new CompanyModel();
    }

    public function listEmployees() {
        return $this->renderJSON($this->model->getEmployees());
    }

    public function parseCSVFileFromForm() {
        $data = array();
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $tmpFilePath = $_FILES['file']['tmp_name'];
    
            if (($handle = fopen($tmpFilePath, "r")) !== false) {
                while (($row = fgetcsv($handle, 0, ',', '"')) !== false) {
                    $data[] = $row;
                }
                fclose($handle);
            }
        }
        return $data;
    }

    public function uploadCsv() {
        $data = $this->parseCSVFileFromForm();
        $this->model->saveCsvData($data);
        return $this->renderJSON(array('success' => true));
    }
}