<?php
  // Define and return settings for localhost database connection
  
  define('DB_USER', 'root');          // The database username
  define('DB_PASSWORD', '');          // The database password
  define('DB_DSN', 'mysql:host=localhost;dbname=phpmvc;');    // The database connection
  define('DB_TABLE_PREFIX', '');      // The table prefix
  
  return[
     
    'dsn'             => DB_DSN,
    'username'        => DB_USER,
    'password'        => DB_PASSWORD,
    'driver_options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"],
    'table_prefix'    => DB_TABLE_PREFIX,
  ];

