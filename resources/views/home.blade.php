<x-app-layout>
    <x-slot:title>
        Home Page
    </x-slot">

    <x-slot:header>
        Home Page
    </x-slot">

    <ul class="list-decimal">
        @foreach ($jobs as $job)
        <li>{{ $job['title'] }} - Pays {{ $job['salary'] }} in {{ $job['location'] }}</li>
        @endforeach
    </ul>
</x-app-layout>
