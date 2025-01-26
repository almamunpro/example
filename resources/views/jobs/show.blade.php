<x-layout>
    <x-slot:heading>
         <p>Jobs</p>
    </x-slot:heading>

    <!-- Your content -->
    <h2 class="text-2xl font-bold">{{$job->title}}</h2>
    <p class="text-xl font-semibold">
        This job pays {{$job->salary}} per Year.
    </p>
    <p class="mt-6">
        <x-button href="/jobs/{{ $job->id}}/edit">Edit Job</x-button>
    </p>
</x-layout>
