<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeriksaResource\Pages;
use App\Filament\Resources\PeriksaResource\RelationManagers;
use App\Models\Periksa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriksaResource extends Resource
{
    protected static ?string $model = Periksa::class;

    protected static ?string $navigationIcon = 'bi-clock-history';
    protected static ?string $navigationLabel = 'Riwayat Pasien';
    protected static ?int $navigationSort = 3;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPeriksas::route('/'),
            'create' => Pages\CreatePeriksa::route('/create'),
            'edit' => Pages\EditPeriksa::route('/{record}/edit'),
        ];
    }
}
