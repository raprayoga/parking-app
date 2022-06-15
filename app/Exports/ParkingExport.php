<?php

namespace App\Exports;

use App\Models\Parking;
use Maatwebsite\Excel\Concerns\FromCollection;

class ParkingExport implements FromCollection
{
    private $dateStart;
    private $dateEnd;

    public function __construct($dateStart, $dateEnd)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Parking::where('created_at', '<', $this->dateEnd)->where('created_at', '>', $this->dateStart)->get();
    }
}
