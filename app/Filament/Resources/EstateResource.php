<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EstateResource\Pages;
use App\Models\Estate;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EstateResource extends Resource
{
    protected static ?string $model = Estate::class;

    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $navigationLabel = 'Estates';
    protected static ?string $pluralModelLabel = 'Estates';
    protected static ?string $modelLabel = 'Estate';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('name')
                    ->label('Estate Name')
                    ->required(),

                TextInput::make('price')
                    ->numeric()
                    ->label('Price')
                    ->required(),

                Select::make('operation_type')
                    ->label('Operation Type')
                    ->options([
                        'rent' => 'Rent',
                        'sale' => 'Sale',
                    ])
                    ->required(),

                TextInput::make('address')
                    ->label('Address')
                    ->required(),

                TextInput::make('area')
                    ->numeric()
                    ->label('Area (m²)')
                    ->required(),

                TextInput::make('rooms')
                    ->required()
                    ->numeric()
                    ->label('Rooms'),

                TextInput::make('bathrooms')
                    ->required()
                    ->numeric()
                    ->label('Bathrooms'),

                FileUpload::make('images')
                    ->required()
                    ->label('Images')
                    ->multiple()
                    ->image()
                    ->disk('public')
                    ->directory('estates'),

                Toggle::make('is_published')
                    ->label('Published')
                     ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('id')->sortable(),

                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('price')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('operation_type')
                    ->label('Type'),

                TextColumn::make('address')
                    ->limit(20)
                    ->searchable(),

                TextColumn::make('area')
                    ->label('Area'),

                TextColumn::make('rooms')
                    ->label('Rooms'),

                TextColumn::make('bathrooms')
                    ->label('Bathrooms'),

                ImageColumn::make('images.0')
                    ->disk('public')
                    ->label('Image')
                    ->square()
                    ->size(60),


                IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),


                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i'),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEstates::route('/'),
            'create' => Pages\CreateEstate::route('/create'),
            'edit' => Pages\EditEstate::route('/{record}/edit'),
        ];
    }
}
