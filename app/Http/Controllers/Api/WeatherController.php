<?php
/* New one 
namespace App\Http\Controllers\Api;

use App\Services\CallApiService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeatherController extends Controller

{
    protected CallApiService $apiService;

    public function __construct(CallApiService $apiService)
    { // Getting the weather data
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        //Variables
        $city = $request->query('city', '');
        $weatherData = [];
        $error = null; 

        // If city not empty feth data
        if (!empty($city)) {
            try {
                //Calls the service to get data, asks for a city 
                $weatherData = $this->apiService->getWeather($city);
                // If empty error 
                if (empty($weatherData)) {
                    $error = 'City not found or API error.';
                }
                // If something goes wrong error 
            } catch (\Exception $e) {
                $error = 'Error fetching weather data: ' . $e->getMessage();
            }
        }
// Return view with weather 
        return view('weather', [
            'city' => $city,
            'weatherData' => $weatherData,
            'error' => $error,
        ]);
    }
}*/