<div>
    <div class="px-4 py-8 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8">
        @foreach ($films as $item)
            <a href="{{ route('see',$item->id) }}" class="relative w-full aspect-video bg-cover bg-center bg-no-repeat rounded-md"
                style="background-image: url('{{url('/storage/'.$item->cover)}}')">
                <div
                    class="absolute flex items-end p-4 top-0 left-0 w-full h-full bg-gradient-to-t from-black to-black/10">
                    <div>
                        <h1 class="text-2xl font-bold text-white">
                            {{$item->title}}
                        </h1>
                        <h2 class="font-medium text-white">
                            {{$item->director}}
                        </h2>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
