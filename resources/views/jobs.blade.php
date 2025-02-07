<x-layout>
  <x-slot:heading>
    Home page
  </x-slot:heading>

  <div class="space-y-4">
    @foreach ($jobs as $job )
        <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg hover:text-blue-500 hover:underline hover:bg-gray-400">
          <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
          <b>{{ $job['title']}}:</b> Pays {{ $job['salary']}}
        </a>
    @endforeach

    <div>
      {{$jobs->links()}}
    </div>
  </div>
</x-layout>
