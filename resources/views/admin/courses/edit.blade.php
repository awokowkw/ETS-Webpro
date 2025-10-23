<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Course: {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white/5 rounded-2xl p-6 shadow-md border border-[#ADD8E6]/30">
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

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" value="{{ old('title', $course->title) }}" required
                            class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" rows="4" required
                            class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm">{{ old('description', $course->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-3">
                            <label class="block font-semibold text-gray-700">Level</label>
                            <select name="level" class="border rounded w-full p-2 bg-white" required>
                                <option value="Beginner" {{ $course->level == 'Beginner' ? 'selected' : '' }}>Beginner</option>
                                <option value="Intermediate" {{ $course->level == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>
                                <option value="Advanced" {{ $course->level == 'Advanced' ? 'selected' : '' }}>Advanced</option>
                            </select>
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700">Coach Name</label>
                            <input type="text" name="coach_name" value="{{ old('coach_name', $course->coach_name) }}" required
                                class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Start Time</label>
                            <input type="datetime-local" name="start_time"
                                value="{{ old('start_time', \Carbon\Carbon::parse($course->start_time)->format('Y-m-d\\TH:i')) }}" required
                                class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">End Time</label>
                            <input type="datetime-local" name="end_time"
                                value="{{ old('end_time', \Carbon\Carbon::parse($course->end_time)->format('Y-m-d\\TH:i')) }}" required
                                class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Quota</label>
                        <input type="number" name="quota" value="{{ old('quota', $course->quota) }}" min="1" required
                            class="mt-1 block w-full border border-amber-100 bg-white rounded-lg p-3 shadow-sm" />
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <a href="{{ route('admin.courses.index') }}" class="px-4 py-2 rounded-md bg-gray-200 text-gray-800">Cancel</a>
                        <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-[#ADD8E6] to-[#66c8e8] text-black font-medium shadow-sm"> 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M17 9V7a2 2 0 00-2-2h-1V3a1 1 0 00-1-1H7a1 1 0 00-1 1v2H5a2 2 0 00-2 2v2h14z" />
                                <path d="M3 11v4a2 2 0 002 2h10a2 2 0 002-2v-4H3z" />
                            </svg>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
