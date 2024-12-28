<?php

namespace App\Http\Controllers;

use App\Models\DniLetter;
use Illuminate\Http\Request;

class DniController extends Controller
{
    public function calculateLetter(Request $request)
    {
        $validated = $request->validate([
            'dni' => 'required|integer|between:0,99999999',
        ]);

        $dni = $validated['dni'];
        $index = $dni % 23;

        $letter = DniLetter::where('index', $index)->value('letter');

        if (!$letter) {
            return response()->json(['error' => 'Letter not found'], 404);
        }

        return response()->json([
            'dni' => $dni,
            'letter' => $letter,
        ]);

        return response()->json(['error' => 'Letter cannot be calculated'], 500);
    }
    
}
