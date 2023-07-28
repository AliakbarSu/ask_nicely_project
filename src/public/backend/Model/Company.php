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

    public function saveCsvData($data) {
        try {
            $columns = implode(', ', ['company_name','employee_name', 'employee_email', 'salary']);
            $placeholders = implode(', ', array_fill(0, count($data[0]), '?'));
            
            $query = "INSERT INTO employees ($columns) VALUES ($placeholders)";
            $result = $this->pdo->prepare($query);
    
            for ($i = 1; $i < count($data); $i++) {
                $result->execute($data[$i]);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
