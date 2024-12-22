<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Models\Recipe;
use App\Models\Ingredient;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class RecipeResource extends Resource
{
    protected static ?string $model = Recipe::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\Textarea::make('instructions')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\TextInput::make('cooking_time')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('servings')
                    ->required()
                    ->numeric(),
                Forms\Components\Section::make('Ingredients')
                ->schema([
                    Forms\Components\Repeater::make('recipe_ingredients')
                        ->label('Ingredients')
                        ->relationship()
                        ->schema([
                            Forms\Components\Select::make('ingredient_id')
                                ->label('Ingredient')
                                ->options(Ingredient::query()->pluck('name', 'id'))
                                ->required()
                                ->searchable(),
                            Forms\Components\TextInput::make('quantity')
                                ->required()
                                ->numeric()
                                ->default(1)
                                ->minValue(0.1)
                                ->step(0.1),
                        ])
                        ->columns(2)
                        ->defaultItems(1)
                        ->reorderable(false)
                        ->addActionLabel('Add Ingredient')
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cooking_time')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servings')
                ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('name');
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Management';
    }

    public static function getModelLabel(): string
    {
        return 'Recipe';
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
            'index' => Pages\ListRecipes::route('/'),
            'create' => Pages\CreateRecipe::route('/create'),
            'edit' => Pages\EditRecipe::route('/{record}/edit'),
        ];
    }
}
