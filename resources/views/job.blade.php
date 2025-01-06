<x-layout>
    <x-slot:heading>
         Job
    </x-slot:heading>

    <!-- Your content -->
    <h2 class="text-2xl font-bold">{{$job['title']}}</h2>
    <p class="text-xl font-semibold">
        This job pays {{$job['salary']}} per Year.
    </p>
</x-layout>
