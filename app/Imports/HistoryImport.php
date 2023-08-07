<?php

namespace App\Imports;

use App\Models\History;
use Maatwebsite\Excel\Concerns\ToModel;

class HistoryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new History([
            'nama_pembeli'     => $row[0],
            'jenis_kambing'    => $row[1],
            'jumlah'    => $row[2],
            'status'    => $row[3],
            'tanggal_transaksi'    => $row[4],
        ]);
    }
}
