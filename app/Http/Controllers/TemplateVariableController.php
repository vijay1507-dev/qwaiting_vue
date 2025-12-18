<?php

namespace App\Http\Controllers;

use App\Models\TemplateVariable;
use Inertia\Inertia;
use Inertia\Response;

class TemplateVariableController extends Controller
{
    /**
     * Display a listing of template variables.
     */
    public function index(): Response
    {
        $variables = TemplateVariable::where('is_active', true)
            ->orderBy('module')
            ->orderBy('name')
            ->get()
            ->map(function ($variable) {
                return [
                    'id' => (string) $variable->id,
                    'name' => $variable->name,
                    'module' => $variable->module,
                    'description' => $variable->description,
                    'example_value' => $variable->example_value,
                ];
            });

        return Inertia::render('TemplateVariables/Index', [
            'variables' => $variables,
        ]);
    }

    /**
     * Get all active template variables (API endpoint).
     */
    public function getAll(): \Illuminate\Http\JsonResponse
    {
        $variables = TemplateVariable::where('is_active', true)
            ->orderBy('module')
            ->orderBy('name')
            ->get()
            ->map(function ($variable) {
                return [
                    'id' => (string) $variable->id,
                    'name' => $variable->name,
                    'module' => $variable->module,
                    'description' => $variable->description,
                    'example_value' => $variable->example_value,
                ];
            });

        return response()->json($variables);
    }
}
