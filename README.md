![Header](https://github.com/kirillsvr/Cooking-Blog/raw/master/public/assets/presentation/presentation.jpg)

<br>

Cooking Blog is a website with recipes and posts, as well as an admin panel. This project uses Laravel as back-end.

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

Authorization data:

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

For local setup, you need at least 2 terminals open at the same time.

1. Clone this repository to your machine.

   ```bash
   git clone -b v3 --depth 1 --single-branch https://github.com/hapakaien/portpoliwo.git && cd portpoliwo
   ```

2. Install dependencies.

    ```bash
    composer install && pnpm install
    ```

3. Copy `.env.example` file to `.env`.

   ```bash
   cp .env.example .env
   ```
   This file will be used by Laravel, Vue, and Docker Compose during development.

4. Run all managed services with Docker Compose, and wait for all containers to run perfectly.

   ```bash
   docker-compose up -d
   ```

5. Set up application with artisan command.

   ```bash
   php artisan app:install
   ```

6. Start Vue development server.

   ```bash
   pnpm dev
   ```

7. Open second terminal at the same location, and start Laravel development server.

   ```bash
   php artisan serve
   ```

   If all goes well, you can immediately try opening http://localhost:8000 in the browser.

   You can try logging in with the account in the [database/seeders/UsersTableSeeder.php](database/seeders/UsersTableSeeder.php) file.
