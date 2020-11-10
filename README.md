## How to run the project

1. Install `Node.js`, `php` and `Composer`

    ##### XAMPP (PHP) + Composer tutorial (optional but likely easier but more bloated)

    https://thecodedeveloper.com/install-composer-windows-xampp/

2. Open the terminal in the project root directory
3. Run `npm install` to install dependencies
4. Run `npm start` to host the server at `http://localhost:8000`

## Information

#### `npm run install`

This command will install the required libraries (Twig)

#### `npm run start`

This command will host the server at `localhost:8000`

#### `.htaccess`

This file is used to re-route all requests to `index.php` so we can route from that single file
