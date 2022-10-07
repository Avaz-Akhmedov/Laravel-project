<x-layout>

    <table class="w-full table-auto rounded-sm mt-28">
        @forelse($people as $person)
<tbody>
        <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <p class="text-2xl font-semibold">
                    {{$person->name}}
                </p>
            </td>

            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <a href="/people/{{$person->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>Edit</a>
            </td>

            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                <form action="/people/{{$person->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="text-red-600">
                        <i class="fa-solid fa-trash-can"></i>
                        Delete
                    </button>
                </form>
            </td>

        </tr>
        </tbody>
        @empty
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <p class="text-xl font-semibold text-center">
                       You don't have people
                    </p>
                </td>
        @endforelse
    </table>

</x-layout>
