<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanoController extends Controller
{
    public function show(string $id)
    {
        $plano = Plano::findOrFail($id);
  
        return view('plano.show', compact('plano'));
    }

/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $plano = plano::findOrFail($id);
  
        return view('plano.edit', compact('plano'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plano = plano::findOrFail($id);
  
        $plano->update($request->all());
        
  
        return redirect()->route('plano')->with('success', 'plano updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plano = plano::findOrFail($id);
  
        $plano->delete();
  
        return redirect()->route('plano')->with('success', 'plano deleted successfully');
    }
}