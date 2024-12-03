<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasResource\Pages;
use App\Models\Kelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->required()
                    ->native(false)
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')
                            ->required(),
                        Forms\Components\TextInput::make('nik'),
                        Forms\Components\TextInput::make('nip'),
                        Forms\Components\TextInput::make('nuptk'),
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->required(),
                        Forms\Components\TextInput::make('jenis_kelamin')
                            ->required(),
                        Forms\Components\TextInput::make('alamat')
                            ->required(),
                        Forms\Components\TextInput::make('telepon')
                            ->tel(),
                        Forms\Components\TextInput::make('foto'),
                        Forms\Components\TextInput::make('status')
                            ->required(),
                    ]),
                Forms\Components\Select::make('tingkat_id')
                    ->relationship('tingkat', 'nama')
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')
                            ->required(),
                        Forms\Components\Select::make('jenjang')
                            ->required()
                            ->native(false)
                            ->options([
                                'SD/MI',
                                'SMP/MTs',
                                'SMA/SMK/MA',
                            ]),
                    ]),
                Forms\Components\Select::make('tahun_pelajaran_id')
                    ->relationship('tahunPelajaran', 'nama')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tingkat.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahunPelajaran.nama')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
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
