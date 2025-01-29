<?php

namespace App\Http\Controllers;

use App\Models\DniLetter;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isInt;
use function PHPUnit\Framework\isNumeric;

class DniController extends Controller
{
    public function calculateLetter(Request $request)
    {

        $dni = $request['dni'];

        if ($dni.strlen($dni) != 8 || !isInt($dni) || $dni < 0 || $dni > 99999999) {
            return "Introduce a valid dni";
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
