# Laravel App

## Prerequisites

Before you begin, ensure you have the following installed on your machine:

- [PHP](https://www.php.net/downloads)
- [Composer](https://getcomposer.org/download/)

## Getting Started

Follow these steps to set up and run the SvelteKit app:

1. **Install Dependanices**

   ```bash
   composer install


2. **Setup environment file**

   ```bash
   cp .env.example .env

3. **Setup App key**

   ```bash
    php artisan key:generate


4. **Run the database migrataion**

   ```bash
   php artisan migrate

5. **Run the sever**

   ```bash
   php artisan serve

