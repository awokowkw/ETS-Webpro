<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            News Management
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-6 px-4">

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('admin.news.create') }}"
               class="bg-[#66c8e8] hover:bg-[#B0E0E6] text-black font-semibold px-4 py-2 rounded shadow">
                + Add News
            </a>

            @if (session('success'))
                <div class="p-2 bg-green-100 text-green-700 rounded text-sm">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            @if ($news->count())
                <table class="w-full border-collapse text-sm md:text-base">
                    <thead>
                        <tr class="bg-gray-100 border-b text-gray-700">
                            <th class="p-3 text-left">#</th>
                            <th class="p-3 text-left">Title</th>
                            <th class="p-3 text-left">Author</th>
                            <th class="p-3 text-left">Published</th>
                            <th class="p-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $item)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="p-3">{{ $loop->iteration }}</td>
                                <td class="p-3 font-medium text-gray-800">{{ $item->title }}</td>
                                <td class="p-3">{{ $item->user->name ?? 'Unknown' }}</td>
                                <td class="p-3">
                                    {{ $item->published_at ? $item->published_at->format('d M Y, H:i') : '-' }}
                                </td>
                                <td class="p-3 text-center flex gap-2 justify-center">

                                    <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this news?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm shadow">
                                            Delete
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600 text-center py-6">No news articles yet.</p>
            @endif
        </div>
    </div>
</x-app-layout>
