<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\news;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Facades\Filament;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;





class NewsResource extends Resource
{
    protected static ?string $model = news::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'الأخبار';


    public static function form(Form $form): Form
    {
        return $form
        
            ->schema([  
                Forms\Components\TextInput::make('title')
                     ->translateLabel() 
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('user_id')
                    ->translateLabel()
                     ->default(
                        Filament::auth()->id()
                    )->readOnly()
                        ->hidden()
                    ->disabled(),

                Forms\Components\MarkdownEditor::make('content')
                    ->translateLabel() 
                    ->fileAttachmentsDirectory('content')
                    ->disableToolbarButtons([
                      'codeBlock'
                    ])
                    ->columnSpan(2),
                Forms\Components\FileUpload::make('images')
                    ->translateLabel() 
                    ->multiple()
                    ->reorderable()
                    ->directory('news')
                    ->maxFiles(40),
               

            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('title')
                    ->translateLabel() 
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('content')
                    ->translateLabel()
                    ->searchable()
                    ->limit(20)
                    ->sortable(),
                Tables\Columns\ImageColumn::make('images')
                    ->translateLabel()
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->defaultImageUrl(url('images/placeholder.png'))
                    ->translateLabel()
                    ->label('Images'),
                Tables\Columns\TextColumn::make('user.name')
                    ->translateLabel()
                    ->label('User')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->translateLabel()
                    ->dateTime('Y-m-d')
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->translateLabel()
                    ->dateTime('Y-m-d')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                 Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                         ->translateLabel(),
                        Forms\Components\DatePicker::make('created_until')
                         ->translateLabel()
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'] ?? null, fn (Builder $query, $date) => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'] ?? null, fn (Builder $query, $date) => $query->whereDate('created_at', '<=', $date));
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['created_from'] ?? null) {
                            $indicators[] = 'Created from ' . \Carbon\Carbon::parse($data['created_from'])->toFormattedDateString();
                        }

                        if ($data['created_until'] ?? null) {
                            $indicators[] = 'Created until ' . \Carbon\Carbon::parse($data['created_until'])->toFormattedDateString();
                        }

                        return $indicators;
                    })
                     ->translateLabel(),
            ])
            ->actions([
                // ActionGroup::make([
                    ViewAction::make('view')
                        ->translateLabel()
                        ->color('gray')
                        ->icon('heroicon-o-eye'),
                    DeleteAction::make()
                        ->icon('heroicon-o-trash'),
                    EditAction::make('edit')
                        ->icon('heroicon-o-pencil')
                        ->color('primary')
                // ])


            ])
                
            
            ->bulkActions([
            BulkActionGroup::make([
                BulkAction::make('delete')
                    ->requiresConfirmation()
                    ->action(fn (Collection $records) => $records->each->delete()),
              
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
            'view' => Pages\ViewNews::route('/{record}'),
        ];
    }

    public static function getModelLabel() : string
    {
        return 'News';
    }

    
    
}