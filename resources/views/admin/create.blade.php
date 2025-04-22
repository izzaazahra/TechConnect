@extends('Layouts.admin')

@section('content')
<div class="header">
    <h1>Create New Course</h1>
    <div class="user-info">
        <div class="user-avatar">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span>{{ Auth::user()->name }}</span>
    </div>
</div>

<div class="content-container">
    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="level">Level</label>
                <select id="level" name="level" required>
                    <option value="">Select Level</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}" {{ old('level') == $level ? 'selected' : '' }}>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="thumbnail">Thumbnail Image</label>
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*">
            <p class="help-text">Recommended size: 800x450 pixels</p>
        </div>

        <div class="form-group">
            <label for="lessons_count">Lessons Count</label>
            <input type="number" id="lessons_count" name="lessons_count" value="{{ old('lessons_count', 0) }}" min="0">
        </div>

        <div class="form-group">
            <label for="challenges_count">Challenges Count</label>
            <input type="number" id="challenges_count" name="challenges_count" value="{{ old('challenges_count', 0) }}" min="0">
        </div>

        <div class="form-group checkbox-group">
            <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
            <label for="is_popular">Mark as Popular Course</label>
        </div>

        <div class="form-actions">
            <a href="{{ route('admin.courses') }}" class="cancel-btn">Cancel</a>
            <button type="submit" class="save-btn">Create Course</button>
        </div>
    </form>
</div>

<style>
    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .help-text {
        font-size: 0.75rem;
        color: #6b7280;
        margin-top: 4px;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
    }

    .checkbox-group input {
        width: auto;
        margin-right: 10px;
    }

    .checkbox-group label {
        margin-bottom: 0;
    }
</style>
@endsection
