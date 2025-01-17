<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use App\Models\section;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSection extends EditRecord
{
    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(section $record) {
                    if($record->thumb){
                        storage::disk('public')->delete($record->thumbnail);
                    }

                }
            ),
        ];
    }
}
