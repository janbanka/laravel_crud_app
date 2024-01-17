<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $person = People::all();
        if ($person) {
            return response()->json($person, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No records found'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = People::create($request->all());
        if ($person) {
            return response()->json([
                'status' => 201,
                'message' => 'Person created successfully'
            ], 201);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Request failed'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(People $person)
    {
        if ($person) {
            return response()->json($person, 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Person was not found'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, People $person)
    {
        if ($person) {
            $person->update($request->all());
            return response()->json([
                'status' => 200,
                 'message' => 'Person updated successfully'
             ], 200);
        } else {
             return response()->json([
                'status' => 500,
                'message' => 'Request failed'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(People $person)
    {
        if ($person) {
            $person->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Person was deleted'
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Person does not exist'
            ], 404);
        }
    }
}
