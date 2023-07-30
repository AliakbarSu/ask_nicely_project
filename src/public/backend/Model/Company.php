<?php

require_once 'Model.php';

class CompanyModel extends Model {

    public function __construct() {
        parent::__construct();
    }


    public function getEmployees() {
        $result = $this->pdo->query('SELECT * FROM employees');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }   

    public function getCompanyAverageSalary() {
        $result = $this->pdo->query('SELECT company_name, AVG(salary) AS average_salary FROM employees GROUP BY company_name');
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

    public function updateEmail($user_id, $email) {
        try {
            $sql = "UPDATE employees SET employee_email = :email WHERE id = :user_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
