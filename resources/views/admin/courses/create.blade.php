<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Course
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 rounded-2xl p-6 shadow-md border border-[#ADD8E6]/30">
                @if (session('success'))
                    <div class="mb-4 p-3 rounded-md bg-[#E6FBFF] text-[#004c59] border border-[#ADD8E6] shadow-sm">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.courses.store') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <textarea name="description" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="block font-semibold text-gray-700">Level</label>
                            <select name="level" class="border rounded w-full p-2 bg-white" required>
                                <option value="">Choose Level</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Start Time</label>
                                <input type="datetime-local" name="start_time" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">End Time</label>
                                <input type="datetime-local" name="end_time" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" required>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Quota</label>
                                <input type="number" name="quota" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Coach Name</label>
                                <input type="text" name="coach_name" class="mt-1 block w-full border border-sky-500 bg-white rounded-lg p-3 shadow-sm" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3">
                            <a href="{{ route('admin.courses.index') }}" class="px-4 py-2 rounded-md bg-gray-200 text-gray-800">Cancel</a>
                            <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-md bg-gradient-to-r from-[#ADD8E6] to-[#66c8e8] text-black font-medium shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" />
                                </svg>
                                Save Course
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
