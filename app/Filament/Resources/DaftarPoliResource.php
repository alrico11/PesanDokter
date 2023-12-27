<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarPoliResource\Pages;
use App\Filament\Resources\DaftarPoliResource\RelationManagers;
use App\Models\DaftarPoli;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarPoliResource extends Resource
{
    protected static ?string $model = DaftarPoli::class;

    protected static ?string $navigationIcon = 'bi-heart-pulse';

    protected static ?string $navigationLabel = 'Memeriksa Pasien';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pasien.nama'),
                TextColumn::make('keluhan'),
                TextColumn::make('no_antrian'),
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
            'index' => Pages\ListDaftarPolis::route('/'),
            'create' => Pages\CreateDaftarPoli::route('/create'),
            'edit' => Pages\EditDaftarPoli::route('/{record}/edit'),
        ];
    }
}
