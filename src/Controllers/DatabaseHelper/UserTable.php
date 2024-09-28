<?php

namespace App\Controllers\DatabaseHelper;

use App\Kernel\Controller\Controller;

class UserTable extends Controller
{
    public function createUsersRows(): void
    {
        $database = $this->db(); // Retrieve the Database instance

        // Check if the database instance has the 'createUsersTable' method
        if (method_exists($database, 'createUsersTable')) {
            $database->createUsersTable();
        } else {
            throw new \Exception('Method createUsersTable not found in the Database class');
        }
    }
}