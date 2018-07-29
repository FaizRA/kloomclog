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
use App\models\Banner;
use App\models\Lokasi;
use App\models\Keranjang;
use App\models\Pembeli;
use App\models\Ongkirreg;
use App\models\Diskon;
use Telegram\Bot\Laravel\Facades\Telegram;
use File;
use Validator;

class UserController extends Controller
{
    //
      public function mainpage(){

        $banners = banner::get();
        $lokasis = lokasi::get();
        //$produks = gambar::where('status', "1")->where('kategori', "Premium")->join('clog', 'clog.nama', '=', 'gambar.model')->orderBy('id', 'desc')->paginate(12);
        $etalases = clog::where('kategori', "Premium")->orderBy('nama', 'asc')->paginate(4);
        $etalases1 = clog::where('kategori', "Regular")->orderBy('nama', 'asc')->paginate(4);
        $etalasesall = clog::where('kategori', "Premium")->orderBy('nama', 'asc')->get();
        $etalases1all = clog::where('kategori', "Regular")->orderBy('nama', 'asc')->get();
        $kategoris= kategori::orderBy('kategori', 'asc')->get();
        $clogs= clog::orderBy('nama', 'asc')->get();
        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END

        return view('mainpage', ['clogs' => $clogs,'kategoris' => $kategoris, 'banners' => $banners, 'lokasis' => $lokasis, 'etalases' => $etalases, 'etalases1' => $etalases1, 'etalasesall' => $etalasesall, 'etalases1all' => $etalases1all, 'keranjang' => $keranjang]);

      }

      public function tampilukuran()
      {
        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END
        $ukurans  = DB::table('ukuran')->paginate(10);
        //$admins = admin::all();
        return view('Tampilukuran', ['ukurans' => $ukurans,  'keranjang' => $keranjang]);
      }

      public function tampilongkir()
      {
        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END
        $ongkirs  = ongkirreg::get();
        //$admins = admin::all();
        return view('Tampilongkir', ['ongkirs' => $ongkirs,  'keranjang' => $keranjang]);
      }

      public function aksicarikategori(Request $request){
        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END
        $this->validate($request, [
       'kategori' => 'required',
      ]);
        $clogs = clog::where('kategori', $request->kategori)->get();
      //  $kategoriclogs = clog::where('kategori', $request->kategori)->first();


        return view('produkberdasarkategori', ['clogs' => $clogs,  'keranjang' => $keranjang]);
      }

      public function aksicariclog(Request $request)
      {
        //$admins  = DB::table('admin')->get();
        $this->validate($request, [
       'nama' => 'required',
      ]);
        $products= clog::where('nama', $request->nama)->first();
      //  $products = gambar::find($id);

        $cariw  = DB::table('warna')->where('persediaan','1')->orderBy('warna', 'asc')->get();
        $cariuk  = DB::table('ukuran')->orderBy('ukuran', 'asc')->get();

        $gambars = DB::table('gambar')->where('model', "$products->nama")->get();
      /*
        if (DB::table('gambar')->where('model', "$products->model")->count() < 2) {
   // user found
            session(['gambar' => 1]);

          }else{

            $request->session(['gambar'])->regenerate();
            $request->session(['gambar'])->flush();
          }
          */
          if (DB::table('clog')->where('nama', "$products->nama")->where('kategori', "Premium")->count() < 1) {
            $carik  = DB::table('kategori')->where('kategori', "Regular")->orderBy('kategori', 'asc')->get();

          }else {
            $carik  = DB::table('kategori')->where('kategori', "Premium")->orderBy('kategori', 'asc')->get();
          }

          //CEK KERANJANG START
          $value = session('session');
          $value2 = session('ip');
          if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
              $keranjang = "0";
              }   else {
                $keranjang = keranjang::where('session',"$value")->count();
              }
          //CEK KERANJANG END
        return view('products1', ['products' => $products, 'cariw' => $cariw, 'cariuk' => $cariuk, 'carik' =>  $carik,  'gambars' => $gambars, 'keranjang' => $keranjang]);
      }


      public function tampilpremium(Request $request)
      {
        //$admins  = DB::table('admin')->get();
      $etalasesall = clog::where('kategori', "Premium")->orderBy('nama', 'asc')->paginate(16);

          //CEK KERANJANG START
          $value = session('session');
          $value2 = session('ip');
          if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
              $keranjang = "0";
              }   else {
                $keranjang = keranjang::where('session',"$value")->count();
              }
          //CEK KERANJANG END
        return view('premiumall', ['etalasesall' => $etalasesall, 'keranjang' => $keranjang]);
      }

      public function tampilregular(Request $request)
      {
        //$admins  = DB::table('admin')->get();
      $etalasesall = clog::where('kategori', "Regular")->orderBy('nama', 'asc')->paginate(16);

          //CEK KERANJANG START
          $value = session('session');
          $value2 = session('ip');
          if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
              $keranjang = "0";
              }   else {
                $keranjang = keranjang::where('session',"$value")->count();
              }
          //CEK KERANJANG END
        return view('regularall', ['etalasesall' => $etalasesall, 'keranjang' => $keranjang]);
      }

      public function productpage(Request $request, $id)
      {
        //$admins  = DB::table('admin')->get();
        $products= clog::find($id);
      //  $products = gambar::find($id);

        $cariw  = DB::table('warna')->where('persediaan','1')->orderBy('warna', 'asc')->get();
        $cariuk  = DB::table('ukuran')->orderBy('ukuran', 'asc')->get();

        $gambars = DB::table('gambar')->where('model', "$products->nama")->get();
      /*->where('status', "1")
        if (DB::table('gambar')->where('model', "$products->model")->count() < 2) {
   // user found
            session(['gambar' => 1]);

          }else{

            $request->session(['gambar'])->regenerate();
            $request->session(['gambar'])->flush();
          }
          */
          if (DB::table('clog')->where('nama', "$products->nama")->where('kategori', "Premium")->count() < 1) {
            $carik  = DB::table('kategori')->where('kategori', "Regular")->orderBy('kategori', 'asc')->get();

          }else {
            $carik  = DB::table('kategori')->where('kategori', "Premium")->orderBy('kategori', 'asc')->get();
          }

          //CEK KERANJANG START
          $value = session('session');
          $value2 = session('ip');
          if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
              $keranjang = "0";
              }   else {
                $keranjang = keranjang::where('session',"$value")->count();
              }
          //CEK KERANJANG END
        return view('products', ['products' => $products, 'cariw' => $cariw, 'cariuk' => $cariuk, 'carik' =>  $carik,  'gambars' => $gambars, 'keranjang' => $keranjang]);
      }

      public function tambahkeranjangaksi(Request $request){

        $this->validate($request, [
       'warna' => 'required',
      ]);
        $this->validate($request, [
       'heel' => 'required',
      ]);
      $this->validate($request, [
     'ukuran' => 'required',
    ]);

      $this->validate($request, [
     'jumlah' => 'required|numeric',
      ]);
      $value = session('session');
      $value2 = session('ip');
      $diskon  = DB::table('diskon')->first();
      if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
 // user found
          $mytime = date('Y-m-d H:i:s');
          $ip = $request->ip();
          session(['session' => $mytime]);
          session(['ip' => $ip]);
          $value = session('session');
          $value2 = session('ip');
          $diskon  = DB::table('diskon')->first();


          $keranjangs = new keranjang;
          $keranjangs->clog       = $request->clog;
          $keranjangs->kategori       = $request->kategori;
          $keranjangs->harga       = $request->harga;
          $keranjangs->warna       = $request->warna;
          $keranjangs->heel       = $request->heel;
          $keranjangs->ukuran       = $request->ukuran;
          $keranjangs->diskon       = $diskon->diskon;
          $keranjangs->jumlah       = $request->jumlah;
          $keranjangs->session       = $value;
          $keranjangs->ip       = $value2;
          $keranjangs->save();

          }   else {
            $keranjangs = new keranjang;
            $keranjangs->clog       = $request->clog;
            $keranjangs->kategori       = $request->kategori;
            $keranjangs->harga       = $request->harga;
            $keranjangs->warna       = $request->warna;
            $keranjangs->heel       = $request->heel;
            $keranjangs->ukuran       = $request->ukuran;
            $keranjangs->diskon       = $diskon->diskon;
            $keranjangs->jumlah       = $request->jumlah;
            $keranjangs->session       = $value;
            $keranjangs->ip       = $value2;
            $keranjangs->save();
          }
          return redirect('home');
      }

      public function keranjang(Request $request){

        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            return redirect('home');
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END

        $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();
/*
        $total = "0";
        foreach ($keranjangs as $keranjangq) {
          $total1 = $total + ($keranjangq->jumlah * $keranjangq->harga);
        }
*/
              $total1 = DB::table('keranjang')
          ->where('session',"$value")
          ->where('ip',"$value2")
          ->sum(DB::raw('(harga-(harga * diskon / 100)) * jumlah'));


        return view('aturkeranjang', ['keranjang' => $keranjang, 'keranjangs' => $keranjangs, 'total1' => $total1]);

      }

      //AKSI DELETE CLOG
      public function hapuskeranjang($id)
      {
        //$admins  = DB::table('admin')->get();
        $keranjangs = keranjang::find($id);
        $keranjangs->delete();
        //$admins = admin::all();
        //return view('admin.aturadmin', ['admins' => $admins]);
        return redirect('keranjang');
      }

      public function tambahpembeli(Request $request){

        //CEK KERANJANG START
        $value = session('session');
        $value2 = session('ip');
        if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
            $keranjang = "0";
            }   else {
              $keranjang = keranjang::where('session',"$value")->count();
            }
        //CEK KERANJANG END

        $ongkirs  = DB::table('ongkirreg')->orderBy('kota', 'asc')->get();




        return view('tambahpembeli', ['keranjang' => $keranjang, 'ongkirs' => $ongkirs]);

      }


      public function tambahpembeliaksi(Request $request){

        $this->validate($request, [
       'nama' => 'required',
      ]);
        $this->validate($request, [
       'alamat' => 'required',
      ]);
      $this->validate($request, [
     'kota' => 'required',
    ]);

      $this->validate($request, [
     'nowa' => 'required|numeric',
      ]);


      //CEK KERANJANG START
      $value = session('session');
      $value2 = session('ip');
      if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
          $keranjang = "0";
          }   else {
            $keranjang = keranjang::where('session',"$value")->count();
          }
      //CEK KERANJANG END

      $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();
      $total1 = DB::table('keranjang')
  ->where('session',"$value")
  ->where('ip',"$value2")
  ->sum(DB::raw('(harga-(harga * diskon / 100)) * jumlah'));

          $pembelis = new pembeli;
          $pembelis->nama       = $request->nama;
          $pembelis->nowa       = $request->nowa;
          $pembelis->kota       = $request->kota;
          $pembelis->alamat       = $request->alamat;
          $pembelis->keterangan       = $request->keterangan;
          $pembelis->total       = $total1;
          $pembelis->session       = $value;
          $pembelis->ip       = $value2;
          $pembelis->status       = "1";
          $pembelis->save();



          $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();
          return redirect('aturtransaksi');
          }

          public function aturtransaksi(Request $request){

            //CEK KERANJANG START
            $value = session('session');
            $value2 = session('ip');
            if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
                $keranjang = "0";
                }   else {
                  $keranjang = keranjang::where('session',"$value")->count();
                }
            //CEK KERANJANG END

            //CEK KERANJANG START

            if (pembeli::where('session',"$value")->where('ip',"$value2")->count() < 1) {
                return redirect('home');
                }
            //CEK KERANJANG END

            $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();
            $total1 = DB::table('keranjang')
        ->where('session',"$value")
        ->where('ip',"$value2")
        ->sum(DB::raw('(harga-(harga * diskon / 100)) * jumlah'));
            $jumlah = DB::table('keranjang')
        ->where('session',"$value")
        ->where('ip',"$value2")
        ->sum(DB::raw('jumlah'));
        if ($jumlah % 2 == 0){
          $berat=$jumlah/2;
        }else{
          $berat=($jumlah+1)/2;
        }

            $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();
            $ongkirs = ongkirreg::where('kota',"$pembelis->kota")->first();
            $ongkirh = $ongkirs->harga*$berat;
            $total2 = $total1 + $ongkirh;

          return view('aturtransaksi', ['keranjang' => $keranjang, 'ongkirs' => $ongkirs,'ongkirh' => $ongkirh, 'total1' => $total1, 'total2' => $total2, 'keranjangs' => $keranjangs,  'pembelis' => $pembelis]);
          }

          public function editinformasipembeli(Request $request){

            //CEK KERANJANG START
            $value = session('session');
            $value2 = session('ip');
            if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
                $keranjang = "0";
                }   else {
                  $keranjang = keranjang::where('session',"$value")->count();
                }
            //CEK KERANJANG END

            $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();

            $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();
            $ongkirs  = DB::table('ongkirreg')->orderBy('kota', 'asc')->get();
            $edit = "1";

          return view('editpembeli', ['edit' => $edit, 'keranjang' => $keranjang, 'ongkirs' => $ongkirs, 'keranjangs' => $keranjangs,  'pembelis' => $pembelis]);
          }

          public function editpembeliaksi(Request $request){

            $this->validate($request, [
           'nama' => 'required',
          ]);
            $this->validate($request, [
           'alamat' => 'required',
          ]);
          $this->validate($request, [
         'kota' => 'required',
        ]);

          $this->validate($request, [
         'nowa' => 'required|numeric',
          ]);


          //CEK KERANJANG START
          $value = session('session');
          $value2 = session('ip');
          if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
              $keranjang = "0";
              }   else {
                $keranjang = keranjang::where('session',"$value")->count();
              }
          //CEK KERANJANG END

          $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();
          $total1 = DB::table('keranjang')
      ->where('session',"$value")
      ->where('ip',"$value2")
      ->sum(DB::raw('(harga-(harga * diskon / 100)) * jumlah'));

$pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();

              $pembelis = pembeli::find($pembelis->id);
              $pembelis->nama       = $request->nama;
              $pembelis->nowa       = $request->nowa;
              $pembelis->kota       = $request->kota;
              $pembelis->alamat       = $request->alamat;
              $pembelis->keterangan       = $request->keterangan;
              $pembelis->total       = $total1;
              $pembelis->session       = $value;
              $pembelis->ip       = $value2;
              $pembelis->save();



              $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();
              return redirect('aturtransaksi');
              }

              public function selesai(Request $request){

              //CEK KERANJANG START
              $value = session('session');
              $value2 = session('ip');
              if (keranjang::where('session',"$value")->where('ip',"$value2")->count() < 1) {
                  $keranjang = "0";
                  }   else {
                    $keranjang = keranjang::where('session',"$value")->count();
                  }
              //CEK KERANJANG END
              if (pembeli::where('session',"$value")->where('ip',"$value2")->count() < 1) {
                  return view('selesai', ['keranjang' => $keranjang]);
                  }

              $keranjangs = keranjang::where('session',"$value")->where('ip',"$value2")->get();
              $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();
              $ongkirs = ongkirreg::where('kota',"$pembelis->kota")->first();
              $total1 = DB::table('keranjang')
          ->where('session',"$value")
          ->where('ip',"$value2")
          ->sum(DB::raw('(harga-(harga * diskon / 100)) * jumlah'));

          $jumlah = DB::table('keranjang')
          ->where('session',"$value")
          ->where('ip',"$value2")
          ->sum(DB::raw('jumlah'));
          if ($jumlah % 2 == 0){
          $berat=$jumlah/2;
          }else{
          $berat=($jumlah+1)/2;
          }
          $ongkirh = $ongkirs->harga*$berat;
          $total2 = $total1 + $ongkirh;

        //  $total2 = $total1 + $ongkirs->harga;

                  $pembelis = pembeli::where('session',"$value")->where('ip',"$value2")->first();

                  $pembelis = pembeli::find($pembelis->id);
                  $pembelis->total       = $total2;
                  $pembelis->save();
                  //TELEGRAM ACTION
                  $pembelis = pembeli::find($pembelis->id);
Telegram::sendMessage([
'chat_id' => '-259776728',
'text' =>
'Konfirmasi Pembeli :'.'
'.'Nama = '.$pembelis->nama.'
'.'No HP = 0'.$pembelis->nowa.'
'.'Total Alamat = '.$pembelis->alamat.'
'.'Silahkan Transfer ke Rek. BCA 8610363718'.'
'.'Total Bayar = '.$pembelis->total.'
'.'Tolong konfirmasi dengan mengirimkan foto bukti pembayaran '.'
'.'Terima Kasih '.'
'.'Nb. Tolong cek alamat dan penerima apabila ada kesalahan dan kirimkan ke kami lewat chat ini'
]);

Telegram::sendMessage([
'chat_id' => '-259776728',
'text' =>
'Kirimkan ke https://api.whatsapp.com/send?phone=62'.$pembelis->nowa
]);

                  $request->session()->regenerate();
                  $request->session()->flush();

                  return view('selesai', ['keranjang' => $keranjang]);
                  }
      /*

      public function mainetalase(){

        $etalases = gambar::where('model', "1")->paginate();

        return view('mainpage', ['etalases' => $etalases]);

      }
      public function mainetalase2()
      {
      //  $etalases = gambar::where('status', "1")->paginate();
      $etalases = gambar::where('status', "1")->join('clog', 'clog.nama', '=', 'gambar.model')->paginate(12);
      //$admins = admin::all();

    //  $etalases =      DB::table('gambar')->join('clog', 'clog.nama', '=', 'gambar.model')->paginate();
      //      $users = gambar::with('clog')->get();
    //        return view('mainpage',  compact('users'));
     return view('mainpage', ['etalases' => $etalases]);
      }
      */
}
