<?php

namespace App\Orchid\Layouts;

use App\Models\Animal;
use App\Models\Base\BaseList;
use App\Models\BiometryLossReasonList;
use App\Models\ConflictAnimalRemovalList;
use App\Models\SexList;
use App\Models\SpeciesList;
use App\Models\WayOfWithdrawalList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Layouts\Listener;

class BearsBiometryAnimalHandlingAnimalListener extends Listener
{
	public const STR_ANIMAL_TYPE_UNKNOWN_HANDLED_DEAD = 'Unknown animal, handled dead';
	public const STR_ANIMAL_TYPE_KNOWN_HANDLED_DEAD = 'Known animal, handled dead';
	public const STR_ANIMAL_TYPE_UNKNOWN_HANDLED_ALIVE = 'Unknown animal, handled alive';
	public const STR_ANIMAL_TYPE_KNOWN_HANDLED_ALIVE = 'Known animal, handled alive';

	/**
	 * List of field names for which values will be joined with targets' upon trigger.
	 *
	 * @var string[]
	 */
	protected $extraVars = [  ];

	/**
	 * List of field names for which values will be listened.
	 *
	 * @var string[]
	 */
	protected $targets = [
		'bearsBiometryAnimalHandling.json_data_field',
		'bearsBiometryAnimalHandling.animal_is_known_or_alive',
		'bearsBiometryAnimalHandling.animal_id',
		'bearsBiometryAnimalHandling.animal_status',
		'bearsBiometryAnimalHandling.animal_status_on_handling',
		'bearsBiometryAnimalHandling.animal_died_at_date',
		'bearsBiometryAnimalHandling.animal_died_at_time',
		'bearsBiometryAnimalHandling.animal_name',
		'bearsBiometryAnimalHandling.animal_species_list_id',
		'bearsBiometryAnimalHandling.animal_sex_list_id',
		'bearsBiometryAnimalHandling.animal_description',
		'bearsBiometryAnimalHandling.animal_handling_date_date',
		'bearsBiometryAnimalHandling.animal_handling_date_time',
		'bearsBiometryAnimalHandling.way_of_withdrawal_list_id',
		'bearsBiometryAnimalHandling.licence_number',
		'bearsBiometryAnimalHandling.conflict_animal_removal_list_id',
		'bearsBiometryAnimalHandling.biometry_loss_reason_list_id',
		'bearsBiometryAnimalHandling.biometry_loss_reason_description',
		'bearsBiometryAnimalHandling.project_name',
		'bearsBiometryAnimalHandling.receiving_country',
		'bearsBiometryAnimalHandling.n_number_of_removal_in_the_hunting_administrative_area',
		'bearsBiometryAnimalHandling.y_number_of_removal_in_the_hunting_administrative_area',
		'bearsBiometryAnimalHandling.telemetry_uid'
	];

	/**
	 * What screen method should be called
	 * as a source for an asynchronous request.
	 *
	 * The name of the method must
	 * begin with the prefix "async"
	 *
	 * @var string
	 */
	protected $asyncMethod = 'asyncUpdateAnimalHandlingAnimalListenerData';

	/**
	 * @return Layout[]
	 */
	protected function layouts(): iterable
	{
		if ($this->query) {
			Log::debug('query exists');

			$animalHandlingIsNew = ( $this->query->get('bearsBiometryAnimalHandling.id') ?? null ) == null;

			// $animalHandlingType = $this->query->get('bearsBiometryAnimalHandling.animal_handling_type') ?? self::STR_ANIMAL_TYPE_UNKNOWN_HANDLED_DEAD;
			$animalIsKnownOrAlive = $this->query->get('bearsBiometryAnimalHandling.animal_is_known_or_alive') ?? false;
			$animalSelectValue = $this->query->get('bearsBiometryAnimalHandling.animal_id') ?? null;
			$animalStatusIsSelected = ( $this->query->get('bearsBiometryAnimalHandling.animal_status') ?? null ) <> null;
			$animalStatusIsAlive = ( $this->query->get('bearsBiometryAnimalHandling.animal_status') ?? null ) == Animal::STR_ALIVE;
			$animalWasAliveOnHandling = ( $this->query->get('bearsBiometryAnimalHandling.animal_status_on_handling') ?? null ) == Animal::STR_ALIVE;
			$animalIsSelected = ( $this->query->get('bearsBiometryAnimalHandling.animal_id') ?? null ) != null;

			$animalStatusOnHandlingOptions = $animalStatusIsAlive
				? [ Animal::STR_ALIVE => __('Alive') ]
				: [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];

			if ($animalHandlingIsNew) {
				switch ($animalIsKnownOrAlive) {
					case false:
						$animalIsKnownOrAliveDisabled = false;

						$animalStatusCanSee = false;
						$animalStatusOnHandlingOptions = $animalStatusOptions = [ Animal::STR_DEAD => __('Dead') ];
						$animalStatusOnHandlingValue = $animalStatusValue = Animal::STR_DEAD;
						$animalStatusOnHandlingDisabled = $animalStatusDisabled = true;

						$animalSelectCanSee = false;
						$animalSelectQuery = Animal::whereRaw('true');
						$animalSelectDisabled = true;
						$animalSelectRequired = false;

						$animalNameCanSee = false;
						$animalNameValue = '';
						$animalNameRequired = false;
						$animalNameDisabled = false;

						$animalDescriptionDisabled = $animalSexListDisabled = $animalSpeciesListDisabled = false;

						$animalStatusDateTimeDisabled = false;

						break;
					case true:
						switch ($animalIsSelected) {
							case false:
								$animalIsKnownOrAliveDisabled = true;

								$animalStatusCanSee = true;
								$animalStatusOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
								$animalStatusValue = Animal::STR_ALIVE;
								$animalStatusDisabled = false;

								$animalStatusOnHandlingOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
								$animalStatusOnHandlingValue = Animal::STR_ALIVE;
								$animalStatusOnHandlingDisabled = false;

								$animalSelectCanSee = true;
								$animalSelectQuery = Animal::whereRaw("not(name  ~ '^\d+\.?\d+$')");
								$animalSelectDisabled = false;
								$animalSelectRequired = false;

								$animalNameCanSee = true;
								$animalNameValue = $this->query->get('bearsBiometryAnimalHandling.animal_name') ?? null;
								$animalNameRequired = true;
								$animalNameDisabled = false;

								$animalDescriptionDisabled = $animalSexListDisabled = $animalSpeciesListDisabled = false;

								$animalStatusDateTimeDisabled = $animalStatusValue == Animal::STR_DEAD;
								break;
							case true:
								$originalAnimal = Animal::find($this->query->get('bearsBiometryAnimalHandling.animal_id'));
								$animalStatusValue = $originalAnimal->status;

								switch ($animalStatusValue) {
									case Animal::STR_DEAD:
										$animalIsKnownOrAliveDisabled = true;

										$animalSelectCanSee = true;
										$animalSelectQuery = Animal::whereRaw("not(name  ~ '^\d+\.?\d+$')");
										$animalSelectDisabled = true;
										$animalSelectRequired = false;

										$animalStatusCanSee = true;
										$animalStatusOptions = [ Animal::STR_DEAD => __('Dead') ];
										$animalStatusValue = Animal::STR_DEAD;
										$animalStatusDisabled = true;

										$animalStatusOnHandlingOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
										$animalStatusOnHandlingValue = Animal::STR_ALIVE;
										$animalStatusOnHandlingDisabled = false;

										$animalNameCanSee = false;
										$animalNameValue = $this->query->get('bearsBiometryAnimalHandling.animal_name') ?? null;
										$animalNameRequired = true;
										$animalNameDisabled = true;

										$animalDescriptionDisabled = $animalSexListDisabled = $animalSpeciesListDisabled = true;

										$animalStatusDateTimeDisabled = $animalStatusValue == Animal::STR_DEAD;
										break;
									case Animal::STR_ALIVE:
										$animalIsKnownOrAliveDisabled = true;

										$animalSelectCanSee = true;
										$animalSelectQuery = Animal::whereRaw('true');
										$animalSelectDisabled = true;
										$animalSelectRequired = false;

										$animalStatusCanSee = true;
										$animalStatusOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
										$animalStatusValue = Animal::STR_ALIVE;
										$animalStatusDisabled = false;

										$animalStatusOnHandlingOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
										$animalStatusOnHandlingValue = Animal::STR_ALIVE;
										$animalStatusOnHandlingDisabled = false;

										$animalNameCanSee = false;
										$animalNameValue = $this->query->get('bearsBiometryAnimalHandling.animal_name') ?? null;
										$animalNameRequired = true;
										$animalNameDisabled = true;

										$animalDescriptionDisabled = $animalSexListDisabled = $animalSpeciesListDisabled = true;

										$animalStatusDateTimeDisabled = false;
										break;
								}

								break;
						}
				}

				$animalSpeciesListIdValue = $this->query->get('bearsBiometryAnimalHandling.animal_species_list_id') ?? null;
				$animalSexListIdValue = $this->query->get('bearsBiometryAnimalHandling.animal_sex_list_id') ?? null;
				$animalDescriptionValue = $this->query->get('bearsBiometryAnimalHandling.animal_description') ?? null;
			} else { // !$animalHandlingIsNew
				Log::debug('animalHandling is not new!');
				$animalIsKnownOrAliveDisabled = true;

				$animalStatusCanSee = true;
				$animalStatusOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
				$animalStatusValue = $this->query->get('bearsBiometryAnimalHandling.animal_status') ?? null;
				$animalStatusDisabled = true;

				switch ($animalStatusValue) {
					case Animal::STR_DEAD:
						$animalStatusOnHandlingOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
						$animalStatusOnHandlingValue = $this->query->get('bearsBiometryAnimalHandling.animal_status_on_handling') ?? null;
						$animalStatusOnHandlingDisabled = false;

						break;
					case Animal::STR_ALIVE:
						$animalStatusOnHandlingOptions = [ Animal::STR_ALIVE => __('Alive'), Animal::STR_DEAD => __('Dead') ];
						$animalStatusOnHandlingValue = $this->query->get('bearsBiometryAnimalHandling.animal_status_on_handling') ?? null;
						$animalStatusOnHandlingDisabled = false;

						break;
				}

				$animalSelectCanSee = true;
				$animalSelectQuery = Animal::where('id', '=', $this->query->get('bearsBiometryAnimalHandling.animal_id') ?? null);
				$animalSelectDisabled = true;
				$animalSelectRequired = false;

				$animalNameCanSee = false;
				$animalNameValue = $this->query->get('bearsBiometryAnimalHandling.animal_name') ?? null;
				$animalNameRequired = false;
				$animalNameDisabled = true;

				$animalSpeciesListIdValue = $this->query->get('bearsBiometryAnimalHandling.animal_species_list_id') ?? null;
				$animalSexListIdValue = $this->query->get('bearsBiometryAnimalHandling.animal_sex_list_id') ?? null;
				$animalDescriptionValue = $this->query->get('bearsBiometryAnimalHandling.animal_description') ?? null;

				$animalDescriptionDisabled = $animalSexListDisabled = $animalSpeciesListDisabled = true;

				$animalStatusDateTimeDisabled = false;
			}

			Log::debug([
				'bearsBiometryAnimalHandling.animal_is_known_or_alive' => $this->query->get('bearsBiometryAnimalHandling.animal_is_known_or_alive'),
				'bearsBiometryAnimalHandling.id' => $this->query->get('bearsBiometryAnimalHandling.id'),
				'bearsBiometryAnimalHandling.animal_id' => $this->query->get('bearsBiometryAnimalHandling.animal_id'),
				'bearsBiometryAnimalHandling.animal_status' => $this->query->get('bearsBiometryAnimalHandling.animal_status'),
				'bearsBiometryAnimalHandling.animal_status_on_handling' => $this->query->get('bearsBiometryAnimalHandling.animal_status_on_handling'),
				'bearsBiometryAnimalHandling.animal_species_list_id' => $this->query->get('bearsBiometryAnimalHandling.animal_species_list_id') ?? null,
				'bearsBiometryAnimalHandling.animal_sex_list_id' => $this->query->get('bearsBiometryAnimalHandling.animal_sex_list_id') ?? null,
				'bearsBiometryAnimalHandling.animal_description' => $this->query->get('bearsBiometryAnimalHandling.animal_description') ?? null,

				'animalIsKnownOrAlive' => $animalIsKnownOrAlive,
				'animalHandlingIsNew' => $animalHandlingIsNew,
				'animalNameValue' => $animalNameValue,
				'animalStatusIsSelected' => $animalStatusIsSelected,
				'animalStatusIsAlive' => $animalStatusIsAlive,
				'animalWasAliveOnHandling' => $animalWasAliveOnHandling,

				'animalSpeciesListId' => $animalSpeciesListIdValue,
				'animalSexListId' => $animalSexListIdValue,
				'animalDescription' => $animalDescriptionValue,
			]);

			$regularCullSelected = !$animalWasAliveOnHandling && $this->query->get('bearsBiometryAnimalHandling.way_of_withdrawal_list_id') == WayOfWithdrawalList::REGULAR_CULL;
			$lossSelected = !$animalWasAliveOnHandling && $this->query->get('bearsBiometryAnimalHandling.way_of_withdrawal_list_id') == WayOfWithdrawalList::LOSS;
			$lossReasonOtherSelected = !$animalWasAliveOnHandling && $this->query->get('bearsBiometryAnimalHandling.biometry_loss_reason_list_id') == BiometryLossReasonList::OTHER;
			$liveCaptureSelected = $animalWasAliveOnHandling && $this->query->get('bearsBiometryAnimalHandling.way_of_withdrawal_list_id') == WayOfWithdrawalList::LIVE_CAPTURE;
			$translocationOutOfPopulationSelected = $animalWasAliveOnHandling && $this->query->get('bearsBiometryAnimalHandling.way_of_withdrawal_list_id') == WayOfWithdrawalList::TRANSLOCATION_OUT_OF_POPULATION;

			$animalStatusSubset = $animalWasAliveOnHandling ? WayOfWithdrawalList::SHOWN_ON_ANIMAL_STATUS_ALIVE : WayOfWithdrawalList::SHOWN_ON_ANIMAL_STATUS_DEAD;
		}

		return [
			Layout::rows([
				CheckBox::make('bearsBiometryAnimalHandling.animal_is_known_or_alive')
					->value($animalIsKnownOrAlive)
					->sendTrueOrFalse()
					->placeholder(__('Check in case of known animal'))
					->disabled($animalIsKnownOrAliveDisabled),

				Select::make('bearsBiometryAnimalHandling.animal_id')
					->fromQuery($animalSelectQuery, 'name')
					->required($animalSelectRequired)
					->title(__('Animal name'))
					->disabled($animalSelectDisabled)
					->help($animalStatusIsAlive
						? __('Please select the ID of the individual, if the animal is known.')
						: __('If the individual hasn’t been caught before, leave the value “Unknown animal” and an automatic identification number will be assigned to this animal. If the individual has been previously handled and marked already, then choose its name from the drop-down list.'))
					->empty(__('<Select>'))
					->canSee($animalSelectCanSee)
					->value($animalSelectValue),

				Input::make('bearsBiometryAnimalHandling.animal_name')
					->title('Animal name')
					->required($animalNameRequired)
					->canSee($animalNameCanSee)
					->disabled($animalNameDisabled)
					->help(__('In case this animal is known for other reasons, like monitoring, you can assign it a name.'))
					->value($animalNameValue),

				Group::make([
					Select::make('bearsBiometryAnimalHandling.animal_status')
						->title('Animal status')
						->empty(__('<Select>'))
						->required()
						->disabled($animalStatusDisabled)
						->options($animalStatusOptions)
						->value($animalStatusValue)
						->canSee($animalStatusCanSee),

					Select::make('bearsBiometryAnimalHandling.animal_status_on_handling')
						->title('Status on handling')
						->empty(__('<Select>'))
						->required()
						->options($animalStatusOnHandlingOptions)
						->disabled($animalStatusOnHandlingDisabled)
						->value($animalStatusOnHandlingValue)
				]),

				Select::make('bearsBiometryAnimalHandling.animal_species_list_id')
					->fromQuery(SpeciesList::where('status', '=', BaseList::STR_ACTIVE), 'name')
					->required()
					->empty(__('<Select>'))
					->title(__('Species'))
					->help(__('Please select the species'))
					->disabled($animalSpeciesListDisabled)
					->value($animalSpeciesListIdValue),

				Select::make('bearsBiometryAnimalHandling.animal_sex_list_id')
					->fromQuery(SexList::where('status', '=', BaseList::STR_ACTIVE), 'name')
					->required()
					->empty(__('<Select>'))
					->title(__('Sex'))
					->help(__('Please select the sex'))
					->disabled($animalSexListDisabled)
					->value($animalSexListIdValue),

				Input::make('bearsBiometryAnimalHandling.animal_description')
					->title('Note')
					->disabled($animalDescriptionDisabled)
					->value($animalDescriptionValue),

				Input::make('bearsBiometryAnimalHandling.json_data_field'),
			])->title(__('Animal')),

			Layout::rows([
				Group::make([
					DateTimer::make('bearsBiometryAnimalHandling.animal_died_at_date')
						->title('Date of death')
						->canSee(!$animalStatusIsAlive)
						->allowInput()
						->available([['from' => '01.01.1970', 'to' => date('d.m.Y')]])
						->format('d.m.Y')
						->disabled($animalStatusDateTimeDisabled),

					DateTimer::make('bearsBiometryAnimalHandling.animal_died_at_time')
						->title('Time of death')
						->canSee(!$animalStatusIsAlive)
						->allowInput()
						->format('H:i')
						->noCalendar()
						->enableTime()
						->disabled($animalStatusDateTimeDisabled)
				]),

				Group::make([
					DateTimer::make('bearsBiometryAnimalHandling.animal_handling_date_date')
						->title('Date of handling')
						->required()
						->allowInput()
						->format('d.m.Y')
						->available([['from' => '01.01.1970', 'to' => date('d.m.Y')]]),

					DateTimer::make('bearsBiometryAnimalHandling.animal_handling_date_time')
						->title('Time of handling')
						->required()
						->allowInput()
						->format('H:i')
						->noCalendar()
						->enableTime(),
				]),
			])->title(__('Date and time')),

			Layout::rows([
				Group::make([
					Select::make('bearsBiometryAnimalHandling.way_of_withdrawal_list_id')
						->fromQuery(
							WayOfWithdrawalList::where('status', '=', BaseList::STR_ACTIVE)
								->whereIn('id', $animalStatusSubset),
							'name'
						)
						->title(__('Way of withdrawal'))
						->required()
						->empty(__('<Select>'))
						->help(__('Select the way of withdrawal')),

					Input::make('bearsBiometryAnimalHandling.licence_number')
						->title(__('Permit number'))
						->required()
						->help(__('Please enter the permit number'))
						->canSee($regularCullSelected),

					Select::make('bearsBiometryAnimalHandling.conflict_animal_removal_list_id')
						->fromQuery(
							ConflictAnimalRemovalList::where('status', '=', BaseList::STR_ACTIVE),
							'name'
						)
						->title(__('Type of legal cull'))
						->empty(__('<Select>'))
						->required()
						->help(__('Please select the type of legal cull'))
						->canSee($regularCullSelected),

					Select::make('bearsBiometryAnimalHandling.biometry_loss_reason_list_id')
						->fromQuery(BiometryLossReasonList::where('status', '=', BaseList::STR_ACTIVE), 'name')
						->title(__('Loss reason'))
						->empty(__('<Select>'))
						->required()
						->help(__('Please select the reason for death'))
						->canSee($lossSelected),

					Input::make('bearsBiometryAnimalHandling.biometry_loss_reason_description')
						->title(__('Loss reason description'))
						->help(__('Please insert the reason for death or describe circumstances'))
						->required($lossReasonOtherSelected)
						->canSee($lossSelected && $lossReasonOtherSelected),

					Input::make('bearsBiometryAnimalHandling.project_name')
						->title(__('Project title and description; Contact name'))
						->help(__('Please insert the project name and description and provide a contact person'))
						->required($liveCaptureSelected)
						->canSee($liveCaptureSelected),

					Input::make('bearsBiometryAnimalHandling.receiving_country')
						->title(__('Receiving country and institutions'))
						->help(__('Please define the receiving country and provide names of involved institutions (permits, transport etc.)'))
						->required($translocationOutOfPopulationSelected)
						->canSee($translocationOutOfPopulationSelected),
				]),

				Label::make('')
				  ->title(__('Number and the year of removal in hunting administrative area'))
				  ->canSee(!$animalWasAliveOnHandling),

				Group::make([
					Input::make('bearsBiometryAnimalHandling.n_number_of_removal_in_the_hunting_administrative_area')
						->mask('9[99]')
						->help(__('Number of removal (1-999)'))
						->canSee(!$animalWasAliveOnHandling),

					Input::make('bearsBiometryAnimalHandling.y_number_of_removal_in_the_hunting_administrative_area')
						->mask('9999')
						->help(__('Year of removal (2015-2099)'))
						->canSee(!$animalWasAliveOnHandling),
				]),

				Input::make('bearsBiometryAnimalHandling.telemetry_uid')
					->title(__('Ear-tag number or radio-collar (telemetry) identification'))
					->help(__('Please describe animal-borne markings (ear-tags, collar, microchips, etc.)'))
					->canSee($animalWasAliveOnHandling)
			]),
		];
	}
}
