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

    //Get first 1000 rows from borrowers table
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

    //Get a data using specific column name from table 'borrowers'
    public function SearchBorrowers($columnname, $borrowernumber)
    {

        //Search borrower without joining table
        $users = BorrowerList::where($columnname, $borrowernumber)
                           ->get();

        // $users = $users->unique('borrowernumber');
        return response()->json([
            'users' => $users
        ]);
    }

    //Get data from accountlines table using borrowernumber as passed value
    public function accountlines($id)
    {
        try {
    
            // Create Post
            $users = DB::table('accountlines')
            ->join('lts_checkout', 'accountlines.borrowernumber', '=', 'lts_checkout.borrowernumber')
            ->select('accountlines.*','lts_checkout.*')
            ->where('accountlines.borrowernumber', $id)
            ->get();

            // return response()->json($post, 201);
        
            // Return Json Response
            return response()->json([
                'users' => $users
            ]);
            
        } catch (\Exception $e) {
            // Return Json Response
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
        // $users = new NewBorrower;
        // $users->cardnumber = $request->cardnumber;
        // $users->surname = $request->surname;
        // $users->branchcode = $request->branchcode;
        // $users->email = $request->email;
        // $users->userid = $request->userid;
        // $users->dateexpiry = $request->dateexpiry;
        // $users->categorycode = $request->categorycode;
        // $users->matric_no = $request->matric_no;
        // $users->kuly_desc = $request->kuly_desc;
        // $users->gonenoaddress = $request->gonenoaddress;
        // $users->lost = $request->lost;
        // $users->flags = $request->flags;
        // $users->privacy = $request->privacy;
        // $users->checkprevcheckout = $request->checkprevcheckout;
        // $users->privacy_guarantor_fines = $request->privacy_guarantor_fines;
        // $users->lang = $request->lang;
        // $users->anonymized = $request->anonymized;
        // $users->autorenew_checkouts = $request->autorenew_checkouts;
        // $users->borrowernumber = $request->borrowernumber;
        // $users->save();

        $users = NewBorrower::create($request->all());
    
        return response()->json([
            "message" => "New Record Added!"
        ], 201);
    }

    //Update borrower table
    public function updateBorrower($id, $columnname, $value )
    {
        $users = NewBorrower::where('borrowernumber', $id)
                               ->update([$columnname => $value]);
                              

        return response()->json([
            "message" => "Record is update!"
        ], 200);    

    }

    public function deleteBorrower($id)
    {
        $users = NewBorrower::where('borrowernumber', $id)
                               ->delete();
                              
        
        if($users)
        {
            return response()->json([
                "message" => "Record Deleted Successfully!"
            ], 200);  
        }
        else{
            return response()->json([
                "message" => "Record Not Found!"
            ], 404);  
        }
  

    }

    //Post to insert new data into 'posts' table
    public function store(PostStoreRequest $request)
    {
        try {
    
            // Create Post
            $post = Post::create($request->all());

            // return response()->json($post, 201);
        
            // Return Json Response
            return response()->json([
                'message' => "Post successfully created."
            ],200);
            
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }

        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json([
                'error_code'=> 'VALIDATION_ERROR', 
                'message'   => 'The given data was invalid.', 
                'errors'    => $request->validator->errors()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
}
