<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-ivory-50/60 rounded-2xl p-6 shadow-lg border border-amber-100 mb-6">
                <h3 class="text-2xl font-semibold text-gray-900">Admin Dashboard</h3>
                <p class="mt-1 text-sm text-gray-500">Overview and quick actions for your academy.</p>
                <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.courses.index') }}" class="block rounded-lg p-4 bg-white shadow-sm border border-amber-50 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">Manage Courses</h4>
                                <p class="text-sm text-gray-500 mt-1">Create, edit, and schedule sessions.</p>
                            </div>
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12A9 9 0 1112 3a9 9 0 019 9z" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    <a href="#" class="block rounded-lg p-4 bg-white shadow-sm border border-amber-50 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">Manage News</h4>
                                <p class="text-sm text-gray-500 mt-1">Announcements and course updates.</p>
                            </div>
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2z" />
                                </svg>
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('admin.courses.create') }}" class="block rounded-lg p-4 bg-white shadow-sm border border-amber-50 hover:shadow-md transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h4 class="text-lg font-medium text-gray-900">Create Course</h4>
                                <p class="text-sm text-gray-500 mt-1">Quickly add a new training session.</p>
                            </div>
                            <div class="text-amber-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Removed duplicate lower panel; top cards above used instead. --}}
        </div>
    </div>
</x-app-layout>
