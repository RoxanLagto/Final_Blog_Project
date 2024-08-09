<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-100 via-pink-100 to-yellow-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-300">
                <div class="p-6 text-gray-900">
                    {{ __("WELCOME TO THE BLOG!") }}
                </div>
            </div>

            <div class="mt-8 bg-gradient-to-br from-blue-200 to-purple-300 shadow-lg rounded-lg border border-gray-300">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
                        <a href="{{ route('posts.create') }}" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-lg hover:from-purple-600 hover:to-pink-600 transition">
                            Create Post
                        </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="bg-gradient-to-r from-green-400 to-green-600 text-white p-4 mb-4 rounded-lg border border-green-500">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            <div class="bg-gradient-to-br from-white via-gray-100 to-gray-200 shadow-lg rounded-lg overflow-hidden border border-gray-300">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-t-lg">
                                @endif
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="bg-gradient-to-r from-teal-500 to-teal-700 text-white px-4 py-2 rounded-lg hover:from-teal-600 hover:to-teal-800 transition">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-gradient-to-r from-indigo-500 to-indigo-700 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-indigo-800 transition">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded-lg hover:from-red-600 hover:to-red-800 transition">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
