<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
      public function getprojects()
    {
     $Projects = Project::all();   
        $response = [
            'status' => 'success',           
            'message' => 'User data fetched successfully', 
            'data' =>$Projects 
            
        ];
        return response()->json($response);
    }

    public function uploadprojects(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $featureImagePath = null;
    if ($request->hasFile('feature_image')) {
        $featureImagePath =  $request->file('feature_image')->storeAs(
            'feature_images', 
            $request->file('feature_image')->hashName(), 
            'public'
        );
    }

    $post = Project::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'feature_image' => $featureImagePath, 
    ]);

    return response()->json($post, 201);
}

}