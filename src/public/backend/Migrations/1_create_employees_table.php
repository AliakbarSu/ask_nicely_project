<?php
require_once "/app/public/backend/Model/Model.php";


try {
    $model = new Model();
    $pdo = $model->pdo;

    $dropSql = "DROP TABLE IF EXISTS employees";
    $pdo->exec($dropSql);

    $createSql = "
    CREATE TABLE employees (
        id INT PRIMARY KEY AUTO_INCREMENT,
        company_name VARCHAR(100) NOT NULL,
        employee_name VARCHAR(100) NOT NULL,
        employee_email VARCHAR(255) NOT NULL,
        salary DECIMAL(10, 2)
    )";
    $pdo->exec($createSql);

    echo "employees table created";
} catch (PDOException $e) {
    echo "Something went wrong while creating employees table: " . $e->getMessage();
}
