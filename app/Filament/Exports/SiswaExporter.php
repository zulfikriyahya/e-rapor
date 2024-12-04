<?php

namespace App\Filament\Exports;

use App\Models\Siswa;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class SiswaExporter extends Exporter
{
    protected static ?string $model = Siswa::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('nama'),
            ExportColumn::make('nik'),
            ExportColumn::make('nisn'),
            ExportColumn::make('nipd'),
            ExportColumn::make('tempat_lahir'),
            ExportColumn::make('tanggal_lahir'),
            ExportColumn::make('jenis_kelamin'),
            ExportColumn::make('agama'),
            ExportColumn::make('golongan_darah'),
            ExportColumn::make('status_dalam_keluarga'),
            ExportColumn::make('anak_ke'),
            ExportColumn::make('alamat_siswa'),
            ExportColumn::make('telepon_siswa'),
            ExportColumn::make('sekolah_asal'),
            ExportColumn::make('diterima_dikelas'),
            ExportColumn::make('tanggal_diterima'),
            ExportColumn::make('nama_ayah'),
            ExportColumn::make('pekerjaan_ayah'),
            ExportColumn::make('nama_ibu'),
            ExportColumn::make('pekerjaan_ibu'),
            ExportColumn::make('alamat_orang_tua'),
            ExportColumn::make('telepon_orang_tua'),
            ExportColumn::make('nama_wali'),
            ExportColumn::make('pekerjaan_wali'),
            ExportColumn::make('alamat_wali'),
            ExportColumn::make('telepon_wali'),
            ExportColumn::make('status'),
            ExportColumn::make('foto'),
            ExportColumn::make('deleted_at'),
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your siswa export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
