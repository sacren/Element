<x-app-layout>
    <x-slot:title>
        {{ $job['title'] }}
    </x-slot">

    <x-slot:header>
        {{ $job['title'] }}
    </x-slot">

    Pays {{ $job['salary'] }} in {{ $job['location'] }}
</x-app-layout>
