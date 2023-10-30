<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Customer::where('meetingroom', 'like', '%' . $request->search . '%')
            ->orWhere('customer', 'like', '%' . $request->search . '%')
            ->orWhere('created_at', 'like', '%' . $request->search . '%')
            ->paginate(10);
            Session::put('halaman_url', request()->FullUrl());
        }else{
            $data = Customer::paginate(10);
            Session::put('halaman_url', request()->FullUrl());
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
        $this->validate($request,([
            'customer' => 'required|max:500|min:5',
            'meetingroom' => 'required|max:500|min:3',
        ]));

        $data = Customer::create($request->all());
        if($request->hasfile('beo')){
            $request->file('beo')->move('pdfs/', $request->file('beo')->getClientOriginalName());
            $data->beo = $request->file('beo')->getClientOriginalName();
            $data->save();
        }
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
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success','Data Berhasil Di Update!');
        }
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

