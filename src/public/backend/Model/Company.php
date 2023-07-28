<?php

require_once 'Model.php';

class CompanyModel extends Model {

    public function __construct() {
        parent::__construct();
        $this->createTable();
    }

    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS employees (
                id INT PRIMARY KEY AUTO_INCREMENT,
                company_name VARCHAR(100) NOT NULL,
                employee_name VARCHAR(100) NOT NULL,
                employee_email VARCHAR(255) NOT NULL,
                salary DECIMAL(10, 2)
            )";
            $this->pdo->exec($sql);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getEmployees() {
        $result = $this->pdo->query('SELECT * FROM employees');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }   
}
