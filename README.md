# humbell

## Used files and their corresponding use

app/routes.php - to declare routes of the multiple api and pages.
app/controllers/HomeController.php - to write all the logic of the routes.

Database -

app/config/database.php - to set all the credentials for the mysql database use.
app/database/migrations/* - to create tables used (categories and items table)
app/database/seeds/CategoriesTableSeeder.php - to seed categories table
app/database/seeds/ItemTableSeeder.php - to seed items table
app/database/seeds/DatabaseSeeder.php - to invoke seeders


Example Categories table -

id  name                    parentID    level
------------------------------------------------
1	clothing	            NULL	    0
11	men's clothing	        1 	        1
12	children's clothing	    1 	        1
26	Men's shirt	            11 	        2
27  Children's shirt        12          2
-------------------------------------------------

items table -

id  name                    price   parentID
-------------------------------------------------
1	Polo Men's Shirt	    190	    26
2	Polo Children's Shirt	5966	27
-------------------------------------------------

