<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\City;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index() {
        $cities = City::all();
        $x = count($cities);
        
        for($i = 0; $i < $x; $i++) {

            $weathers[] = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$cities[$i]['lat']}&lon={$cities[$i]['lon']}&appid=4c7f1f68689243332f5672f3f5d973e0")
                ->json();          
        }

        return view('welcome', [
            'weathers' => $weathers
        ]);
    }

    public function InsertVal() {
        $cities = City::all();
        $x = count($cities);
        
        for($i = 0; $i < $x; $i++) {
            $weathers[] = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$cities[$i]['lat']}&lon={$cities[$i]['lon']}&appid=4c7f1f68689243332f5672f3f5d973e0")
            ->json();  
            
            foreach ($weathers as $weather) {
                $name = $weather['name'];
                $lat = $weather['coord']['lat'];
                $lon = $weather['coord']['lon'];
                $main = $weather['weather'][0]['main'];
                $temp = $weather['main']['temp'];
                $feels_like = $weather['main']['feels_like'];
                $humidity = $weather['main']['humidity'];
                $speed = $weather['wind']['speed'];

                $weather = new Weather();
                $weather->city = $name;
                $weather->lat = $lat;
                $weather->lon = $lon;
                $weather->condition = $main;
                $weather->temp = $temp;
                $weather->feels_like = $feels_like;
                $weather->humidity = $humidity;
                $weather->speed = $speed;
        
                $weather->save();
            }
        }
    }
}
