<?php

namespace App\Filament\Resources\DaftarPeriksaResource\Pages;

use App\Filament\Resources\DaftarPeriksaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDaftarPeriksa extends EditRecord
{
    protected static string $resource = DaftarPeriksaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
