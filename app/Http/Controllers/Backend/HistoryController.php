<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\History;
use App\Models\Stock;

// Excel Package
use Maatwebsite\Excel\Facades\Excel;

// Excel Package Export
use App\Exports\HistoryExport;
use App\Exports\ExportListHistory;
use App\Exports\ExportPemasukanKambing;

// Excel Package Import
use App\Imports\HistoryImport;
use Svg\Gradient\Stop;

use App\Http\Controllers\Backend\PDFController;
use PDF;

class HistoryController extends Controller
{
    public function AllHistory()
    {
        $stock = Stock::latest()->get();
        $history = History::latest()->get();

        return view('backend.history.all_history', compact('history','stock'));
    } // End method

    public function AddHistory()
    {
        return view('backend.history.add_history');
    } // End Method

    public function StoreHistory(Request $request)
    {
        $request->validate([
            'nama_pembeli' => 'required',
            'jenis_kambing' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            'tanggal_transaksi' => 'required',
        ]);

        History::insert([
            'nama_pembeli' => $request->nama_pembeli,
            'jenis_kambing' => $request->jenis_kambing,
            'jumlah' => $request->jumlah,
            'status' => $request->status,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);

        $notification = array(
            'message' => 'Berhasil tambah data transaksi!',
            'alert-history' => 'success'
        );

        return redirect()->route('all.history')->with($notification);
    } // End Method

    public function EditHistory($id)
    {
        $history = History::findOrFail($id);

        return view('backend.history.edit_history', compact('history'));
    } // End Method

    public function UpdateHistory(Request $request)
    {
        $pid = $request->id;

        History::findOrFail($pid)->update([
            'nama_pembeli' => $request->nama_pembeli,
            'jenis_kambing' => $request->jenis_kambing,
            'status' => $request->status,
            'tanggal_transaksi' => $request->tanggal_transaksi
        ]);

        $notification = array(
            'message' => 'Berhasil update data transaksi!',
            'alert-history' => 'success'
        );

        return redirect()->route('all.history')->with($notification);
    } // End Method

    public function DeleteHistory($id)
    {
        History::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Berhasil hapus data transaksi!',
            'alert-history' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method

    // Import & Export History Start
    public function ImportHistory()
    {
        return view('backend.history.import_history');
    } // End method

    public function ExportHistory()
    {
        return Excel::download(new HistoryExport, 'transaksi.xlsx');
    } // End method
    
    public function ExportPemasukanKambing()
    {
        return Excel::download(new ExportPemasukanKambing, 'Penambahan Kambing.xlsx');
    } // End method

    public function Import(Request $request)
    {
        // $path = $request->file('import_file');

        Excel::import(new HistoryImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Imported successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method
    // Import & export excel end

    public function ExportListHistory()
    {
        $history = History::get();
        $stock = Stock::get();
  
        $data = [
            'title' => 'List Semua Kambing',
            'date' => date('m/d/Y'),
            'history' => $history,
            'stock' => $stock
        ]; 
            
        $pdf = PDF::loadView('myPDF2', $data);
     
        return $pdf->download('List Semua Kambing.pdf');

        // return PDF::download(new PDFController, 'Laporan Tahunan.pdf');
    } // End method
}
