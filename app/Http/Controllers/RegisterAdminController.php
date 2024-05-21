<?php

namespace App\Http\Controllers;

use App\Models\RegisterAdmin;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.register');
    }
}
