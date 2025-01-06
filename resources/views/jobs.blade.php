<x-layout>
    <x-slot:heading>
         Jobs
    </x-slot:heading>

    <!-- Your content -->
    <ul>
        @foreach ( $jobs as $job )
            <li>
                <a href="/jobs/{{$job['id']}}">
                    <strong>{{$job['title']}} </strong> : pays {{$job['salary']}} per years<p>
                </a>
            </li>
    @endforeach
    </ul>
</x-layout>
