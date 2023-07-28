<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HttpPostController extends Controller
{
    //
    public function index(){
        $response = Http::get("https://jsonplaceholder.typicode.com/posts");

        $jsonData = $response->json();

        dd($jsonData);
    }

    public function getSingle($id){
        // $response = "https://jsonplaceholder.typicode.com/posts/{$id}";
        // $response = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}");
        // // echo $response;
        // // dd($response);
        // $jsonData = $response->json();

        // dd($jsonData);

        $response = Http::get("https://jsonplaceholder.typicode.com/posts/{$id}");

        $jsonData = $response->json();

        dd($jsonData);
    }

    public function store($id){
        $response = Http::post("https://jsonplaceholder.typicode.com/posts/{$id}", [
            'title' => 'This is tittle 1',
            'body' => 'This is body 1'
        ]);

        $jsonData = $response->json();
        dd($jsonData);
    }

    public function put($id){
        $response = Http::put("https://jsonplaceholder.typicode.com/posts/{$id}", [
            'title' => 'This is tittle 1 Updated',
            'body' => 'This is body 1 Updated'
        ]);

        $jsonData = $response->json();
        dd($jsonData);
    }

    public function delete($id){
        $response = Http::delete("https://jsonplaceholder.typicode.com/posts/{$id}", [
            'title' => 'This is tittle 1',
            'body' => 'This is body 1'
        ]);

        $jsonData = $response->json();
        dd($jsonData);
    }
    // public function
}
