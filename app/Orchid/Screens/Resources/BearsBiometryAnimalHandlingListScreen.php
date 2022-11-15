<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Resources;

use App\Orchid\Layouts\Resources\BearsBiometryAnimalHandlingListLayout;
use App\Models\BearsBiometryAnimalHandling;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class BearsBiometryAnimalHandlingListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'bearsbiometryanimalhandling' => BearsBiometryAnimalHandling::filters()->defaultSort('id', 'desc')->paginate(),
        ];
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
            Link::make(__('Create Bears Biometry Animal Handling'))
                ->icon('plus')
                ->href(route('platform.resources.bearsbiometryanimalhandlings.create')),
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
            BearsBiometryAnimalHandlingListLayout::class,
        ];
    }
}
