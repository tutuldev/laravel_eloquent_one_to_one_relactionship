<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Contact;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = Student::all();
        // $students = Student::with('contact')->get();
        // $students = Student::with('contact')->find(2);
        //         // return $students;

        // $students = Student::with('contact')
        //         ->where('gender','F')->get();
        // return $students;

        // only where not working so use wherehas
        // $students = Student::withWhereHas('contact',function($query){
        //     $query->where('city',"Dhaka");
        // })->get();
        // return $students;

        // two where two table with withWhereHas->get two table data
        // $students = Student::where('gender','F')
        // ->withWhereHas('contact',function($query){
        //     $query->where('city',"Dhaka");
        // })->get();
        // return $students;


        // two where two table with wherehas ->search all data but show 1st table data
        $students = Student::where('gender','F')
        ->whereHas('contact',function($query){
            $query->where('city',"Dhaka");
        })->get();
        return $students;

        // echo $students->name . "<br>";
        // echo $students->contact->email . "<br>";
    }

    /**
     * Show the form for creating a new resource.
     */

    //  create multiple table data both by using one to one relation has one
     public function create()
    {
        $student = Student::create([
            'name' => 'John Abraham',
            'age' => 18,
            'gender' => 'M'

        ]);
        $student->contact()->create([
            'email' => 'jon@gmail.com',
            'phone' =>"01784638668",
            'address' => '#shd JA Road',
            'city' => 'Dhaka'

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
