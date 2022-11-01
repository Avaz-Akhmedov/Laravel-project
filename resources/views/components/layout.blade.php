<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>People managment</title>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
          crossorigin="anonymous"
          referrerpolicy="no-referrer"/>
</head>
<body>

@admin
<header class="w-full h-[70px] absolute top-0 left-0 flex items-center justify-between bg-gray-300">
        <div>
            <a href="/admin" class="ml-16 text-4xl font-semibold text-[#492540]">CruD</a>
        </div>

        <ul class="mr-16 flex items-center gap-7 text-2xl font-semibold">

            <li>
                <a href="/admin/users">Users<i class="fa-solid fa-users"></i></a>
            </li>

            <li>
                <form action="{{url("/logout")}}" method="POST">
                    @csrf
                    <button>Logout <i class="fa-solid fa-right-from-bracket"></i></button>
                </form>
            </li>
        </ul>
    </header>

@else

    <header class="w-full h-[70px] absolute top-0 left-0 flex items-center justify-between bg-gray-300">
        <div>
            <a href="/" class="ml-16 text-4xl font-semibold text-[#492540]">CruD</a>
        </div>


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
    </header>



    @endadmin





<main>{{$slot}}</main>
</body>
</html>
