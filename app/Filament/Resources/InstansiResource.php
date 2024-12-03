<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstansiResource\Pages;
use App\Models\Instansi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstansiResource extends Resource
{
    protected static ?string $model = Instansi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('npsn')
                    ->required(),
                Forms\Components\TextInput::make('nss'),
                Forms\Components\TextInput::make('logo'),
                Forms\Components\TextInput::make('nama_kepala')
                    ->required(),
                Forms\Components\TextInput::make('nip_kepala'),
                Forms\Components\TextInput::make('tte_kepala'),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('alamat')
                    ->required(),
                Forms\Components\TextInput::make('kode_pos')
                    ->required(),
                Forms\Components\TextInput::make('telepon')
                    ->tel(),
                Forms\Components\TextInput::make('email')
                    ->email(),
                Forms\Components\TextInput::make('website'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('npsn')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nss')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kepala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip_kepala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tte_kepala')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kode_pos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telepon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListInstansis::route('/'),
            'create' => Pages\CreateInstansi::route('/create'),
            'edit' => Pages\EditInstansi::route('/{record}/edit'),
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
