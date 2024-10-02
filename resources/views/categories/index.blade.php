<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('categories.create') }}"
                        class="bg-green-600 text-white font-bold py-2 px-4 rounded shadow hover:bg-green-700 transition duration-300 mb-4">Create
                        New Category</a>

                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="border px-4 py-2">{{ $category->name }}</td>
                                    <td class="border px-4 py-2">{{ $category->description }}</td>
                                    <td class="border px-4 py-2 flex space-x-2">
                                        <a href="{{ route('categories.show', $category->id) }}"
                                            class="bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow hover:bg-blue-700 transition duration-300">View</a>
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="bg-yellow-500 text-white font-semibold py-1 px-3 rounded shadow hover:bg-yellow-600 transition duration-300">Edit</a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-600 text-white font-semibold py-1 px-3 rounded shadow hover:bg-red-700 transition duration-300">Delete</button>
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
