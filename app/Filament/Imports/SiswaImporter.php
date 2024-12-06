<?php

namespace App\Filament\Imports;

use App\Models\Siswa;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class SiswaImporter extends Importer
{
    protected static ?string $model = Siswa::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('nama')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nik'),
            ImportColumn::make('nisn'),
            ImportColumn::make('nipd'),
            ImportColumn::make('tempat_lahir')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('tanggal_lahir')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('jenis_kelamin')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('agama')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('golongan_darah')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('status_dalam_keluarga')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('anak_ke')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('alamat_siswa')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('telepon_siswa'),
            ImportColumn::make('sekolah_asal'),
            ImportColumn::make('diterima_dikelas')
                ->requiredMapping()
                ->numeric()
                ->rules(['required', 'integer']),
            ImportColumn::make('tanggal_diterima')
                ->requiredMapping()
                ->rules(['required', 'date']),
            ImportColumn::make('nama_ayah')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('pekerjaan_ayah')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nama_ibu')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('pekerjaan_ibu')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('alamat_orang_tua')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('telepon_orang_tua')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('nama_wali'),
            ImportColumn::make('pekerjaan_wali'),
            ImportColumn::make('alamat_wali'),
            ImportColumn::make('telepon_wali'),
            ImportColumn::make('status')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('foto'),
        ];
    }

    public function resolveRecord(): ?Siswa
    {
        // return Siswa::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Siswa;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your siswa import has completed and '.number_format($import->successful_rows).' '.str('row')->plural($import->successful_rows).' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' '.number_format($failedRowsCount).' '.str('row')->plural($failedRowsCount).' failed to import.';
        }

        return $body;
    }
}
