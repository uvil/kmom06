CUserBase
=========

A PHP-based package to use with ["AnaxMVC"](https://github.com/mosbth/Anax-MVC).

I handles the user autorisation process.


HOW TO USE:
===========

1. Create a new (project) folder and install AnaxMVC to it by cloning:

    git clone https://github.com/mosbth/Anax-MVC.git.

2. Point browser to the file webroot/hello.php. 
- IF it is working then continue.

3. Edit (or create) the file composer.json by adding the folowing line:

    "require": {"urbvik/cuserbase": "dev-master"}

4. Also set the stability flags in the composer.json file to:

    "minimum-stability": "dev",
    "prefer-stable" : true,

5. Then validate and install the packages via composer:

    composer validate
    composer install --no-dev

6. Adjust database settings in app/config/config_mysql.php and create database table.
Run the attached the file user.sql (located i same folder as this file). 

7. Include mos CDatabaseBasics class to the demo project by including 
the composer generated autoloader. I.e by adding the line:

    require "../../../autoload.php";

to the index.php file.

Then point your browser to [project-folder]/vendor/urbvik/cuserbase/webroot/ 
and the demo site shoud work.

  
Good Luck!


```
 .  
..:  Copyright (c) 2016 Urban Vikdahl
```
