<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 min-h-screen flex items-center justify-center">
    <div class="container mx-auto px-4 py-12">
        <div class="max-w-4xl mx-auto bg-white p-10 shadow-lg rounded-lg">
            <h1 class="text-4xl font-bold text-gray-800 mb-8 text-center">Create Post</h1>

            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="title" class="block text-gray-700 text-sm font-semibold mb-2">Title</label>
                    <input type="text" name="title" id="title" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="content" class="block text-gray-700 text-sm font-semibold mb-2">Content</label>
                    <textarea name="content" id="content" rows="6" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="image" class="block text-gray-700 text-sm font-semibold mb-2">Image</label>
                    <input type="file" name="image" id="image" class="w-full mt-1 px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent">
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="submit" class="bg-pink-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500">Save Post</button>
                    <a href="{{ route('posts.index') }}" class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
