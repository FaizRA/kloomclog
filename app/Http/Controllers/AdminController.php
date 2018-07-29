<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Admin;
use App\models\Gambar;
use App\models\Clog;
use App\models\Warna;
use App\models\Ukuran;
use App\models\Kategori;
use App\models\Ongkirreg;
use App\models\Lokasi;
use App\models\Diskon;
use App\models\Banner;
use App\models\Pembeli;
use App\models\Keranjang;
use Telegram\Bot\Laravel\Facades\Telegram;
use File;
use Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //test Telegram
    public function getUpdates()
    {
        $updates = Telegram::getUpdates();
        dd($updates);
    }
/*
    public function postSendMessage(Request $request)
    {


        Telegram::sendMessage([
            'chat_id' => env('-259776728'),
            'text' => $request->get('message')
        ]);

    }
*/

    //LOGIN
    public function loginaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'user' => 'required',
  ]);
      $this->validate($request, [
     'pass' => 'required',
    ]);

  /*  $login = admin::where('nama',$request->nama)->where('pass',$request->pass)->count();

            if( !($login > 0) )  {
                  return redirect('admin');
            } else {
                  return redirect('loginadmin');
            }
      */
      if (admin::where('nama',$request->user)->count() > 0) {
        $login = admin::where('nama',$request->user)->first();
        if (Hash::check($request->pass, $login->pass )) {
  // The passwords match...
  // user found
           //TELEGRAM ACTION
            Telegram::sendMessage([
                'chat_id' => '-259776728',
                'text' =>
   'Login Telah Dilakukan :'.'
 '.'User = '.$request->user
            ]);

           session(['nama' => $request->user]);
           return redirect('admin');

        }
        else {
              return redirect('loginadmin');
        }



          }   else {
                return redirect('loginadmin');
          }

      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
    }

    public function admin(Request $request)
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {

        if (admin::where('status','1')->count() < 1) {
          $admin = admin::first();
          $status = $admin->status;
        }else {
          $admin = admin::first();
          $status = $admin->status;
        }

      return view('admin/main', ['status' => $status]);
    }
    }

    public function bukatoko(){
      warna::where('persediaan', '<', 1)->update(['persediaan' => 1]);
      $admin = admin::first();
      $admin -> status = 1;
      $admin -> save();
      return redirect('admin');
    }

    public function tutuptoko(){
      warna::where('persediaan', '>', 0)->update(['persediaan' => 0]);
      $admin = admin::first();
      $admin -> status = 0;
      $admin -> save();
      return redirect('admin');
    }

    public function logoutaksi(Request $request)
    {
        $request->session()->regenerate();
        $request->session()->flush();
        return redirect('loginadmin');

    }

    public function lupapassword()
    {
            Telegram::sendMessage([
                'chat_id' => '-259776728',
                'text' =>
   'Lupa password klik link dibawah :'.'
 '.'Localhost = http://localhost/kloomclog/public/aturkarenalupapassword128321383283120983218481481842842184198241818454675161273273273287287'.'
 '.'Online = http://kloomproto.co.id/aturkarenalupapassword128321383283120983218481481842842184198241818454675161273273273287287'
            ]);

                return redirect('loginadmin');

    }
    public function aturkarenalupapassword()
    {
      //$admins  = DB::table('admin')->get();
      $admins = admin::first();
      return view('admin/editadminlupa', ['admins' => $admins]);
    }
    public function editadminaksilupa(Request $request, $id)
    {
      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'nama' => 'required',
  ]);
  $this->validate($request, [
 'pass' => 'required',
]);
      $pass = Hash::make($request->pass);
      $admins = admin::find($id);
      $admins->nama       = $request->nama;
      $admins->pass       = $pass;
      $admins->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('loginadmin');
    }

  //ADMIN START
    //VIEW
    public function aturadmin()
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $admins  = DB::table('admin')->paginate(10);
      //$admins = admin::all();
      return view('admin/aturadmin', ['admins' => $admins]);
    }
    }
    //VIEW ADMIN EDIT
    public function editadmin($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $admins = admin::find($id);
      return view('admin/editadmin', ['admins' => $admins]);
    }
    }
    //AKSI EDIT ADMIN
    public function editadminaksi(Request $request, $id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
        $this->validate($request, [
       'nama' => 'required',
    ]);
    $this->validate($request, [
   'pass' => 'required',
  ]);
      $pass = Hash::make($request->pass);
      $admins = admin::find($id);
      $admins->nama       = $request->nama;
      $admins->pass       = $pass;
      $admins->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturadmin');
    }
    }
    //AKSI INSERT ADMIN
    public function tambahadminaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
        $this->validate($request, [
       'nama' => 'required',
    ]);
    $this->validate($request, [
   'pass' => 'required',
  ]);
      $admins = new admin;
      $admins->nama       = $request->nama;
      $admins->pass       = $request->pass;
      $admins->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturadmin');
    }
    }
    //AKSI DELETE ADMIN
    public function deleteadminaksi($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $admins = admin::find($id);
      $admins->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturadmin');
    }
    }
  //ADMIN END
  public function aturpesanan()
  {
    $session = session('nama');
    if (admin::where('nama',$session)->count() < 1) {
      return redirect('loginadmin');
    }else {
    $pesanans  = pembeli::where('status','1')->get();
    $pesanans1  = pembeli::where('status','2')->get();
    $pesanans2  = pembeli::where('status','3')->get();
    //$admins = admin::all();
    return view('admin/aturpesanan', ['pesanans' => $pesanans, 'pesanans1' => $pesanans1, 'pesanans2' => $pesanans2]);
  }
}

public function aksicaripesanan(Request $request)
{
  $this->validate($request, [
 'session' => 'required',
]);
  $session = session('nama');
  if (admin::where('nama',$session)->count() < 1) {
    return redirect('loginadmin');
  }else {
    $pesanans  = pembeli::where('status','1')->get();
    $pesanans1  = pembeli::where('status','2')->get();
    $pesanans2  = pembeli::where('status','3')->get();
  $pesanan  = pembeli::where('session',"$request->session")->first();
  $keranjangs  = keranjang::where('session',"$pesanan->session")->get();
  $caris  = keranjang::where('session',"$pesanan->session")->first();
  $pesanan2  = pembeli::where('session',"$caris->session")->first();
  //$admins = admin::all();
  return view('admin/lihatpesanan', ['pesanans' => $pesanans, 'pesanans1' => $pesanans1, 'pesanans2' => $pesanans2, 'pesanan2' => $pesanan2, 'keranjangs' => $keranjangs]);
}
}

public function prosespesanan($id){
    $pembelis = pembeli::find($id);
    $pembelis->status       = '2';
    $pembelis->save();
    return redirect('aturpesanan');
}

public function kirimpesanan($id){
    $pembelis = pembeli::find($id);
    $pembelis->status       = '3';
    $pembelis->save();
    return redirect('aturpesanan');
}

public function hapuspesanan($id){
    $pembelis = pembeli::find($id);
    $pembelis->delete();
    return redirect('aturpesanan');
}

  //CLOG START
    //VIEW
    public function aturclog()
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $clogs  = DB::table('clog')->orderBy('nama', 'asc')->paginate(10);
      $cari  = DB::table('clog')->orderBy('nama', 'asc')->get();
      //$admins = admin::all();
      return view('admin/aturclog', ['clogs' => $clogs, 'cari' => $cari]);
    }
    }
    //VIEW CLOG EDIT
    public function editclog($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $clogs = clog::find($id);
      $kategoris = DB::table('kategori')->orderBy('kategori', 'asc')->get();
      return view('admin/editclog', ['clogs' => $clogs, 'kategoris' => $kategoris]);
    }
    }
    //AKSI EDIT CLOG
    public function editclogaksi(Request $request, $id)
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      //$admins  = DB::table('admin')->get();
      $this->validate($request, [
     'harga' => 'required|numeric',
  ]);
  $this->validate($request, [
 'nama' => 'required',
]);
$this->validate($request, [
'kategori' => 'required',
]);
$this->validate($request, [
'gambar' => 'required',
]);
$this->validate($request, [
'deskripsi' => 'required',
]);


      $clogs = clog::find($id);
      $filegambar = $clogs->gambar;
      File::delete('image/' . $filegambar);
      $clogs->nama       = $request->nama;
      $clogs->kategori       = $request->kategori;
      // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
              $file       = $request->file('gambar');
              $fileName   = $file->getClientOriginalName();
              $request->file('gambar')->move("image/", $fileName);

              $clogs->gambar = $fileName;
      $clogs->deskripsi       = $request->deskripsi;
      $clogs->harga       = $request->harga;
      $clogs->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturclog');
    }
    }

    public function carikategoriclog()
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      //$gambars  = DB::table('gambar')->paginate(10);
      $kategoris = DB::table('kategori')->orderBy('kategori', 'asc')->get();
      return view('admin/tambahclog', ['kategoris' => $kategoris]);
    }
    }

    //AKSI INSERT CLOG
    public function tambahclogaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $this->validate($request, [
     'harga' => 'required|numeric',
  ]);
  $this->validate($request, [
 'nama' => 'required',
]);
$this->validate($request, [
'kategori' => 'required',
]);
$this->validate($request, [
'gambar' => 'required',
]);
$this->validate($request, [
'deskripsi' => 'required',
]);
      $clogs = new clog;
      $clogs->nama       = $request->nama;
      $clogs->kategori       = $request->kategori;
      // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
              $file       = $request->file('gambar');
              $fileName   = $file->getClientOriginalName();
              $request->file('gambar')->move("image/", $fileName);

              $clogs->gambar = $fileName;
      $clogs->deskripsi       = $request->deskripsi;
      $clogs->harga       = $request->harga;
      $clogs->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturclog');
    }
    }
    //AKSI DELETE CLOG
    public function deleteclogaksi($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $clogs = clog::find($id);
      $filegambar = $clogs->gambar;
      File::delete('image/' . $filegambar);
      $clogs->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturclog');
    }
    }
    public function cariclogaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $clogs = clog::where('nama', $request->search)->paginate(10);
      $cari  = DB::table('clog')->orderBy('nama', 'asc')->get();

      //$admins = admin::all();
      return view('admin/aturclog', ['clogs' => $clogs, 'cari' => $cari]);
    }
    }
  //CLOG END


  //WARNA START
    //VIEW
    public function aturwarna()
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $warnas  = DB::table('warna')->orderBy('warna', 'asc')->paginate(10);
      $cari  = DB::table('warna')->orderBy('warna', 'asc')->get();
      //$admins = admin::all();
      return view('admin/aturwarna', ['warnas' => $warnas, 'cari' => $cari]);
    }
    }
    //VIEW ADMIN EDIT
    public function editwarna($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $warnas = warna::find($id);
      return view('admin/editwarna', ['warnas' => $warnas]);
    }
    }
    //AKSI EDIT ADMIN
    public function editwarnaaksi(Request $request, $id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
        $this->validate($request, [
       'warna' => 'required',
    ]);
    $this->validate($request, [
   'persediaan' => 'required',
  ]);
      $warnas = warna::find($id);
      $warnas->warna       = $request->warna;
      $warnas->persediaan       = $request->persediaan;
      $warnas->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturwarna');
    }
    }
    //AKSI INSERT ADMIN
    public function tambahwarnaaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
        $this->validate($request, [
       'warna' => 'required',
    ]);
    $this->validate($request, [
   'persediaan' => 'required',
  ]);
      $warnas = new warna;
      $warnas->warna       = $request->warna;
      $warnas->persediaan       = $request->persediaan;
      $warnas->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturwarna');
    }
    }
    //AKSI DELETE ADMIN
    public function deletewarnaaksi($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $warnas = warna::find($id);
      $warnas->delete();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturwarna');
    }
    }
    public function cariwarnaaksi(Request $request)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $warnas = warna::where('warna', $request->search)->paginate(10);
      $cari  = DB::table('warna')->orderBy('warna', 'asc')->get();

      //$admins = admin::all();
      return view('admin/aturwarna', ['warnas' => $warnas, 'cari' => $cari]);
    }
    }
  //WARNA END



  //GAMBAR START
    //VIEW
    public function aturgambar()
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $gambars  = DB::table('gambar')->orderBy('status', 'desc')->paginate(10);
      $caric  = DB::table('clog')->orderBy('nama', 'asc')->get();
      $cariw  = DB::table('kategori')->orderBy('kategori', 'asc')->get();
      //$admins = admin::all();
      return view('admin/aturgambar', ['gambars' => $gambars, 'caric' => $caric, 'cariw' => $cariw]);
    }
    }

    public function carivaluegambar()
    {
      //$gambars  = DB::table('gambar')->paginate(10);
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $clogs = DB::table('clog')->orderBy('nama', 'asc')->get();
      $kategoris = DB::table('kategori')->orderBy('kategori', 'asc')->get();
      return view('admin/tambahgambar', ['clogs' => $clogs, 'kategoris' => $kategoris]);
    }
    }

    public function tambahgambaraksi(Request $request)
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
        $this->validate($request, [
       'gambar' => 'required',
    ]);
    $this->validate($request, [
   'model' => 'required',
  ]);
  $this->validate($request, [
 'kategori' => 'required',
]);

      //$admins  = DB::table('admin')->get();
      $files = $request->file('gambar');
      if(!empty($files)):

      foreach($files as $file):
        $gambars = new gambar;
        $gambars->model       = $request->model;
        $gambars->kategori       = $request->kategori;
        $gambars->status       = "0";
        $gambars->gambar       = $request->gambar;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                $fileName   = $file->getClientOriginalName();
                $file->move("image/", $fileName);

                $gambars->gambar  = $fileName;
        $gambars->save();
      endforeach;

    endif;
      /*
      $gambars = new gambar;
      $gambars->model       = $request->model;
      $gambars->kategori       = $request->kategori;
      $gambars->status       = "0";
      // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
              $file       = $request->file('gambar');
              $fileName   = $file->getClientOriginalName();
              $request->file('gambar')->move("image/", $fileName);

              $gambars->gambar = $fileName;
      $gambars->save();
      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      */
      return redirect('/aturgambar');
    }
    }

    public function deletegambaraksi($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $gambars = gambar::find($id);
      $filegambar = $gambars->gambar;
      File::delete('image/' . $filegambar);
      $gambars->delete();

      //$admins = admin::all();
      //return view('admin.aturadmin', ['admins' => $admins]);
      return redirect('/aturgambar');
    }
    }
    public function editgambar($id)
    {
      //$admins  = DB::table('admin')->get();
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $gambars = gambar::find($id);
      $urlgambar1 = $gambars->gambar;

      $gambar1 = gambar::where('model', $gambars->model)
                        ->where('kategori', $gambars->kategori)
                        ->first();;
      $idgambar1 = $gambar1->id;
      $urlgambar2 = $gambar1->gambar;

      $gambars = gambar::find($id);
      $gambars->gambar       = $urlgambar2;
      $gambars->status       = "0";
      $gambars->save();

      $gambars = gambar::find($idgambar1);
      $gambars->gambar       = $urlgambar1;
      $gambars->status       = "1";
      $gambars->save();
      /*$total = gambar::sum('id');
      $gambar1 = gambar::where('gambar', $gambars->gambar)
                        ->where('warna', $gambars->warna)
                        ->first();;
      $idteratas = $gambar1->id;
      $idbaru = $total;
      $gambar1->id       = $idbaru;
      $gambars->save();

      $gambars->id = $idteratas;
      $gambars->save();*/
      return redirect('/aturgambar');
    }
    }

  public function carigambaraksi(Request $request)
    {
      $session = session('nama');
      if (admin::where('nama',$session)->count() < 1) {
        return redirect('loginadmin');
      }else {
      $gambars  = gambar::where('model', $request->model)->paginate(10);
      $caric  = DB::table('clog')->orderBy('nama', 'asc')->get();
      $cariw  = DB::table('kategori')->orderBy('kategori', 'asc')->get();
      //$admins = admin::all();
      return view('admin/aturgambar', ['gambars' => $gambars, 'caric' => $caric, 'cariw' => $cariw]);
    }
    }
    //GAMBAR END

    //UKURAN START
      //VIEW
      public function aturukuran()
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ukurans  = DB::table('ukuran')->paginate(10);
        //$admins = admin::all();
        return view('admin/aturukuran', ['ukurans' => $ukurans]);
      }
      }
      //VIEW ADMIN EDIT
      public function editukuran($id)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        //$admins  = DB::table('admin')->get();
        $ukurans = ukuran::find($id);
        return view('admin/editukuran', ['ukurans' => $ukurans]);
      }
      }
      //AKSI EDIT ADMIN
      public function editukuranaksi(Request $request, $id)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'ukuran' => 'required',
      ]);

        //$admins  = DB::table('admin')->get();
        $ukurans = ukuran::find($id);
        $ukurans->ukuran       = $request->ukuran;
        $ukurans->keterangan       = $request->keterangan;
        $ukurans->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturukuran');
      }
      }
      //AKSI INSERT ADMIN
      public function tambahukuranaksi(Request $request)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'ukuran' => 'required',
      ]);

        //$admins  = DB::table('admin')->get();
        $ukurans = new ukuran;
        $ukurans->ukuran       = $request->ukuran;
        $ukurans->keterangan       = $request->keterangan;
        $ukurans->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturukuran');
      }
      }
      //AKSI DELETE ADMIN
      public function deleteukuranaksi($id)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        //$admins  = DB::table('admin')->get();
        $ukurans = ukuran::find($id);
        $ukurans->delete();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturukuran');
      }
      }
    //UKURAN END


    //kategori START
      //VIEW
      public function aturkategori()
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $kategoris  = DB::table('kategori')->paginate(10);
        //$admins = admin::all();
        return view('admin/aturkategori', ['kategoris' => $kategoris]);
      }
      }
      //VIEW ADMIN EDIT
      public function editkategori($id)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        //$admins  = DB::table('admin')->get();
        $kategoris = kategori::find($id);
        return view('admin/editkategori', ['kategoris' => $kategoris]);
      }
      }
      //AKSI EDIT ADMIN
      public function editkategoriaksi(Request $request, $id)
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'kategori' => 'required',
      ]);
      $this->validate($request, [
     'heel' => 'required',
  ]);
        //$admins  = DB::table('admin')->get();
        $kategoris = kategori::find($id);
        $kategoris->kategori       = $request->kategori;
        $kategoris->heel       = $request->heel;
        $kategoris->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturkategori');
      }
      }
      //AKSI INSERT ADMIN
      public function tambahkategoriaksi(Request $request)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'kategori' => 'required',
      ]);
      $this->validate($request, [
     'heel' => 'required',
  ]);
        $kategoris = new kategori;
        $kategoris->kategori       = $request->kategori;
        $kategoris->heel       = $request->heel;
        $kategoris->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturkategori');
      }
      }
      //AKSI DELETE ADMIN
      public function deletekategoriaksi($id)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $kategoris = kategori::find($id);
        $kategoris->delete();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturkategori');
      }
      }
    //kategori END


    public function mainetalase(){

      $etalases = gambar::where('model', "1")->paginate();;

      return view('mainpage', ['etalases' => $etalases]);

    }

    public function mainetalase2()
    {
      $etalases  = DB::table('gambar')->paginate(10);
      //$admins = admin::all();
      return view('mainpage', ['etalases' => $etalases]);
    }



//DISKON START
//GAMBAR START
  //VIEW
  public function aturdiskon()
  {
    $session = session('nama');
    if (admin::where('nama',$session)->count() < 1) {
      return redirect('loginadmin');
    }else {
    $diskons  = DB::table('diskon')->paginate(10);
    //$admins = admin::all();
    return view('admin/aturdiskon', ['diskons' => $diskons]);
  }
  }

  public function editdiskon($id)
  {
    //$admins  = DB::table('admin')->get();
    $session = session('nama');
    if (admin::where('nama',$session)->count() < 1) {
      return redirect('loginadmin');
    }else {
    $diskons = diskon::find($id);
    return view('admin/editdiskon', ['diskons' => $diskons]);
  }
  }

  public function editdiskonaksi(Request $request, $id)
  {
    //$admins  = DB::table('admin')->get();
    $session = session('nama');
    if (admin::where('nama',$session)->count() < 1) {
      return redirect('loginadmin');
    }else {
    $this->validate($request, [
   'diskon' => 'required|numeric',
]);
    $diskons = diskon::find($id);
    $diskons->diskon       = $request->diskon;
    $diskons->save();
    //$admins = admin::all();
    //return view('admin.aturadmin', ['admins' => $admins]);
    return redirect('/aturdiskon');
  }
  }


    //ongkir START
      //VIEW
      public function aturongkir()
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs  = DB::table('ongkirreg')->orderBy('kota', 'asc')->paginate(10);
        $cari  = DB::table('ongkirreg')->orderBy('kota', 'asc')->get();
        //$admins = admin::all();
        return view('admin/aturongkir', ['ongkirs' => $ongkirs, 'cari' => $cari]);
      }
      }
      //VIEW ADMIN EDIT
      public function editongkir($id)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs = ongkirreg::find($id);
        return view('admin/editongkir', ['ongkirs' => $ongkirs]);
      }
      }
      //AKSI EDIT ADMIN
      public function editongkiraksi(Request $request, $id)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'kota' => 'required',
      ]);
      $this->validate($request, [
     'harga' => 'required|numeric',
  ]);
        $ongkirs = ongkirreg::find($id);
        $ongkirs->kota       = $request->kota;
        $ongkirs->harga       = $request->harga;
        $ongkirs->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturongkir');
      }
      }
      //AKSI INSERT ADMIN
      public function tambahongkiraksi(Request $request)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'kota' => 'required',
      ]);
      $this->validate($request, [
     'harga' => 'required|numeric',
  ]);
        $ongkirs = new ongkirreg;
        $ongkirs->kota       = $request->kota;
        $ongkirs->harga       = $request->harga;
        $ongkirs->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturongkir');
      }
      }
      //AKSI DELETE ADMIN
      public function deleteongkiraksi($id)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs = ongkirreg::find($id);
        $ongkirs->delete();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturongkir');
      }
      }
      public function cariongkiraksi(Request $request)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs = ongkirreg::where('kota', $request->search)->paginate(10);
        $cari  = DB::table('ongkirreg')->orderBy('kota', 'asc')->get();

        //$admins = admin::all();
        return view('admin/aturongkir', ['ongkirs' => $ongkirs, 'cari' => $cari]);
      }
      }
      public function aksiongkirnaik()
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs = ongkirreg::get();
        foreach ($ongkirs as $ongkir) {
          $ongkir->harga       = $ongkir->harga+1000;
          $ongkir->save();
        }

        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturongkir');
      }
      }
      public function aksiongkirturun()
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $ongkirs = ongkirreg::get();
        foreach ($ongkirs as $ongkir) {
          $ongkir->harga       = $ongkir->harga-1000;
          $ongkir->save();
        }
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturongkir');
      }
      }
    //ongkir END

    //Lokasi START
      //VIEW
      public function aturlokasi()
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $lokasis  = DB::table('lokasi')->paginate(10);
        //$lokasis = lokasi::all();
        return view('admin/aturlokasi', ['lokasis' => $lokasis]);
      }
      }
      //VIEW Lokasi EDIT
      public function editlokasi($id)
      {
        //$lokasis  = DB::table('lokasi')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $lokasis = lokasi::find($id);
        return view('admin/editlokasi', ['lokasis' => $lokasis]);
      }
      }
      //AKSI EDIT Lokasi
      public function editlokasiaksi(Request $request, $id)
      {
        //$lokasis  = DB::table('lokasi')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'lokasi' => 'required',
      ]);
      $this->validate($request, [
     'periode' => 'required',
  ]);
        $lokasis = lokasi::find($id);
        $lokasis->periode       = $request->periode;
        $lokasis->lokasi       = $request->lokasi;
        $lokasis->save();
        //$lokasis = lokasi::all();
        //return view('lokasi.aturlokasi', ['lokasis' => $lokasis]);
        return redirect('/aturlokasi');
      }
      }
      //AKSI INSERT Lokasi
      public function tambahlokasiaksi(Request $request)
      {
        //$lokasis  = DB::table('lokasi')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'lokasi' => 'required',
      ]);
      $this->validate($request, [
     'periode' => 'required',
  ]);
        $lokasis = new lokasi;
        $lokasis->periode       = $request->periode;
        $lokasis->lokasi       = $request->lokasi;
        $lokasis->save();
        //$lokasis = lokasi::all();
        //return view('lokasi.aturlokasi', ['lokasis' => $lokasis]);
        return redirect('/aturlokasi');
      }
      }
      //AKSI DELETE Lokasi
      public function deletelokasiaksi($id)
      {
        //$lokasis  = DB::table('lokasi')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $lokasis = lokasi::find($id);
        $lokasis->delete();
        //$lokasis = lokasi::all();
        //return view('lokasi.aturlokasi', ['lokasis' => $lokasis]);
        return redirect('/aturlokasi');
      }
      }
    //Lokasi END

    //banner START
      //VIEW
      public function aturbanner()
      {
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $banners  = DB::table('banner')->orderBy('id', 'asc')->paginate(10);
        //$admins = admin::all();
        return view('admin/aturbanner', ['banners' => $banners]);
      }
      }



      public function tambahbanneraksi(Request $request)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
          $this->validate($request, [
         'banner' => 'required',
      ]);

        $files = $request->file('banner');
        if(!empty($files)):

    		foreach($files as $file):
          $banners = new banner;
          $banners->banner       = $request->banner;
          // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image

                  $fileName   = $file->getClientOriginalName();
                  $file->move("image/", $fileName);

                  $banners->banner = $fileName;
          $banners->save();
    		endforeach;

    	endif;
        /*
        $banners = new banner;
        $banners->banner       = $request->banner;
        // Disini proses mendapatkan judul dan memindahkan letak banner ke folder image
                $file       = $request->file('banner');
                $fileName   = $file->getClientOriginalName();
                $request->file('banner')->move("image/", $fileName);

                $banners->banner = $fileName;
        $banners->save();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        */
        return redirect('/aturbanner');
      }
      }

      public function deletebanneraksi($id)
      {
        //$admins  = DB::table('admin')->get();
        $session = session('nama');
        if (admin::where('nama',$session)->count() < 1) {
          return redirect('loginadmin');
        }else {
        $banners = banner::find($id);
        $filebanner = $banners->banner;
        File::delete('image/' . $filebanner);
        $banners->delete();

        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('/aturbanner');
      }
      }

      //banner END

}
