<?php

namespace App\Http\Controllers;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parameters = Parameter::all();
        return view('parameters.index', compact('parameters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parameters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
        ]);

        Parameter::create($request->all());

        return redirect()->route('parameters.index')->with('success', 'Parameter added!');
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
        $parameter = Parameter::findOrFail($id);
        return view('parameters.edit', compact('parameter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parameter $parameter)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'value' => 'required|numeric',
        ]);

        $parameter->update($request->all());

        return redirect()->route('parameters.index')->with('success', 'Parameter updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parameter $parameter)
    {
        $parameter->delete();
        return redirect()->route('parameters.index')->with('success', 'Parameter deleted!');
    }
}
