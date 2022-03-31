<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PodioController extends Controller
{
    public function __construct()
    {
        \Podio::setup(env('PODIO_APP_CLIENT'), env('PODIO_APP_SECRATE'));
        $this->auth = \Podio::authenticate_with_password(env('PODIO_APP_USERNAME'), env('PODIO_APP_PASSWORD'));
    }

    public function auth()
    {
        if($this->auth){
            dd("authenticated succesfully");
        }
    }

    public function Items()
    {
        $items = \PodioItem::filter('27348290');
        dd($items);
    }

    public function itemCreate()
    {
        //https://developers.podio.com/examples/items
        try {
            $attributes = ['fields' => [
                "project-title" => "This is Item create API",
                "progress" => 25,
                "status" => [1],
                "start-date" => ['start_date' => "2022-03-30", 'end_date' => "2022-04-29"],
//            "finish-date" => ['start_date' => "2202-05-27", 'end_date' => "2022-06-29"],
                "project-description" => "<p>Hello World descriptions</p>",
//            "project-owner-3" => [
//                ['type' => "user", 'id' => "11555368"],
//                ['type' => "space", 'id' => "7885558"],
//            ],
            ],
                'file_ids' => [],
                'tags' => ['my tag'],
            ];

            $options = [];
            $podiocreate = \PodioItem::create('27348290', $attributes);
            dd($podiocreate);
        } catch (\PodioError $e) {
            dd($e);
        }
    }

    public function itemUpdate($id)
    {
        try {
            $updatedAttributes = ['fields' => [
                "project-title" => "Updated title for : ". $id,
                "progress" => 75,
                "status" => [1],
                "start-date" => ['start_date' => "2022-03-30", 'end_date' => "2022-04-29"],
                "project-description" => "<p>Updated descriptions</p>",
            ],
                'file_ids' => [],
                'tags' => ['updatedTag'],
            ];
            $podioUpdate = \PodioItem::update($id, $updatedAttributes);
            dd($podioUpdate);
        } catch (\PodioError $e) {
            dd($e);
        }
    }

    public function fileUpload()
    {
        try {
            $path = base_path().'/public/clothes.jpg';
            $file = \PodioFile::upload($path, 'clothes.jpg');
            dd($file);
        } catch (\PodioError $e) {
            dd($e);
        }
    }

}
