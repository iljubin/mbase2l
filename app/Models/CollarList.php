<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Base\BaseList;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * Class CollarList
 *
 * @property int|null $id
 * @property string|null $title
 * @property string|null $name
 * @property string|null $description
 *
 * @package App\Models
 */
class CollarList extends BaseList
{
	use AsSource, Filterable;

	protected $table = 'collar_list';

	public function bearsBiometryData()
	{
		return $this->hasOne(BearsBiometryData::class);
	}

	public function isDeletable(): bool {
		return !$this->bearsBiometryData;
	}
}
