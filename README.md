
# Workopia Clone

A PHP-based job listing application inspired by Brad Traversy's Workopia project. This clone emphasizes a custom MVC architecture without relying on full-fledged frameworks, offering a lightweight and educational approach to building web applications.

## Features

- Custom Laravel-like routing system
- MVC architecture with PSR-4 autoloading
- User authentication and authorization middleware
- Session management and form validation
- MySQL database integration
- Structured project layout for scalability and maintainability

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer

## Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/rolivasarhelyi/workopia-clone.git
   ```

2. **Navigate to the project directory:**

   ```bash
   cd workopia-clone
   ```

3. **Install dependencies using Composer:**

   ```bash
   composer install
   ```

4. **Set up the database:**

   - Create a new MySQL database named `workopia`.
   - Import the `workopia.sql` file located in the project root to populate the database schema.

5. **Configure the database connection:**

   - Rename `config/_db.php` to `config/db.php`.
   - Update the database credentials in `config/db.php` accordingly.

6. **Set the document root:**

   Ensure your web server's document root points to the `public` directory of the project.

   - **Using PHP's built-in server:**

     ```bash
     php -S localhost:8000 -t public
     ```

   - **Using XAMPP:**

     Update the `httpd.conf` file:

     ```apache
     DocumentRoot "C:/xampp/htdocs/workopia-clone/public"
     <Directory "C:/xampp/htdocs/workopia-clone/public">
         AllowOverride All
         Require all granted
     </Directory>
     ```

   - **Using MAMP:**

     Set the document root in the MAMP preferences to:

     ```
     /Applications/MAMP/htdocs/workopia-clone/public
     ```

   - **Using Laragon:**

     Configure the virtual host to point to:

     ```
     C:/laragon/www/workopia-clone/public
     ```

## Project Structure

```
workopia-clone/
├── App/                # Application controllers and views
├── Framework/          # Core framework components
├── config/             # Configuration files
├── public/             # Publicly accessible files (index.php, assets)
├── routes.php          # Application routes
├── helpers.php         # Helper functions
├── composer.json       # Composer configuration
├── workopia.sql        # Database schema
└── ...
```

### Key Directories and Files

- **App/**: Contains controllers and views for handling application logic and presentation.
- **Framework/**: Houses core components like routing, session management, validation, and authorization.
- **public/**: The entry point of the application (`index.php`) and assets like CSS and JavaScript files.
- **config/db.php**: Database configuration file.
- **routes.php**: Defines the application's routes and their corresponding controllers.

## Routing Example

```php
$router->get('/listings', 'ListingController@index');
$router->get('/listings/create', 'ListingController@create', ['auth']);
$router->post('/listings', 'ListingController@store', ['auth']);
```

- The above routes handle listing display, creation form, and storing new listings, respectively.
- The `'auth'` middleware ensures that only authenticated users can access certain routes.

## Middleware

- **auth**: Restricts access to authenticated users.
- **guest**: Restricts access to unauthenticated users.

Apply middleware by passing it as the third argument in the route definition:

```php
$router->get('/register', 'AuthController@register', ['guest']);
```

## Autoloading

The project utilizes PSR-4 autoloading standards. The `composer.json` file is configured to autoload classes from the `Framework` and `App` namespaces:

```json
"autoload": {
    "psr-4": {
        "Framework\": "Framework/",
        "App\": "App/"
    }
}
```

After modifying or adding new classes, run the following command to update the autoloader:

```bash
composer dump-autoload
```

## License

This project is open-source and available under the [MIT License](LICENSE).
