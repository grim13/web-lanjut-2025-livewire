<x-layouts.app :title="__('Tambah Post')">
  <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data" class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
    @csrf
    <div class="mb-4">
      <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
      <input type="text" name="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
    </div>
    <div class="mb-4">
      <label for="slug" class="block text-gray-700 font-medium mb-2">Slug</label>
      <input type="text" name="slug" id="slug" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
    </div>
    <div class="mb-4">
      <label for="content" class="block text-gray-700 font-medium mb-2">Content</label>
      <textarea name="content" id="content" rows="6" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
    </div>
    <div class="mb-4">
      <label for="feature_image" class="block text-gray-700 font-medium mb-2">Feature Image</label>
      <input type="file" name="feature_image" id="feature_image" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300">
    </div>
    <div class="mb-4">
      <label for="categories" class="block text-gray-700 font-medium mb-2">Categories</label>
      @foreach($categories as $category)
        <div class="flex items-center mb-2">
          <input type="checkbox" name="categories[]" id="category_{{ $category->id }}" value="{{ $category->id }}" class="mr-2">
          <label for="category_{{ $category->id }}" class="text-gray-700">{{ $category->category }}</label>
        </div>
      @endforeach
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded hover:bg-blue-700 focus:outline-none">Submit</button>
  </form>
</x-layouts.app>