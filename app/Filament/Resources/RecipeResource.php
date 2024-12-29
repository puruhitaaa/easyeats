<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecipeResource\Pages;
use App\Models\Recipe;
use App\Models\Ingredient;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Blade;

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
                FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('recipes')
                ->label('Upload Image'),
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
                ImageColumn::make('image')
                ->label('Image')
                ->circular()
                ->size(40),
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
            ->headerActions([
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->action(function () {
                        $recipes = Recipe::with(['recipe_ingredients.ingredient'])
                            ->orderBy('name')
                            ->get();

                        return response()->streamDownload(function () use ($recipes) {
                            echo Pdf::loadHtml(
                                Blade::render('recipes.pdf', ['recipes' => $recipes])
                            )->stream();
                        }, 'recipes.pdf');
                    })
                    ->openUrlInNewTab(),
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
