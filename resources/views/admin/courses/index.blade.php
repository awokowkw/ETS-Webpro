<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">Courses</h2>
    </x-slot>

    <div class="py-6 max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white/5 backdrop-blur-sm sm:rounded-lg p-6 border border-[#66c8e8]/25">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.courses.create') }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-md text-sm font-medium bg-gradient-to-r from-[#ADD8E6] to-[#66c8e8] text-black shadow-md hover:opacity-95 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd" />
                        </svg>
                        Add Course
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="mb-4 p-3 rounded-md bg-[#E6FBFF] text-[#004c59] border border-[#ADD8E6] shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($courses->isEmpty())
                <div class="py-12 text-center">
                    <p class="text-black-400">
                        No courses available yet. Create your first session to get started.
                    </p>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-[#66c8e8]/40 bg-white/5 rounded-lg overflow-hidden shadow-sm">
                        <thead class="bg-[#EAF6FF]/10">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">#</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">Course</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">Level</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">Coach</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">Start</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">End</th>
                                <th class="px-4 py-3 text-left text-xs font-semibold text-black-300">Participants</th>
                                <th class="px-4 py-3 text-center text-xs font-semibold text-black-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm text-black-200">
                            @foreach ($courses as $index => $course)
                                <tr class="even:bg-[#66c8e8]/6 hover:bg-white/3 transition">
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-start gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black-200 flex-shrink-0"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M4 7h16M7 7v4h10V7M9 11v6h6v-6" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M6 19h12v2H6z" />
                                            </svg>
                                            <div>
                                                <div class="font-medium text-black">{{ $course->title }}</div>
                                                <div class="text-xs text-black-300">
                                                    {{ Str::limit($course->description, 80) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">{{ $course->level }}</td>

                                    <td class="px-4 py-3">
                                        <div class="text-sm text-black font-medium">{{ $course->coach_name }}</div>
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($course->start_time)->format('d M Y, H:i') }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($course->end_time)->format('d M Y, H:i') }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        {{ $course->enrollments->count() }}/{{ $course->quota }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.courses.edit', $course->id) }}" title="Edit"
                                               class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-black text-white text-sm shadow-sm hover:opacity-95 transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M17.414 2.586a2 2 0 010 2.828l-10 10A2 2 0 016 16H3a1 1 0 01-1-1v-3a2 2 0 01.586-1.414l10-10a2 2 0 012.828 0z" />
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.courses.destroy', $course->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this course?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-red-600 text-white text-sm shadow-sm hover:bg-red-700 transition">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                         viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h14a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 6a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 10-2 0v6a1 1 0 102 0V8z"
                                                              clip-rule="evenodd" />
                                                    </svg>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>