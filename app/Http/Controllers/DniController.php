<?php

namespace App\Http\Controllers;

use App\Models\DniLetter;
use Illuminate\Http\Request;

class DniController extends Controller
{
    public function calculateLetter(Request $request)
    {

        $dni = $request->input('dni');

        if (!is_numeric($dni) || strlen($dni) !== 8 || $dni < 0 || $dni > 99999999) {
            return response()->json(['error' => 'Insert a valid dni'], 400);
        }

        $index = $dni % 23;

        $letter = DniLetter::where('index', $index)->value('letter');

        if (!$letter) {
            return response()->json(['error' => 'Letter not found'], 404);
        }

        return response()->json([
            'dni' => $dni,
            'letter' => $letter,
        ]);
    }
    
}
