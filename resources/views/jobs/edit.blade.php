<x-app-layout>
    <x-slot:title>
        Edit Job
    </x-slot:title>

    <x-slot:header>
        <div class="inline-flex">
            <div class="text-xl font-bold text-black-600">
                Edit Job
            </div>
            <div class="px-2 text-xl font-bold text-red-400 bg-green-100">
                {{ $job->title }}
            </div>
        </div>
    </x-slot:header>

    <form method="POST" action="{{ route('jobs.update', $job->id) }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <section class="border-b border-gray-200 pb-12">
                <h2 class="text-lg font-medium text-gray-900">Edit job details</h2>
                <p class="mt-1 text-sm text-gray-600">Modify the fields below to update the job.</p>

                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input type="text" name="title" id="title"
                                class="block w-full rounded-md shadow-sm ring-1 ring-gray-300 focus:ring-indigo-600 focus:border-indigo-600 sm:max-w-md sm:text-sm"
                                value="{{ old('title', $job->title) }}" required />
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input type="text" name="salary" id="salary"
                                class="block w-full rounded-md shadow-sm ring-1 ring-gray-300 focus:ring-indigo-600 focus:border-indigo-600 sm:max-w-md sm:text-sm"
                                value="{{ old('salary', $job->salary) }}" required />
                        </div>
                        @error('salary')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Button Section -->
                <div class="mt-4 flex justify-end gap-4 sm:max-w-md">
                    <button type="button"
                        class="rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <a href="{{ route('jobs.show', $job->id) }}">
                            {{ __('Cancel') }}
                        </a>
                    </button>
                    <button type="submit"
                        class="rounded-md bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        {{ __('Update') }}
                    </button>
                </div>
            </section>
        </div>
    </form>
</x-app-layout>
