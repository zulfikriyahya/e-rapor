<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Ekstrakurikuler;
use Filament\Resources\Resource;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\EkstrakurikulerResource\Pages;
use App\Filament\Resources\EkstrakurikulerResource\RelationManagers;

class EkstrakurikulerResource extends Resource
{
    protected static ?string $model = Ekstrakurikuler::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->native(false)
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')
                            ->required(),
                        Forms\Components\TextInput::make('nik'),
                        Forms\Components\TextInput::make('nip'),
                        Forms\Components\TextInput::make('nuptk'),
                        Forms\Components\TextInput::make('tempat_lahir')
                            ->required(),
                        Forms\Components\DatePicker::make('tanggal_lahir')
                            ->required()
                            ->maxDate(now()),
                        Forms\Components\Select::make('jenis_kelamin')
                            ->required()
                            ->options([
                                'Laki-laki',
                                'Perempuan',
                            ]),
                        Forms\Components\TextInput::make('alamat')
                            ->required(),
                        Forms\Components\TextInput::make('telepon')
                            ->tel(),
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                null,
                                '1:1',
                                '4:3',
                                '3:4',
                            ])
                            ->directory(url('/images/foto-guru/'))
                            ->fetchFileInformation(false)
                            ->minSize(10)
                            ->maxSize(1024),
                        Forms\Components\Select::make('status')
                            ->required()
                            ->options([
                                'Aktif',
                                'Nonaktif',
                            ]),
                    ]),
                Forms\Components\Select::make('tahun_pelajaran_id')
                    ->relationship('tahunPelajaran', 'nama')
                    ->native(false)
                    ->required()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama')
                            ->placeholder('20**/20**')
                            ->required(),
                        Forms\Components\Select::make('semester')
                            ->required()
                            ->options([
                                'Ganjil',
                                'Genap',
                            ])
                            ->native(false),
                        Forms\Components\TextInput::make('tempat_pembagian_rapor')
                            ->required()
                            ->placeholder('Cth. Pandeglang'),
                        Forms\Components\DatePicker::make('tanggal_pembagian_rapor')
                            ->required()
                            ->minDate(now()),
                    ]),
                Forms\Components\Select::make('semester')
                    ->required()
                    ->options([
                        'Ganjil',
                        'Genap',
                    ])
                    ->native(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahunPelajaran.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('semester')
                    ->searchable()
                    ->badge(),
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
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                ])
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
            'index' => Pages\ListEkstrakurikulers::route('/'),
            'create' => Pages\CreateEkstrakurikuler::route('/create'),
            'edit' => Pages\EditEkstrakurikuler::route('/{record}/edit'),
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
