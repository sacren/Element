<x-app-layout>
    <x-slot:title>
        Jobs
    </x-slot">

    <x-slot:header>
        Job Listings
    </x-slot">

    <ul class="list-disc">
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job['id'] }}" class="hover:underline text-teal-500 font-bold">
                {{ $job['title'] }}
            </a>
        </li>
        @endforeach
    </ul>
</x-app-layout>
