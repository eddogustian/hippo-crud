<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaction;
use DB;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::orderBy('created_at', 'DESC')->get();
        // dd($transactions);
        return view('admin.transaction.index', compact('transactions'));
    }

    public function loadData() {
        $arr_data   = array();
        $transactions = Transaction::orderBy('created_at', 'DESC')->get();

        $counter = 0;
        foreach ($transactions as $transaction) {
            //  echo $category->nama_kategori; die();
            $arr_data['data'][$counter][] = $counter+1;
            $arr_data['data'][$counter][] = $transaction->kodetransaksi ? $transaction->kodetransaksi : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $transaction->total ? $transaction->total : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($transaction->created_at));
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($transaction->updated_at));
            $arr_data['data'][$counter][] = "<a href='".url('admin/transaction/edit/'.$transaction->id)."' class='btn btn-primary'><i class='glyphicon glyphicon-edit'></i>Detail</a>";
            $counter++;
        }
        return json_encode($arr_data);
    }

    public function detail() {
        return view('admin.transaction.details');
    }

    public function loadDataDetail() {

        $arr_data   = array();
        $detailtransactions = DB::table('transactions')
            ->join('transaction_details', 'transactions.kodetransaksi', '=', 'transaction_details.kodetransaksi')
            ->select('transactions.*', 'transaction_details.nama_produk', 'transaction_details.qty')
            ->get();
        $counter = 0;
        foreach ($detailtransactions as $detailtransaction) {
            //  echo $detailtransaction->kodetransaksi; die();
            $arr_data['data'][$counter][] = $counter+1;
            $arr_data['data'][$counter][] = $detailtransaction->kodetransaksi ? $detailtransaction->kodetransaksi : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $detailtransaction->nama_produk ? $detailtransaction->nama_produk : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $detailtransaction->qty ? $detailtransaction->qty : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = $detailtransaction->total ? $detailtransaction->total : "<p class='text-center'> - </p>";
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($detailtransaction->created_at));
            $arr_data['data'][$counter][] = date("d-m-Y H:i:s", strtotime($detailtransaction->updated_at));
            $counter++;
        }
        return json_encode($arr_data);
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
        //
    }
}
