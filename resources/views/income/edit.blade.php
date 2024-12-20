@extends('project.app')

@section('content')
<div class="container">
    <h1>Edit Income</h1>
    <form action="{{ route('income.update', $income->id_income) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $income->date }}" required>
        </div>
        <div class="mb-3">
            <label>Source</label>
            <input type="text" name="source" class="form-control" value="{{ $income->source }}" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" value="{{ $income->amount }}" required>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="{{ route('income.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
