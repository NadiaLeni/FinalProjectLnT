<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Faktur;

class FakturController extends Controller
{
    //
    public function createProduct() {
        $this->authorize('user');
        return view('createFaktur');
    }

    public function storeFaktur(Request $request){

        $request->validate([
            'generateInvoice' => ['required', 'string'],
            'name' => ['required', 'confirmed', 'min:6', 'max:12'],
            'amount' => ['required', 'confirmed', 'min:6', 'max:12'],
            'alamat' => ['required', 'string', 'min:10', 'max:100'] 
        ]);

        $Faktur = Faktur::create([
            'price' => $request->price,
            'name'=> $request->name,
            'amount' => $request->amount,
            'alamat' => $request->alamat,
        ]);

        return redirect('/status');
    }

    public function formUpdateFaktur($id){
        $Faktur = Faktur::findOrFail($id);
        return view('updateFaktur', compact('Faktur'));
    }

    public function updateProduct($id, Request $request){
        Faktur::findOrFail($id)->update([
            'price' => $request->price,
            'name' => $request->name,
            'amount' => $request->amount,
            'alamat' => $request->alamat
        ]);

        return redirect('/show/faktur');
    }

    public function deleteFaktur($id){
        Faktur::destroy($id);
        return redirect('/show/faktur');
    }

    public function GetProduct(){
        $Faktur = Faktur::all();

        return $Faktur;
    }
}
