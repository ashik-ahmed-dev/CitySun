<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RunningOrdersExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        return Order::query()->running();
    }

    public function headings(): array{
        return [
            'Service Title',
            'Service Price',
            'Payment Type',
            'Payment Number',
            'TrxID',
            'Name',
            'Email',
            'Phone Number',
            'Address',
            'Note',
            'Status',
        ];
    }

    /**
     * @var Order $order
     */
    public function map($order): array
    {
        return [
            $order->service->name,
            $order->service_price,
            $order->type,
            $order->payment_number,
            $order->TrxID,
            $order->name,
            $order->email,
            $order->phone,
            $order->address,
            $order->note,
            $order->status,
        ];
    }
}
