<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ApplicationsExport implements FromArray, WithHeadings, WithTitle, WithEvents
{
    protected $dataList;
    protected $labelList;

    public function __construct(array $dataList, array $labelList)
    {
        $this->dataList = $dataList;
        $this->labelList = $labelList;
    }

    public function array(): array
    {
        $exportData[] = $this->labelList; // İlk satır headings olarak eklenir

        foreach ($this->dataList as $data) {
            $row = [];
            foreach ($data as $keydata=>$valueData){
                array_push($row,reset($valueData));
            }
            $exportData[] = $row; // Her bir veri satırı eklenir
        }

        return $exportData;
    }

    public function title(): string
    {
        return 'Başvuru Listesi';
    }

    public function headings(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            // handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
                $row_count = count($this->dataList)+1;
                // Başlık (heading) satırını sarı arka planlı yapalım
                $event->sheet->getStyle('1')->getFont()->setBold(true);
                $event->sheet->getStyle('1')->getFill()->setFillType(Fill::FILL_SOLID);
                $event->sheet->getStyle('1')->getFill()->getStartColor()->setARGB('FFFF00');

                // Tablo sınırlarını siyah yapalım
                $event->sheet->getDelegate()->getStyle('A1:AS' . $row_count)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle('A1:AS' . $row_count)->getBorders()->getAllBorders()->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK));

            },
        ];
    }
}
