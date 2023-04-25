# Suwa Sahana Hospital

## Introduction

This php application is a demo application about the `sql queries` and `database structure` of a hospital called Suwa Sahana Hospital.

## Run application

1. Copy the all the files in the `system` folder to `htdocs` folder in `XAMPP` application.

2. Open `XAMPP` application and start `Apache` server (start `MySQL` as well if you are using MariaDB).

3. Open your browser and type [`http://localhost/`](http://localhost/) in the address bar.

## Database setup

1. Database in **Mysql** and **MariaDB** are provided. The database must be created first with a name. (eg: suwa_sahana_hospital_db)

2. Then import the **.sql** file in `/database` folder.

3. Head over to `/connection.php` and set the `$host`, `$username`, `$password`, `$database` values accordingly.

```   
    $host = "localhost";

    $username = "root";

    $password = "";

    $database = "suwa_sahana_hospital_db";
````