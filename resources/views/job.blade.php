<x-app-layout>
    <x-slot:title>
        {{ $job['title'] }}
    </x-slot">

    <x-slot:header>
        {{ $job['title'] }}
    </x-slot">

    <p>The Pay is {{ $job['salary'] }} per year.</p>
</x-app-layout>
