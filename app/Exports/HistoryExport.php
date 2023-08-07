<?php

namespace App\Exports;

use App\Models\History;
use Maatwebsite\Excel\Concerns\FromCollection;

class HistoryExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return History::select('nama_pembeli', 'jenis_kambing','jumlah', 'status', 'tanggal_transaksi')->get();
    }
}
