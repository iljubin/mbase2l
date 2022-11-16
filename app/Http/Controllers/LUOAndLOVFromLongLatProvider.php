<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LUOAndLOVFromLongLatProvider extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		$long = $request->long;
		$lat = $request->lat;

		$results = DB::select('
			SELECT
				gid
			FROM
				mbase2_ge.spatial_units
			WHERE
				public.ST_Contains(
					geom,
					public.ST_SetSRID(
						public.ST_Point(
							?,
							?
						),
						4326
					)
				)
		', [ $long, $lat ]);

		$gid = $results[0]->gid;

		$LUOResults = DB::select('
			select 
				spatial_unit_filter_element_id,
				spatial_unit_filter_elements.name
			from 
				spatial_units_spatial_unit_filter_elements 
			join 
				spatial_unit_filter_elements 
			on 
				spatial_unit_filter_elements.id = spatial_unit_filter_element_id 
			join
				spatial_unit_filter_types
			on
				spatial_unit_filter_types.id = spatial_unit_filter_elements.spatial_unit_filter_type_id
			where 
				spatial_unit_gid = ?
			and
				spatial_unit_filter_types.slug = ?
		', [ $gid, 'SI-LUO' ]);

		$LOVResults = DB::select('
			select 
				spatial_unit_filter_element_id,
				spatial_unit_filter_elements.name
			from 
				spatial_units_spatial_unit_filter_elements 
			join 
				spatial_unit_filter_elements 
			on 
				spatial_unit_filter_elements.id = spatial_unit_filter_element_id 
			join
				spatial_unit_filter_types
			on
				spatial_unit_filter_types.id = spatial_unit_filter_elements.spatial_unit_filter_type_id
			where 
				spatial_unit_gid = ?
			and
				spatial_unit_filter_types.slug = ?
		', [ $gid, 'SI-LOV' ]);

		return [
			'LUO' => [
				'id' => $LUOResults[0]->spatial_unit_filter_element_id,
				'name' => $LUOResults[0]->name
			], 
			'LOV' => [
				'id' => $LOVResults[0]->spatial_unit_filter_element_id,
				'name' => $LOVResults[0]->name
			]
		];
    }
}
