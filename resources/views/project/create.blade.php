@extends('project.app')

@section('content')
<div class="container">
    <h1>Tambah Proyek</h1>

    <form action="{{ route('total-project.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <input type="text" name="type" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Biaya</label>
            <input type="number" name="cost" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Klien</label>
            <input type="text" name="client" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('total-project.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
