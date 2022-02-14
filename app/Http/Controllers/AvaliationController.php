<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvaliationRequest;
use App\Models\Avaliation;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;

class AvaliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::with('topics')->get();
        $companies = Company::pluck('name', 'id');

        return view('avaliations.create', compact('products', 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AvaliationRequest $request)
    {
        $avaliation = Avaliation::create($request->all());

        if ($request->document) {
            $avaliation->addDocuments($request->document);
            $avaliation->save();
        }

        flash('Salvo com sucesso!')->success();

        return back();
    }
}
