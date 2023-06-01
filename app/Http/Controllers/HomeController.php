<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tri = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 0)
            ->paginate(5);

     

        $telkomsel = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 1)
            ->paginate(5);
        
        $indosat = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 2)
            ->paginate(5);
            
        $axis = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 3)
            ->paginate(5);   
        $pulsa = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 3)
            ->paginate(5);   
        
        $smartfren = Product::select('products.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'products.category_id')
            ->where('products.status', 1)
            ->where('c.status', 1)
            ->where('raw', 4)
            ->paginate(5); 
        return view('user.landing', compact(['smartfren','axis','indosat','telkomsel','tri','pulsa']));
    }

    public function pulsa(Request $request)
    {
        $search = false;
        if ($request->search != null) {
            $pulsa = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.pulsa', compact(['pulsa', 'search']));
        } else {
            $pulsa = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.pulsa', compact(['pulsa', 'search']));
        }
        if ($request->search != null) {
            $tri = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.tri', compact(['tri', 'search']));
        } else {
            $tri = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.tri', compact(['tri', 'search']));
        }
    }
    public function voucher(Request $request)
    {
        $search = false;
        if ($request->search != null) {
            $voucher = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.voucher', compact(['voucher', 'search']));
        } else {
            $voucher = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.voucher', compact(['voucher', 'search']));
        }
    }
    public function aksesoris(Request $request)
    {
        $search = false;
        if ($request->search != null) {
            $aksesoris = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.aksesoris', compact(['aksesoris', 'search']));
        } else {
            $aksesoris = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.aksesoris', compact(['aksesoris', 'search']));
        }
    }
    public function handpone(Request $request)
    {
        $search = false;
        if ($request->search != null) {
            $handpone = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.handpone', compact(['handpone', 'search']));
        } else {
            $handpone = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.handpone', compact(['handpone', 'search']));
        }
    }
    public function about(Request $request)
    {
        $search = false;
        if ($request->search != null) {
            $about = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->where('products.name', 'LIKE', '%' . $request->search . '%')
                ->get();
            $search = true;
            return view('user.about', compact(['about', 'search']));
        } else {
            $about = Product::select('products.*', 'c.name as category_name')
                ->join('categories as c', 'c.id', 'products.category_id')
                ->where('products.status', 1)
                ->where('c.status', 1)
                ->get();
            return view('user.about', compact(['about', 'search']));
        }
    }

    public function cart()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => ['key' => env("RAJA_ONGKIR_KEY")]

        ]);
        $city = json_decode($response->getBody()->getContents())->rajaongkir->results;
        return view('user.cart', compact('city'));
    }

    public function order(Request $request)
    {
        if (isset($request->products) == null) {
            return redirect()->back()->with('error', 'Oops. Kamu belum membeli apapun!');
        }

        $set        = Setting::first();

        $phone      = $set->whatsapp;
        $phone_code = substr((int)$phone, 0, 2);
        if ((int)$phone_code == 62) {
            $phone_number = $phone;
        } else {
            $phone_number = '62' . substr($phone, 1);
        }
        $id_product = json_decode($request->products);
        $total_qty  = 0;
        $total      = 0;

        // $api_wa     = 'https://wa.me/send?phone=';
        $api_wa     = 'https://api.whatsapp.com/send/?phone=';
        $text       = [];
        $text[]     = 'Mau Pesan dong kak!';
        $text[]     = '';
        $text[]     = 'Detail Pemesan :';
        $text[]     = '- Nama lengkap      :   *' . $request->name . '*';
        $text[]     = '- Telepon                  :   *' . $request->telp . '*';
        $text[]     = '- Alamat Lengkap   : %0A  *' . $request->full_address . '*';
        $text[]     = '- Catatan                   : %0A  ' . $request->note;
        $text[]     = '';
        $text[]     = 'Detail Barang :';
        $count = 0;

        foreach ($id_product as $p) {
            $product = Product::find($p->id);

            $total_qty += $p->qty;
            $total += $p->total_price;

            $no = $count + 1;
            $text[] = $no . '. ' . $p->name;
            $text[] = '     ' . $p->qty . ' @ Rp. ' . numberFormat($p->price);
            $text[] = '     ' . '*Total Rp. ' . numberFormat($p->price * $p->qty) . '*';
            $text[] = '';
        }
        $text[] = '----------------------------------------';
        $text[] = 'Detail pesanan';
        $text[] = 'Sub Total                   : *' . numberFormat($total);
        $text[] = 'Ongkir (' . $request->courier . ')          : *' . numberFormat((int)$request->ongkir);
        $text[] = '';
        $text[] = 'Total Keseluruhan     : *Rp. ' . numberFormat($total + (int)$request->ongkir) . '*';
        $text[] = '----------------------------------------';
        $text[] = 'Kunjungi Toko : Thrifting.com';

        return redirect()->away($api_wa . $phone_number . '&text=' . implode('%0A', $text));
    }

    public function getCourier(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => ['key' => env("RAJA_ONGKIR_KEY")],
            'form_params' => [
                'origin' => $request->origin,
                'destination' => $request->destination,
                'weight' => $request->weight,
                'courier' => $request->courier,
            ],
        ]);
        return response()->json(['data' => json_decode($response->getBody()->getContents())->rajaongkir]);
    }
}
