<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProverbResource\Pages;
use App\Filament\Resources\ProverbResource\RelationManagers;
use App\Models\Proverb;
use App\Models\Category;
use App\Models\Tag;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;

use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;

class ProverbResource extends Resource
{
    protected static ?string $model = Proverb::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {

        $formComponents = [];

        $formComponents[] = Forms\Components\TextArea::make('oz.content')
            ->label('Content (oz)')
            ->required()
            ->live(debounce: '1000')
            ->afterStateUpdated(function (Set $set, ?string $state) {
                $slug = Str::slug($state);
                $set('slug', $slug);
            });


        foreach (config('translatable.locales') as $locale) {
            if ($locale !== 'oz') {
                $formComponents[] = Forms\Components\TextArea::make("{$locale}.content")
                    ->label("Content ({$locale})")
                    ->required();
            }
        }

        $formComponents[] = Forms\Components\TextInput::make('slug');

        $formComponents[] = Forms\Components\Select::make('categories')
            ->multiple()
            ->relationship('categories', 'title')
            ->options(Category::all()->pluck('title', 'id'));

        $formComponents[] = Forms\Components\Select::make('tags')
            ->multiple()
            ->relationship('tags', 'title')
            ->options(Tag::all()->pluck('title', 'id'));

        $formComponents[] = Forms\Components\Toggle::make('status')
            ->required();
        $formComponents[] = Forms\Components\TextInput::make('meta_title')
            ->maxLength(255)
            ->columnSpanFull();
        $formComponents[] = Forms\Components\Textarea::make('meta_description')
            ->maxLength(255)
            ->columnSpanFull();
        $formComponents[] = Forms\Components\TextArea::make('meta_keywords')
            ->maxLength(255)
            ->columnSpanFull();
        $formComponents[] = Forms\Components\TextInput::make('canonical_url')
            ->maxLength(255)
            ->columnSpanFull();

        return $form->schema($formComponents);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('proverb_translations.content')
                    ->listWithLineBreaks()
                    ->bulleted()
                    ->searchable(),
                Tables\Columns\TextColumn::make('categories.title')
                    ->listWithLineBreaks()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tags.title')
                    ->listWithLineBreaks()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'view' => Pages\ViewProverb::route('/{record}'),
            'edit' => Pages\EditProverb::route('/{record}/edit'),
        ];
    }
}
