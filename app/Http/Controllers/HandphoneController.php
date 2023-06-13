<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Handphone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


class HandphoneController extends Controller
{
    //
    public function index()
    {
        $handphones = Handphone::select('handphones.*', 'c.name as category_name')
            ->join('categories as c', 'c.id', 'handphones.category_id')
            ->get();
        $categories = Category::select('categories.*')->get();
        return view('admin.handphone', compact(['handphones', 'categories']));
    }


    public function addHandphone(Request $req)
    {
        $handphone = $req->validate([
            'handphone_name' => 'required',
            'handphone_quantity' => 'required',
            'handphone_description' => 'required',
            'handphone_price' => 'required',
            'handphone_banner' => 'image|file|max:1024',
        ]);
        $handphone = new Handphone;
        $handphone->name = $req->handphone_name;
        $handphone->quantity = $req->handphone_quantity;
        $handphone->description = $req->handphone_description;
        $handphone->category_id = $req->category_id;
        $handphone->price = $req->handphone_price;
        $handphone->status = $req->handphone_status;

        if ($req->hasFile('handphone_banner')) {
            $filenamewithextension = $req->file('handphone_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('handphone_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('handphone_banner')->storeAs('public/handphone_images', $fileNameToStore);
            $req->file('handphone_banner')->storeAs('public/handphone_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/handphone_images/thumbnail/' . $fileNameToStore);
            $handphone_image = Image::make($thumbnailPath)->resize(220, 161);
            $handphone_image->save($thumbnailPath);

            $handphone->banner = '/' . $fileNameToStore;
            $handphone->thumbnail = '/' . $fileNameToStore;
        }


        $handphone->raw = $req->handphone_raw;
        // dd($handphone);
        $handphone->save();
        return redirect('/handphone');
    }

    public function update(Request $req, $id)
    {
        $handphone = $req->validate([
            'handphone_name' => 'required',
            'handphone_quantity' => 'required',
            'handphone_description' => 'required',
            'handphone_price' => 'required',
            'handphone_banner' => 'image|file|max:1024',
        ]);

        $handphone = Handphone::find($id);
        $handphone->name = $req->handphone_name;
        $handphone->quantity = $req->handphone_quantity;
        $handphone->description = $req->handphone_description;
        $handphone->category_id = $req->category_id;
        $handphone->price = $req->handphone_price;
        $handphone->status = $req->handphone_status;

        if ($req->hasFile('handphone_banner')) {

            if ($req->oldImage) {
                Storage::delete('public/handphone_images' . $req->oldImage);
                Storage::delete('public/handphone_images/thumbnail' . $req->oldImage);
            }
            // dd($req->oldImage);
            $filenamewithextension = $req->file('handphone_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('handphone_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('handphone_banner')->storeAs('public/handphone_images', $fileNameToStore);
            $req->file('handphone_banner')->storeAs('public/handphone_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/handphone_images/thumbnail/' . $fileNameToStore);
            $handphone_image = Image::make($thumbnailPath)->resize(220, 161);
            $handphone_image->save($thumbnailPath);
            // dd($handphone);
            $handphone->banner = '/' . $fileNameToStore;
            $handphone->thumbnail = '/' . $fileNameToStore;
        }

        $handphone->raw = $req->handphone_raw;
        $handphone->save();
        return redirect('/handphone');
    }

    public function destroy(Request $req, $id)
    {
        // dd($req->oldImage);
        if ($req->oldImage) {
            Storage::delete('public/handphone_images' . $req->oldImage);
            Storage::delete('public/handphone_images/thumbnail' . $req->oldImage);
        }
        $handphone = Handphone::find($id)->delete();
        return redirect('/handphone');
    }
}
