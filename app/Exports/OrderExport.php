<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class OrderExport implements FromQuery
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return Order::query()->where('spt_orders.status', '!=', 'ditolak')
                            ->where('spt_orders.status', '!=', 'selesai')
                            ->join('spt_drivers', 'spt_orders.driver_id', '=', 'spt_drivers._id')
                            ->join('spt_vehicles', 'spt_orders.vehicle_id', '=', 'spt_vehicles._id')
                            ->orderBy('spt_orders.created_at', 'DESC');
    }
}
