<?php

return [
    'driver' => 'mysql',
    'host' => 'mysql_db', // Docker service name
    'port' => 3306,       // Internal MySQL port
    'database' => 'restapi', // Your created database
    'username' => 'narcis',  // User with access to the database
    'password' => 'narcis',   // Password for the user
    'charset' => 'utf8',
];
