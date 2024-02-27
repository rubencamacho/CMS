<?php
// app/Filament/Resources/CustomMediaResource.php

namespace App\Filament\Resources;

use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Tables\Table;
use Awcodes\Curator\Resources\MediaResource as CuratorMediaResource;
use Filament\Tables\Columns\TextColumn;
use Awcodes\Curator\Components\Forms\CuratorEditor;
use Awcodes\Curator\Components\Forms\Uploader;
use Awcodes\Curator\CuratorPlugin;
use Exception;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;


class CustomMediaResource extends CuratorMediaResource
{

    public static function getDefaultTableColumns(): array
    {
        return [
            CuratorColumn::make('url')
                ->label(trans('curator::tables.columns.url'))
                ->size(40),
            Tables\Columns\TextColumn::make('name')
                ->label(trans('curator::tables.columns.name'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('ext')
                ->label(trans('curator::tables.columns.ext'))
                ->sortable(),
            Tables\Columns\IconColumn::make('disk')
                ->label(trans('curator::tables.columns.disk'))
                ->icons([
                    'heroicon-o-server',
                    'heroicon-o-cloud' => fn ($state): bool => in_array($state, config('curator.cloud_disks')),
                ])
                ->colors([
                    'gray',
                    'success' => fn ($state): bool => in_array($state, config('curator.cloud_disks')),
                ]),
            Tables\Columns\TextColumn::make('directory')
                ->label(trans('curator::tables.columns.directory'))
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label(trans('curator::tables.columns.created_at'))
                ->date('d/m/Y H:i:s')
                ->sortable(),
        ];
    }

    // Asegúrate de sobrescribir cualquier otro método necesario aquí.
}
