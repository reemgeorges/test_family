<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\place;
use Illuminate\Http\Request;

class familyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::all();

        return view('families.index', compact('familise'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places =place::all();


        return view('families.add', compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // التحقق من البيانات المرسلة في الطلب
           $request->validate([
            'idnat' => 'required',
        ]);

        // إنشاء طالب جديد وحفظ بياناته
        $families = Family::create($request->all());

        // إضافة الكورسات المحددة للطالب

        return redirect()->route('families.index')->with('success');
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
        $family = family::findOrFail($id);
        $places = place::all();

        return view('families.update', compact('family', 'places'));
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
        $family = Family::findOrFail($id);
        $family->update($request->all());
        $family->place()->sync($request->input('places', []));

        return  redirect()->route('families.index');
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
