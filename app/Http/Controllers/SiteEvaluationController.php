<?php

namespace App\Http\Controllers;

use App\Models\SiteEvaluation;
use Illuminate\Http\Request;

class SiteEvaluationController extends Controller
{
    /**
     * Guardar la evaluación del portal.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'score' => 'required|integer|in:1,2,3',
            'comment' => 'nullable|string',
            'url_evaluated' => 'nullable|string',
            'screen_resolution' => 'nullable|string',
            'time_zone' => 'nullable|string',
            'language' => 'nullable|string',
        ]);

        SiteEvaluation::create([
            'score' => $validated['score'],
            'comment' => $validated['comment'] ?? null,
            'url' => $validated['url_evaluated'] ?? $request->header('referer') ?? url()->previous(),
            'user_agent' => $request->header('User-Agent'),
            'screen_resolution' => $validated['screen_resolution'] ?? null,
            'time_zone' => $validated['time_zone'] ?? null,
            'language' => $validated['language'] ?? null,
        ]);

        return response()->json(['message' => 'Evaluation received.']);
    }
}
