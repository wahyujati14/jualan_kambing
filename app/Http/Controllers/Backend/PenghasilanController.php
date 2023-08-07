<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PenghasilanTahunan;

use App\Http\Controllers\Backend\PDFController;
use PDF;

class PenghasilanController extends Controller
{
    public function AllPenghasilan()
    {
        $penghasilan = PenghasilanTahunan::latest()->get();

        return view('backend.penghasilan_tahunan.all_penghasilan', compact('penghasilan'));
    } // End method

    public function AddPenghasilan()
    {
        return view('backend.penghasilan_tahunan.add_penghasilan');
    } // End Method

    public function StorePenghasilan(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'total_penghasilan' => 'required',
            'jenis_kambing_etawa' => 'required',
            'jenis_kambing_biasa' => 'required',
        ]);

        PenghasilanTahunan::insert([
            'tahun' => $request->tahun,
            'total_penghasilan' => $request->total_penghasilan,
            'jenis_kambing_etawa' => $request->jenis_kambing_etawa,
            'jenis_kambing_biasa' => $request->jenis_kambing_biasa
        ]);

        $notification = array(
            'message' => 'Berhasil tambah data transaksi!',
            'alert-history' => 'success'
        );

        return redirect()->route('all.penghasilan')->with($notification);
    } // End Method

    public function EditPenghasilan($id)
    {
        $penghasilan = PenghasilanTahunan::findOrFail($id);

        return view('backend.penghasilan_tahunan.edit_penghasilan', compact('penghasilan'));
    } // End Method

    public function UpdatePenghasilan(Request $request)
    {
        $pid = $request->id;

        PenghasilanTahunan::findOrFail($pid)->update([
            'tahun' => $request->tahun,
            'total_penghasilan' => $request->total_penghasilan,
            'jenis_kambing_etawa' => $request->jenis_kambing_etawa,
            'jenis_kambing_biasa' => $request->jenis_kambing_biasa
        ]);

        $notification = array(
            'message' => 'Berhasil update data penghasilan!',
            'alert-history' => 'success'
        );

        return redirect()->route('all.penghasilan')->with($notification);
    } // End Method

    public function DeletePenghasilan($id)
    {
        PenghasilanTahunan::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil hapus data transaksi!',
            'alert-history' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    public function ExportTransaksi()
    {
        $penghasilan = PenghasilanTahunan::get();
  
        $data = [
            'title' => 'Penghasilan Tahunan',
            'date' => date('m/d/Y'),
            'penghasilan' => $penghasilan
        ]; 
            
        $pdf = PDF::loadView('myPDF', $data);
     
        return $pdf->download('Penghasilan Tahunan.pdf');

        // return PDF::download(new PDFController, 'Laporan Tahunan.pdf');
    } // End method
}
