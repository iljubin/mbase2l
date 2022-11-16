<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
/**
 * Class BearsBiometrySample
 *
 * @property int|null $id
 * @property int|null $bears_biometry_animal_handling_id
 * @property string|null $sample_code
 * @property string|null $sample_tissue
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property BearsBiometryAnimalHandling|null $bears_biometry_animal_handling
 *
 * @package App\Models
 */
class BearsBiometrySample extends Model
{
	use AsSource, Filterable, Attachable;
	use SoftDeletes, HasFactory;

	protected $table = 'bears_biometry_samples';

	protected $casts = [
		'id' => 'int',
		'bears_biometry_animal_handling_id' => 'int'
	];

	protected $fillable = [
		'bears_biometry_animal_handling_id',
		'sample_code',
		'sample_tissue'
	];

	public function bears_biometry_animal_handling()
	{
		return $this->belongsTo(BearsBiometryAnimalHandling::class);
	}
}
