<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Facades\Filament;





class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-video-camera';
        protected static ?string $navigationLabel = 'الفيديوهات';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Forms\Components\TextInput::make('title')
                     ->translateLabel() 
                    ->required()
                    ->maxLength(255),
                    Forms\Components\TextInput::make('url')
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
                Tables\Columns\TextInputColumn::make('url')
                     ->translateLabel() 
                    ->searchable()
                    ->sortable(),
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
                 ViewAction::make('view')
                    ->translateLabel()
                    ->color('gray')
                    ->icon('heroicon-o-eye'),
                DeleteAction::make()
                    ->icon('heroicon-o-trash'),
                EditAction::make('edit')
                    ->icon('heroicon-o-pencil')
                    ->color('primary')
                
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListVideos::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'view' => Pages\ViewVideo::route('/{record}'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }

     public static function getModelLabel() : string
    {
        return 'Video';
    }

}