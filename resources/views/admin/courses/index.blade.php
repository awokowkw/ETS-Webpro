<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Course List
        </h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">All Courses</h3>
                <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">
                    + Add New Course
                </a>
            </div>

            @if (session('success'))
                <div class="mb-3 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($courses->isEmpty())
                <p class="text-gray-500">No courses found.</p>
            @else
                <table class="min-w-full border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="p-2 border">#</th>
                            <th class="p-2 border">Title</th>
                            <th class="p-2 border">Level</th>
                            <th class="p-2 border">Coach</th>
                            <th class="p-2 border">Start Time</th>
                            <th class="p-2 border">End Time</th>
                            <th class="p-2 border text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $index => $course)
                            <tr class="hover:bg-gray-50">
                                <td class="p-2 border">{{ $index + 1 }}</td>
                                <td class="p-2 border">{{ $course->title }}</td>
                                <td class="p-2 border">{{ $course->level }}</td>
                                <td class="p-2 border">{{ $course->coach_name }}</td>
                                <td class="p-2 border">{{ \Carbon\Carbon::parse($course->start_time)->format('d M Y, H:i') }}</td>
                                <td class="p-2 border">{{ \Carbon\Carbon::parse($course->end_time)->format('d M Y, H:i') }}</td>

                                {{-- ✨ Action Buttons --}}
                                <td class="p-2 border text-center">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('admin.courses.edit', $course->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                        ✏️ Edit
                                        </a>

                                        <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this course?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                                🗑 Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            @endif

        </div>
    </div>
</x-app-layout>
