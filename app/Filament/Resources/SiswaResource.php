<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Siswa;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SiswaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SiswaResource\RelationManagers;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationGroup = 'Manajemen Pengguna';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('nisn')
                    ->required(),
                Forms\Components\TextInput::make('nipd')
                    ->required(),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required(),
                Forms\Components\TextInput::make('golongan_darah')
                    ->required(),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'id')
                    ->required(),
                Forms\Components\TextInput::make('alamat')
                    ->required(),
                Forms\Components\Select::make('negara_id')
                    ->relationship('negara', 'id')
                    ->required(),
                Forms\Components\Select::make('provinsi_id')
                    ->relationship('provinsi', 'id')
                    ->required(),
                Forms\Components\Select::make('kabupaten_id')
                    ->relationship('kabupaten', 'id')
                    ->required(),
                Forms\Components\Select::make('kecamatan_id')
                    ->relationship('kecamatan', 'id')
                    ->required(),
                Forms\Components\Select::make('kelurahan_id')
                    ->relationship('kelurahan', 'id')
                    ->required(),
                Forms\Components\Select::make('ekstrakurikuler_id')
                    ->relationship('ekstrakurikuler', 'id')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('foto')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nipd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('negara.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('provinsi.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kabupaten.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kecamatan.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelurahan.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('ekstrakurikuler.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiswas::route('/'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
