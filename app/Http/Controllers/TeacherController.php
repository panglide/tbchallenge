<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Teacher;
use Redirect;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->avatar) {
            $avatar = $request->validate ([
                'avatar' => 'file|image|max:2048',
            ]);
            if($avatar) {
                $path = request()->file('avatar')->store('avatars');
            }
        }
        
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'school' => 'required|string|max:50',
            'grades' => 'required',
            'subjects' => 'required'
         ]);

        $teacherInfo = [
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'school' => $validated['school'],
            'grades' => json_encode($validated['grades']),
            'subjects' => json_encode($validated['subjects']),
            'avatar_url' => $path ?? 'avatars/avatar.png'
        ];

        $teacher = Teacher::create($teacherInfo);
        sleep(1);
        return Redirect::route('main.index');
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
}
