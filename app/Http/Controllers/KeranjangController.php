<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use File;
use Validator;

class KeranjangController extends Controller
{
    //
    public function tambahkeranjangaksi(Request $request){

      $this->validate($request, [
     'warna' => 'required',
    ]);
      $this->validate($request, [
     'heel' => 'required',
    ]);

    $this->validate($request, [
   'jumlah' => 'required|numeric',
    ]);

    if (keranjang::where('session',$request->session(['session']))->count() < 1) {
// user found
        $mytime = Carbon\Carbon::now();
        session(['session' => $mytime]);

        $keranjangs = new keranjang;
        $keranjangs->clog       = $request->clog;
        $keranjangs->kategori       = $request->kategori;
        $keranjangs->harga       = $request->harga;
        $keranjangs->warna       = $request->warna;
        $keranjangs->heel       = $request->heel;
        $keranjangs->jumlah       = $request->jumlah;
        $keranjangs->session       = $request->session(['session']);
        $keranjangs->save();

        }   else {
          $keranjangs = new keranjang;
          $keranjangs->clog       = $request->clog;
          $keranjangs->kategori       = $request->kategori;
          $keranjangs->harga       = $request->harga;
          $keranjangs->warna       = $request->warna;
          $keranjangs->heel       = $request->heel;
          $keranjangs->jumlah       = $request->jumlah;
          $keranjangs->session       = $request->session(['session']);
          $keranjangs->save();
        }
        return redirect('mainpage');
    }
}
