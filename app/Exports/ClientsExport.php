<?php

namespace App\Exports;

use App\Client;

//use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ClientsExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings, WithStyles, WithColumnFormatting
{
    public $serial, $from_date, $to_date;

    public function __construct($from_date, $to_date)
    {
        $this->serial = 0;
        $this->from_date = $from_date;
        $this->to_date = $to_date;
    }

    public function query()
    {
        $clients = Client::query()
                            ->whereBetween('conversion_date', [$this->from_date, $this->to_date])
                            ->with(['source', 'person', 'service', 'leadstatus'])
                            ->orderBy('conversion_date');

        return $clients;
    }

    public function map($client): array
    {
        $this->serial++;

        return [
            $this->serial,
            $client->custom_id,
            $client->name,
            $client->company_name,
            $client->conversion_date,
            $client->source->name,
            $client->person->name,
            $client->service->name,
            $client->contact_number,
            $client->email,
            $client->address,
            $client->leadstatus->name,
            $client->comment_1,
            $client->comment_2
        ];
    }

    public function headings(): array
    {
        return [
            'Sl. No.',
            'ID',
            'Client Name',
            'Company Name',
            'Conversion Date',
            'Source',
            'Assigned Person',
            'Service Requirement',
            'Contact Number',
            'Email',
            'Address',
            'Lead Status',
            'Comment-1',
            'Comment-2'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => [
                'bold' => true,
                'italic' => true,
                'size' => 16
            ]],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_YYYYMMDD
        ];
    }
}
