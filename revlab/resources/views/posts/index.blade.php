@extends('layouts.main')

@section('title', 'Forum')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 pb-6 border-b border-[#2b2320]">
        <div>
            <p class="font-mono text-xs uppercase tracking-widest text-orange-400">Paddock &amp; Discussion</p>
            <p class="text-sm text-[#a89c94] mt-1">
                Showing {{ $posts->count() }} of {{ $posts->total() }} threads
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-3">
            <form method="GET" action="{{ route('posts.index') }}" class="flex items-center gap-2">
                <label for="tag_id" class="font-mono text-xs uppercase tracking-wider text-[#a89c94]">
                    Tag
                </label>
                <select name="tag_id" id="tag_id" onchange="this.form.submit()"
                        class="bg-[#191513] border border-[#362c28] focus:border-orange-400 focus:outline-none px-3 py-2 font-mono text-xs text-[#ede6e0]">
                    <option value="">All Tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @selected(request('tag_id') == $tag->id)>
                            #{{ $tag->name }}
                        </option>
                    @endforeach
                </select>
            </form>

            @if (request()->filled('tag_id'))
                <a href="{{ route('posts.index') }}"
                   class="font-mono text-xs uppercase tracking-wider text-[#a89c94] hover:text-purple-300 px-2 py-2 transition-colors">
                    Clear
                </a>
            @endif

            @auth
                <a href="{{ route('posts.create') }}"
                   class="px-4 py-2 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors">
                    + New Post
                </a>
            @endauth
        </div>
    </div>

    <div class="divide-y divide-[#2b2320] border-b border-[#2b2320]">
        @forelse ($posts as $index => $post)
            <article class="group py-6 px-2 hover:bg-[#191513] transition-colors">
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                    <div class="flex items-start gap-5 min-w-0">
                        <span class="font-mono text-xs text-[#6e625b] group-hover:text-orange-400 transition-colors pt-1.5 shrink-0">
                            {{ str_pad($posts->firstItem() + $index, 2, '0', STR_PAD_LEFT) }}
                        </span>

                        <div class="min-w-0">
                            <div class="flex flex-wrap items-center gap-x-3 gap-y-1 font-mono text-[11px] uppercase tracking-wider text-[#8a7d75] mb-1.5">
                                @if (!empty($post->user?->name))
                                    <span class="text-purple-300">{{ $post->user->name }}</span>
                                    <span>/</span>
                                @endif
                                <span>{{ $post->created_at?->diffForHumans() ?? 'Thread' }}</span>
                            </div>

                            <a href="{{ route('posts.show', ['id' => $post->id]) }}" class="block">
                                <h2 class="font-display text-2xl sm:text-3xl font-bold tracking-tight text-[#f5efe9] group-hover:text-orange-300 transition-colors">
                                    {{ $post->title }}
                                </h2>
                            </a>

                            <p class="text-sm text-[#a89c94] mt-2 line-clamp-2 max-w-3xl">
                                {{ $post->description }}
                            </p>

                            @if ($post->tags->isNotEmpty())
                                <div class="flex flex-wrap gap-2 mt-4">
                                    @foreach ($post->tags as $tag)
                                        <a href="{{ route('posts.index', ['tag_id' => $tag->id]) }}"
                                           class="font-mono text-xs text-purple-200 hover:text-orange-300 border border-[#362c28] hover:border-purple-300/50 px-2 py-0.5 transition-colors">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                       class="font-mono text-xs uppercase tracking-wider text-[#7d7068] group-hover:text-orange-400 transition-colors pl-9 sm:pl-0 shrink-0">
                        Open →
                    </a>
                </div>
            </article>
        @empty
            <div class="py-14 text-center space-y-3">
                <p class="font-mono text-sm text-[#7d7068]">No threads found for this filter.</p>
                @if (request()->filled('tag_id'))
                    <a href="{{ route('posts.index') }}"
                       class="inline-block font-mono text-xs uppercase tracking-wider text-orange-400 hover:underline">
                        Reset Filter
                    </a>
                @endif
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $posts->links() }}
    </div>
@endsection