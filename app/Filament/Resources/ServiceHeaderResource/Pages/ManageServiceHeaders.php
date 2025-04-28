<?php

namespace App\Filament\Resources\ServiceHeaderResource\Pages;

use App\Filament\Resources\ServiceHeaderResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageServiceHeaders extends ManageRecords
{
    protected static string $resource = ServiceHeaderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
