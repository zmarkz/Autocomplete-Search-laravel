# humbell

## Used files and their corresponding use

app/routes.php - to declare routes of the multiple api and pages.

app/controllers/HomeController.php - to write all the logic of the routes.

#### Database -

app/config/database.php - to set all the credentials for the mysql database use.

app/database/migrations/* - to create tables used (categories and items table)

app/database/seeds/CategoriesTableSeeder.php - to seed categories table

app/database/seeds/ItemTableSeeder.php - to seed items table

app/database/seeds/DatabaseSeeder.php - to invoke seeders


#### Example Categories table -
```javascript
id  name                    parentID    level
------------------------------------------------
1	clothing	            NULL	    0
11	men's clothing	        1 	        1
12	children's clothing	    1 	        1
26	Men's shirt	            11 	        2
27  Children's shirt        12          2
-------------------------------------------------
```
#### Example Items table -

```javascript
id  name                    price   parentID
-------------------------------------------------
1	Polo Men's Shirt	    190	    26
2	Polo Children's Shirt	5966	27
-------------------------------------------------
```

#### Steps to run the project -
Make sure you are up and running with LAMP server -http://www.sudo-juice.com/install-lamp-server-ubuntu/

1- Install composer
```sh
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
```
2- Create laravel project and make the corresponding changes as per the corresponding git files.
```sh
composer create-project laravel/laravel {directory} 4.2 --prefer-dist
```
##### OR
2- Clone the project
3- Update composer -
```sh
composer update
```
4- Make changes for Database in - app/config/database.php
5 - Create a db named 'humbell'.
5- Run migrations to create tables -
```sh
$ php artisan migrate
```
6 - Run seeder to fill the tables using dummy data -
```sh
$ php artisan serve
```
7 - Host the project -
```sh
$ php artisan serve --host=locahost --port=8008
```
8-= Goto http://localhost:8008/ and you can access the project.

