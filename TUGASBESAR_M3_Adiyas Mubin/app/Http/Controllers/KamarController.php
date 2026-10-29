<?php
namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;

class KamarController extends Controller
{
    public function index() {
       
        $kamars = Kamar::orderBy('id', 'desc')->get();
        return view('kamar.index',compact('kamars'));
    }

    public function create() {
        return view('kamar.create');
    }

    public function store(Request $request) {
        Kamar::create($request->all());
        return redirect()->route('kamar.index');
    }

    public function destroy($id) {
        Kamar::destroy($id);
        return redirect()->route('kamar.index');
    }
}