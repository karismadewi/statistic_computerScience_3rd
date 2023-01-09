<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Exports\DataExport; 
use App\Imports\DataImport; 
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;



class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::all();
        $sum = 0;
        foreach ($data as $d) {
            $sum = $d->tugas1 + $d->uts + $d->tugas2 + $d->kuis + $d->uas;
            // $sum = Data::where('id', $d->id)->sum('tugas1','uts','tugas2','kuis','uas');   
            Data::where('id', $d->id)->update(['total' => $sum]);
            $sum = 0;
        };
        $data2 = Data::all();
        $count = Data::count('total');
        $max = Data::max('total');
        $min = Data::min('total');
        $avg = Data::avg('total');
        return view(
            'data.index',
            ([
                'data'  =>  $data2,
                'count' => $count,
                'max'   => $max,
                'min'   => $min,
                'avg'   => $avg
            ])
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id'=>'required|min:8|max:10',
            'nama'=>'required|min:8|max:255',
            'tugas1'=>'required',
            'uts'=>'required',
            'tugas2'=>'required',
            'kuis'=>'required',
            'uas'=>'required',
            'total'=>'required',



        ]);
        $data = new Data;
        $data->id=$request->id;
        $data->nama=$request->nama;
        $data->tugas1=$request->tugas1;
        $data->uts=$request->uts;
        $data->tugas2=$request->tugas2;
        $data->kuis=$request->kuis;
        $data->uas=$request->uas;
        $data->total=$request->total;
        $data->save();
        return to_route('data.index')->with('Success Adding Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */ 

    public function data_export(){
        return Excel::download(new DataExport, 'data.xlsx');
    }

    public function data_import_excel(Request $request){
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('dataMahasiswa', $fileName);

        Excel::import(new DataImport, public_path('/dataMahasiswa/'.$fileName));
        return to_route('data.index')->with('Success Adding Data!');

    }

    public function show($data)
    {
        //
        $data = Data::find($data);
        if(!$data){
            abort(404);
        }
        return view('data.detail')
        ->with("data", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        $data = Data::find($data);
        if(!$data){
            abort(404);
        }
        return view('data.edit')
        ->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
        //
        $request->validate([
            'nama'=>'required|min:8|max:255',
            'tugas1'=>'required',
            'uts'=>'required',
            'tugas2'=>'required',
            'kuis'=>'required',
            'uas'=>'required',
        ]);
        $data = Data::find($data);
        if(!$data){
            abort(404);
        }
        $data->nama=$request->nama;
        $data->tugas1   =$request->tugas1;
        $data->uts      =$request->uts;
        $data->tugas2   =$request->tugas2;
        $data->kuis     =$request->kuis;
        $data->uas      =$request->uas;
        $data->save();
        return to_route('data.index')->with('Success Adding Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
        //
        $data = Data::find($data);       
        $data-> delete();                 

        return to_route('data.index')->with('success', 'data deleted');
    }

    public function agregate(){
        $agregate = Data::all();

        // $tugas1 = Data::get('tugas1');
        // $uts = Data::get('uts');
        // $tugas2 = Data::get('tugas2');
        // $kuis = Data::get('kuis');
        // $uas = Data::get('uas');
        // collect([tugas1, uts, tugas2, kuis, uas])->sum();
        // dd($total);

        // $data = Data::select('tugas1','uts', 'tugas2','kuis','total');

        // $arr = [];
        // $sum = 0;
        // foreach ($data as $s) {
        //     $sum = $tugas1 + $uts + $tugas2 + $kuis + $total;
        //     array_push($arr, [
        //                 'sum' => $sum,]);
        //     $sum = 0;
        // }



        // return view('data.index')->with('data',$data);



        // $sum = $tugas1 + $uts + $tugas2 + $kuis + $uas; 
        // $total = Data::count();
        // $min = Data::min('sum');
        // dd($sum);

        // return view('data.index', (['total' => $arr,'data' => $agregate]));

        
    }
}
