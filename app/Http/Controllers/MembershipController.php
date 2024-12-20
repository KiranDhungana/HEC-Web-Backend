<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
    

class MembershipController extends Controller
{
     public function getmembers()
    {
     $members = Membership::all();   
        $response = [
            'status' => 'success',           
            'message' => 'User data fetched successfully', 
            'data' =>$members   
            
        ];
        return response()->json($response);
    }
   public function becomemember(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'dob' => 'required|date',
                'phonenumber' => 'required|string|max:15',
                'affiliatedto' => 'required|string|max:255',
                'leadership_position' => 'nullable|string|max:255',
                'academic_qualification' => 'required|string|max:255',
                'council_number' => 'nullable|string|max:255',
                'province' => 'nullable|string|max:255',
                'district' => 'nullable|string|max:255',
                'residental_area' => 'required|string|max:255',
                'prefix' => 'required|string|max:255',
                'why_member' => 'required|string',
                'known_from' => 'required|string|max:255',
                'refered_name' => 'nullable|string|max:255',
            ]);

            $membership = Membership::create($validatedData);

            return response()->json([
                'message' => 'Membership data submitted successfully!',
                'data' => $membership
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);
        }
    }


}