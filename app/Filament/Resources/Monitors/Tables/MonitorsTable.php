<?php

namespace App\Filament\Resources\Monitors\Tables;

use App\Filament\Resources\Monitors\Pages\ViewMonitor;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\PaginationMode;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class MonitorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->paginationMode(PaginationMode::Simple)
            ->extremePaginationLinks()
            ->paginated(fn() => Auth::user()->monitors()->count() > 10)
            ->paginationPageOptions([10, 'all'])
            ->emptyStateIcon(Heroicon::OutlinedCalendarDays)
            ->emptyStateDescription('Create your first monitor in seconds!')
            ->emptyStateActions([
                CreateAction::make()
                    ->slideOver(),
            ])
            ->columns([
                TextColumn::make('url')
                    ->label('Website'),
            ])
            ->filters([
                //
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}
