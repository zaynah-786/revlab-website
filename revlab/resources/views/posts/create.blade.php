@extends('layouts.main')

@section('title', 'Start a Thread')

@section('content')
    <div class="mb-8 flex items-center justify-between border-b border-[#2b2320] pb-4">
        <a href="{{ route('posts.index') }}"
           class="font-mono text-xs uppercase tracking-widest text-[#a89c94] hover:text-orange-400 transition-colors">
            ← Nevermind
        </a>

        <span class="font-mono text-xs uppercase tracking-widest text-purple-300">
            New Thread 
        </span>
    </div>

    <form method="POST" action="{{ route('posts.store') }}" class="max-w-3xl space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                Headline
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" maxlength="150"
                   placeholder="for example: Why the Valkyrie sounds like a dentist drill at 11k RPM"
                   class="w-full bg-[#191513] border border-[#362c28] focus:border-orange-400 focus:outline-none px-4 py-3 text-sm text-[#f5efe9] placeholder-[#6e625b]">
            @error('title')
                <p class="font-mono text-xs text-orange-400 mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                Write whatever your motor heart desires :)
            </label>
            <textarea name="description" id="description" rows="6"
                      placeholder="But no Jesko slander (unless you have a good reason) (hint: you don't)"
                      class="w-full bg-[#191513] border border-[#362c28] focus:border-orange-400 focus:outline-none p-4 text-sm text-[#f5efe9] placeholder-[#6e625b] leading-relaxed">{{ old('description') }}</textarea>
            @error('description')
                <p class="font-mono text-xs text-orange-400 mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <p class="font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-3">Tags</p>
            <div class="flex flex-wrap gap-2">
                @foreach ($tags as $tag)
                    <label class="cursor-pointer">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                               @checked(in_array($tag->id, old('tags', [])))
                               class="peer sr-only">
                        <span class="inline-block font-mono text-xs px-3 py-1.5 border border-[#362c28] text-purple-200/80 peer-checked:border-orange-400 peer-checked:bg-orange-400 peer-checked:text-[#120f0e] hover:border-purple-300/50 transition-colors">
                            #{{ $tag->name }}
                        </span>
                    </label>
                @endforeach
            </div>
            @error('tags')
                <p class="font-mono text-xs text-orange-400 mt-1.5">{{ $message }}</p>
            @enderror
        </div>

        <div class="pt-4 border-t border-[#2b2320] flex items-center gap-4">
            <button type="submit"
                    class="px-5 py-2.5 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors cursor-pointer">
                Post it
            </button>
            <a href="{{ route('posts.index') }}"
               class="font-mono text-xs uppercase tracking-wider text-[#7d7068] hover:text-purple-300 transition-colors">
                Scrap it
            </a>
        </div>
    </form>
@endsection