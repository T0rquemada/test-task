<?php

namespace App\Http\Controllers;

use App\Services\RestClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Credentials for instance
        $credentials = [
            "login" => env("DFS_LOGIN"),
            "password" => env("DFS_PASS"),
            "base_url" => "https://api.dataforseo.com/",
        ];
        
        // Create client instance
        $client = new RestClient($credentials['base_url'], null, $credentials['login'], $credentials['password']);
        
        // Request param
        $data = [
            [
                "language_code" => $request->searched_language ?? "en",
                "location_name" => $request->searched_location,
                "keyword" => mb_convert_encoding($request->searched_word, "UTF-8"),
            ],
        ];

        // Handle optional site domain
        if(!empty($request->searched_site_title))
        {
            $data[0]["se_domain"] = $request->searched_site_title;
        }

        // Make request
        $response = $client->post("/v3/serp/google/organic/live/regular", $data);

        $results = [];

        // Format response
        $unformattedResults = $response["tasks"][0]["result"];
        if(!empty($unformattedResults))
        {
            $unformattedResults = $response["tasks"][0]["result"][0]["items"];
            foreach($unformattedResults as $result)
            {
                $results[] = [
                    "title" => $result["title"],
                    "url" => $result["url"],
                    "rank" => $result["rank_absolute"],
                ];
            }
        }

        return response()->json($results);
    }
}
