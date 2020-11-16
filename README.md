## How to run the project

1. Install `Node.js`, `PHP` and `Composer`

    ###### [XAMPP (PHP) + Composer tutorial (optional and likely easier but more bloated)](https://thecodedeveloper.com/install-composer-windows-xampp/)

2. Follow steps 1 to 4 of [this guide](https://cloud.google.com/vision/docs/quickstart-client-libraries#before-you-begin) and save the file in the root directory named `vision-key.json`
3. Open the terminal in the project root directory
4. Run `npm install` to install dependencies
5. Run `npm start` to host the server at `http://localhost:8000`

## Information

#### `npm run install`

This command will install the required libraries (Twig)

#### `npm run start`

This command will host the server at `localhost:8000`

#### `src`

This folder contains all the files related to the project, to separate them from other dependency files

#### `src/public`

This folder contains all the files accessible to the user through the URL bar

#### `src/public/.htaccess`

This file will not be used unless we are required to use an Apache web server

#### `src/public/index.php`

This file is used as a router to route the user to the requested resource from a central place

#### `src/templates`

This folder contains all the `Twig` templates used to generate dynamic HTML files

#### `src/templates/base.twig`

This file is the base twig file containing the main page layout which all our other files extend from and insert into using blocks
