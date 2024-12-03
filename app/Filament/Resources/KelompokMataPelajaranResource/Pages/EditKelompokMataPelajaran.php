<?php

namespace App\Filament\Resources\KelompokMataPelajaranResource\Pages;

use App\Filament\Resources\KelompokMataPelajaranResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKelompokMataPelajaran extends EditRecord
{
    protected static string $resource = KelompokMataPelajaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
