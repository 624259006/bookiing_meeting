<?php

namespace App\Controllers;

class Home extends Main
{
    public function index()
    {
        $data_sending = ['active' => 'home']; 
        return view('index', $data_sending);
    }

    public function calendar()
    {
        $data_sending = ['active' => 'calendar'];
        return view('home/calendar', $data_sending);
    }

    public function rule_use_room()
    {
        $data_sending = ['active' => 'rule_use_room'];
        return view('home/rule_use_room', $data_sending);
    }
}

