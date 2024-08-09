<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-cyan-100 via-yellow-100 to-pink-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-green-100 via-blue-100 to-purple-100 shadow-lg rounded-lg overflow-hidden border border-gray-300">
                <div class="p-6 text-gray-900 bg-gradient-to-r from-yellow-200 to-orange-200">
                    {{ __("WELCOME TO THE BLOG!") }}
                </div>
            </div>

            <div class="mt-8 bg-gradient-to-br from-pink-200 to-teal-300 shadow-lg rounded-lg border border-gray-300">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold text-gray-900">Posts</h1>
                        <a href="{{ route('posts.create') }}" class="bg-gradient-to-r from-blue-400 to-green-500 text-white px-4 py-2 rounded-lg hover:from-blue-500 hover:to-green-600 transition">
                            Create Post
                        </a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="bg-gradient-to-r from-teal-300 to-teal-500 text-white p-4 mb-4 rounded-lg border border-teal-600">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            <div class="bg-gradient-to-br from-white via-gray-200 to-gray-300 shadow-lg rounded-lg overflow-hidden border border-gray-300">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-t-lg">
                                @endif
                                <div class="p-6 bg-gradient-to-br from-gray-50 via-gray-100 to-gray-200">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="bg-gradient-to-r from-cyan-400 to-cyan-600 text-white px-4 py-2 rounded-lg hover:from-cyan-500 hover:to-cyan-700 transition">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-gradient-to-r from-indigo-400 to-indigo-600 text-white px-4 py-2 rounded-lg hover:from-indigo-500 hover:to-indigo-700 transition">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-gradient-to-r from-red-400 to-red-600 text-white px-4 py-2 rounded-lg hover:from-red-500 hover:to-red-700 transition">Delete</button>
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
