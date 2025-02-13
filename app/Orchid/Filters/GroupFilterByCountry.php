<?php

namespace App\Orchid\Filters;

use App\Models\Group;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;

class GroupFilterByCountry extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
		return '';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return [];
    }

    /**
     * Apply to a given Eloquent query builder.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
		if(auth()->user()->country == null){
			return Group::query()->select(['groups.id', 'groups.slug', 'groups.name', 'groups.group_type_id']);
		}

		$query = Group::query()
			->join('groups_group_types_countries', function ($join) {
				$join->on('groups_group_types_countries.group_id', '=', 'groups.id')
					->where('groups.group_type_id', '<>', 1);
			})
			->join('group_types_countries', function ($join) {
				$join->on('group_types_countries.id', '=', 'groups_group_types_countries.group_type_country_id')
					->where('group_types_countries.country_id', '=', auth()->user()->country->id);
			})->select(['groups.id', 'groups.slug', 'groups.name', 'groups.group_type_id']);

//		if($this->request->get('slug') != null)
//			$query = $query->where('groups.slug', 'LIKE', '%'.$this->request->get('slug').'%');
//		if($this->request->get('name') != null)
//			$query->orWhere('groups.name', 'LIKE', '%'.$this->request->get('name').'%');

		return $query
			->orderBy('groups.id')
			->orderBy('groups.group_type_id');

    }

    /**
     * Get the display fields.
     *
     * @return Field[]
     */
    public function display(): iterable
    {
		return [
			Input::make('???')
		];
	}
}
