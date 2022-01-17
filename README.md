# SendNote

## Table of contents

- [SendNote](#sendnote)
  - [Table of contents](#table-of-contents)
  - [General Information](#general-information)
  - [Technologies](#technologies)
  - [Setup](#setup)
  - [Screenshots](#screenshots)
    - [Homepage](#homepage)
    - [Homepage (completed form)](#homepage-completed-form)
    - [Password protected note](#password-protected-note)
    - [Example note](#example-note)
  - [License](#license)

## General Information

SendNote is a free online service that lets you share sensitive information quickly and securely.

All stored information is deleted from the database as soon as the message has been viewed by a specified number of people or after a specified date. Additionally, each message can be password protected.

The website was created using Laravel framework, MariaDB database and is available in Polish and English.

## Technologies

-   PHP: ^7.3|^8.0
-   Laravel: ^8.75
-   MariaDB: ^10.4.20
-   Composer
-   SCSS
-   jQuery 3.6.0

## Setup

To run this site locally, first clone this repository.

Next, create a database named 'sendnote' and make sure you have all the [technologies](#technologies).

Now use the following commands on Windows (on MacOS/Linux use the equivalent of these commands):

```
$ cd .\SendNote\
$ composer install
$ php artisan migrate
$ php artisan serve
$ php artisan schedule:work
```

Now the page will be available in the browser at 127.0.0.1:8000, if you want it to be available across the LAN, use:

(in place of [IP] enter the current IP address of the computer, e.g. 192.168.1.100)

```
$ php artisan serve --host=[IP]
```

## Screenshots

### Homepage

![homepage_blank](https://user-images.githubusercontent.com/61974579/149811168-c6822766-7081-4f8a-8af2-029e8864f2ee.jpeg)

### Homepage (completed form)

![homepage (completed form)](https://user-images.githubusercontent.com/61974579/149811215-56e08a80-0026-46ae-a2cf-de7ad5623166.jpeg)

### Password protected note

![password protected note](https://user-images.githubusercontent.com/61974579/149811355-a6362bab-7365-4d79-8e11-72c8642ae047.jpeg)

### Example note

![example note](https://user-images.githubusercontent.com/61974579/149811525-1554abcc-05b5-4754-88ab-3622964b5332.jpeg)

## License

All rights reserved
