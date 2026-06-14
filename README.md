# Library Management System Project (Laravel)

This repository contains the backend system for the final project, built using the Laravel framework and a MySQL database. This project is a direct continuation of the previous library management project (`https://github.com/L-vy/MidProject-BNCC-LnT-Backend`)

## Key Upgrades & Features

* **Framework Transition:** Rebuilt the previous PHP codebase using Laravel for better structure, security, and routing.
* **Database Management:** Uses migrations and a final SQL file (`database_fin.sql`) to handle complex database relations easily.
* **MVC Architecture:** Separates database logic, user views (Blade templates), and server controllers cleanly.
* **Component System:** Includes custom Blade components (`components/`) to keep the frontend design clean and reusable.

## Project Structure

* `app/`: Contains the core application logic, models, and controllers.
* `routes/web.php`: Manages all application endpoints and page routing.
* `resources/views/`: Holds the Blade templates for rendering the user interface.
* `database_fin.sql`: The finalized database script to set up all tables and relations.

## Setup Instructions

1. Make sure you have PHP, Composer, and MySQL installed locally.
2. Clone this repository to your local machine.
3. Install the project dependencies:
   ```bash
   composer install
   npm install
