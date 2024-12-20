<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IncomeController extends Controller
{
    public function index()
    {
        $incomes = Income::all();
        return view('income', compact('incomes'));
    }

    // 2. Tampilkan form tambah data
    public function create()
    {
        return view('income.create');
    }

    // 3. Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Income::create($request->all());
        return redirect()->route('income.index')->with('success', 'Income created successfully.');
    }

    // 4. Tampilkan form edit data
    public function edit($id)
    {
        $income = Income::findOrFail($id);
        return view('income.edit', compact('income'));
    }

    // 5. Simpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'source' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $income = Income::findOrFail($id);
        $income->update($request->all());
        return redirect()->route('income.index')->with('success', 'Income updated successfully.');
    }

    // 6. Hapus data
    public function destroy($id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        return redirect()->route('income.index')->with('success', 'Income deleted successfully.');
    }
}
