<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;

class CustomerController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Customer::where('nama', 'like', '%' . $request->search . '%')
            ->orWhere('statuscleaning', 'like', '%' . $request->search . '%')
            ->orWhere('room', 'like', '%' . $request->search . '%')
            ->paginate(5);
        }else{
            $data = Customer::paginate(5);
        }
        //dd($data);
        return view('datacustomer',compact('data'));
    }

    public function tambahcustomer(){
        //dd($data);
        return view('tambahdata');
    }

    public function insertdata(Request $request){
        //dd($request->all());
        Customer::create($request->all());
        return redirect()->route('customer')->with('success','Data Berhasil Di Tambahkan!');
    }

    public function tampilkandata($id){

        $data = Customer::find($id);
        //dd($data);
        return view('tampildata',compact('data'));
        
    }

    public function updatedata(Request $request,$id){
        $data = Customer::find($id);
        $data->update($request->all());
        return redirect()->route('customer')->with('success','Data Berhasil Di Update!');

    }

    public function deletedata($id){
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('customer')->with('success','Data Berhasil Di Hapus!');;

    }

    public function exportpdf(){
        $data = Customer::all();
        view()->share('data',$data);
        $pdf = PDF::loadview('datacustomer-php');
        return $pdf->download('data.pdf');

    }

    public function exportexcel(){
        
        return Excel::download(new CustomerExport,'datacustomer.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('CustomerData', $namafile);

        Excel::import(new CustomerImport, \public_path('/CustomerData/'.$namafile));
        return \redirect()->back();
    }


}

