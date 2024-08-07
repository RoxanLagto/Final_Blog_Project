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
            <div class="mt-8 bg-white shadow-md rounded">
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

                    <table class="w-full bg-white">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Content</th>
                                <th class="border px-4 py-2">Image</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="border px-4 py-2">{{ $post->title }}</td>
                                    <td class="border px-4 py-2">{{ Str::limit($post->content, 50) }}</td>
                                    <td class="border px-4 py-2">
                                        @if ($post->image)
                                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-16 h-16 object-cover">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <a href="{{ route('posts.show', $post->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">View</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
