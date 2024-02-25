<x-layout>
    <x-setting heading="Manage Posts">
        <div class="flex flex-col">
            <div class="overflow-x-auto -m-16">
                <div class="align-middle inline-block min-w-full">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Views
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Author
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created at
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Edit
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Delete
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Publish
                                </th>
                            </tr>


                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-light text-sm text-gray-900">
                                            {{ $post->id }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center ">
                                            <div class="text-gray-900">
                                                @if ($post->category)
                                                    <a href="/posts/{{ $post->handle }}"
                                                       class="font-light text-sm text-gray-900 hover:text-purple-500">
                                                        {{ $post->title }}
                                                    </a>
                                                @else
                                                    <p class="font-light text-sm text-gray-900 hover:text-purple-500">{{ $post->title }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="font-light text-sm text-gray-900">
                                            {{ $post->view_count }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($post->category)
                                            <div class="flex items-center">
                                                <div class="font-light text-sm text-gray-900">
                                                    {{ $post->category->name }}
                                                </div>
                                            </div>
                                        @else
                                            <h1 class="text-red-500 font-medium text-xs">None</h1>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($post->author)
                                            <div class="flex items-center">
                                                <div class="font-light text-sm text-gray-900">
                                                    {{ $post->author->username }}
                                                </div>
                                            </div>
                                        @else
                                            <h1 class="text-red-500 font-medium text-xs">None</h1>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="font-light text-sm text-gray-900">
                                                {{ $post->created_at->format('d.m.Y - H:i') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($post->status === 'published')
                                            <span class="uppercase px-2 inline-flex leading-5 rounded-full bg-green-100 text-green-500 font-medium text-xs">
                                                {{ $post->status }}
                                            </span>
                                        @elseif ($post->status === 'draft')
                                            <span class="uppercase px-2 inline-flex leading-5 rounded-full bg-yellow-100 text-yellow-500 font-medium text-xs">
                                                {{ $post->status }}
                                            </span>
                                        @else
                                            <span class="uppercase px-2 inline-flex leading-5 rounded-full bg-red-100 text-red-500 font-medium text-xs">
                                                {{ $post->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/admin/posts/{{ $post->id }}"
                                           class="text-sm font-light text-purple-500 hover:text-blue-900">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form id="post-delete-form" method="POST"
                                              action="/admin/posts/{{ $post->id }}"
                                              class="text-xs font-semibold">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-sm font-light text-gray-400 hover:text-gray-900">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($post->status === 'draft' || $post->status === 'deleted')
                                            <form id="post-publish-form" method="POST"
                                                  action="/admin/posts/{{ $post->id }}"
                                                  class="text-xs font-semibold">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" id="status" name="status" value="published">

                                                <button type="submit"
                                                        class="transition-colors duration-300 text-purple-500 rounded-full text-xs font-normal px-2 py-1 border border-purple-500 hover:bg-purple-500 hover:text-white">
                                                    Publish
                                                </button>
                                            </form>
                                        @elseif ($post->status === 'published')
                                            <form id="post-publish-form" method="POST"
                                                  action="/admin/posts/{{ $post->id }}"
                                                  class="text-xs font-semibold">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" id="status" name="status" value="draft">

                                                <button type="submit"
                                                        class="transition-colors duration-300 text-purple-500 rounded-full text-xs font-normal px-2 py-1 border border-purple-500 hover:bg-purple-500 hover:text-white">
                                                    Draft
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>