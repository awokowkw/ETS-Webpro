<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course: {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}" required
                        class="mt-1 block w-full border-gray-300 rounded p-2" />
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="4" required
                        class="mt-1 block w-full border-gray-300 rounded p-2">{{ old('description', $course->description) }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Level</label>
                        <input type="text" name="level" value="{{ old('level', $course->level) }}" required
                            class="mt-1 block w-full border-gray-300 rounded p-2" />
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Coach Name</label>
                        <input type="text" name="coach_name" value="{{ old('coach_name', $course->coach_name) }}" required
                            class="mt-1 block w-full border-gray-300 rounded p-2" />
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="datetime-local" name="start_time"
                            value="{{ old('start_time', \Carbon\Carbon::parse($course->start_time)->format('Y-m-d\TH:i')) }}" required
                            class="mt-1 block w-full border-gray-300 rounded p-2" />
                    </div>

                    <div class="mb-3">
                        <label class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="datetime-local" name="end_time"
                            value="{{ old('end_time', \Carbon\Carbon::parse($course->end_time)->format('Y-m-d\TH:i')) }}" required
                            class="mt-1 block w-full border-gray-300 rounded p-2" />
                    </div>
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Quota</label>
                    <input type="number" name="quota" value="{{ old('quota', $course->quota) }}" min="1" required
                        class="mt-1 block w-full border-gray-300 rounded p-2" />
                </div>

                <div class="flex gap-2 justify-end">
                    <a href="{{ route('admin.courses.index') }}" class="px-4 py-2 bg-gray-300 rounded">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">💾 Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
