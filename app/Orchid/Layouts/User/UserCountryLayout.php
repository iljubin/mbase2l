<?php
declare(strict_types=1);

namespace App\Orchid\Layouts\User;

use App\Models\Group;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Rows;

class UserCountryLayout extends Rows
{
    /**
     * Views.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        $query = Group::where('groups.group_type_id', 1);

        return [
        Select::make('user.country_id.')
            ->fromQuery($query, 'name')
        //                ->multiple()
            ->title(__('Country'))
            ->help('Specify which country this account should belong to'),
        ];
    }
}
