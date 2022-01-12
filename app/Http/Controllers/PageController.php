<?php

namespace App\Http\Controllers;
use App\Models\menu_makanan_model;
use App\Models\transaksi_model;
use app\Models\User as u;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{


    public function tampil(){
        $id_now=Auth::user()->id;
        if(Auth::user()->level==0){
            $data = transaksi_model::join('menu_makanan','menu_makanan.id','transaksi.makanan_id')
            ->join('users','transaksi.user_id','users.id')
            ->where('users.id','=',$id_now)
            ->get(['transaksi.id','transaksi.quantity','menu_makanan.nama_makanan','menu_makanan.harga']);
        }
        else{
            $data = transaksi_model::join('menu_makanan','menu_makanan.id','transaksi.makanan_id')
            ->join('users','transaksi.user_id','users.id')
            ->get(['transaksi.id','transaksi.quantity','menu_makanan.nama_makanan','menu_makanan.harga','users.name','transaksi.user_id']);
        }





         return view('home', ['data'=>transaksi_model::simplepaginate(5)]);

    }

    public function hapus($id){
        DB::table('transaksi')->where('id',$id)->delete();


        return redirect('/home');
    }

    public function update(Request $request){

        DB::table('transaksi')->where('id',$request->id)
        ->update([
            'makanan_id' => $request->makanan,
            'quantity'=>$request->quantity
        ]);


        return redirect('/home');
    }

    public function edit($id){
        $data = menu_makanan_model::get();
        $edit = DB::table('transaksi')
        ->where('transaksi.id',$id)
        ->get();

        return view('edit',['edit_now'=>$edit, 'data'=>$data]);
    }

    public function order($id){
        $id_now=Auth::user()->id;

        $data=DB::table('menu_makanan')->where('menu_makanan.id',$id)->first();

        $trans = DB::table('transaksi')->where('user_id',$id_now)->get();

        foreach($trans as $t){
            if($t->makanan_id == $id){
                DB::table('transaksi')->where('transaksi.makanan_id',$id)
                ->increment('transaksi.quantity',1);

                return redirect('home')->with('success','Order Sukses!');
            }
        }

        DB::table('transaksi')->insert([
            'makanan_id' => $data->id,
            'user_id'=>$id_now,
            'quantity'=>1,

        ]);

        return redirect('home')->with('success','Order Sukses!');
    }



    public function makanan(){
        $data = menu_makanan_model::get();

        return view('order',compact('data'));
    }


    public function tambah($id){

        DB::table('transaksi')->where('transaksi.id',$id)
        ->increment('transaksi.quantity',1);

        return redirect('home');
    }

    public function kurang($id){

       $data= DB::table('transaksi')->where('transaksi.id',$id)->first();

       if($data->quantity-1 ==0){
        DB::table('transaksi')->where('transaksi.id',$id)->delete();
       }


        DB::table('transaksi')->where('transaksi.id',$id)
        ->decrement('transaksi.quantity',1);

        return redirect('home');
    }


    public function show_insert(){

        return view('/insertmakanan');
    }

    public function insert(Request $request){
        $validated = $request->validate([
            'makanan' =>['required','string'],
            'price' => ['required', 'numeric', 'gte:1000'],
            'image' => ['required']
            ]);

            $file = $request->file('image');
            $imageName = time().'_'.$file->getClientOriginalName();

            Storage::putFileAs('public/images',$file, $imageName);
            $imagePath = 'images/'.$imageName;

            DB::table('menu_makanan')->insert([
            'nama_makanan' =>$validated['makanan'],
            'harga' =>$validated['price'],
            'image' => $imagePath,
            ]);

            return redirect('home')->with('insert_success','Insert Menu Makanan Baru Sukses!');
    }

    public function show_updateprof(){

        return view('/updateprofile');
    }

    public function updateprof(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'age' => ['required','integer','min:18'],
            'alamat' =>['required','string','max:255'],
            ]);

        DB::table('users')->where('users.id',Auth::user()->id)
        ->update([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'alamat' =>$validated['alamat'],
        ]);

        return redirect('home')->with('update_success','Update Profile Success');
    }

    public function kirim($id){

        DB::table('transaksi')
        ->where('transaksi.id',$id)
        ->delete();

        return redirect('home')->with('kirim_success','Makanan Sudah Dikirim!');
    }

    public function show_listmakanan(){

        $data=DB::table('menu_makanan')
        ->get();

        return view('/listmakanan',compact('data'));
    }

    public function delete_makanan($id){

        DB::table('menu_makanan')
        ->where('menu_makanan.id',$id)
        ->delete();

        return redirect('/listmakanan')->with('deletemakanan_success','Menu Makanan Berhasil Dihapus!');
    }

    public function show_updatemakanan($id){

        $data=DB::table('menu_makanan')
        ->where('menu_makanan.id',$id)
        ->get();

        return view('/updatemakanan',compact('data'));

    }

    public function update_makanan(Request $request){
        $validated = $request->validate([
            'makanan' =>['required','string'],
            'price' => ['required', 'numeric', 'gte:1000'],
            ]);

            $file = $request->file('image');

            if($file != NULL){
                $imageName = time().'_'.$file->getClientOriginalName();

                Storage::putFileAs('public/images',$file, $imageName);
                $imagePath = 'images/'.$imageName;

                DB::table('menu_makanan')->where('menu_makanan.id',$request->id)->update([
                    'nama_makanan' =>$validated['makanan'],
                    'harga' =>$validated['price'],
                    'image' => $imagePath,
                    ]);
            }
            else{
                DB::table('menu_makanan')->where('menu_makanan.id',$request->id)->update([
                    'nama_makanan' =>$validated['makanan'],
                    'harga' =>$validated['price'],
                    ]);
            }



            return redirect('listmakanan')->with('updatemakanan_success','Update Menu Makanan Sukses!');
    }


    public function search(Request $request){
        $data=DB::table('menu_makanan')->where('menu_makanan.nama_makanan','like','%'.$request->search.'%')->get();


        return view('order',compact('data'));
    }
}
