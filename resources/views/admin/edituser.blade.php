@extends('Layouts.admin')

@section('content')
<div class="header">
    <h1>Edit User</h1>
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

<div class="content-container">
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="student" {{ $user->role === 'student' ? 'selected' : '' }}>Student</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label for="bio">Bio</label>
            <textarea id="bio" name="bio">{{ old('bio', $user->bio) }}</textarea>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.users') }}" class="cancel-btn">Cancel</a>
            <button type="submit" class="save-btn">Save Changes</button>
        </div>
    </form>
</div>

<style>
    .content-container {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #374151;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        font-size: 1rem;
    }

    .form-group textarea {
        min-height: 100px;
        resize: vertical;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 30px;
    }

    .cancel-btn {
        padding: 10px 20px;
        background-color: #e5e7eb;
        color: #374151;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .cancel-btn:hover {
        background-color: #d1d5db;
    }

    .save-btn {
        padding: 10px 20px;
        background-color: #1955d6;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .save-btn:hover {
        background-color: #1649b8;
    }
</style>
@endsection
