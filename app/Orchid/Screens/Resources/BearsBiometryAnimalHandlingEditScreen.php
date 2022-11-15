<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Resources;

use App\Orchid\Layouts\Resources\BearsBiometryAnimalHandlingEditLayout;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\BearsBiometryAnimalHandling;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class BearsBiometryAnimalHandlingEditScreen extends Screen
{
    /**
     * @var BearsBiometryAnimalHandling
     */
    public $item;

    /**
     * Query data.
     *
     * @param BearsBiometryAnimalHandling $item
     *
     * @return array
     */
    public function query(BearsBiometryAnimalHandling $item): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Bears Biometry Animal Handlings';
    }


    /**
     * @return iterable|null
     */
    public function permission(): ?iterable
    {
        return [];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(__('Create Bears Biometry Animal Handling'))
                ->icon('check')
                ->method('save'),
        ];
    }

	/**
     * @param string|null $a
     *
     * @return string[]
     */
    public function asyncRemovalTypeChange(string $place_type_list_id = '')
    {
        return [
            'place_type_list_id' => $place_type_list_id,
            'removalTypeChange' => $place_type_list_id,
        ];
    }

    /**
     * Views.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
			BearsBiometryAnimalHandlingEditLayout::class,
        ];
    }

    /**
     * @param Request $request
     * @param BearsBiometryAnimalHandling    $item
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save(Request $request, BearsBiometryAnimalHandling $item)
    {
        $request->validate([
            'bearsbiometryanimalhandling.slug' => [
                'required',
                Rule::unique(BearsBiometryAnimalHandling::class, 'slug')->ignore($item),
            ],
        ]);

        $item->fill($request->get('bearsbiometryanimalhandling'));

        $item->save();

        Toast::info(__('Data was saved'));

        return redirect()->route('platform.resources.bearsbiometryanimalhandlings');
    }

    /**
     * @param BearsBiometryAnimalHandling $item
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(BearsBiometryAnimalHandling $item)
    {
        $item->delete();

        Toast::info(__('Data was removed'));

        return redirect()->route('platform.resources.bearsbiometryanimalhandlings');
    }
}
