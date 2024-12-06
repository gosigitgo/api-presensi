<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM cuti_types');
        //you get result as an array in here but fetch your result however you feel to
        $result = $query->getResultArray();
        var_dump($result);
        return view('welcome_message');
    }
}
