<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("WELCOME TO THE BLOG!") }}
                </div>
            </div>

            <!-- Posts Section -->
            <div class="mt-8 bg-gray-300 shadow-md rounded">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold">Posts</h1>
                        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</a>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="bg-green-500 text-white p-4 mb-4 rounded">
                            {{ $message }}
                        </div>
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($posts as $post)
                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                @endif
                                <div class="p-6">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h2>
                                    <p class="text-gray-700 mb-4">{{ Str::limit($post->content, 100) }}</p>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">Delete</button>
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
