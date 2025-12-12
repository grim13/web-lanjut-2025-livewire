<x-layouts.app :title="__('Data Post')">
    <a href="/post/add" class="inline-flex items-center px-4 py-2 mb-4 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 focus:outline-none">
      Add New Post
    </a>
    <table class="min-w-full divide-y divide-gray-200 shadow-sm sm:rounded-lg bg-white">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categories</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($posts as $key => $value)
                <tr class="even:bg-gray-50 hover:bg-gray-100">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $key + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $value->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $value->categories->pluck('category')->join(', ') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $value->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex items-center space-x-2">
                            <a href="/users/edit/{{ $value->id }}" class="inline-flex items-center px-3 py-1 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700 focus:outline-none">
                                Edit
                            </a>
                            <a href="/users/delete/{{ $value->id }}" class="inline-flex items-center px-3 py-1 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700 focus:outline-none">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $posts->links() }}
</x-layouts.app>