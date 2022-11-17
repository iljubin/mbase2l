<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Resources;

use App\Models\Animal;
use App\Models\AnimalRemovalList;
use App\Models\PlaceTypeList;
use App\Models\SpeciesList;
use App\Models\ToothTypeList;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Listener;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Map;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Color;

class BearsBiometryAnimalHandlingEditLayout extends Listener
{
	/**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'place_type_list_id',
        'geo_location',
        'sample_taken',
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
	protected $asyncMethod = 'asyncDisplayComponents';

    /**
     * @return Layout[]
     */
    protected function layouts(): array
    {
        return [
			Layout::columns([
				Layout::rows([
					// LEFT COLUMN START

					Select::make('animal_id')
					->fromModel(Animal::class, 'name')
					->title(__('Animal'))
					->help(__('Please select the ID of the individual, if the animal is known.'))
					->empty(__('<Empty>')),

					Select::make('species_list_id')
						->fromModel(SpeciesList::class, 'name')
						->title(__('Species'))
						->required()
						->help(__('Please select species.')),

					Input::make('number_of_removal_in_the_hunting_administrative_area')
						->mask('999999999999-9999')
						->title(__('Number and the year of removal in hunting administrative area'))
						->help(__('Please insert number and the year of removal in hunting administrative area.')),

					Select::make('animal_removal_list_id')
						->fromModel(AnimalRemovalList::class, 'name')
						->title(__('Type of removal'))
						->required()
						->help(__('Please select the type of removal.')),

					Input::make('telemetry_uid')
						->title(__('Ear-tag number or radio-collar (telemetry) identification'))
						->help(__('Please describe animal-borne markings (ear-tags, collar, microchips, etc.).')),

					Input::make('animal_handling_date')
						->type('datetime-local')
						->title(__('Date and time')),
						// ->value('2011-08-19T13:45:00')
						// ->horizontal(),

					Input::make('place_of_removal')
						->title(__('Geographical location/Local name'))
						->help(__('Please insert geographical location/Local name.')),

					Select::make('place_type_list_id')
						->fromModel(PlaceTypeList::class, 'name')
						->title(__('Place of removal type'))
						->required()
						->help(__('Please select the place of removal type.')),

					Input::make('place_type_list_details')
						->title(__('!! Connect to "other" option in Place of removal type! Other place of removal type'))
						->help(__('Please insert the other place of removal type.'))
						->canSee($this->query->get('place_type_list_id_value') == 148),

					// LEFT COLUMN END

					// HUNTER/FINDER GROUP START

					Switcher::make('unknown_hunter_finder')
						->sendTrueOrFalse()
						->title(__('!group border is missing! Unknown Hunder/Finder'))
						->value(true),

					Group::make([
						Input::make('hunter_finder_name')
							->title(__('!! Hide depending on the checkbox! Hunter/Finder name'))
							->help(__('Please insert the name of the hunter/finder')),

						Input::make('hunter_finder_surname')
							->title(__('!! Hide depending on the checkbox! Hunter/Finder surname'))
							->help(__('Please insert the surname of the hunter/finder')),
					])->autoWidth(),

					// HUNTER/FINDER GROUP START END

					// Witness/Accompanying person GROUP START
					Group::make([
						Input::make('witness_accompanying_person_name')
							->title(__('Witness/Accompanying person name'))
							->help(__('Please insert the name of the Witness/Accompanying person')),

						Input::make('hunter_finder_surname')
							->title(__('Witness/Accompanying person surname'))
							->help(__('Please insert the surname of the Witness/Accompanying person')),
					])->autoWidth(),

					// Witness/Accompanying person GROUP END

					// SAMPLES START

					Switcher::make('sample_taken')
						->sendTrueOrFalse()
						->title(__('Genetic samples collected?'))
						->value(true),

					Input::make('sample_code_1')
						->title('Sample Code 1')
						->help('Please insert sample code 1')
						->canSee($this->query->has('sample_taken_value')),

					Input::make('sample_type_1')
						->title('Sample type (sampled tissue) 1')
						->help('Please insert sample type 1'),

					Upload::make('images')
						->groups('photo')
						->help(__('Please upload sample images')),

					Group::make([

						Button::make('Add genetic sample')
							->method('buttonClickProcessing')
							->type(Color::PRIMARY()),

						Button::make('Remove Last')
							->method('buttonClickProcessing')
							->type(Color::DANGER()),
					])->autoWidth(),


					// SAMPLES END

					// SAMPLES TYPE SECTION START

					Group::make([
						Switcher::make('hair_sample_taken')
							->sendTrueOrFalse()
							->title(__('!group border is missing! Hair sample collected?'))
							->value(true),

						Switcher::make('blood_sample_taken')
							->sendTrueOrFalse()
							->title(__('!group border is missing! Blood sample collected?'))
							->value(true),

						Select::make('tooth_type_list_id')
							->fromModel(ToothTypeList::class, 'name')
							->title(__('Tooth Type'))
							->help(__('Please select the Tooth Type.'))
							->empty(__('<Empty>')),
					])->autoWidth(),

					// SAMPLES TYPE SECTION END

					// TAXIDERMIST SECTION START
					Group::make([
						Input::make('taxidermist_name')
							->title(__('Taxidermist name'))
							->help(__('Please insert the name of the Taxidermist')),

						Input::make('taxidermist_surname')
							->title(__('Taxidermist surname'))
							->help(__('Please insert the surname of the Taxidermist')),
					])->autoWidth(),

					// TAXIDERMIST SECTION END
				]),
				Layout::rows([

					// RIGHT COLUMN START

					Map::make('geo_location')
						->title(__('Location'))
						->help(__('')),

					Label::make('hunting_management_area')
						->title(__('Hunting-management area (LUO):'))
						->value($this->query->get('geo_locationChange')),
						// ->value(__('!! THIS SHOULD BE AUTOMATICALY GENERATED USING POSTGIS FROM MAP')),

					Label::make('hunting_ground')
						->title(__('Hunting ground'))
						->value(__('!! THIS SHOULD BE AUTOMATICALY GENERATED USING POSTGIS FROM MAP')),

					// RIGHT COLUMN START END

				]),

			]),
        ];
    }
}
