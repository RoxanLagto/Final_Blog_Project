<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Post Details</title>
</head>
<body class="bg-gradient-to-br from-blue-100 via-green-100 to-pink-100">

    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-gradient-to-r from-yellow-50 via-orange-50 to-red-50 p-8 shadow-lg rounded-lg border border-gray-300">
            <h1 class="text-4xl font-bold text-purple-800 mb-4">{{ $post->title }}</h1>

            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-auto mb-4 rounded-lg shadow-lg border-4 border-blue-300">
            @else
                <p class="text-gray-600 mb-4">No image available</p>
            @endif

            <p class="text-gray-800 mb-6">{{ $post->content }}</p>

            <div class="flex space-x-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="bg-gradient-to-r from-yellow-400 via-yellow-500 to-yellow-600 text-white px-4 py-2 rounded-lg shadow-md hover:from-yellow-500 hover:via-yellow-600 hover:to-yellow-700 transition">
                    Edit Post
                </a>
                <a href="{{ route('posts.index') }}" class="bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 text-white px-4 py-2 rounded-lg shadow-md hover:from-teal-500 hover:via-teal-600 hover:to-teal-700 transition">
                    Back to Posts
                </a>
            </div>
        </div>
    </div>

</body>
</html>
