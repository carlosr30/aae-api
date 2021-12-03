<?php

namespace App\Http\Controllers;

class CalendarController extends Controller
{
    /**
     * I only have one web server as of the moment, so what I did is copied
     * the vue.js client build in this calendar view so that I can deploy
     * both the api and the client in a single server.
     */
    public function calendar() {
        return view('calendar');
    }
}
