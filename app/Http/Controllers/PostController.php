<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class PostController extends Controller
{
    //
    public function submitForm(Request $request)
    {
        // echo $request;
        // dd($request);

        $data = [
            'nama_umkm' => $request->input('nama_umkm'),
            'desc_umkm' => $request->input('desc_umkm'),
            'alamat_umkm' =>  $request->input('alamat_umkm'),
            'kelompok_umkm' => $request->input('category_umkm'),
        ];

        $client = new Client();

        try {
            $response = $client->post('http://127.0.0.1:1010/umkm/create', [
                'headers' => [
                    'Content-Type' => 'application/json', // Set the Content-Type header to JSON
                ],
                'body' => json_encode($data),
            ]);

            $responseBody = $response->getBody()->getContents();
            $responseBody = json_decode($responseBody, true);
            $resMessages = $responseBody['message'];
            return redirect()->route('list_umkm')->with('success', $resMessages);
        } catch (RequestException $e) {
            echo "Error: " . $e->getMessage();
        }
        // dd(json_encode($data));



        // try {
        //     $response = Http::post("http://127.0.0.1:9090/umkm/create", [
        // 'headers' => [
        //     'Content-Type' => 'application/json', // Set the Content-Type header to JSON
        // ],
        //         'body' => json_encode($jsonData), // JSON-encode the payload and set it as the request body
        //     ]);


        //     $responseBody = $response->getBody()->getContents();
        //     dd($response);

        //     // Handle the response data (JSON response)
        //     $responseData = json_decode($responseBody, true);
        //     dd($responseData);
        //     return redirect()->route('list_umkm')->with('success', $responseData);
        // } catch (RequestException $e) {
        //     echo "Error: " . $e->getMessage();
        // }
    }

    public function getListUMKM()
    {

        $response = Http::get('http://127.0.0.1:1010');


        $umkm = $response->json();
        // dd($umkm);
        // dd($umkm);
        // $message = $umkm['messages']
        // Convert JSON string to a PHP associative array
        $umkmsArray = $umkm['umkm_json'];
        // $umkmsArray = json_decode($umkm['umkm_json'], true);

        // @dd($umkm);
        return view('umkm.index', compact('umkmsArray'));
    }

    public function deleteUmkm(Request $request, $id)
    {
        $client = new Client();
        $response = $client->delete("http://127.0.0.1:1010/umkm/delete/{$id}");
        $responseBody = $response->getBody()->getContents();
        $responseBody = json_decode($responseBody, true);
        $resMessages = $responseBody['message'];
        // Optionally, you can handle the response here
        // dd($resMessages);
        return redirect()->back()->with('red', $resMessages);
    }

    // public function
}
