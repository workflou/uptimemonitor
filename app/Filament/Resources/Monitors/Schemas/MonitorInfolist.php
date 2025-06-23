<?php

namespace App\Filament\Resources\Monitors\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class MonitorInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('url')
                    ->hiddenLabel(),
            ]);
    }
}
