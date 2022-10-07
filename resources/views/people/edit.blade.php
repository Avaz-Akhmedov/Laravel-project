
<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100 mt-12">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Update information
            </h3>
            <form method="POST" action="/people/{{$person->id}}/edit">
                @csrf
                @method("PATCH")
                <div class="mt-4">
                    <div>
                        <label class="block" for="Name">Name<label>
                                <input type="text"
                                       name="name"
                                       placeholder="Name"
                                       value="{{$person->name}}"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"/>
                                @error("name")
                                <span class="text-xs text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block" for="email">Email<label>
                                <input type="text"
                                       name="email"
                                       placeholder="Email"
                                       value="{{$person->email}}}"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"/>
                                @error("email")
                                <span class="text-xs text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block">Phone<label>
                                <input type="number"
                                       name="number"
                                       placeholder="Phone number"
                                       value="{{$person->number}}"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600/">
                                @error("number")
                                <span class="text-xs text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="block">Income<label>
                                <input type="text"
                                       name="income"
                                       placeholder="Income not necessary"
                                       value="{{$person->income}}"
                                       class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600"/>
                                @error("income")
                                <span class="text-xs text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex">
                        <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                            Update
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>

</x-layout>
