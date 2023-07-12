<?php

namespace App\Http\Controllers\Front;

use PDF;
use App\Models\Category;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{
    public function index() 
    {
        $specials = Category::where('name','specials')->first();

        return view ('welcome', compact('specials'));
    }

    public function thankYou(Request $request) 
    {
        
                 
            return view('thankYou');
    }
}
