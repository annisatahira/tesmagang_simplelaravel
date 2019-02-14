<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelTes;

class Tes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModelTes::all();
        return view('Tes',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tes_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
    $data = new ModelTes();
    $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_PORT => "5000",
          CURLOPT_URL => "http://127.0.0.1:5000/v1/balance/transfer_balance",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "tf=".$request->_from."&publickey=".$request->_to."&amount_at=".$request->_amount,
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded",
            "Postman-Token: df25b67c-f1fa-4a86-a43d-b48f55c1e719",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          $data->_status = "Blockhain Error".$err;
        } else {
          $res = json_decode($response);
          if ($res->status == '1' ) {
            $data->_trxhash = $res->trxhash;
            $data->_status =  $res->message;
            
          } 

          $data->_status =  $res->message;

        }
       $data->_from = $request->_from;
       $data->_to = $request->_to;
       $data->_amount = $request->_amount;
       $data->save();
       return redirect()->route('tes.index')->with('alert-success','Berhasil Menambahkan Data!');
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
