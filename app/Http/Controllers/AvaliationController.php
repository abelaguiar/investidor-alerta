<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvaliationRequest;
use App\Models\Avaliation;
use App\Models\Company;
use App\Models\Product;
use App\Models\Topic;

class AvaliationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product, Topic $topic, Avaliation $avaliation)
    {
        $avaliations = $avaliation
            ->authorized()
            ->where('product_id', $product->id)
            ->where('topic_id', $topic->id)
            ->orderBy('avaliation_count', 'desc')
            ->groupBy('company_id')
            ->get();

        return view('avaliations.index', compact('avaliations', 'product', 'topic'));
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
        $data = $request->all();
        $explode = explode("-", $request->product_topic_id);
        
        if (count($explode) > 1) {
            $data['product_id'] = trim($explode[0]);
            $data['topic_id'] = trim($explode[1]);
        } else {
            $data['product_id'] = $explode[0];
        }

        $avaliation = Avaliation::create($data);

        if ($request->document) {
            $avaliation->addDocuments($request->document);
            $avaliation->save();
        }

        flash('Salvo com sucesso!')->success();

        return back();
    }

    public function approve(Avaliation $avaliation)
    {
        $avaliations = $avaliation->notAuthorized()
            ->orderBy('avaliation_count', 'desc')
            ->paginate(10);

        return view('avaliations.approved', compact('avaliations'));
    }

    public function approved(Avaliation $avaliation)
    {
        $avaliation->approved();

        flash('Salvo com sucesso!')->success();

        return back();
    }
}
