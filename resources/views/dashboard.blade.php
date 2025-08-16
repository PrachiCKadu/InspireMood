<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Success message --}}
            @if(session('success'))
                <div class="bg-green-100  px-4 py-3 rounded mb-4">
                    {{-- {{ session('success') }} --}}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}

                {{-- Mood tracking form --}}
                <form action="{{ route('mood.store') }}" method="POST" class="mt-6 space-y-4">
                    @csrf

                    <div>
                        <label for="mood" class="block font-medium text-sm text-gray-700 dark:text-gray-300">How are you feeling today?</label>
                        <select id="mood" name="mood" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">-- Select mood --</option>
                            <option value="happy">Happy</option>
                            <option value="sad">Sad</option>
                            <option value="angry">Angry</option>
                            <option value="neutral">Neutral</option>
                            <option value="excited">Excited</option>
                        </select>
                        @error('mood')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="note" class="block font-medium text-sm text-gray-700 dark:text-gray-300">Note (optional)</label>
                        <textarea id="note" name="note" rows="3" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white"></textarea>
                        @error('note')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            Submit Mood
                        </button>
                    </div>
                </form>
                @if(isset($quote))
    <div class="mt-6 p-4 bg-blue-100 border-l-4 border-blue-500 text-blue-700 rounded">
        <h3 class="font-semibold">Inspirational Thought</h3>
        <p class="mt-2">“{{ $quote->quote }}”</p>
        <p class="text-sm text-gray-600 mt-1 italic">— Based on your mood: <strong>{{ ucfirst($latestMood->mood) }}</strong></p>
    </div>
@endif

            </div>
        </div>
    </div>
</x-app-layout>
