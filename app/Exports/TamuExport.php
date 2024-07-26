<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TamuExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        $users = User::all();
         $mappedUsers = $users->map(function($user, $index) {
            return [
                'No' => $index + 1,
                'Nama' => $user->name,
                'Email' => $user->email,
                'Nomor Telepon' => $user->no_telp,
                'Jabatan' => $user->position,
                'Perusahaan' => $user->perusahaan,
                'Kehadiran' => $user->kehadiran,
                'Konfirmasi Kehadiran' => $user->konfirmasi_kehadiran ?? "belum dikonfirmasi",
                'Pengganti' => $user->subtitute ?? '-'
            ];
        });

        return $mappedUsers;
    }

    public function headings(): array
    {
        return [
            'No', 'Nama', 'Email', 'Nomor Telepon', 'Jabatan', 'Perusahaan', 'Kehadiran', 'Konfirmasi Kehadiran', 'Pengganti'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Set header style
        $sheet->getStyle('A1:I1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => '000000'],
            ],
        ]);

        // Auto size columns
        foreach (range('A', 'I') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set alignment and padding
        $sheet->getDefaultRowDimension()->setRowHeight(20);
        $sheet->getStyle('A1:I' . $sheet->getHighestRow())->getAlignment()->setVertical('center')->setHorizontal('center');

        return [
            // Styling for all other rows
            2 => ['font' => ['bold' => false]],
        ];
    }
}
