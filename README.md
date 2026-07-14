# Custom PHP Framework V2

A lightweight, secure, and fast MVC-style PHP framework built from scratch using native PHP components, without relying on heavy external dependencies.

## Key Features

- **MVC Architecture**: Clear separation of concerns with Models, Views, and Controllers.
- **Custom Routing**: A powerful regex-based router (`routes/web.php`) that supports dynamic parameters, HTTP method matching, and middleware chaining.
- **Secure Authentication**: Uses native PHP `password_hash` and `password_verify` for robust password storage.
- **Parameterized Queries**: A secure PDO-based database singleton (`src/DB.php`) protecting against SQL injections.
- **Data-injected Views**: Extensible view rendering (`src/View.php`) supporting layouts and dynamic variable extraction using native PHP `extract()`.
- **Environment Configurations**: Configuration variables (like DB credentials) are kept out of source control using an ignored `config.ini` file parsed by `constants.php`.

## Setup Instructions

1. **Clone the repository:**
   ```bash
   git clone <your-repository-url>
   cd custom-framework-V2
   ```

2. **Install Dependencies (Autoloader):**
   This framework uses Composer strictly for its PSR-4 autoloader capability.
   ```bash
   composer install
   ```
   *(Note: The `vendor/` directory is not tracked by Git to keep the repository lightweight and clean).*

3. **Configure Environment:**
   Create a `config.ini` file in the root directory. This file is ignored by Git to keep your secrets safe.
   ```ini
   APP_URL="localhost/user"
   DB_HOST="localhost"
   DB_USER="root"
   DB_PASS="your_secure_password"
   DB_DATABASE="user_permissions"
   AES_KEY="your_secure_key"
   ```

4. **Database Setup:**
   Import any necessary SQL schemas into your database engine. Update the `config.ini` values to match your local setup.

5. **Run the Application:**
   Point your local development server (like Apache or Nginx) to the `public/` directory, or use PHP's built-in server:
   ```bash
   cd public
   php -S localhost:8000
   ```
   Now visit `http://localhost:8000` in your browser.

## Routing

All routes are defined in `routes/web.php`. Here's a quick example:

```php
$routes->get('profile', [UserController::class, 'profile'])->middleware(AuthMiddleware::class);
$routes->post('login', [UserController::class, 'validateLogin']);
```

## Security

Please note that sensitive files like `config.ini` and the `vendor/` directory are deliberately omitted from this repository for security and best practices. Always ensure `config.ini` is never pushed to public repositories.
