<?php

namespace App\Orchid\Resources;

use App\Orchid\BaseResources\BaseList;

class CollarList extends BaseList
{
	protected static $moduleList = ['mortbiom'];

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\CollarList::class;

	/**
	 * Get the displayable label of the resource.
	 *
	 * @return string
	 */
	public static function label(): string
	{
		return __('Presence of bear collar');
	}

	/**
	 * Get the displayable singular label of the resource.
	 *
	 * @return string
	 */
	public static function singularLabel(): string
	{
		return __('Presence of bear collar');
	}
}
