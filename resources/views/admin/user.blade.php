@extends('Layouts.admin')

@section('content')
<div class="header">
    <h1>User Management</h1>
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

<div class="content-container">
    <div class="toolbar">
        <form action="{{ route('admin.users') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search users..." value="{{ request('search') }}">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>

    <div class="table-container">
        <table class="user-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Joined</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <span class="role-badge {{ $user->role === 'admin' ? 'admin' : 'student' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.users.edit', $user) }}" class="edit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.users.delete', $user) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure?')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>
</div>

<style>
    .content-container {
        background: white;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .toolbar {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .search-form {
        display: flex;
        align-items: center;
    }

    .search-form input {
        padding: 8px 12px;
        border: 1px solid #d1d5db;
        border-radius: 5px;
        margin-right: 10px;
        width: 300px;
    }

    .search-form button {
        background: none;
        border: none;
        cursor: pointer;
        color: #6b7280;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
    }

    .user-table th, .user-table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .user-table th {
        background-color: #f9fafb;
        font-weight: 600;
        color: #374151;
    }

    .role-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .role-badge.admin {
        background-color: #dbeafe;
        color: #1e40af;
    }

    .role-badge.student {
        background-color: #ecfccb;
        color: #365314;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .edit-btn, .delete-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 5px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .edit-btn {
        color: #3b82f6;
    }

    .edit-btn:hover {
        background-color: #bfdbfe;
    }

    .delete-btn {
        color: #ef4444;
    }

    .delete-btn:hover {
        background-color: #fecaca;
    }

    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .pagination .page-item.active .page-link {
        background-color: #1955d6;
        border-color: #1955d6;
    }

    .pagination .page-link {
        color: #1955d6;
    }
</style>
@endsection
