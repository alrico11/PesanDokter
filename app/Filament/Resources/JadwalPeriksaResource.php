<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPeriksaResource\Pages;
use App\Filament\Resources\JadwalPeriksaResource\RelationManagers;
use App\Models\Dokter;
use App\Models\JadwalPeriksa;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPeriksaResource extends Resource
{
    protected static ?string $model = JadwalPeriksa::class;

    protected static ?string $navigationIcon = 'bi-calendar-check';
    protected static ?string $navigationLabel = 'Jadwal Periksa';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        $dokter = Dokter::pluck('nama', 'id')->toArray();
        return $form
            ->schema([
                Select::make('hari')
                ->label('Hari')
                ->options([
                    'senin' => 'Senin',
                    'selasa' => 'Selasa',
                    'rabu' => 'Rabu',
                    'kamis' => 'Kamis',
                    'jumat' => 'Jumat',
                    'sabtu' => 'Sabtu',
                    'minggu' => 'Minggu',
                ])
                ->required(),
                TimePicker::make('jam_mulai')
                    ->label('Jam Mulai')
                    ->required(),
                TimePicker::make('jam_selesai')
                    ->label('Jam Selesai')
                    ->required(),
                ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dokter.nama'),
                TextColumn::make('hari'),
                TextColumn::make('jam_mulai'),
                TextColumn::make('jam_selesai'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListJadwalPeriksas::route('/'),
            'create' => Pages\CreateJadwalPeriksa::route('/create'),
            'edit' => Pages\EditJadwalPeriksa::route('/{record}/edit'),
        ];
    }
}
