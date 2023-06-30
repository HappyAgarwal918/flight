<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class FlightSearchController extends Controller
{
    public function __invoke (Request $request, Client $client)
    {
        $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
        $access_token = 'QquiALamz1hfCmsCbYsr2AkMsmw9';
        $data = [
            'originLocationCode'     => $request->originLocationCode,
            'destinationLocationCode' => $request->destinationLocationCode,
            'departureDate'           => $request->departureDate,
            'adults'                  => $request->adults,
        ];
        // To covert key value pairs into query parameters
        $data = http_build_query($data);
        // Append the query parameters to the URL
        $url .= '?' . $data;
        try {
            $response = $client->get($url, [
                'headers' => [
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $access_token
                ],
            ]);
            return $response->getBody();
        } catch (GuzzleException $exception) {
            dd($exception);
        }
    }
}
