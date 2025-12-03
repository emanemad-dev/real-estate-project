<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Settings';
    protected static ?string $pluralModelLabel = 'Settings';
    protected static ?string $modelLabel = 'Setting';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('header_title')
                    ->label('Header Title')
                    ->required(),

                Textarea::make('header_description')
                    ->label('Header Description')
                    ->required(),

                FileUpload::make('header_image')
                    ->label('Header Image')
                    ->image()
                    ->disk('public'),

                TextInput::make('about_title')
                    ->label('About Title')
                    ->required(),

                Textarea::make('about_description')
                    ->label('About Description')
                    ->required(),

                FileUpload::make('about_image_1')
                    ->label('About Image 1')
                    ->image()
                    ->disk('public'),

                FileUpload::make('about_image_2')
                    ->label('About Image 2')
                    ->image()
                    ->disk('public'),

                TextInput::make('contact_address')
                    ->label('Contact Address')
                    ->required(),

                TextInput::make('contact_email')
                    ->label('Contact Email')
                    ->email()
                    ->required(),

                TextInput::make('contact_phone')
                    ->label('Contact Phone')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('header_title')->label('Header Title')->searchable(),
                TextColumn::make('about_title')->label('About Title')->searchable(),
                ImageColumn::make('header_image')->label('Header Image')->disk('public')->square(),
                TextColumn::make('about_description')->label('About Description')->limit(50),
                ImageColumn::make('about_image_1')->label('About Image 1')->disk('public')->square(),
                ImageColumn::make('about_image_2')->label('About Image 2')->disk('public')->square(),
                TextColumn::make('contact_address')->label('Address')->searchable(),
                TextColumn::make('contact_email')->label('Email')->searchable(),
                TextColumn::make('contact_phone')->label('Phone')->searchable(),
                TextColumn::make('created_at')->dateTime('Y-m-d H:i'),
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
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
