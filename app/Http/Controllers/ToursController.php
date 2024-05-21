<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDonDatTour;
use App\Models\Hoadontour;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToursController extends Controller
{
    public function viewTours(){
        $list_tour = Tour::orderByDESC('id')->get();
        return view('client.tours', compact('list_tour'));
    }
    public function viewThanhToan(){
        return view('client.thanh_toan');
    }
    public function TraVeTour(){
        $list_tour = Tour::orderByDESC('id')->get();
        return view('client.tra_ve_tim_kiem_cua_tour', compact('list_tour'));
    }
    //bill tour
    public function viewHoaDon()
    {
        return view('client.bill_tour');
    }
    public function getDataHoaDon()
    {
        $user = Auth::guard('customer')->user()->id;
        // dd($user);
        $data = Hoadontour::join('customers', 'hoadontours.idCustomer', 'customers.id')
                              ->join('tours', 'hoadontours.idTour', 'tours.id')
                              ->where('hoadontours.idCustomer', $user)
                              ->get();

        return response()->json([
            'data' => $data
        ]);
    }
}
