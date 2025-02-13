<?php

namespace App\Models;

use Carbon\Carbon;
use App\Casts\LocalizedJsonData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * Class BearsBiometryAnimalHandling
 *
 * @property int|null $id
 * @property int|null $species_list_id
 * @property int|null $way_of_withdrawal_list_id
 * @property string|null $licence_number
 * @property string|null $project_name
 * @property string|null $receiving_country
 * @property string|null $telementry_uid
 * @property int|null $biometry_loss_reason_list_id
 * @property string|null $biometry_loss_reason_description
 * @property Carbon|null $animal_handling_date
 * @property string|null $place_of_removal
 * @property int|null $place_type_list_id
 * @property string|null $place_type_list_details
 * @property float|null $lat
 * @property float|null $lng
 * @property int|null $zoom
 * @property float|null $x
 * @property float|null $y
 * @property string|null $hunting_management_area
 * @property int|null $hunting_management_area_id
 * @property string|null $hunter_finder_name_and_surname
 * @property int|null $hunter_finder_country_id
 * @property string|null $witness_accompanying_person_name_and_surname
 * @property int|null $tooth_type_list_id
 * @property string|null $taxidermist_name_and_surname
 * @property int|null $data_entered_by_user_id
 * @property int|null $data_input_timestamp
 * @property int|null $animal_id
 * @property string|null $hunting_ground
 * @property USER-DEFINED|null $gcell
 * @property int|null $way_of_withdrawal_list_id
 * @property int|null $conflict_animal_removal_list_id
 * @property string|null $removal_annual_uid
 * @property USER-DEFINED|null $geom
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property SpeciesList|null $species_list
 * @property WayOfWithdrawalList|null $way_of_withdrawal_list
 * @property BiometryLossReasonList|null $biometry_loss_reason_list
 * @property PlaceTypeList|null $place_type_list
 * @property SpatialUnitFilterElement|null $spatial_unit_filter_element
 * @property Group|null $group
 * @property ToothTypeList|null $tooth_type_list
 * @property User|null $user
 * @property Animal|null $animal
 * @property AnimalRemovalList|null $conflict_animal_removal_list
 *
 * @package App\Models
 */

class AnimalHandlingListView extends Model
{
	public const STR_EXISTS = 'exists';
	public const STR_MISSING = 'missing';

	protected $table = 'animal_handling_list_view';

	use AsSource, Filterable;

	protected $casts = [
		'id' => 'int',
		'species_list_id' => 'int',
		'sex_list_id' => 'int',
		'biometry_loss_reason_list_id' => 'int',
		'animal_handling_date' => 'datetime',
		'place_type_list_id' => 'int',
		'lat' => 'float',
		'lng' => 'float',
		'zoom' => 'int',
		'x' => 'float',
		'y' => 'float',
		'hunting_management_area_id' => 'int',
		'hunter_finder_country_id' => 'int',
		'tooth_type_list_id' => 'int',
		'data_entered_by_user_id' => 'int',
		'animal_id' => 'int',
		'way_of_withdrawal_list_id' => 'int',
		'way_of_withdrawal_list_name' => LocalizedJsonData::class,
		'conflict_animal_removal_list_id' => 'int',
		'conflict_animal_removal_list_name' => LocalizedJsonData::class,
		'biometry_loss_reason_list_id' => 'int',
		'biometry_loss_reason_list_name' => LocalizedJsonData::class,
		'species_list_name' => LocalizedJsonData::class,
		'sex_list_name' => LocalizedJsonData::class,
		'animal_died_at' => 'datetime',
		'species_list_id' => 'int',
		'sex_list_id' => 'int',
		'attachment_count' => 'int',
		'number_of_removal_in_the_hunting_administrative_area' => 'string'
	];

	protected $fillable = [

	];

	protected $allowedSorts = [
		'id',
		'data_entered_by_user_id',
		'animal_id',
		'animal_status',
		'animal_status_on_handling',
		'animal_name',
		'way_of_withdrawal_list_name->sl',
		'way_of_withdrawal_list_name->en',
		'way_of_withdrawal_list_name->de',
		'way_of_withdrawal_list_name->it',
		'way_of_withdrawal_list_name->hu',
		'way_of_withdrawal_list_name->hr',
		'conflict_animal_removal_list_name->sl',
		'conflict_animal_removal_list_name->en',
		'conflict_animal_removal_list_name->de',
		'conflict_animal_removal_list_name->it',
		'conflict_animal_removal_list_name->hu',
		'conflict_animal_removal_list_name->hr',
		'biometry_loss_reason_list_name->sl',
		'biometry_loss_reason_list_name->en',
		'biometry_loss_reason_list_name->de',
		'biometry_loss_reason_list_name->it',
		'biometry_loss_reason_list_name->hu',
		'biometry_loss_reason_list_name->hr',
		'species_list_name->sl',
		'species_list_name->en',
		'species_list_name->de',
		'species_list_name->it',
		'species_list_name->hu',
		'species_list_name->hr',
		'sex_list_name->sl',
		'sex_list_name->en',
		'sex_list_name->de',
		'sex_list_name->it',
		'sex_list_name->hu',
		'sex_list_name->hr',
		'animal_description',
		'animal_handling_date',
		'animal_died_at',
		'place_of_removal',
		'hunting_management_area',
		'hunting_ground',
		'created_at',
		'updated_at',
		'bears_biometry_data_status',
		'species_list',
		'number_of_removal_in_the_hunting_administrative_area',
		'attachment_count',
		'bears_biometry_data_age',
		'bears_biometry_data_masa_bruto',
		'users_name'
	];

	protected $allowedFilters = [
		'id',
		'animal_id',
		'animal_status',
		'animal_status_on_handling',
		'animal_name',
		'way_of_withdrawal_list_name->sl',
		'way_of_withdrawal_list_name->en',
		'way_of_withdrawal_list_name->de',
		'way_of_withdrawal_list_name->it',
		'way_of_withdrawal_list_name->hu',
		'way_of_withdrawal_list_name->hr',
		'conflict_animal_removal_list_name->sl',
		'conflict_animal_removal_list_name->en',
		'conflict_animal_removal_list_name->de',
		'conflict_animal_removal_list_name->it',
		'conflict_animal_removal_list_name->hu',
		'conflict_animal_removal_list_name->hr',
		'biometry_loss_reason_list_name->sl',
		'biometry_loss_reason_list_name->en',
		'biometry_loss_reason_list_name->de',
		'biometry_loss_reason_list_name->it',
		'biometry_loss_reason_list_name->hu',
		'biometry_loss_reason_list_name->hr',
		'species_list_name->sl',
		'species_list_name->en',
		'species_list_name->de',
		'species_list_name->it',
		'species_list_name->hu',
		'species_list_name->hr',
		'sex_list_name->sl',
		'sex_list_name->en',
		'sex_list_name->de',
		'sex_list_name->it',
		'sex_list_name->hu',
		'sex_list_name->hr',
		'species_list_id',
		'sex_list_id',
		'animal_description',
		'place_of_removal',
		'bears_biometry_data_status',
		'species_list',
		'number_of_removal_in_the_hunting_administrative_area',
		'attachment_count',
		'bears_biometry_data_age',
		'bears_biometry_data_masa_bruto',
		'hunting_management_area',
		'hunting_ground',
		'users_name'
	];

	public function species_list()
	{
		return $this->belongsTo(SpeciesList::class);
	}

	public function sex_list()
	{
		return $this->belongsTo(SexList::class);
	}

	public function way_of_withdrawal_list()
	{
		return $this->belongsTo(WayOfWithdrawalList::class);
	}

	public function conflict_animal_removal_list()
	{
		return $this->belongsTo(ConflictAnimalRemovalList::class);
	}

	public function biometry_loss_reason_list()
	{
		return $this->belongsTo(BiometryLossReasonList::class);
	}

	public function place_type_list()
	{
		return $this->belongsTo(PlaceTypeList::class);
	}

	public function licence_list()
	{
		return $this->belongsTo(LicenceList::class);
	}

	public function spatial_unit_filter_element()
	{
		return $this->belongsTo(SpatialUnitFilterElement::class, 'hunting_management_area_id');
	}

	public function group()
	{
		return $this->belongsTo(Group::class, 'hunter_finder_country_id');
	}

	public function hunter_finder_country()
	{
		return $this->belongsTo(Group::class, 'hunter_finder_country_id');
	}

	public function tooth_type_list()
	{
		return $this->belongsTo(ToothTypeList::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'data_entered_by_user_id');
	}

	public function animal()
	{
		return $this->belongsTo(Animal::class);
	}

	public function getIsAliveAttribute()
	{
		return $this->animal->is_alive;
	}

	public function SpatialUnit()
	{
		return $this->belongsTo(SpatialUnit::class);
	}

	public function samples()
	{
		return $this->hasMany('App\Models\BearsBiometrySample');
	}

	public function renderAnimalStatusOnHandling()
	{
		return $this->animal_status_on_handling == Animal::STR_ALIVE ?
			'<i class="text-success">●</i> ' . __('Alive') :
			'<i class="text-danger">●</i> ' . __('Dead');
	}
}
