<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use App\Models\Category;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('product_code')
                ->required()
                ->unique(ignoreRecord: true),
            Forms\Components\TextInput::make('product_name')
                ->required()
                ->maxLength(255),
            Forms\Components\Select::make('category_id')
                ->label('Kategori')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\TextInput::make('stock')
                ->numeric()
                ->minValue(0)
                ->required(),
            Forms\Components\TextInput::make('price')
                ->numeric()
                ->minValue(0)
                ->required(),
            Forms\Components\Textarea::make('description'),
        ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('product_code')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('product_name')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('category.name')->label('Kategori')->sortable()->searchable(),
            Tables\Columns\TextColumn::make('stock')->sortable(),
            Tables\Columns\TextColumn::make('price')
                ->sortable()
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 2, ',', '.')),
        ])
        ->filters([
            SelectFilter::make('category_id')
                ->label('Kategori')
                ->options(Category::all()->pluck('name', 'id')->toArray()),
            Filter::make('low_stock')
                ->label('Stok Kurang dari 10')
                ->query(fn (Builder $query): Builder => $query->where('stock', '<', 10)),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
