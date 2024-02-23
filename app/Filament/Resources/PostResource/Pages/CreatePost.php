<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['slug'] = $data['slug'] ?? Str::slug($data['title'], '-');
        return $data;
    }
}
