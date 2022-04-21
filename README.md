![Header](https://github.com/kirillsvr/Cooking-Blog/raw/master/public/assets/presentation/presentation.jpg)

<br>

Cooking Blog is a website with recipes and posts, as well as an admin panel. This project uses Laravel as backend.

Here are some of the features it includes:

- Administrative panel with CRUD operations for recipes and posts
- Tree structure of comments and the ability to edit them
- Different categories of access to the administrative panel
- Filtering recipes by categories, tags, complexity of cooking
- Changing the site display settings from the administrative panel
<br>
And many others functions...

<br><br>

## Demo

To see the site, follow the link - [Cooking Blog](https://github.com/laravel/laravel)

You can also view the administrative part of the site. To do this, you need to follow the link and log in - [Admin Panel](https://github.com/laravel/laravel)

### Authorization

Admin:

```
Login - admin@mail.ru
Password - qwerty123
```
<br>

Author:

```
Login - author@mail.ru
Password - qwerty123
```
<br>

## Setup

If you are interested in trying Cooking Blog, you can do the following.

### Local

1. Clone this repository to your machine.

   ```bash
   git clone -b v3 --depth 1 --single-branch https://github.com/kirillsvr/Cooking-Blog.git
   ```

2. Install dependencies.

    ```bash
    composer install
    ```

3. Copy `.env.example` file to `.env`.

   ```bash
   cp .env.example .env
   ```
   This file will be used by Laravel during development.

4. Run all managed services with Docker Compose, and wait for all containers to run perfectly.

   ```bash
   docker-compose up -d
   ```
   
4. Make migrate.

   ```bash
   php artisan migrate
   ```

5. Fill database with data using seed classes.

   ```bash
   php artisan db:seed --class=GenerateSeeder
   ```

6. To login to the admin panel, enter this data.

    ```
    Login - info@mail.ru
    Password - 123456
   ```

If all goes well, you can immediately try opening http://localhost:8886 in the browser.

## DB Schema

![DB Schema](https://github.com/kirillsvr/Cooking-Blog/raw/master/public/assets/presentation/db.jpg)
