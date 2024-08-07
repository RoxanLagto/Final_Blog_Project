
<div class="container mx-auto px-4 py-12">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Posts</h1>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Post</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-500 text-white p-4 mb-4 rounded">
            {{ $message }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded">
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
