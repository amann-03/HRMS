# HRMS System

## Project Overview

This project is an HRMS (Human Resource Management System) developed during our internship at Indoviosn. The system aims to streamline and automate various HR processes, including employee management, project assignment, and payroll processing.

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Acknowledgements](#acknowledgements)

## Features

- **Employee Management**: Add, edit, and delete employee records.
- **Project Management**: Assign employees to projects and track project progress.
- **Attendance and Leave Management**: Automate attendance and leave processing and show leaves.
- **User Roles**: Different access levels for HR and employees.
- **Meetings and notices**: Generate meetings and notices related to employee and project management.

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL(PHPMyAdmin)
- **Frontend**: HTML, CSS, Bootstrap, JavaScript
- **Version Control**: Git

## Installation

### Prerequisites

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Web server (e.g., Apache, Nginx)

### Steps

1. **Clone the repository:**
    ```sh
    git clone https://github.com/yourusername/hrms-system.git
    ```

2. **Navigate to the project directory:**
    ```sh
    cd hrms-system
    ```

3. **Set up the database:**
    - Create a database in MySQL.
    - Import the `database.sql` file into your MySQL database.

4. **Configure the application:**
    - Rename `config.example.php` to `config.php`.
    - Update the database credentials in `config.php`.

5. **Start the web server:**
    - Ensure your web server is running and configured to serve the project directory.

6. **Access the application:**
    - Open a web browser and navigate to `http://localhost/hrms-system`.

## Usage

1. **Admin Login:**
    - Use the admin credentials to log in and access all features.

2. **Manage Employees:**
    - Navigate to the Employees section to add, edit, or remove employee records.

3. **Assign Projects:**
    - Assign employees to projects and monitor their progress in the Projects section.

4. **Process Payroll:**
    - Generate payslips and manage payroll in the Payroll section.
  
## Future Prospects

1. **Payroll MAnagement:**

2. **Messaging and notifications:**

3. **Customisation:**

## Contributing

We welcome contributions from the community. To contribute:

1. **Fork the repository.**
2. **Create a new branch:**
    ```sh
    git checkout -b feature/your-feature-name
    ```
3. **Make your changes and commit them:**
    ```sh
    git commit -m 'Add some feature'
    ```
4. **Push to the branch:**
    ```sh
    git push origin feature/your-feature-name
    ```
5. **Create a pull request.**

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Acknowledgements

- We would like to thank our mentors at Indoviosn for their guidance and support.
- Special thanks to the open-source community for providing various resources and tools.

