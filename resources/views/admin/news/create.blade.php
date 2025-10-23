<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create News
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form method="POST" action="{{ route('admin.news.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Title</label>
                    <input type="text" name="title" value="{{ old('title') }}"
                           class="w-full border-gray-300 rounded-md p-2 focus:ring-[#ADD8E6] focus:border-[#ADD8E6]"
                           placeholder="Enter news title" required>
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Content</label>
                    <textarea name="content" rows="6"
                              class="w-full border-gray-300 rounded-md p-2 focus:ring-[#ADD8E6] focus:border-[#ADD8E6]"
                              placeholder="Write the news content..." required>{{ old('content') }}</textarea>
                    @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-gray-300 rounded-md">Cancel</a>
                    <button type="submit"
                            class="ml-3 bg-[#66c8e8] hover:bg-[#B0E0E6] text-black font-bold px-4 py-2 rounded-md shadow">
                        Publish 
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
