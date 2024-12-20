<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();
        return view('expense', compact('expenses'));
    }

    // 2. Tampilkan form untuk menambah data
    public function create()
    {
        return view('expense.create');
    }

    // 3. Simpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'necessites' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        Expense::create($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }

    // 4. Tampilkan form edit
    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expense.edit', compact('expense'));
    }

    // 5. Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'necessites' => 'required|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    // 6. Hapus data
    public function destroy($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
