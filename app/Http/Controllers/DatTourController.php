<?php

namespace App\Http\Controllers;

use App\Models\DatTour;
use Illuminate\Http\Request;

class DatTourController extends Controller
{
    public function index(){
        return view('admin.dat_tour');
    }
}
