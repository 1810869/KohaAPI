<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use DB;
use App\Models\Post;
use App\Models\Issue;
use App\Models\NewBorrower;
use App\Models\BorrowerList;
use App\Models\BorrowerAttrib;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     *
     */

    public function BorrowerList()
    {

        $users = BorrowerList::take(100)->get();

        return response()->json([
            'users' => $users
        ]);

    }

    public function BorrowerAttrib()
    {
        $users = BorrowerAttrib::all();

        return response()->json([
            'users' => $users
        ]);

    }

    public function SearchBorrowers($columnname, $borrowernumber)
    {

        $users = BorrowerList::where($columnname, $borrowernumber)
                           ->get();


        return response()->json([
            'users' => $users
        ]);
    }

    public function accountlines($id)
    {
        try {
    
            // Create Post
            $users = DB::table('accountlines')
            ->join('lts_checkout', 'accountlines.borrowernumber', '=', 'lts_checkout.borrowernumber')
            ->select('accountlines.*','lts_checkout.*')
            ->where('accountlines.borrowernumber', $id)
            ->get();

            return response()->json([
                'users' => $users
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong!"
            ],404);
        }

    }

    public function Issue()
    {
        $users = Issue::all();

        return response()->json([
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function NewRecord(Request $request)
    {

        $users = NewBorrower::create($request->all());


        $wrap = DB::select('UPDATE lts_api_post_test x, authorised_values y
                            SET x.kuly_desc = y.authorised_value
                            WHERE x.kuly_desc = y.lib
                            AND x.kuly_desc != y.authorised_value');

        return response()->json([
            "message" => "New Record Added!"
        ], 201);





    

    }

    public function updateBorrower($id, $columnname, $value )
    {
        $users = NewBorrower::where('borrowernumber', $id)
                               ->update([$columnname => $value]);
                              

        return response()->json([
            "message" => "Record is update!"
        ], 200);    

    }

}
