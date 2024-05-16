<x-new-post-component>
    <div class="max-w-6xl mx-auto mt-8">
        <a href="{{ route('newposts.create') }}" class="px-4 py-2 text-white bg-indigo-500 rounded">Create</a>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Title</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Image</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Download</th>
                                <th scope="col" class="relative px-6 py-3">Edit Delete</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                    Show</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $newpost)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $newpost->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $newpost->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{$newpost->getFirstMediaUrl('images', 'thumb')}}" />
                                            
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img class="w-8 h-8 rounded-full"
                                            src="{{ $newpost->getFirstMedia('downloads')->getUrl('thumb') }}" />
                                    </td>
                                    <td class="px-6 py-4 text-right text-sm">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('newposts.edit', $newpost->id) }}"
                                                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Edit</a>
                                            <form class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                method="POST" action="{{ route('newposts.destroy', $newpost->id) }}"
                                                onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td> <a href="{{ route('show.img', $newpost->id) }}" class="px-4 py-2 text-white bg-indigo-500 rounded">Show</a></td>
                                </tr>
                            @endforeach-

                            <!-- More items... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-new-post-component.blade>
