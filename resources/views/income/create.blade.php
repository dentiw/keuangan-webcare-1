@extends('project.app')


@section('content')
<div class="container">
    <h1>Add Income</h1>
    <form action="{{ route('income.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Source</label>
            <input type="text" name="source" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('income.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
