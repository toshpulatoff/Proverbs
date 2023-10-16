<?php

namespace App\Filament\Resources\ProverbResource\Pages;

use App\Filament\Resources\ProverbResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewProverb extends ViewRecord
{
    protected static string $resource = ProverbResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $record = $this->record;
        $translations = $record->translations;

        foreach ($translations as $translation) {
            $locale = $translation->locale;
            $data["$locale"]['content'] = $translation->content;
        }

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
