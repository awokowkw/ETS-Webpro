<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p>Halo {{ Auth::user()->name }} 👋</p>
                <ul class="list-disc ml-6 mt-3">
                    <li><a href="#">View Courses (soon)</a></li>
                    <li><a href="#">Read News (soon)</a></li>
                    <li><a href="#">Give Feedback (soon)</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
