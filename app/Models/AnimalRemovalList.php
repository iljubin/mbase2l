<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Casts\LocalizedJsonData;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * Class AnimalRemovalList
 *
 * @property int|null $id
 * @property string|null $title
 * @property string|null $name
 * @property string|null $description
 *
 * @property BearsBiometryAnimalHandling $bears_biometry_animal_handling
 *
 * @package App\Models
 */
class AnimalRemovalList extends Model
{
	protected $table = 'animal_removal_list';

	use AsSource, Filterable, Attachable;
	use SoftDeletes;

	protected $casts = [
		'id' => 'int',
		'name' => LocalizedJsonData::class,
		'description' => LocalizedJsonData::class
	];

	protected $fillable = [
		'title',
		'name',
		'description'
	];

	public function bears_biometry_animal_handling()
	{
		return $this->hasOne(BearsBiometryAnimalHandling::class);
	}
}