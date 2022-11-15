<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Resources;

use App\Models\BearsBiometryAnimalHandling;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BearsBiometryAnimalHandlingListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'bearsbiometryanimalhandling';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
			TD::make('id'),

			TD::make('telemetry_uid', "T. UID"),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),
        ];
    }
}
