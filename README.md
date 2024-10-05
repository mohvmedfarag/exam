This project is a web application built with PHP using Object-Oriented Programming (OOP) and adhering to SOLID principles.
The application features basic CRUD operations (Create, Read, Update, Delete) along with authentication and authorization functionalities.
It ensures a clean and maintainable codebase following industry-standard best practices.

Features:
User Authentication:
Users can register and log in using email and password.
Passwords are securely hashed before storing in the database.
Sessions are managed to maintain logged-in states.

User Authorization:
Role-based access control is implemented.
Admin users have full control over the system, while regular users can only access their own data.
Certain actions are restricted based on user roles.

CRUD Operations:
Create: Users can create new records (e.g., posts, products, etc.).
Read: Users can view their own records, while admins can view all records.
Update: Users can update their own records. Admins can update any record.
Delete: Users can delete their own records. Admins can delete any record.

Security:
Utilizes secure password hashing (e.g., password_hash() and password_verify()).
Protects against unauthorized actions by implementing strict access control.

Object-Oriented Design:
The project follows OOP principles to keep code modular and reusable.
Classes are organized by responsibility, adhering to SOLID principles for maintainability and scalability.

SOLID Principles Applied:
Single Responsibility Principle: Each class has one responsibility (e.g., handling database, authentication).
Open/Closed Principle: The code is open for extension but closed for modification.
Liskov Substitution Principle: Subtypes can be substituted for their base types without affecting functionality.
Interface Segregation Principle: The system uses small, specific interfaces rather than a large, monolithic one.
Dependency Inversion Principle: High-level modules do not depend on low-level modules, but both depend on abstractions.

Tech Stack:
Backend: PHP (version 8.2)
Database: MySQL
Frontend: Basic HTML/CSS
Authentication: PHP Sessions
Architecture: OOP + SOLID Principles
