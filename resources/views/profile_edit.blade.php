@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('styles')
<style>
    body {
        background-color: #1955d6;
        padding: 20px;
    }

    .content-wrapper {
        margin-top: 85px; /* Menambah jarak dari navbar */
    }

    .edit-container {
        max-width: 600px;
        margin: 0 auto 50px;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.15);
        background-color: white;
    }

    .form-title {
        margin-bottom: 30px;
        color: #333;
        font-weight: 600;
    }

    .form-control {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #1955d6;
        box-shadow: 0 0 0 0.2rem rgba(25, 85, 214, 0.25);
    }

    .form-label {
        font-weight: 500;
        margin-bottom: 8px;
        color: #555;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s;
    }

    .btn-primary {
        background-color: #1955d6;
        border-color: #1955d6;
    }

    .btn-primary:hover {
        background-color: #1648b3;
        border-color: #1648b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #5a6268;
    }

    .alert {
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
    }
</style>
@endsection

@section('content')
<div class="container content-wrapper">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="edit-container">
                <h1 class="text-center form-title">Edit Profil</h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            value="{{ $user->nama }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('profile') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
