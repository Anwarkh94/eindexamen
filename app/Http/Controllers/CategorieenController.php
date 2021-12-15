<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categorieen;


class CategorieenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $Request)
    {
        $this->data['categorieen'] = categorieen::orderBy('naam', 'ASC')->get();
        return view('categorieen.index', $this->data);
    }

    public function create(Request $Request)
    {
        return view('categorieen.create', $this->data);
    }
    public function postCreate(Request $Request)
    {
        $this->validate($Request, [
            'naam'        => 'required',
        ]);
        $this->data['model'] = new categorieen;
        $this->data['model']->naam        = $Request->naam;
        $this->data['model']->save();
        return redirect()->route('categorieenController@index');
    }
    public function update(Request $Request)
    {
        $this->data['model'] = categorieen::findOrFail($Request->model);
        return view('categorieen.update', $this->data);
    }
    public function postUpdate(Request $Request)
    {
        $this->validate($Request, [
            'naam'        => 'required',
        ]);
        $this->data['model'] = categorieen::findOrFail($Request->model);
        $this->data['model']->naam        = $Request->naam;
        $this->data['model']->save();
        return redirect()->route('categorieenController@index');
    }
    public function postDelete(Request $Request)
    {
        $this->data['model'] = categorieen::where('id', $Request->model)->delete();
        return redirect()->route('categorieenController@index');
    }


   





}

    


  


