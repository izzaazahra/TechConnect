{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title', 'Profil Mahasiswa')

@section('styles')
<style>
    body {
        background: linear-gradient(rgba(25, 85, 214, 0.5), rgba(25, 85, 214, 0.5)),
        url('{{ asset('images/kode.jpeg') }}') center/cover no-repeat fixed;
        min-height: 100vh;
        padding: 20px;
    }
    .profile-container {
        max-width: 500px;
        margin: 70px auto;
        padding: 50px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
        background-color: white;
    }
    .profile-img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .profile-header {
        background: linear-gradient(135deg, #F59E0B 0%, #1955d6 100%);
        color: white;
        padding: 20px;
        border-radius: 10px 10px 0 0;
        margin-bottom: 20px;
    }
    @media (max-width: 768px) {
        body {
            background: #1955d6;
        }
    }
</style>
@endsection

@section('content')
<div class="container profile-container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="profile-header text-center">
        <img src="images/orang1.png" alt="Foto Profil" class="profile-img rounded-circle mb-3">
        <h2>{{ $user->nama }}</h2>
        <p class="mb-0">Mahasiswa</p>
    </div>

    <div class="profile-details">
        <div class="mb-3">
            <h5 class="text-muted mb-2">Informasi Pribadi</h5>
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4 fw-bold">Nama:</div>
                        <div class="col-md-8">{{ $user->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 fw-bold">Email:</div>
                        <div class="col-md-8">{{ $user->email }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
