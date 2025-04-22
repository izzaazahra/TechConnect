@extends('Layouts.admin')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Edit Course</h1>
    <div class="flex items-center space-x-3">
        <div class="bg-gray-600 text-white rounded-full w-10 h-10 flex items-center justify-center text-lg font-semibold">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
    </div>
</div>

<div class="bg-white p-6 rounded-lg shadow-md">
    <form action="{{ route('admin.courses.update', $course) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ old('title', $course->title) }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" rows="4" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category', $course->category) == $category ? 'selected' : '' }}>
                            {{ ucfirst($category) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                <select id="level" name="level" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Level</option>
                    @foreach($levels as $level)
                        <option value="{{ $level }}" {{ old('level', $course->level) == $level ? 'selected' : '' }}>
                            {{ ucfirst($level) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail Image</label>
            @if($course->thumbnail)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $course->thumbnail) }}" alt="Current thumbnail" class="w-48 rounded-md border border-gray-300">
                    <p class="text-xs text-gray-500 mt-1">Current Thumbnail</p>
                </div>
            @endif
            <input type="file" id="thumbnail" name="thumbnail" accept="image/*"
                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            <p class="text-xs text-gray-500 mt-1">Leave empty to keep current thumbnail</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="lessons_count" class="block text-sm font-medium text-gray-700">Lessons Count</label>
                <input type="number" id="lessons_count" name="lessons_count" min="0" value="{{ old('lessons_count', $course->lessons_count) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="challenges_count" class="block text-sm font-medium text-gray-700">Challenges Count</label>
                <input type="number" id="challenges_count" name="challenges_count" min="0" value="{{ old('challenges_count', $course->challenges_count) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
        </div>

        <div class="flex items-center space-x-2">
            <input type="checkbox" id="is_popular" name="is_popular" value="1" {{ old('is_popular', $course->is_popular) ? 'checked' : '' }}
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
            <label for="is_popular" class="text-sm text-gray-700">Mark as Popular Course</label>
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.courses') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-md hover:bg-gray-200">
                Cancel
            </a>
            <button type="submit"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700">
                Update Course
            </button>
        </div>
    </form>
</div>
@endsection
