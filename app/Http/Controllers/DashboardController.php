<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu hóa đơn từ cơ sở dữ liệu, ví dụ:
        $invoices = \App\Models\Hoadontour::all();

        return view('dashboard', compact('invoices'));
    }
}
