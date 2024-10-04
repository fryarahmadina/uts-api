<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //get all level
         $chategory = Chategory::latest()->paginate(5);

         //response
         $response = [
             'message'   => 'List all chategories',
             'data'      => $chategory,
         ];
         return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            //validasi data
            $validator = Validator::make($request->all(),[

              'chategory' => 'required',
          ]);


          //jika validasi gagal
          if ($validator->fails()) {
              return response()->json([
                  'message' => 'Invalid field',
                  'errors' => $validator->errors()
              ],422);
          }


          //insert character to database
          $chategory = Chategory::create([
              'chategory' => $request->chategory,
          ]);


          //response
          $response = [
              'success'   => 'Add Chategory success',
              'data'      => $chategory,
          ];


          return response()->json($response, 201);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //find Gameplay by ID
        $chategory = Chategory::with(['character','level','user'])->find($id);


        //response
        $response = [
            'success'   => 'Detail Chategory',
            'data'      => $chategory,
        ];


        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
