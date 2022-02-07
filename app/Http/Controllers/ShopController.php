<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopRequest;
use App\Http\Requests\ShopUpdateRequest;
use App\Models\Shop;
use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shops = Shop::paginate(10);

        if (auth()->user()->isRoleRepresentative()) {

            $userId = auth()->user()->id;

            $builder = (function (Builder $query) use ($userId) {
                $query->where('user_id', $userId)
                    ->where('representative_shop.approved', true);
            });

            $shops = Shop::whereHas('representatives', $builder)
                ->paginate(10);
        }

        return view('shops.index', compact('shops'));
    }

    public function search(Request $request)
    {
        $shops = Shop::filter($request)->paginate(10);

        return view('shops.index', compact('shops'));;
    }

    public function searchByCnpj(Request $request)
    {
        if ($request->isMethod('post')) {

            $cnpj = $request->cnpj;

            $shop = Shop::where('cnpj', $cnpj)->first();

            if (!is_null($shop) && auth()->user()->isRoleRepresentative()) {

                $bondExist = $shop->representatives->contains(
                    auth()->user()->representative
                );

                if ($bondExist) {

                    flash('Vinculo com loja já existe!')->info();

                    return redirect()->route('dashboard');
                }
            }

            if (is_null($shop)) {

                return redirect()->route('shops.create', ['cnpj' => $cnpj]);
            }

            return redirect()->route('shops.show', $shop->id);
        }

        return view('shops.search');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $states = State::pluck('name', 'id');

        $cnpj = $request->cnpj ?? null;

        return view('shops.create', compact('states', 'cnpj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShopRequest $request, Shop $shop)
    {
        $shop = $shop->create($request->all());

        flash('Salvo com sucesso!')->success();

        if (auth()->user()->isRoleRepresentative()) {

            $shop->representatives()->attach(auth()->user()->representative->id);

            return redirect()->route('dashboard');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop, Request $request)
    {
        if ($request->isMethod('post')) {

            if (auth()->user()->isRoleRepresentative()) {

                flash('Solicitação de vinculação criada com sucesso!')->success();

                $shop->representatives()->attach(auth()->user()->representative->id);
                
                return redirect()->route('dashboard');
            }
        }

        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $states = State::pluck('name', 'id');

        return view('shops.edit', compact('shop', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(ShopUpdateRequest $request, Shop $shop)
    {
        $shop->update($request->all());

        flash('Atualizado com sucesso!')->success();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        if (auth()->user()->isRoleRepresentative()) {

            $shop->representatives()->detach(auth()->user()->representative->id);
        }

        flash('Excluído com sucesso!')->success();

        return back();
    }
}
