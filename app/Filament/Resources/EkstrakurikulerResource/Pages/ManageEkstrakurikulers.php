<?php

namespace App\Filament\Resources\EkstrakurikulerResource\Pages;

use App\Filament\Resources\EkstrakurikulerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageEkstrakurikulers extends ManageRecords
{
    protected static string $resource = EkstrakurikulerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
