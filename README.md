1. Clone the Repository

  git clone https://github.com/Shahbaj8083/crud.git

2. composer install


3. Run Migrations (php artisan migrate)

4. Serve the Application(php artisan serve)

5. Update your .env file with your database configuration:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=crud_operation
    DB_USERNAME=root
    DB_PASSWORD=

Authentication

    Registration: Register a new account (/register).
    Login: Access the login page at /login and use your credentials to log in.

Dashboard
    Note: Only admin can see the list of all users and able to do operations on it.
    Dashboard: View and manage users from the dashboard at /dashboard.
    CSV Import/Export: Use the import/export features to manage user data.

Features

    User Authentication: Secure login and registration.
    User Management: CRUD operations on users.
    CSV Import/Export: Import users from CSV files and export user data to CSV.
    Search Functionality: Search users by name, email.
