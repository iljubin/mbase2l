<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BearsBiometryAnimalHandlingController extends Controller
{
   /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
		$attributes = [
			'class'   => 'form-control',
		];
		$data['options'] = ['1' => 'test'];
		$data['attributes'] = implode(' ', $attributes);
        return view('resources/bearsbiometryanimalhandlingedit')->with($data);
    }
}
