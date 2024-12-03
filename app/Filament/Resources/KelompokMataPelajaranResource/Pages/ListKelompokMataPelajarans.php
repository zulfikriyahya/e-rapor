<?php

namespace App\Filament\Resources\KelompokMataPelajaranResource\Pages;

use App\Filament\Resources\KelompokMataPelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKelompokMataPelajarans extends ListRecords
{
    protected static string $resource = KelompokMataPelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
