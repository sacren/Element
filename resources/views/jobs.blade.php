<x-app-layout>
    <x-slot:title>
        Joblistings
    </x-slot">

    <x-slot:header>
        Joblistings
    </x-slot">

    <ul class="list-disc">
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline text-teal-500 font-bold">
                {{ $job['title'] }}
            </a>
            - Pays {{ $job['salary'] }} in {{ $job['location'] }}
        </li>
        @endforeach
    </ul>
</x-app-layout>
