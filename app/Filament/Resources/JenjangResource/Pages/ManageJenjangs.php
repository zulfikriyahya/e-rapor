<?php

namespace App\Filament\Resources\JenjangResource\Pages;

use App\Filament\Resources\JenjangResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageJenjangs extends ManageRecords
{
    protected static string $resource = JenjangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
