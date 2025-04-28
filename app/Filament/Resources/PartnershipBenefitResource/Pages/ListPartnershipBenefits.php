<?php

namespace App\Filament\Resources\PartnershipBenefitResource\Pages;

use App\Filament\Resources\PartnershipBenefitResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPartnershipBenefits extends ListRecords
{
    protected static string $resource = PartnershipBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
