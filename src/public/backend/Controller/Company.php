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
}