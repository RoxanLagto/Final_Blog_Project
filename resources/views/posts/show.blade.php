<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Post Details</title>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded">
            <h1 class="text-3xl font-semibold text-gray-800 mb-4">{{ $post->title }}</h1>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto mb-4 rounded">
            @else
                <p>No image available</p>
            @endif

            <p class="text-gray-700 mb-4">{{ $post->content }}</p>

            <div class="flex space-x-2">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit Post</a>
                <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back to Posts</a>
            </div>
        </div>
    </div>

</body>
</html>
