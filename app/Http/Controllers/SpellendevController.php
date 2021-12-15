<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spellendev;
use App\categorieen;

class spellendevController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth')->only(['index']);
    }

    public function index(Request $Request)
    {
        
        $this->data['spellendev'] = spellendev::with('Category')->orderBy('naam', 'ASC')->get();
        return view('spellendev.index', $this->data);
    }
    public function create(Request $Request)
    {
        $this->data['categorieen'] = categorieen::get();
        return view('spellendev.create', $this->data);
    }
    public function postCreate(Request $Request)
    {

        $this->validate($Request, [
            'naam'        => 'required|max:255',
            'categorieen_id' => 'required|exists:categorieen,id',
            'leeftijd' =>'required|numeric',
            'beschrijving' => 'nullable|max:255',
            'foto'=>'nullable|image',
            'iframe'=>'required',  
        ]);
        $this->data['model'] = new spellendev;
        $this->data['model']->naam           = $Request->naam;
        $this->data['model']->categorieen_id = $Request->categorieen_id;
        $this->data['model']->leeftijd       = $Request->leeftijd;
        $this->data['model']->beschrijving   = $Request->beschrijving;
        $this->data['model']->foto           = $Request->hasFile('foto') ? $Request->file('foto')->store(null) : null;
        $this->data['model']->iframe         = $Request->iframe;
        $this->data['model']->save();
        
        return redirect()->route('spellendevController@index');
    }
    public function update(Request $Request)
    {
        $this->data['model'] = spellendev::findOrFail($Request->model);
        return view('spellendev.update', $this->data);
    }

    public function postUpdate(Request $Request)
    {
        // dd($Request->all());
        $this->validate($Request, [
            'naam'        => 'required|max:255',
            'categorieen_id' => 'required|exists:categorieen,id',
            'leeftijd' =>'required|numeric',
            'beschrijving' => 'nullable|max:255',
            'foto'=>'nullable|mimes:jpg,png',
            'iframe'=>'required', 
        ]);
        $this->data['model'] = spellendev::findOrFail($Request->model);
        $this->data['model']->naam        = $Request->naam;
        $this->data['model']->categorieen_id = $Request->categorieen_id;
        $this->data['model']->leeftijd     = $Request->leeftijd;
        $this->data['model']->beschrijving = $Request->beschrijving;
        $this->data['model']->foto         = $Request->hasFile('foto') ? $Request->file('foto')->store(null) : $this->data['model']->foto;
        $this->data['model']->iframe       = $Request->iframe;
        $this->data['model']->save();
        return redirect()->route('spellendevController@index');
    }












    public function postDelete(Request $Request)
    {
        $this->data['model'] = spellendev::where('id', $Request->model)->delete();
        return redirect()->route('spellendevController@index');
    }








}