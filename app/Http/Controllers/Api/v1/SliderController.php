<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator,Config,Image;
use App\Http\Models\Slider;
use Illuminate\Support\Str; 

class SliderController extends Controller
{

    public function __construc(){
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    public function getSlider() {
        $sliders = Slider::orderBy('id','desc')->where('sld_estado', '1')->get();
        $this->response['mensaje'] = 'success';
        $this->response['datos'] = $sliders;
        return response()->json($this->response, 200);
    }

}
    




