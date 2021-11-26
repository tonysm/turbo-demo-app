<a
    class="hidden px-2 py-10 text-gray-500 bg-white border-t border-b rounded md:block md:px-8 lg:px-16"
    href="{{ route('entries.comments.create', $entry) }}"
>
    <span class="text-base text-gray-500 md:text-lg">Add a comment here...</span>
</a>

<a
    class="block px-4 py-2 m-4 text-base font-semibold text-center text-white bg-gray-800 rounded-full md:hidden"
    href="{{ route('entries.comments.create', $entry) }}"
    data-turbo-frame="_top"
>
    New Comment
</a>
