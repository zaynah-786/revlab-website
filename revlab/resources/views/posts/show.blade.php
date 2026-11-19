@extends('layouts.main')

@section('title', $post->title)

@section('content')
    <div class="mb-8 flex items-center justify-between border-b border-[#2b2320] pb-4">
        <a href="{{ route('posts.index') }}"
           class="font-mono text-xs uppercase tracking-widest text-[#a89c94] hover:text-orange-400 transition-colors">
            ← Back to Forum
        </a>

        <span class="font-mono text-xs uppercase tracking-widest text-purple-300">
            Thread #{{ str_pad($post->id, 3, '0', STR_PAD_LEFT) }}
        </span>
    </div>

    <article class="border-b border-[#2b2320] pb-10">
        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 font-mono text-xs uppercase tracking-wider text-[#8a7d75] mb-3">
            @if (!empty($post->user?->name))
                <span class="text-purple-300">{{ $post->user->name }}</span>
                <span>/</span>
            @endif
            <span>{{ $post->created_at?->format('d M Y, H:i') ?? 'Published' }}</span>
        </div>

        <h1 class="font-display text-3xl sm:text-5xl font-bold tracking-tight text-[#f5efe9]">
            {{ $post->title }}
        </h1>

        <div class="mt-6 text-base text-[#cfc6be] leading-relaxed whitespace-pre-line max-w-4xl">
            {{ $post->description }}
        </div>

        @if ($post->tags->isNotEmpty())
            <div class="flex flex-wrap gap-2 mt-8 pt-6 border-t border-[#2b2320]">
                @foreach ($post->tags as $tag)
                    <a href="{{ route('posts.index', ['tag_id' => $tag->id]) }}"
                       class="font-mono text-xs text-purple-200 border border-[#362c28] hover:border-orange-400 hover:bg-orange-400 hover:text-[#120f0e] px-2.5 py-1 transition-colors">
                        #{{ $tag->name }}
                    </a>
                @endforeach
            </div>
        @endif
    </article>

    <section class="mt-10 max-w-3xl">
        <div class="flex items-center justify-between mb-6">
            <h2 class="font-mono text-xs uppercase tracking-widest text-orange-400">
                Replies ({{ $post->comments?->count() ?? 0 }})
            </h2>
        </div>

        @auth
            <form method="POST" action="{{ route('comments.store', $post) }}" class="mb-10 border border-[#2b2320] bg-[#191513] p-5 space-y-4">
                @csrf
                <div>
                    <label for="body" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                        Add a reply
                    </label>
                    <textarea name="body" id="body" rows="3" placeholder="Share your take..."
                              class="w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none p-3 text-sm text-[#f5efe9] placeholder-[#6e625b]">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="font-mono text-xs text-orange-400 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit"
                        class="px-4 py-2 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors cursor-pointer">
                    Post Reply
                </button>
            </form>
        @else
            <p class="font-mono text-xs text-[#8a7d75] mb-8">
                <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Log in</a> to join the discussion.
            </p>
        @endauth

        <div class="divide-y divide-[#2b2320] border-t border-b border-[#2b2320]">
            @forelse ($post->comments ?? [] as $comment)
                <div class="py-4">
                    <div class="flex items-center justify-between font-mono text-[11px] uppercase tracking-wider text-[#8a7d75] mb-1.5">
                        <span class="text-purple-300">{{ $comment->user->name ?? 'Driver' }}</span>
                        <span>{{ $comment->created_at?->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-[#cfc6be] leading-relaxed">{{ $comment->body }}</p>
                </div>
            @empty
                <p class="py-6 font-mono text-xs text-[#7d7068]">No replies yet.</p>
            @endforelse
        </div>
    </section>
@endsection