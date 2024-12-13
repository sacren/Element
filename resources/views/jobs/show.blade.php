<x-app-layout>
    <x-slot:title>
        {{ $job->title }}
    </x-slot:title>

    <x-slot:header>
        {{ $job->title }}
    </x-slot:header>

    <p>The Pay is {{ $job->salary }} per year.</p>

    <div class="mt-4 flex gap-4">
        <x-button-link href="{{ route('jobs.edit', $job->id) }}">
            Edit Job
        </x-button-link>

        <form method="POST" action="{{ route('jobs.destroy', $job->id) }}">
            @csrf
            @method('DELETE')
            <button
                type="submit"
                class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                Delete Job
            </button>
        </form>
    </div>
</x-app-layout>
