@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-semibold mb-4 text-gray-800">Card Distribution</h1>
    <form method="POST" action="{{ route('distribute-cards') }}">
        @csrf
        <div class="mb-4">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="numberOfPeople" class="block text-sm font-medium leading-6 text-gray-900">Number of
                        People</label>
                    <div class="mt-2">
                        <div
                            class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2  sm:max-w-md">
                            <input type="number" name="numberOfPeople" id="numberOfPeople"
                                class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                value="{{ old('numberOfPeople') }}">
                        </div>
                        @error('numberOfPeople')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Distribute Cards
            </button>
        </div>
    </form>

    @if (session('cards'))
        <h2 class="text-xl font-semibold mt-6">Card Distribution Result</h2>
        <table class="min-w-full bg-white rounded-lg overflow-hidden">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-2 px-4">Person</th>
                    <th class="py-2 px-4">Cards</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('cards') as $index => $personCards)
                    <tr>
                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                        <td class="py-2 px-4">{{ implode(', ', $personCards) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
