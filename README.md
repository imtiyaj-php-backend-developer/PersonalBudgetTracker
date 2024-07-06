

**Personal Budget Tracker
**Introduction
=>The primary objective of this project is to develop a web application that allows users to track their income and expenses efficiently. The application should provide a user-friendly interface for adding, managing, and analyzing financial transactions.

Key Features
User Authentication

Secure login and registration system.
Dashboard

Overview of current financial status.
Summary of total income, total expenses, and balance.
Income Management

Add, edit, and delete income records.
Categorize income (e.g., salary, freelance, investments).
Expense Management

Add, edit, and delete expense records.
Categorize expenses (e.g., groceries, utilities, entertainment).


**Table of Contents
Requirements
Installation
Configuration
Running the Application
Testing
Contributing
License
Requirements
Before you start, ensure you have the following installed:

PHP = 8.2
Composer = 
Laravel = 11.14
MySQL or any other supported database
Installation
Follow these steps to install the project.

Clone the Repository

Copy code
git clone [https://github.com/your-username/your-repository.git](https://github.com/imtiyaj-php-backend-developer/PersonalBudgetTracker/tree/master)
cd your-repository
Install Dependencies

Copy code
composer install
npm install
npm run dev
Setup Environment Variables
Copy the .env.example file to .env and update the environment variables as needed.




Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=personalbudgettracker
Migrate and Seed the Database
Run the following commands to migrate and seed the database.

Copy code
php artisan migrate
php artisan db:seed
Running the Application
To start the Laravel development server, run:

Copy code
php artisan serve
Visit http://localhost:8000 in your browser.

