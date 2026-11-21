@extends('layouts.main')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8 space-y-8">
    <div class="p-6 rounded-xl border border-orange-500/30 bg-stone-900/70 space-y-4">
        <div>
            <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
        </div>

        @if ($user->profile)
            <div class="pt-4 border-t border-white/10 grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                <div>
                    <p class="text-xs uppercase tracking-wide opacity-65">Profile Name</p>
                    <p class="mt-0.5 font-medium">{{ $user->profile->name }}</p>
                </div>
                <div>
                    <p class="text-xs uppercase tracking-wide opacity-65">Profile Email</p>
                    <p class="mt-0.5 font-medium">{{ $user->profile->email }}</p>
                </div>
            </div>
        @else
            <p class="text-sm opacity-70 pt-2 border-t border-white/10">No profile record found for this user.</p>
        @endif
    </div>

    <div class="space-y-4">
        <h2 class="text-xl font-semibold">Posts ({{ $user->posts->count() }})</h2>

        @forelse ($user->posts as $post)
            <div class="p-5 rounded-xl border border-white/10 bg-stone-900/50 space-y-2">
                <h3 class="text-lg font-semibold">{{ $post->title }}</h3>
                <p class="text-sm opacity-85">{{ $post->description }}</p>

                @if ($post->tags && $post->tags->isNotEmpty())
                    <div class="flex flex-wrap gap-2 pt-2">
                        @foreach ($post->tags as $tag)
                            <span class="px-2.5 py-0.5 text-xs rounded-full bg-orange-500/20 border border-orange-500/30">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <p class="text-sm opacity-70">No posts by this user yet.</p>
        @endforelse
    </div>

    <div class="space-y-4">
        <h2 class="text-xl font-semibold">Comments ({{ $user->comments->count() }})</h2>

        @forelse ($user->comments as $comment)
            <div class="p-4 rounded-xl border border-white/10 bg-stone-900/50 space-y-1">
                <p class="text-sm opacity-90">{{ $comment->body }}</p>
                @if ($comment->post)
                    <p class="text-xs opacity-70">On post: <span class="font-medium">{{ $comment->post->title }}</span></p>
                @endif
            </div>
        @empty
            <p class="text-sm opacity-70">No comments by this user yet.</p>
        @endforelse
    </div>
</div>
@endsection