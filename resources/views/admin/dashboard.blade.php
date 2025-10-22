<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>You're logged in as admin.</p>
                <ul class="list-disc ml-6 mt-3">
                    <li><a href="#">Manage Courses (soon)</a></li>
                    <li><a href="#">Manage News (soon)</a></li>
                </ul>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('admin.courses.index') }}" 
                    class="bg-blue-600 text-white px-3 py-2 rounded mr-2">
                    📘 Manage Courses
                </a>
                <br><br><br>
                <a href="{{ route('admin.courses.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded">+ Create New Course</a>
            </div>
        </div>
    </div>
</x-app-layout>
