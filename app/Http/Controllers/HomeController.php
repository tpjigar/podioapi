<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        \Podio::setup(env('PODIO_APP_CLIENT'), env('PODIO_APP_SECRATE'));
//        $auth = \Podio::authenticate('password', [
//            'username' => 'tp.jigar@gmail.com',
//            'password' => 'Jigar@123',
//        ]);
        $auth = \Podio::authenticate_with_password('tp.jigar@gmail.com', 'Jigar@123');
        if($auth){
            dd('authentication succesfully');
        }

        //$ap = \PodioApp::get('27348290');
        $items = \PodioItem::filter('27348290');
        dd($items);
//        print "My app has " . count($items) . " items";

    }
}
