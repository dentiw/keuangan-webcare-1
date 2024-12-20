@extends('project.app')

@section('content')
<div class="container">
    <h1>Edit Total Project</h1>
    <form action="{{ route('total-project.update', $project->id_total_project) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal</label>
            <input type="date" name="date" class="form-control" id="date" value="{{ $project->date }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Jenis</label>
            <input type="text" name="type" class="form-control" id="type" value="{{ $project->type }}" required>
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Klien</label>
            <input type="text" name="client" class="form-control" id="client" value="{{ $project->client }}" required>
        </div>

        <div class="mb-3">
            <label for="cost" class="form-label">Biaya</label>
            <input type="number" name="cost" class="form-control" id="cost" value="{{ $project->cost }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="{{ route('total-project.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
