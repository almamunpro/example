<x-layout>
    <x-slot:heading>
         Jobs
    </x-slot:heading>

    <!-- Your content -->
    @foreach ( $jobs as $job )
    <li> <strong>{{$job['title']}} </strong> : pays {{$job['salary']}} per years<p>
    </li>

    @endforeach
</x-layout>
