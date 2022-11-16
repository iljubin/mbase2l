<?php

namespace App\Orchid\Layouts;

use App\Models\BearsBiometrySample;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class BearsBiometrySampleListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'bearsBiometrySamples';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
			TD::make('sample_code', 'Code')
				->render(function (BearsBiometrySample $bearsBiometrySample) {
					return Link::make($bearsBiometrySample->sample_code)
					->route('platform.bearsBiometrySample.edit', $bearsBiometrySample);
			}),

			TD::make('sample_tissue', 'Tissue'),

			TD::make('created_at', 'Created'),
			TD::make('updated_at', 'Last edit'),
		];
    }
}
