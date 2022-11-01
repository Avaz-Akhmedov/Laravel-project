<x-layout>

    <table class="text-left w-full mt-32">
        <thead class="bg-black flex text-white w-full">
        <tr class="flex  w-full mb-4">
            <th class="p-4 w-1/4  uppercase">Name</th>
            <th class="p-4 w-1/4  uppercase">Email</th>
            <th class="p-4 w-1/4  uppercase">People</th>
            <th class="p-4 w-1/4  uppercase">Actions</th>
        </tr>
        </thead>
@forelse($users as $user)
        <tbody class="bg-grey-light flex flex-col items-center justify-between items-center overflow-y-scroll w-full">
        <tr class="flex w-full mb-4">
            <td class="p-4 w-1/4 text-xl font-semibold">
                <p>{{$user->name}}</p>
            </td>
            <td class="p-4 w-1/4 text-xl font-semibold">
                <p>{{$user->email}}</p>
            </td>
            <td class="p-4 w-1/4 text-xl font-semibold">
                <a href="/admin/users/{{$user->id}}/people" class="text-blue-800 underline" >Manage</a>
            </td>
            <td class="p-4 w-1/4 text-xl font-semibold flex items-center gap-4">
                <a href="/admin/users/{{$user->id}}/edit" class="text-white bg-blue-600 px-3 rounded py-1 cursor-pointer">Edit</a>
                <form action="/admin/users/{{$user->id}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="px-3 py-1 text-white bg-red-600 rounded">Delete</button>
                </form>
            </td>
        </tr>
        </tbody>
        @empty
            <tr class="flex w-full mb-4">
                <td class="p-4 w-1/4 text-xl text-center font-semibold">
                    <p>No users yet</p>
                </td>
        @endforelse
    </table>
</x-layout>
