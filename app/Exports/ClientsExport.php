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
    public $serial;

    public function __construct()
    {
        $this->serial = 0;
    }

    public function query()
    {
        $clients = Client::query()->with(['source', 'person', 'service', 'leadstatus']);

        return $clients;
    }

    public function map($client): array
    {
        $this->serial++;

        return [
            $this->serial,
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
            'D' => NumberFormat::FORMAT_DATE_YYYYMMDD
        ];
    }
}
