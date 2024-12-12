<x-app-layout>
    <x-slot:title>
        {{ $job['title'] }}
    </x-slot">

    <x-slot:header>
        {{ $job['title'] }}
    </x-slot">

    <p>The Pay is {{ $job['salary'] }} per year.</p>

    <x-button-link href="{{ route('jobs.edit', $job->id) }}" class="mt-4">
        Edit Job
    </x-button-link>
</x-app-layout>
