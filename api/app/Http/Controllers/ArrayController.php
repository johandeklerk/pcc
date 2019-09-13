<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\ArrayFormatter;

class ArrayController extends Controller
{
    /**
     * @param Request $request
     * @param ArrayFormatter $arrayFormatter
     * @return \Illuminate\Http\JsonResponse
     */
    public function filter(Request $request, ArrayFormatter $arrayFormatter) {
		// This validation should probably be in a form request class

		if (!$request->has('input')) {
			return response()->json([
				'error' => 'Post must contain a field named "input"',
			]);
		}

		if (!is_array($request->input('input'))) {
			return response()->json([
				'error' => 'Input field must be an array',
			]);	
		}

		// Setup the values. Min/Max are configurable
		$input = $request->input('input');
		$min = config('api.array_min');
		$max = config('api.array_max');
		
		if (max($input) > $max) {
			return response()->json([
				'error' => 'Input array may not contain numbers bigger than '.$max,
			]);
		}

		$output = $arrayFormatter->filterValuesBetweenMinMax($input, $min, $max);

		return response()->json([
			'result' => $output,
		]);
	}
}
