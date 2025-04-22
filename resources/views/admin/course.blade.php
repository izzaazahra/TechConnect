@extends('Layouts.admin')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="header">
    <h1 class="text-3xl font-bold text-gray-800">Course Management</h1>
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

<div class="content-container">
    <div class="toolbar">
        <a href="{{ route('admin.courses.create') }}"
        class="inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition">
        Create New Course
    </a>
        <form action="{{ route('admin.courses') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search courses..." value="{{ request('search') }}">
            <button type="submit">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>

    <div class="table-container">
        <table class="course-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Level</th>
                    <th>Modules</th>
                    <th>Popular</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->title }}</td>
                    <td>
                        <span class="category-badge">{{ ucfirst($course->category) }}</span>
                    </td>
                    <td>
                        <span class="level-badge {{ $course->level }}">{{ ucfirst($course->level) }}</span>
                    </td>
                    <td>{{ $course->modules_count }}</td>
                    <td>
                        @if($course->is_popular)
                            <span class="popular-badge">Yes</span>
                        @else
                            <span class="not-popular-badge">No</span>
                        @endif
                    </td>
                    <td class="actions">
                        <a href="{{ route('admin.courses.edit', $course) }}" class="edit-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                            </svg>
                        </a>
                        <form action="{{ route('admin.courses.delete', $course) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure? This will delete all associated modules and videos.')">
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

<!-- Pagination Component -->
<div class="flex items-center justify-center mt-8 space-x-2">
        <a href="#" class="px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm flex items-center">
        <i class="fas fa-chevron-left mr-1"></i> Prev
        </a>
        <a href="#" class="px-3 py-2 rounded-md bg-blue-600 text-white text-sm font-medium">1</a>
        <a href="#" class="px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm">2</a>
        <a href="#" class="px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm">3</a>
        <a href="#" class="px-3 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm flex items-center">
        Next <i class="fas fa-chevron-right ml-1"></i>
    </a>
  </div>
    </div>
</div>

<style>
            .sidebar-header {
            padding: 20px 0;
            border-bottom: 1px solid #374151;
            margin-bottom: 20px;
        }

    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-weight: 500;
    }


    .content-container {
        max-width: 1200px;
        margin: auto;
        padding: 1rem;
    }

    .toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .search-form {
        display: flex;
        gap: 0.5rem;
    }

    .search-form input {
        padding: 6px 10px;
        border: 1px solid #d1d5db;
        border-radius: 4px;
        font-size: 0.875rem;
    }

    .search-form button {
        background-color: #2563eb;
        color: white;
        border: none;
        padding: 6px 10px;
        border-radius: 4px;
        cursor: pointer;
    }

    .table-container {
        overflow-x: auto;
    }

    .course-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.875rem;
        background-color: white;
        border: 1px solid #e5e7eb;
    }

    .course-table th,
    .course-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e5e7eb;
    }

    .course-table th {
        background-color: #f3f4f6;
        font-weight: 600;
    }

    .actions {
        display: flex;
        gap: 8px;
    }

    .edit-btn,
    .delete-btn {
        background: none;
        border: none;
        cursor: pointer;
        padding: 4px;
    }

    .pagination {
        margin-top: 1rem;
        display: flex;
        justify-content: center;
    }

    @media (max-width: 768px) {
        .toolbar {
            flex-direction: column;
            align-items: stretch;
        }

        .search-form {
            width: 100%;
        }

        .search-form input {
            flex: 1;
        }

        .actions {
            flex-direction: column;
        }
    }
</style>

@endsection
