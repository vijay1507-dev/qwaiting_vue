<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use App\Models\SystemEmailTemplate;
use App\Models\TemplateVariable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SystemTemplateController extends Controller
{
    /**
     * Display a listing of system email templates.
     */
    public function index(): Response
    {
        $templates = SystemEmailTemplate::orderBy('name')
            ->get()
            ->map(function ($template) {
                return [
                    'id' => (string) $template->id,
                    'key' => $template->key,
                    'name' => $template->name,
                    'subject' => $template->subject,
                    'description' => $template->description,
                    'is_active' => $template->is_active,
                    'updated_at' => $template->updated_at->format('Y-m-d h:iA'),
                ];
            });

        return Inertia::render('Marketing/SystemTemplates', [
            'templates' => $templates,
        ]);
    }

    /**
     * Show the form for editing a system email template.
     */
    public function edit(string $id): Response
    {
        $template = SystemEmailTemplate::findOrFail($id);

        // Get template variables
        $templateVariables = TemplateVariable::where('is_active', true)
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

        return Inertia::render('Marketing/SystemTemplateView', [
            'template' => [
                'id' => (string) $template->id,
                'key' => $template->key,
                'name' => $template->name,
                'subject' => $template->subject,
                'content' => $template->content,
                'description' => $template->description,
                'is_active' => $template->is_active,
            ],
            'templateVariables' => $templateVariables,
        ]);
    }

    /**
     * Update a system email template.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
            'is_active' => ['boolean'],
        ]);

        $template = SystemEmailTemplate::findOrFail($id);
        $template->update([
            'subject' => $request->subject,
            'content' => $request->content,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('marketing.system-templates.index')
            ->with('success', 'System template updated successfully.');
    }
}
