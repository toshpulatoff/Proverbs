<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProverbResource\Pages;
use App\Filament\Resources\ProverbResource\RelationManagers;
use App\Models\CategoryTranslation;
use App\Models\Proverb;
use App\Models\Tag;
use Astrotomic\Translatable\Translatable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProverbResource extends Resource
{
    use Translatable;

    protected static ?string $model = Proverb::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $formComponents = [];

        foreach (config('translatable.locales') as $locale) {
            $formComponents[] = Forms\Components\TextInput::make("{$locale}.content")
                ->label("Content ({$locale})")
                ->required();
        }

        $formComponents[] = Forms\Components\Select::make('category_translations')
            ->multiple()
            ->relationship('categories', 'name')
            ->options(CategoryTranslation::all()->pluck('name', 'category_id'));

        $formComponents[] = Forms\Components\Select::make('tags')
            ->multiple()
            ->relationship('tags', 'name')
            ->options(Tag::all()->pluck('name', 'id'));

        return $form->schema($formComponents);

        // return $form
        //     ->schema([
        //         Forms\Components\TextArea::make('content'),
        //         Select::make('category_translations')
        //         ->multiple()
        //         ->relationship('categories', 'name')
        //         ->options(CategoryTranslation::all()->pluck('name', 'category_id')), 
        //         Select::make('tags')
        //         ->multiple()
        //         ->relationship('tags', 'name')
        //         ->options(Tag::all()->pluck('name', 'id')),
        //     ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('proverb_translations.content'),
                Tables\Columns\TextColumn::make('categories.name'),
                Tables\Columns\TextColumn::make('tags.name'),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListProverbs::route('/'),
            'create' => Pages\CreateProverb::route('/create'),
            'edit' => Pages\EditProverb::route('/{record}/edit'),
        ];
    }
}
