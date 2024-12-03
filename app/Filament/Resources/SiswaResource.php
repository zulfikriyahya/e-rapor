<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('nik'),
                Forms\Components\TextInput::make('nisn'),
                Forms\Components\TextInput::make('nipd'),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required(),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required(),
                Forms\Components\TextInput::make('agama')
                    ->required(),
                Forms\Components\TextInput::make('golongan_darah')
                    ->required(),
                Forms\Components\TextInput::make('status_dalam_keluarga')
                    ->required(),
                Forms\Components\TextInput::make('anak_ke')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('alamat_siswa')
                    ->required(),
                Forms\Components\TextInput::make('telepon_siswa')
                    ->tel(),
                Forms\Components\TextInput::make('sekolah_asal'),
                Forms\Components\TextInput::make('diterima_dikelas')
                    ->required()
                    ->numeric(),
                Forms\Components\DatePicker::make('tanggal_diterima')
                    ->required(),
                Forms\Components\TextInput::make('nama_ayah')
                    ->required(),
                Forms\Components\TextInput::make('pekerjaan_ayah')
                    ->required(),
                Forms\Components\TextInput::make('nama_ibu')
                    ->required(),
                Forms\Components\TextInput::make('pekerjaan_ibu')
                    ->required(),
                Forms\Components\TextInput::make('alamat_orang_tua')
                    ->required(),
                Forms\Components\TextInput::make('telepon_orang_tua')
                    ->tel()
                    ->required(),
                Forms\Components\TextInput::make('nama_wali'),
                Forms\Components\TextInput::make('pekerjaan_wali'),
                Forms\Components\TextInput::make('alamat_wali'),
                Forms\Components\TextInput::make('telepon_wali')
                    ->tel(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('foto'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nik')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nisn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nipd')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jenis_kelamin')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('golongan_darah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status_dalam_keluarga')
                    ->searchable(),
                Tables\Columns\TextColumn::make('anak_ke')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alamat_siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon_siswa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sekolah_asal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('diterima_dikelas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_diterima')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_ayah')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_ibu')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_orang_tua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon_orang_tua')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pekerjaan_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat_wali')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon_wali')
                    ->searchable(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
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
