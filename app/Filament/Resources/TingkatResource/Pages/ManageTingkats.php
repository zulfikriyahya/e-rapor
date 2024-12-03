<?php

namespace App\Filament\Resources\TingkatResource\Pages;

use App\Filament\Resources\TingkatResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTingkats extends ManageRecords
{
    protected static string $resource = TingkatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
