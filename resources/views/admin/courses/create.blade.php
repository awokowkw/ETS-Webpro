<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add New Course
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.courses.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="block font-semibold">Title</label>
                        <input type="text" name="title" class="border rounded w-full p-2" required>
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold">Description</label>
                        <textarea name="description" class="border rounded w-full p-2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="block font-semibold">Level</label>
                        <input type="text" name="level" class="border rounded w-full p-2" placeholder="Beginner / Intermediate / Advanced" required>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="block font-semibold">Start Time</label>
                            <input type="datetime-local" name="start_time" class="border rounded w-full p-2" required>
                        </div>
                        <div>
                            <label class="block font-semibold">End Time</label>
                            <input type="datetime-local" name="end_time" class="border rounded w-full p-2" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-3">
                        <div>
                            <label class="block font-semibold">Quota</label>
                            <input type="number" name="quota" class="border rounded w-full p-2" required>
                        </div>
                        <div>
                            <label class="block font-semibold">Coach Name</label>
                            <input type="text" name="coach_name" class="border rounded w-full p-2" required>
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Save Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
