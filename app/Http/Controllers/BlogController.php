<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\KhachSan;
use App\Models\QuanLyBaiViet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function viewBlog(){
        // dd(Auth::guard('customer')->check());
        $bai_viet = QuanLyBaiViet::orderByDESC('id')->get();
        $binh_luan = blog::get();

        return view('client.blog',compact('bai_viet' ,'binh_luan'));
    }
    public function actionBlog(Request $request)
    {
        $data = $request->all();
        blog::create($data);
        toastr()->success('Bình Luận Đã Được Gửi');
        return redirect()->back();
    }
    public function viewBlogDetail($id)
    {
        $blogDetail = QuanLyBaiViet::find($id);
        $bai_viet = QuanLyBaiViet::where('is_open', 1)->get();
        $binh_luan = blog::get();
        return view('client.blog_detail', compact('blogDetail','bai_viet','binh_luan'));
    }
    public function viewYeuThich(){
        $arr = [];
        $list_ks = KhachSan::get();
        $id_user = Auth::guard('customer')->user()->id;
        if($id_user > 0) {
            foreach ($list_ks as $key => $value) {
                if(strpos($value->khach_hang_yeu_thich, $id_user) !== false) {
                    array_push($arr, $value);
                }
            }
        }else{

        }

        // dd($arr);
        return view('client.yeu_thich', compact('arr'));
    }


    public function changeYeuThich(Request $request){
        $change = KhachSan::where('id', $request->id)->first();
        $list_yeu_thich = explode(',', $change->khach_hang_yeu_thich);
        $del = '';
        foreach($list_yeu_thich as $key => $value) {
            if($value == $request->id_khach_hang)
                $del = $value . ',';
        }
        if(strlen($del) > 0) {
            $change->khach_hang_yeu_thich = str_replace($del, '', $change->khach_hang_yeu_thich );
            $change->save();
            return response()->json([
                'status' => true,
                'tim'    => false,
            ]);
        } else {
            $change->khach_hang_yeu_thich .= $request->id_khach_hang . ',';
            $change->save();
            return response()->json([
                'status' => true,
                'tim'    => true,
            ]);
        }
    }
}
