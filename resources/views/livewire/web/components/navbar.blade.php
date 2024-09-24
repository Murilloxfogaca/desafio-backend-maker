<header>
    <nav x-data="{ open: false }"  class="flex h-auto w-auto bg-white shadow-lg rounded-lg justify-between
        md:h-16">
        <div class="flex w-full justify-between ">
            <div :class="open ? 'hidden':'flex'"
            class="flex px-6 w-1/2 items-center font-semibold
            md:w-1/5 md:px-1 md:flex md:items-center md:justify-center"
            x-transition:enter="transition ease-out duration-300">
            </div>

            <div
            x-show="open" x-transition:enter="transition ease-in-out duration-300"
            class="flex flex-col w-full h-auto
            md:hidden">
                <div class="flex flex-col items-center justify-center gap-2">
                    <a href="{{route('home')}}">Filmes</a>
                    <a href="{{route('create')}}">Cadastrar</a>
                </div>
            </div>
            <div class="hidden w-3/5 items-center justify-evenly font-semibold
            md:flex">
              <a href="{{route('home')}}">Filmes</a>
              <a href="{{route('create')}}">Cadastrar</a>
            </div>
        </div>

    </nav>
</header>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
