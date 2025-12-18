-- Online Banking System Database
-- Author: Shubham Giri
-- Description: Database schema for Online Banking System mini project

CREATE DATABASE IF NOT EXISTS online_banking;
USE online_banking;

-- ===============================
-- Customers Table (Offline Bank Database)
-- ===============================
CREATE TABLE customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    account_number VARCHAR(20) UNIQUE,
    ifsc_code VARCHAR(20),
    branch_name VARCHAR(100),
    balance DECIMAL(10,2)
);

-- ===============================
-- Users Table (Authentication- Online Bank Database)
-- ===============================
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT, 
    username VARCHAR(50) UNIQUE,
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

-- ===============================
-- Minor to Major Requests Table
-- ===============================
CREATE TABLE minor_to_major_requests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    bank_name VARCHAR(100),
    branch_name VARCHAR(100),
    branch_address VARCHAR(255),
    date DATE,
    applicant_name VARCHAR(100),
    account_number VARCHAR(30),
    dob DATE,
    ifsc_code VARCHAR(20),
    your_name2 VARCHAR(100),
    account_number2 VARCHAR(30),
    branch_address2 VARCHAR(255),
    photo_path VARCHAR(255),
    pan_path VARCHAR(255),
    aadhar_path VARCHAR(255),
    status VARCHAR(50) DEFAULT 'Pending',
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

-- ===============================
-- Sample Data (Optional)
-- ===============================
INSERT INTO customers 
(name, email, account_number, ifsc_code, branch_name, balance)
VALUES
('Demo User', 'demo@gmail.com', '1234567890', 'ABCN000045', 'Mumbai Main Branch', 45000.00);
