<?php

namespace App\Http\Controllers;

use App\Jobs\JsonProductJob;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;

class JsonProductsController extends Controller
{
    public function get()
    {
        $uri = 'https://5fc7a13cf3c77600165d89a8.mockapi.io/api/v5/products';

        $api_products = $this->connect_source($uri);
        if (is_null($api_products)) die('API destination URL is not reachable.');

        foreach (array_chunk($api_products, 50) as $chunk) {
            // Queue import
            JsonProductJob::dispatch($chunk)->onQueue('json');
        }
    }

    public function connect_source($uri)
    {
        // Http Client
        try {
            $data = Http::retry(3, 100)->acceptJson()->get($uri);
            // $data = Http::withToken('token')->retry(3, 100)->acceptJson()->get($uri, []); // Authentication required
        } catch (RequestException $ex) {
            return null;
        }

        return $data->json();

        // GuzzleHttp
        // $client = new Client();

        // try {
        //     $data = $client->get($uri);
        // } catch (ClientException $e) {
        //     // An exception was raised but there is an HTTP response body
        //     // with the exception (in case of 404 and similar errors)
        //     $data = $e->getResponse(); // 404
        //     // $dataBodyAsString = $data->getBody()->getContents(); // Not found

        //     return $data->getStatusCode();
        //     // return $dataBodyAsString;
        // }
    }
}
