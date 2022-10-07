<x-layout>

    <section class="w-full h-screen flex items-center flex-col">
        <div class="w-[1200px] h-16 flex items-center justify-center bg-orange-300 mt-24">
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">ID</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">NAME</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">EMAIL</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">PHONE</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">INCOME</div>

        </div>

             {{--     Foreach   --}}
        @forelse($people as $person)
        <div class="w-[1200px] h-16 flex items-center justify-center border-b-2">
            <div class="flex items-center justify-center h-[60px] w-[250px] text-xl ">{{$person->id}}</div>
            <div class="flex items-center justify-center h-[60px] w-[250px] text-xl font-semibold text-blue-800">{{$person->name}}</div>
            <div class="flex items-center justify-center h-[60px] w-[250px] text-xl font-semibold text-blue-800">{{$person->email}}</div>
            <div class="flex items-center justify-center h-[60px] w-[250px] text-xl font-semibold text-blue-800">{{$person->number}}</div>
            <div class="flex items-center justify-center h-[60px] w-[250px] text-xl font-semibold text-blue-800">{{$person->income}}</div>


        </div>
        @empty
            <div class="text-center text-xl ">No people yet</div>
        @endforelse
        {{--     Foreach   --}}
    </section>

</x-layout>
