<?php

namespace App\Filament\Resources\PartnershipBenefitResource\Pages;

use App\Filament\Resources\PartnershipBenefitResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPartnershipBenefit extends EditRecord
{
    protected static string $resource = PartnershipBenefitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
