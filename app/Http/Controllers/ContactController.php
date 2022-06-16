<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
        //return response()->json('Invalid Email', 200);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'title' => 'required',
            'mobile' => 'required',
            'photo' => 'required',
            'group_id' => 'required|exists:contact_groups,id'
        );

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        else{

            $contact =  Contact::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'company' => $request->input('company'),
                'title' => $request->input('title'),
                'mobile' => $request->input('mobile'),
                'photo' => $request->input('photo'),
                'group_id' => $request->input('group_id'),
            ]);

            return response()->json($contact, 200);
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
        return Contact::find($id);
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
        $rules = array(
            'id' => 'required|exists:contacts,id',
        );

        $validator = Validator::make(['id' => $id], $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        else{

            $rules = array(
                'name' => 'required',
                'email' => 'required|email',
                'company' => 'required',
                'title' => 'required',
                'mobile' => 'required',
                'photo' => 'required',
                'group_id' => 'required|exists:contact_groups,id'
            );
    
            $validator = Validator::make($request->all(), $rules);
    
            if($validator->fails()){
                return response()->json($validator->errors(), 400);
            }
            else{
                
                $contact = Contact::findOrFail($id);

                $contact->update($request->all());

                return $contact;
    
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rules = array(
            'id' => 'required|exists:contacts,id',
        );

        $validator = Validator::make(['id' => $id], $rules);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        else{
            $contact = Contact::findOrFail($id);

            return $contact->delete();
        }
    }
}
