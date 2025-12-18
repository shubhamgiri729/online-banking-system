# Online Banking System with Minor to Major Account Upgradation

🚧 **Project Status:** In Progress (Approximately 50–60% Completed)

---

## 📌 Project Overview

The **Online Banking System** is a web-based application designed to simulate essential banking operations in a secure, structured, and user-friendly manner. The system provides digital banking services such as account access, balance viewing, payments, fixed deposits, and a unique **Minor to Major Account Upgradation** feature.

The core idea of the project is to allow users with minor accounts to upgrade their account status to a major account **online**, through a verification and admin approval workflow. The project is built following real-world banking concepts such as authentication, role-based access control, session management, and database relationships.

---

## 👨‍💻 Developed By

**Shubham Giri**
**Role:** Full-Stack Web Developer (Frontend, Backend & Database)

---

## 🛠️ Technologies Used

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP
* **Database:** MySQL
* **Server Environment:** XAMPP (Apache & MySQL)

---

## 🗄️ Current Database Design

> ⚠️ *Note:* The database schema is currently under development. More tables and relationships will be added as the project progresses.

### Existing Tables

#### 1. `customers`

Stores core customer details synced with the offline banking database.

* `customer_id` (Primary Key)
* `name`
* `email` (Unique)
* `account_number` (Unique)
* `ifsc_code`
* `branch_name`
* `balance`

#### 2. `users`

Handles authentication and online banking login credentials.

* `id` (Primary Key)
* `customer_id` (Foreign Key → customers)
* `username` (Unique)
* `email` (Unique)
* `password` (Hashed)

#### 3. `minor_to_major_requests`

Manages the Minor to Major Account Upgradation workflow.

* `id` (Primary Key)
* `customer_id` (Foreign Key → customers)
* Bank and branch details
* Applicant personal information
* Uploaded document paths (Photo, PAN, Aadhaar)
* `status` (Pending / Approved)
* `submission_date`

---

## ✅ Completed Features

* User Login & Logout System
* Secure Session Management
* Database-driven User & Customer Tables
* Dynamic Home Page with Role-Based Access
* Display of User Account Details:

  * Account Holder Name
  * Account Number
  * IFSC Code
  * Branch Name
  * Available Balance
* Personal Internet Banking (Basic Structure)
* National Transfer Module (UI & Logic in Progress)
* **Minor to Major Account Upgradation Module:**

  * Online form submission
  * Document upload (PAN, Aadhaar, Photo)
  * Status tracking (Pending / Approved)
* Admin Verification Page
* MySQL Database Design with Foreign Key Relationships
* Responsive UI using CSS
* Image Slider & Navigation System

---

## 🚧 Features Under Development

* Transaction processing with real-time balance updates
* Transaction history
* Bill payment functionality
* Fixed deposit logic
* Change password & profile update
* Admin approval dashboard for Minor-to-Major requests
* Feature locking/unlocking based on account type (Minor / Major)
* Security improvements (input validation, password hashing enhancements)

---

## 📂 Project Setup (Localhost)

This project runs on a local development environment using **XAMPP**.

### Steps to Run the Project:

1. Install XAMPP
2. Start **Apache** and **MySQL** services
3. Import the provided SQL file into **phpMyAdmin**
4. Place the project folder inside the `htdocs` directory
5. Open a browser and navigate to:

   ```
   http://localhost/online-banking-system
   ```

---

## 📚 Key Learning Outcomes

* Practical understanding of real-world banking workflows
* PHP–MySQL integration
* Session-based authentication
* Database normalization and relationships
* Role-based feature control
* Account lifecycle management (Minor vs Major)
* Frontend–Backend coordination

---

## 🧠 Conclusion

This project demonstrates a realistic implementation of an online banking system with a strong emphasis on **security**, **user eligibility**, and **account lifecycle management**. The Minor to Major Account Upgradation feature highlights real-world problem-solving and system design skills.

Once completed, this project will serve as a strong **academic submission** as well as a **professional portfolio project**, showcasing full-stack development capabilities and structured software design.

---

📌 *Note:* This project is currently under active development and is intended to run on a local server environment.
