<x-app-layout>
    <x-slot:title>
        Jobs
    </x-slot">

    <x-slot:header>
        Job Listings
    </x-slot">

    <ul class="list-none space-y-6">
        @foreach ($jobs as $job)
        <li>
            <a href="/jobs/{{ $job->id }}" class="block px-4 py-4 border-2 border-red-300">
                <div class="text-purple-500">
                    {{ $job->employer->name }}
                </div>
                <div class="text-teal-500 font-bold">
                    {{ $job->title }}
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</x-app-layout>
