<?php

namespace App\Http\Controllers\Frontend;
use App\models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $data['categories']=Category::where('status',1)->get();
        return view('frontend.home',compact('data'));
    }
}
