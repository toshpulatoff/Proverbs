<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Proverbs') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <a href="{{ route('proverbs.create') }}">Add new proverb</a>
                  <br /><br />
                  <table>
                      <thead>
                          <tr>
                              <th>Content</th>
                              <th>Category</th>
                              <th>Tags</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($proverbs as $proverb)
                          <tr>
                              <td>{{ $proverb->content }}</td>
                              <td>
                                  <a href="{{ route('proverbs.edit', $proverb) }}">Edit</a>
                                  <form method="POST" action="{{ route('proverbs.destroy', $proverb) }}">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                  </form>
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>