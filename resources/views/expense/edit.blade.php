@extends('project.app')

@section('content')
<div class="container">
    <h1>Edit Expense</h1>
    <form action="{{ route('expenses.update', $expense->id_expense) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $expense->date }}" required>
        </div>
        <div class="mb-3">
            <label>Necessities</label>
            <input type="text" name="necessites" class="form-control" value="{{ $expense->necessites }}" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $expense->amount }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('expenses.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
