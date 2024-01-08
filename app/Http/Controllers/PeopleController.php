<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\People;
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'lastName' => 'required|string',
            'phoneNumber' => 'required|min_digits:9',
            'street' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $person = People::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'phoneNumber' => $request->phoneNumber,
                'street' => $request->street,
                'country' => $request->country,
                'city' => $request->city
            ]);
            if ($person) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Person created successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something failed...'
                ], 500);
            }
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
        $validator = Validator::make($request->all(), [
            'name' => 'string',
            'lastName' => 'string',
            'phoneNumber' => 'min_digits:9',
            'street' => 'string',
            'country' => 'string',
            'city' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            if ($person) {
                $person->update([
                    'name' => $request->name,
                    'lastName' => $request->lastName,
                    'phoneNumber' => $request->phoneNumber,
                    'street' => $request->street,
                    'country' => $request->country,
                    'city' => $request->city
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => 'Person updated successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => 500,
                    'message' => 'Something failed...'
                ], 500);
            }
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
                'message' => 'Person was not found'
            ], 404);
        }
    }
}
