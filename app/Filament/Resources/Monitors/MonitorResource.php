<?php

namespace App\Filament\Resources\Monitors;

use App\Filament\Resources\Monitors\Pages\ListMonitors;
use App\Filament\Resources\Monitors\Pages\ViewMonitor;
use App\Filament\Resources\Monitors\Schemas\MonitorForm;
use App\Filament\Resources\Monitors\Schemas\MonitorInfolist;
use App\Filament\Resources\Monitors\Tables\MonitorsTable;
use App\Models\Monitor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MonitorResource extends Resource
{
    protected static ?string $model = Monitor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    public static function form(Schema $schema): Schema
    {
        return MonitorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return MonitorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MonitorsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMonitors::route('/'),
            'view' => ViewMonitor::route('/{record}'),
        ];
    }
}
