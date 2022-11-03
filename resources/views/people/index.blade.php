<x-layout>

    <section class="w-full h-screen flex items-center flex-col">
        <div class="w-[1200px] h-16 flex items-center justify-center bg-orange-300 mt-24">
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">ID</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">NAME</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">EMAIL</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">PHONE</div>
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">INCOME</div>
            @admin
            <div class="flex items-center justify-center w-[250px] h-16 font-semibold text-xl">ACTIONS</div>
           @endadmin
        </div>
        {{--     Foreach   --}}
        @forelse($people as $person)
          <x-show-people :person=$person/>
        @empty
            <div class="text-center text-xl ">No people yet</div>
        @endforelse
        {{--     Foreach   --}}
    </section>


</x-layout>
