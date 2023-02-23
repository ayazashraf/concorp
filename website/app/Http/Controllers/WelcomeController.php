<?php

namespace App\Http\Controllers;
use App\Business;
use App\BusinessPhoto;
use App\ItemPhoto;
use App\Photo;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Illuminate\Support\Facades\Hash;

use App\BusinessItem;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {        
       $items = BusinessItem::where('featured', 1)
                            ->orderBy('name', 'desc')
                            ->take(3)
                            ->get();
       return view('welcome',compact('items'));    
    }
}
