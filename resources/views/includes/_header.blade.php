







    <header class="w-full h-[70px] absolute top-0 left-0 flex items-center justify-between bg-gray-300">
        <div>
            <a href="/" class="ml-16 text-4xl font-semibold text-[#492540]">CruD</a>
        </div>

        @admin
        <ul class="mr-16 flex items-center gap-7 text-2xl font-semibold">

            <li>
                <a href="/admin/users/registered"><i class="fa-sharp fa-solid fa-registered"></i>egistered Users </a>
            </li>

            <li>
                <form action="{{url("/logout")}}" method="POST">
                    @csrf
                    <button>Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </li>
        </ul>

        @else

        <ul class="mr-16 flex items-center gap-7 text-2xl font-semibold">

            @auth

                <li>
                    <a href="/people/create">Create</a>
                </li>

                <li>
                    <a href="/people/manage">Manage<i class="fa-solid fa-gear"></i></a>
                </li>

                <li>
                    <form action="{{url("/logout")}}" method="POST">
                        @csrf
                        <button>Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                    </form>
                </li>
            @else
                <li>
                    <a href="/register"><i class="fa-solid fa-registered"></i>egister</a>
                </li>

                <li>
                    <a href="/login">Log<i class="fa-solid fa-right-to-bracket"></i></a>
                </li>
        </ul>
        @endauth

        @endadmin
    </header>



