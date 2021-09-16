<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class OrderExport implements FromQuery, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Order::query()->selectRaw('
                                spt_drivers.name AS driver_name, 
                                spt_drivers.phone, 
                                spt_vehicles.name AS vehicle_name, 
                                spt_vehicles.type, 
                                spt_vehicles.plate_number,
                                user_approval.name AS approval_name,
                                user_input.name AS input_name,
                                spt_orders.message,
                                spt_orders.created_at'
                            )
                            ->join('spt_users AS user_approval', 'spt_orders.user_approval_id', '=', 'user_approval._id')
                            ->join('spt_users AS user_input', 'spt_orders.user_input_id', '=', 'user_input._id')
                            ->join('spt_drivers', 'spt_orders.driver_id', '=', 'spt_drivers._id')
                            ->join('spt_vehicles', 'spt_orders.vehicle_id', '=', 'spt_vehicles._id')
                            ->orderBy('spt_orders.created_at', 'DESC');
    }

    public function headings(): array
    {
        return [
            "Nama Pengemudi", 
            "No Telfon", 
            "Nama Kendaraan", 
            "Tipe Kendaraan", 
            "Plat Nomor", 
            "Nama Pengawas",
            "Nama Petugas Input",
            "Tujuan",
            'Waktu Input Data'
        ];
    }
}
