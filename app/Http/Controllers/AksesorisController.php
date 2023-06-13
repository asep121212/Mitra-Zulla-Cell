<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Aksesori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;


class AksesoriController extends Controller
{
    //
    public function index()
    {
        $aksesoris = Aksesori::select('aksesoris.*', 'c.name as category_name')
        ->join('categories as c', 'c.id', 'aksesoris.category_id')
        ->get();
    $categories = Category::select('categories.*')->get();
    return view('admin.aksesori', compact(['aksesoris', 'categories']));
    }


    public function addAksesori(Request $req)
    {
        $aksesori = $req->validate([
            'aksesori_name' => 'required',
            'aksesori_quantity' => 'required',
            'aksesori_description' => 'required',
            'aksesori_price' => 'required',
            'aksesori_banner' => 'image|file|max:1024',
        ]);
        $aksesori = new Aksesori;
        $aksesori->name = $req->aksesori_name;
        $aksesori->quantity = $req->aksesori_quantity;
        $aksesori->description = $req->aksesori_description;
        $aksesori->category_id = $req->category_id;
        $aksesori->price = $req->aksesori_price;
        $aksesori->status = $req->aksesori_status;

        if ($req->hasFile('aksesori_banner')) {
            $filenamewithextension = $req->file('aksesori_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('aksesori_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('aksesori_banner')->storeAs('public/aksesori_images', $fileNameToStore);
            $req->file('aksesori_banner')->storeAs('public/aksesori_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/aksesori_images/thumbnail/' . $fileNameToStore);
            $aksesori_image = Image::make($thumbnailPath)->resize(220, 161);
            $aksesori_image->save($thumbnailPath);

            $aksesori->banner = '/' . $fileNameToStore;
            $aksesori->thumbnail = '/' . $fileNameToStore;
        }


        $aksesori->raw = $req->aksesori_raw;
        // dd($handphone);
        $aksesori->save();
        return redirect('/aksesori');
    }

    public function update(Request $req, $id)
    {
        $aksesori = $req->validate([
            'aksesori_name' => 'required',
            'aksesori_quantity' => 'required',
            'aksesori_description' => 'required',
            'aksesori_price' => 'required',
            'aksesori_banner' => 'image|file|max:1024',
        ]);

        $aksesori = Aksesori::find($id);
        $aksesori->name = $req->aksesori_name;
        $aksesori->quantity = $req->aksesori_quantity;
        $aksesori->description = $req->aksesori_description;
        $aksesori->category_id = $req->category_id;
        $aksesori->price = $req->aksesori_price;
        $aksesori->status = $req->aksesori_status;

        if ($req->hasFile('aksesori_banner')) {

            if ($req->oldImage) {
                Storage::delete('public/aksesori_images' . $req->oldImage);
                Storage::delete('public/aksesori_images/thumbnail' . $req->oldImage);
            }
            // dd($req->oldImage);
            $filenamewithextension = $req->file('aksesori_banner')->getClientOriginalName();

            $fileName = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            $extension = $req->file('aksesori_banner')->getClientOriginalExtension();

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            $req->file('aksesori_banner')->storeAs('public/aksesori_images', $fileNameToStore);
            $req->file('aksesori_banner')->storeAs('public/aksesori_images/thumbnail', $fileNameToStore);

            $thumbnailPath = public_path('storage/aksesori_images/thumbnail/' . $fileNameToStore);
            $aksesori_images = Image::make($thumbnailPath)->resize(220, 161);
            $aksesori_images->save($thumbnailPath);
            // dd($handphone);
            $aksesori->banner = '/' . $fileNameToStore;
            $aksesori->thumbnail = '/' . $fileNameToStore;
        }

        $aksesori->raw = $req->aksesori;
        $aksesori->save();
        return redirect('/aksesori');
    }

    public function destroy(Request $req, $id)
    {
        // dd($req->oldImage);
        if ($req->oldImage) {
            Storage::delete('public/aksesori_images' . $req->oldImage);
            Storage::delete('public/aksesori_images/thumbnail' . $req->oldImage);
        }
        $aksesori = Aksesori::find($id)->delete();
        return redirect('/aksesori');
    }
}