<?php

namespace App\Http\Controllers;

use App\Models\Clothing;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClothingController extends Controller
{
    /**
     * Display a listing of all clothing items.
     */
    public function index()
    {
        return response()->json(Clothing::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created clothing item.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
        ]);

        $clothing = Clothing::create($validatedData);
        return response()->json($clothing, Response::HTTP_CREATED);
    }

    /**
     * Display the specified clothing item.
     */
    public function show($id)
    {
        $clothing = Clothing::find($id);

        if (!$clothing) {
            return response()->json(['message' => 'Clothing item not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($clothing, Response::HTTP_OK);
    }

    /**
     * Update the specified clothing item.
     */
    public function update(Request $request, $id)
    {
        $clothing = Clothing::find($id);

        if (!$clothing) {
            return response()->json(['message' => 'Clothing item not found'], Response::HTTP_NOT_FOUND);
        }

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:50',
        ]);

        $clothing->update($validatedData);
        return response()->json($clothing, Response::HTTP_OK);
    }

    /**
     * Remove the specified clothing item.
     */
    public function destroy($id)
    {
        $clothing = Clothing::find($id);

        if (!$clothing) {
            return response()->json(['message' => 'Clothing item not found'], Response::HTTP_NOT_FOUND);
        }

        $clothing->delete();
        return response()->json(['message' => 'Clothing item deleted successfully'], Response::HTTP_OK);
    }
}
