<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'free_link' => 'nullable|url',
                'paid_link' => 'nullable|url',
                'demo_link' => 'nullable|url',
                'category_project' => 'required',
                'image_link' => [
                    'nullable',
                    'url',
                    'regex:/\.(jpg|jpeg)$/i'  // Pastikan delimiter '/' ditutup
                ],
            ]);

            Project::create($validatedData);

            return response()->json(['success' => true, 'message' => 'Project created successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create project.'], 500);
        }
    }

    public function edit($id)
    {
        try {
            $project = Project::findOrFail($id);
            return view('projects.edit', compact('project'));
        } catch (\Exception $e) {
            return redirect()->route('projects.index')->with('error', 'Project not found.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
                'free_link' => 'nullable|url',
                'paid_link' => 'nullable|url',
                'demo_link' => 'nullable|url',
                'category_project' => 'required',
                'image_link' => 'nullable|url',
            ]);

            $project = Project::findOrFail($id);
            $project->update($validatedData);

            return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('projects.index')->with('error', 'Failed to update project.');
        }
    }

    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();

            return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('projects.index')->with('error', 'Failed to delete project.');
        }
    }

    public function filterByCategory(Request $request)
    {
        try {
            $category = $request->input('category');
            $projects = Project::where('category_project', 'LIKE', "%{$category}%")->get();

            return response()->json(['projects' => $projects]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to filter projects.'], 500);
        }
    }

    public function liveSearch(Request $request)
    {
        try {
            $query = $request->input('query');
            $category = $request->input('category');

            $projects = Project::query();

            // Apply search query
            if ($query) {
                $projects = $projects->where('name', 'LIKE', '%' . $query . '%');
            }

            // Apply category filter
            if ($category) {
                $projects = $projects->where('category_project', $category);
            }

            // Fetch results
            $projects = $projects->get();

            return response()->json(['projects' => $projects]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to search projects.'], 500);
        }
    }
}
