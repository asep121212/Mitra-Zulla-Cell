<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


class VoucherController extends Controller
{
    //
    public function index()
    {
        $vouchers = Voucher::select('vouchers.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'vouchers.category_id')
            ->get();
        $categories = Category::select('categories.*')->get();
        return view('admin.voucher', compact(['vouchers', 'categories']));
    }


    public function addVoucher(Request $req)
    {
        $voucher = $req->validate([
            'voucher_name' => 'required',
            'voucher_quantity' => 'required',
            'voucher_description' => 'required',
            'voucher_price' => 'required',
            'voucher_banner' => 'image|file|max:1024',
        ]);
        $voucher = new Voucher;
        $voucher->name = $req->voucher_name;
        $voucher->quantity = $req->voucher_quantity;
        $voucher->description = $req->voucher_description;
        $voucher->category_id = $req->category_id;
        $voucher->price = $req->voucher_price;
        $voucher->status = $req->voucher_status;

        if ($req->hasFile('voucher_banner')) {
            $filenamewithextension = $req->file('voucher_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('voucher_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('voucher_banner')->storeAs('public/voucher_images', $fileNameToStore);
            $req->file('voucher_banner')->storeAs('public/voucher_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/voucher_images/thumbnail/' . $fileNameToStore);
            $voucher_image = Image::make($thumbnailPath)->resize(220, 161);
            $voucher_image->save($thumbnailPath);

            $voucher->banner = '/' . $fileNameToStore;
            $voucher->thumbnail = '/' . $fileNameToStore;
        }


        $voucher->raw = $req->voucher_raw;
        // dd($voucher);
        $voucher->save();
        return redirect('/voucher');
    }

    public function update(Request $req, $id)
    {
        $voucher = $req->validate([
            'voucher_name' => 'required',
            'voucher_quantity' => 'required',
            'voucher_description' => 'required',
            'voucher_price' => 'required',
            'voucher_banner' => 'image|file|max:1024',
        ]);

        $voucher = Voucher::find($id);
        $voucher->name = $req->voucher_name;
        $voucher->quantity = $req->voucher_quantity;
        $voucher->description = $req->voucher_description;
        $voucher->category_id = $req->category_id;
        $voucher->price = $req->voucher_price;
        $voucher->status = $req->voucher_status;

        if ($req->hasFile('voucher_banner')) {

            if ($req->oldImage) {
                Storage::delete('public/voucher_images' . $req->oldImage);
                Storage::delete('public/voucher_images/thumbnail' . $req->oldImage);
            }
            // dd($req->oldImage);
            $filenamewithextension = $req->file('voucher_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('voucher_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('voucher_banner')->storeAs('public/voucher_images', $fileNameToStore);
            $req->file('voucher_banner')->storeAs('public/voucher_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/voucher_images/thumbnail/' . $fileNameToStore);
            $voucher_image = Image::make($thumbnailPath)->resize(220, 161);
            $voucher_image->save($thumbnailPath);
            // dd($voucher);
            $voucher->banner = '/' . $fileNameToStore;
            $voucher->thumbnail = '/' . $fileNameToStore;
        }

        $voucher->raw = $req->voucher_raw;
        $voucher->save();

        return redirect('/voucher');
    }

    public function destroy(Request $req, $id)
    {
        // dd($req->oldImage);
        if ($req->oldImage) {
            Storage::delete('public/voucher_images' . $req->oldImage);
            Storage::delete('public/voucher_images/thumbnail' . $req->oldImage);
        }
        $voucher = Voucher::find($id)->delete();
        return redirect('/voucher');
    }
}
