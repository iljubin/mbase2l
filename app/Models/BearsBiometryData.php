<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

/**
 * Class BearsBiometryData
 *
 * @property int|null $id
 * @property int|null $bears_biometry_animal_handling_id
 * @property int|null $sex_list_id
 * @property int|null $age
 * @property float|null $masa_bruto
 * @property float|null $masa_neto
 * @property float|null $hrbtna_dolzina
 * @property float|null $trebusna_dolzina
 * @property float|null $plecna_visina
 * @property float|null $obseg_glave
 * @property float|null $obseg_vratu
 * @property float|null $obseg_prsnega_kosa
 * @property float|null $obseg_trebuha
 * @property float|null $dolzina_spolne_kosti
 * @property float|null $dolzina_seskov
 * @property int|null $teats_wear_list_id
 * @property float|null $dolzina_repa_prva_meritev
 * @property float|null $dolzina_repa_druga_meritev
 * @property float|null $dolzina_usesov
 * @property float|null $dolzina_copkov
 * @property float|null $dzs_leva
 * @property float|null $dzs_desna
 * @property float|null $dps_desna
 * @property float|null $dps_leva
 * @property float|null $szs_leva
 * @property float|null $szs_desna
 * @property float|null $sps_leva
 * @property float|null $sps_desna
 * @property float|null $dzp_leva
 * @property float|null $dzp_desna
 * @property float|null $dsp_leva
 * @property float|null $dsp_desna
 * @property float|null $sp_zgoraj
 * @property float|null $sp_spodaj
 * @property int|null $incisors_wear_list_id
 * @property int|null $color_list_id
 * @property int|null $collar_list_id
 * @property string|null $stanje_lesine
 * @property string|null $zdt
 * @property string|null $masa_mesa
 * @property string|null $udt
 * @property string|null $dg
 * @property string|null $dnpp
 * @property string|null $lds
 * @property string|null $ltv
 * @property string|null $kds
 * @property string|null $ktv
 * @property string|null $boja_barve
 * @property string|null $stare_ozljede
 * @property string|null $dio
 * @property string|null $opce_stanje
 * @property string|null $tco_ime
 * @property string|null $tco_prezime
 * @property string|null $tco_naziv
 * @property string|null $tco_adresa
 * @property int|null $meritve_opravil_id
 * @property string|null $meritve_opravil_ime
 * @property string|null $meritve_opravil_priimek
 * @property int|null $meritve_opravil_drzava
 * @property string|null $ostala_opazanja
 * @property string|null $opombe
 * @property Carbon|null $cas_biometrije
 * @property Carbon|null $cas_vnosa
 * @property string|null $depot
 * @property int|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property BearsBiometryAnimalHandling|null $bears_biometry_animal_handling
 * @property SexList|null $sex_list
 * @property TeatsWearList|null $teats_wear_list
 * @property IncisorsWearList|null $incisors_wear_list
 * @property ColorList|null $color_list
 * @property CollarList|null $collar_list
 * @property User|null $user
 *
 * @package App\Models
 */
class BearsBiometryData extends Model
{
	use AsSource, Filterable, Attachable;
	use SoftDeletes;

	protected $table = 'bears_biometry_data';

	protected $casts = [
		'id' => 'int',
		'bears_biometry_animal_handling_id' => 'int',
		'sex_list_id' => 'int',
		'age' => 'int',
		'masa_bruto' => 'float',
		'masa_neto' => 'float',
		'hrbtna_dolzina' => 'float',
		'trebusna_dolzina' => 'float',
		'plecna_visina' => 'float',
		'obseg_glave' => 'float',
		'obseg_vratu' => 'float',
		'obseg_prsnega_kosa' => 'float',
		'obseg_trebuha' => 'float',
		'dolzina_spolne_kosti' => 'float',
		'dolzina_seskov' => 'float',
		'teats_wear_list_id' => 'int',
		'dolzina_repa_prva_meritev' => 'float',
		'dolzina_repa_druga_meritev' => 'float',
		'dolzina_usesov' => 'float',
		'dolzina_copkov' => 'float',
		'dzs_leva' => 'float',
		'dzs_desna' => 'float',
		'dps_desna' => 'float',
		'dps_leva' => 'float',
		'szs_leva' => 'float',
		'szs_desna' => 'float',
		'sps_leva' => 'float',
		'sps_desna' => 'float',
		'dzp_leva' => 'float',
		'dzp_desna' => 'float',
		'dsp_leva' => 'float',
		'dsp_desna' => 'float',
		'sp_zgoraj' => 'float',
		'sp_spodaj' => 'float',
		'incisors_wear_list_id' => 'int',
		'color_list_id' => 'int',
		'collar_list_id' => 'int',
		'meritve_opravil_id' => 'int',
		'meritve_opravil_drzava' => 'int',
		'status' => 'int'
	];

	protected $dates = [
		'cas_biometrije',
		'cas_vnosa'
	];

	protected $fillable = [
		'bears_biometry_animal_handling_id',
		'sex_list_id',
		'age',
		'masa_bruto',
		'masa_neto',
		'hrbtna_dolzina',
		'trebusna_dolzina',
		'plecna_visina',
		'obseg_glave',
		'obseg_vratu',
		'obseg_prsnega_kosa',
		'obseg_trebuha',
		'dolzina_spolne_kosti',
		'dolzina_seskov',
		'teats_wear_list_id',
		'dolzina_repa_prva_meritev',
		'dolzina_repa_druga_meritev',
		'dolzina_usesov',
		'dolzina_copkov',
		'dzs_leva',
		'dzs_desna',
		'dps_desna',
		'dps_leva',
		'szs_leva',
		'szs_desna',
		'sps_leva',
		'sps_desna',
		'dzp_leva',
		'dzp_desna',
		'dsp_leva',
		'dsp_desna',
		'sp_zgoraj',
		'sp_spodaj',
		'incisors_wear_list_id',
		'color_list_id',
		'collar_list_id',
		'stanje_lesine',
		'zdt',
		'masa_mesa',
		'udt',
		'dg',
		'dnpp',
		'lds',
		'ltv',
		'kds',
		'ktv',
		'boja_barve',
		'stare_ozljede',
		'dio',
		'opce_stanje',
		'tco_ime',
		'tco_prezime',
		'tco_naziv',
		'tco_adresa',
		'meritve_opravil_id',
		'meritve_opravil_ime',
		'meritve_opravil_priimek',
		'meritve_opravil_drzava',
		'ostala_opazanja',
		'opombe',
		'cas_biometrije',
		'cas_vnosa',
		'depot',
		'status'
	];

	public function bears_biometry_animal_handling()
	{
		return $this->belongsTo(BearsBiometryAnimalHandling::class);
	}

	public function sex_list()
	{
		return $this->belongsTo(SexList::class);
	}

	public function teats_wear_list()
	{
		return $this->belongsTo(TeatsWearList::class);
	}

	public function incisors_wear_list()
	{
		return $this->belongsTo(IncisorsWearList::class);
	}

	public function color_list()
	{
		return $this->belongsTo(ColorList::class);
	}

	public function collar_list()
	{
		return $this->belongsTo(CollarList::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'meritve_opravil_id');
	}
}
