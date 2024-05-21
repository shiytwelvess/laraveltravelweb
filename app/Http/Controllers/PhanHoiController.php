<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PhanHoiController extends Controller
{
    public function viewPhanHoi(){
        return view('admin.phan_hoi');
    }
    public function storePhanHoi(ContactRequest $request)
    {
        $data = $request->all();
        Contact::create($data);
        toastr()->success('Gửi Thành Phản Hồi Thành Công');
        return redirect('/');
    }
    public function loadPhanHoi(){
        $data = Contact::get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function destroy(Request $request){
        $data = Contact::where('id', $request->id)->first();
        $data->delete();
    }
}
