<?php

namespace App\Orchid\Resources;

use App\Orchid\BaseResources\BaseList;
use Orchid\Crud\Resource;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;

class LocationCoordinateTypeList extends BaseList
{
	protected static $moduleList = ['mortbiom'];

	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = \App\Models\LocationCoordinateTypeList::class;

	/**
	 * Get the displayable label of the resource.
	 *
	 * @return string
	 */
	public static function label(): string
	{
		return __('Location Coordinate Type');
	}

	/**
	 * Get the displayable singular label of the resource.
	 *
	 * @return string
	 */
	public static function singularLabel(): string
	{
		return __('Location Coordinate Type');
	}
}