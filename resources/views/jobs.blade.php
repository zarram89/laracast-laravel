<x-layout>
  <x-slot:heading>
    Home page
  </x-slot:heading>

  <ul>
    @foreach ($jobs as $job )
      <li>
        <a class="text-blue-500 hover:underline" href="/jobs/{{ $job['id'] }}"><b>{{ $job['title']}}:</b> Pays {{ $job['salary']}}</a>
      </li>
    @endforeach
  </ul>
</x-layout>
