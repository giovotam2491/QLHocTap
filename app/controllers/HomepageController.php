<?php
require_once 'app/config/database.php';
require_once 'app/models/AccountModel.php';

class HomepageController
{

    public function homepage() {
        include_once 'app/views/homepage/homepage.php';
    }

}