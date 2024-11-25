# PHP E-Commerce Project

## Demo

Check out a demo video showcasing the project's features:

![Demo Video](./demo_video/demo_php.mp4)

## Prerequisites
To run this project locally, ensure the following prerequisites are met:

1. **XAMPP**
   - Install XAMPP from [Apache Friends](https://www.apachefriends.org/).
   - Ensure the **Apache** and **MySQL** modules are running.

2. **PHP**
   - The project requires PHP (minimum version 7.4) to be installed.

3. **Browser**
   - Use a modern browser (Google Chrome, Mozilla Firefox, etc.) to access the project.

4. **Git** (Optional)
   - Install Git to clone the project repository.

## Installation and Setup

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/tp_php.git
   ```

2. **Move Files to XAMPP's `htdocs` Directory**
   - Copy the project folder to the `htdocs` directory of your XAMPP installation. Example:
     ```bash
     mv tp_php /path/to/xampp/htdocs/
     ```

3. **Start Apache and MySQL**
   - Open the XAMPP Control Panel and start the **Apache** and **MySQL** services.

4. **Setup Database**
   - Open **phpMyAdmin** by navigating to [http://localhost/phpmyadmin](http://localhost/phpmyadmin).
   - Create a database named `database`.
   - Import any necessary SQL files or structure the database according to the application's requirements. Refer to the `users` table structure:
     ```sql
     CREATE TABLE users (
         id INT AUTO_INCREMENT PRIMARY KEY,
         login VARCHAR(255) NOT NULL,
         password VARCHAR(255) NOT NULL,
         role ENUM('admin', 'user') NOT NULL DEFAULT 'user'
     );
     ```

5. **Access the Project**
   - Open your browser and navigate to:
     ```
     http://localhost/tp_php/index.php
     ```


## Features
- User authentication (login/logout).
- Admin dashboard for managing products.
- Add-to-cart functionality with session management.
- Responsive product display using Bootstrap.


