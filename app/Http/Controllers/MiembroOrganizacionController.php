<?php

namespace App\Http\Controllers;

use App\Models\MiembroOrganizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiembroOrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = MiembroOrganizacion::orderBy('is_titular', 'desc')->orderBy('order', 'asc')->orderBy('created_at', 'desc')->get();
        return view('admin.miembros_organizacion.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.miembros_organizacion.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'phrase' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_titular' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $member = new MiembroOrganizacion($validated);
        $member->is_titular = $request->has('is_titular');
        $member->order = $request->input('order', 0);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('organization', 'public');
            $member->image_path = $path;
        }

        $member->save();

        if ($member->is_titular) {
            MiembroOrganizacion::where('id', '!=', $member->id)->update(['is_titular' => false]);
        }

        return redirect()->route('admin.miembros_organizacion.index')->with('success', 'Miembro del organigrama creado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MiembroOrganizacion $miembros_organizacion)
    {
        return view('admin.miembros_organizacion.form', ['member' => $miembros_organizacion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MiembroOrganizacion $miembros_organizacion)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'area' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'phrase' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_titular' => 'boolean',
            'order' => 'nullable|integer',
        ]);

        $miembros_organizacion->fill($validated);
        $miembros_organizacion->is_titular = $request->has('is_titular');
        
        if ($request->has('order') && $request->input('order') !== null) {
            $miembros_organizacion->order = $request->input('order');
        }

        if ($request->hasFile('image')) {
            if ($miembros_organizacion->image_path) {
                Storage::disk('public')->delete($miembros_organizacion->image_path);
            }
            $path = $request->file('image')->store('organization', 'public');
            $miembros_organizacion->image_path = $path;
        }

        $miembros_organizacion->save();

        if ($miembros_organizacion->is_titular) {
            MiembroOrganizacion::where('id', '!=', $miembros_organizacion->id)->update(['is_titular' => false]);
        }

        return redirect()->route('admin.miembros_organizacion.index')->with('success', 'Miembro del organigrama actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MiembroOrganizacion $miembros_organizacion)
    {
        if ($miembros_organizacion->image_path) {
            Storage::disk('public')->delete($miembros_organizacion->image_path);
        }
        $miembros_organizacion->delete();

        return redirect()->route('admin.miembros_organizacion.index')->with('success', 'Miembro eliminado exitosamente.');
    }
}
