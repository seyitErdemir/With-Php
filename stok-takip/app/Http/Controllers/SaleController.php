<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\Sales;
use DateTime;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data['sales'] = Sales::all()->sortBy('created_at');

        return view('Sales.index', compact('data'));
    }


    public function addSales(Request $request)
    {
        $veri = $request->input('product_id');


        $salesInsert = Sales::insert(['product_id' => $veri, "created_at" => new DateTime()]);
        $deleteStock = Products::where(['id' => $veri])->get()->first()->stok;
        Products::where(['id' => $veri])->update(["stok" => $deleteStock - 1]);

        if ($salesInsert) {
            echo  1;
        }
        echo 0;
    }
    public function daySales()
    {
        $sales = Sales::all()->sortBy('created_at');
        $data['salesProduct'] = [];
        $data['totalPrice'] = 0;
        foreach ($sales as $sale) {
            if (
                date('d', strtotime($sale->created_at)) == date('d')  &&
                date('m', strtotime($sale->created_at)) == date('m')  &&
                date('Y', strtotime($sale->created_at)) == date('Y')
            ) {
                $saleProduct = Products::where(['id' => $sale->product_id])->first();

                if ($saleProduct) {
                    $bilgi = [
                        'id' => $sale->id,
                        "name" => $saleProduct->name,
                        'price' => $saleProduct->price,
                        'sale_date' => $sale->created_at,
                    ];
                    $data['totalPrice'] = $data['totalPrice'] + $saleProduct->price;
                    array_push($data['salesProduct'], $bilgi);
                }
            }
        }



        return view('Sales.sales', compact('data'));
    }


    public function monthSales()
    {
        $sales = Sales::all()->sortByDesc('id');

        $data['salesProduct'] = [];
        $data['totalPrice'] = 0;

        foreach ($sales as $sale) {
            if (
                date('m', strtotime($sale->created_at)) == date('m')  &&
                date('Y', strtotime($sale->created_at)) == date('Y')
            ) {
                $saleProduct = Products::where(['id' => $sale->product_id])->first();
                if ($saleProduct) {
                    $bilgi = [
                        'id' => $sale->id,
                        "name" => $saleProduct->name,
                        'price' => $saleProduct->price,
                        'sale_date' => $sale->created_at,
                    ];
                    $data['totalPrice'] = $data['totalPrice'] + $saleProduct->price;
                    array_push($data['salesProduct'], $bilgi);
                }
            }
        }



        return view('Sales.sales', compact('data'));
    }


    public function yearSales()
    {
        $sales = Sales::all()->sortBy('created_at');
        $data['salesProduct'] = [];
        $data['totalPrice'] = 0;

        foreach ($sales as $sale) {
            if (
                date('Y', strtotime($sale->created_at)) == date('Y')
            ) {
                $saleProduct = Products::where(['id' => $sale->product_id])->first();
                if ($saleProduct) {
                    $bilgi = [
                        'id' => $sale->id,
                        "name" => $saleProduct->name,
                        'price' => $saleProduct->price,
                        'sale_date' => $sale->created_at,
                    ];
                    $data['totalPrice'] = $data['totalPrice'] + $saleProduct->price;
                    array_push($data['salesProduct'], $bilgi);
                }
            }
        }



        return view('Sales.sales', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $saleDelete = Sales::find(intval($id));
        if ($saleDelete->delete()) {
            echo 1;
        }
        echo 0;
    }
}
