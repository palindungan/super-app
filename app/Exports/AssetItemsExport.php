<?php

namespace App\Exports;

use App\Models\AssetItem;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AssetItemsExport
{
    public function download(): StreamedResponse
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Asset Items');

        // ── Headers ──────────────────────────────────────────────
        $headers = ['No', 'Code', 'Name', 'Category', 'Status'];
        foreach ($headers as $col => $heading) {
            $cell = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col + 1) . '1';
            $sheet->setCellValue($cell, $heading);
        }

        // Header style
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold'  => true,
                'size'  => 11,
                'color' => ['argb' => 'FFFFFFFF'],
            ],
            'fill' => [
                'fillType'   => Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF2E75B6'],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical'   => Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'       => ['argb' => 'FFD9D9D9'],
                ],
            ],
        ]);

        $sheet->getRowDimension(1)->setRowHeight(20);

        // ── Data ─────────────────────────────────────────────────
        $items = AssetItem::with(['assetCategory', 'assetStatus'])
            ->orderBy('id')
            ->get();

        foreach ($items as $index => $item) {
            $row = $index + 2;

            $sheet->setCellValue("A{$row}", $index + 1);
            $sheet->setCellValue("B{$row}", $item->code ?? '-');
            $sheet->setCellValue("C{$row}", $item->name ?? '-');
            $sheet->setCellValue("D{$row}", $item->assetCategory?->name ?? '-');
            $sheet->setCellValue("E{$row}", $item->assetStatus?->name ?? '-');

            // Zebra striping
            $fillColor = ($index % 2 === 0) ? 'FFEAF3FB' : 'FFFFFFFF';
            $sheet->getStyle("A{$row}:E{$row}")->applyFromArray([
                'fill' => [
                    'fillType'   => Fill::FILL_SOLID,
                    'startColor' => ['argb' => $fillColor],
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color'       => ['argb' => 'FFD9D9D9'],
                    ],
                ],
                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                ],
            ]);

            // Center "No" column
            $sheet->getStyle("A{$row}")->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        // ── Column widths ─────────────────────────────────────────
        $sheet->getColumnDimension('A')->setWidth(6);   // No
        $sheet->getColumnDimension('B')->setWidth(18);  // Code
        $sheet->getColumnDimension('C')->setWidth(30);  // Name
        $sheet->getColumnDimension('D')->setWidth(22);  // Category
        $sheet->getColumnDimension('E')->setWidth(20);  // Status

        // ── Stream ────────────────────────────────────────────────
        $writer   = new Xlsx($spreadsheet);
        $filename = 'asset_items_' . now()->format('Ymd_His') . '.xlsx';

        return new StreamedResponse(function () use ($writer) {
            $writer->save('php://output');
        }, 200, [
            'Content-Type'        => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            'Cache-Control'       => 'max-age=0',
        ]);
    }
}
