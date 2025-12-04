<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class CompanyController extends Controller
{
    public function index()
    {
        return view('company.index');
    }

    public function show($id)
    {
        // Ambil data company dari database
        $company = \App\Models\Company::find($id);

        if (!$company) {
            return redirect()->route('company.index')->with('error', 'Company tidak ditemukan');
        }

        return view('company.show', compact('company'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        \App\Models\Company::create($validated);

        return redirect()->route('company.index')->with('success', 'Company berhasil ditambahkan');
    }

    public function edit($id)
    {
        $company = \App\Models\Company::find($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = \App\Models\Company::find($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        $company->update($validated);

        return redirect()->route('company.index')->with('success', 'Company berhasil diupdate');
    }

    public function destroy($id)
    {
        $company = \App\Models\Company::find($id);
        $company->delete();

        return redirect()->route('company.index')->with('success', 'Company berhasil dihapus');
    }
}