# Laravel Project Setup Guide

This guide will walk you through setting up a Laravel project, including installing Composer, configuring the environment file, migrating and seeding the database, generating an application key, managing storage, and running the development server.

# Tools used for development

- HTML
- CSS 
- JavaScript
- Laravel
- VsCode
- Laragon

## Prerequisites

- PHP (>= 7.3)
- Composer
- MySQL or another database supported by Laravel

## Step 1: Install Composer

Composer is a dependency manager for PHP. If you haven't installed Composer yet, download and install it from [getcomposer.org](https://getcomposer.org).

To install Composer dependencies in your project, run the following command in your project directory:
```
composer install
```
## Step 2: Create .env File

The .env file contains environment-specific configuration, such as database connection details. Copy the .env.example file to create a new .env file:
```
cp .env.example .env
```
Next, edit the .env file to configure your database connection:

- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=your_database_name
- DB_USERNAME=your_database_user
- DB_PASSWORD=your_database_password

## Step 3: Migrate and Seed the Database

To run the database migrations and seed the database with test data, use the following Artisan command:
```
php artisan migrate:refresh --seed
```
This command will reset the database and run all migrations, then seed it with test data.

## Step 4: Generate Application Key

Laravel requires an application key, which is used for encryption. Generate the application key by running:
```
php artisan key:generate
```
This command will update the APP_KEY value in your .env file.

## Step 5: Move album_covers Folder

Move the album_covers folder to the storage/app/public directory. You can use the following command:
```
mv path/to/album_covers storage/app/public/
```
Make sure to replace path/to/album_covers with the actual path to your album_covers folder.

## Step 6: Link Storage to Public Folder

To create a symbolic link from storage/app/public to public/storage, run the following Artisan command:
```
php artisan storage:link
```
This command allows you to access the files in storage/app/public from the public directory.

## Step 7: Run the Development Server

To start the Laravel development server, run the following command:
```
php artisan serve
```
This command will start a local development server at http://127.0.0.1:8000.

## 5 Test cases
| **Test Case ID** | **Description**     | **Test Description**                                             | **Expected Outcome**                                                                     | **Result** |
|------------------|---------------------|------------------------------------------------------------------|------------------------------------------------------------------------------------------|------------|
| TC01             | Registration        | Verify that user can create an account                           | After a correct data input user need to be redirected to their account                   | Passed     |
| TC02             | Sign In             | Verify that user can sign in to their account                    | After a correct data input user need to be redirected to their account                   | Passed     |
| TC03             | Search              | Verify that user can search posts                                | After a data input in a search field need to be showed a search results on the main page | Passed     |
| TC04             | Create post         | Verify that user can create a post                               | User inputs a data and submits it and after gets redirectet to a new post page           | Passed     |
| TC05             | Create discussion   | Verify that user can create a discussion                         | User inputs a data and submits it and after gets redirectet to a new discussion page     | Passed     |
