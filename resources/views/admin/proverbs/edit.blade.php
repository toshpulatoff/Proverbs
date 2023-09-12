<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Proverb') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('proverbs.update', $proverb) }}">
                        @method('PUT')
                        @csrf
                        @foreach(config('translatable.locales') as $locale)
                        <div class="mt-4">
                            <label for="content_{{ $locale }}">Content ({{ strtoupper($locale) }})</label>
                            <textarea name="{{ $locale }}[content]" id="content_{{ $locale }}" rows="5"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old($locale.'.content', $proverb->translateOrDefault($locale)->content) }}</textarea>
                        </div>
                        @endforeach
                        <br />
                        Category
                        <select name="categories[]" class="form-select">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $proverb->categories->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <br />
                        <div class="form-group mb-3">
                            <label for="select2Multiple">Tags</label>
                            <select class="select2-multiple form-control" name="tags[]" multiple="multiple"
                              id="select2Multiple">
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $proverb->tags->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $tag->name }}</option>
                                @endforeach              
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">Save</button>
                    </form>
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
                     
                    <script>
                        $(document).ready(function() {
                            // Select2 Multiple
                            $('.select2-multiple').select2({
                                placeholder: "Select",
                                allowClear: true
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>