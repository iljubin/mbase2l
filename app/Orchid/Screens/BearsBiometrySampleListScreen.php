<?php

namespace App\Orchid\Screens;

use App\Models\BearsBiometrySample;
use App\Orchid\Layouts\BearsBiometrySampleListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class BearsBiometrySampleListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
			'bearsBiometrySamples' => BearsBiometrySample::paginate()
		];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'BearsBiometrySampleListScreen';
    }

	/**
     * The description is displayed on the user's screen under the heading
     */
    public function description(): ?string
    {
        return "All Bears Biometry Samples";
    }


    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
			Link::make('Create new')
                ->icon('pencil')
                ->route('platform.bearsBiometrySample.edit')
		];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
			BearsBiometrySampleListLayout::class
		];
    }
}
