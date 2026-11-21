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
            @if ($post->user)
                <a href="{{ route('users.show', $post->user) }}" class="text-purple-300 hover:text-orange-400 underline transition-colors">
                    {{ $post->user->name }}
                </a>
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

        @auth
            @if (auth()->user()->id === $post->user_id || auth()->user()->isAdmin())
                <div class="flex items-center gap-4 mt-6 pt-6 border-t border-[#2b2320] font-mono text-xs uppercase tracking-wider">
                    <button type="button"
                            onclick="document.getElementById('edit-post-form').classList.toggle('hidden')"
                            class="text-orange-400 hover:text-orange-300 underline transition-colors cursor-pointer uppercase">
                        Edit Thread
                    </button>

                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="text-purple-300 hover:text-orange-400 underline transition-colors cursor-pointer uppercase">
                            Delete Thread
                        </button>
                    </form>
                </div>

                @php
                    $selectedTags = old('tags', $post->tags->pluck('id')->all());
                    $hasPostEditErrors = $errors->has('title') || $errors->has('description') || $errors->has('tags');
                @endphp

                <form id="edit-post-form"
                      method="POST"
                      action="{{ route('posts.update', $post->id) }}"
                      class="mt-6 max-w-3xl space-y-5 border border-[#2b2320] bg-[#191513] p-5 {{ $hasPostEditErrors ? '' : 'hidden' }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="edit-post-title" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                            Headline
                        </label>
                        <input type="text" name="title" id="edit-post-title" value="{{ old('title', $post->title) }}" maxlength="150"
                               class="w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none px-4 py-2.5 text-sm text-[#f5efe9]">
                        @error('title')
                            <p class="font-mono text-xs text-orange-400 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="edit-post-description" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                            Body
                        </label>
                        <textarea name="description" id="edit-post-description" rows="5"
                                  class="w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none p-3 text-sm text-[#f5efe9] leading-relaxed">{{ old('description', $post->description) }}</textarea>
                        @error('description')
                            <p class="font-mono text-xs text-orange-400 mt-1.5">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <p class="font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">Tags</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($tags as $tag)
                                <label class="cursor-pointer">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                           @checked(in_array($tag->id, $selectedTags))
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

                    <div class="flex items-center gap-4">
                        <button type="submit"
                                class="px-4 py-2 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors cursor-pointer">
                            Save Changes
                        </button>
                        <button type="button"
                                onclick="document.getElementById('edit-post-form').classList.add('hidden')"
                                class="font-mono text-xs uppercase tracking-wider text-[#7d7068] hover:text-purple-300 transition-colors cursor-pointer">
                            Cancel
                        </button>
                    </div>
                </form>
            @endif
        @endauth
    </article>

    <section class="mt-10 max-w-3xl">
        <div class="flex items-center justify-between mb-6">
            <h2 id="replies-count" class="font-mono text-xs uppercase tracking-widest text-orange-400">
                Replies ({{ $post->comments?->count() ?? 0 }})
            </h2>
        </div>

        @auth
            <form id="comment-form" method="POST" action="{{ route('comments.store', $post) }}" class="mb-10 border border-[#2b2320] bg-[#191513] p-5 space-y-4">
                @csrf
                <div>
                    <label for="body" class="block font-mono text-xs uppercase tracking-wider text-[#a89c94] mb-2">
                        Add a reply
                    </label>
                    <textarea name="body" id="body" rows="3" placeholder="Share your take..."
                              class="w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none p-3 text-sm text-[#f5efe9] placeholder-[#6e625b]">{{ old('body') }}</textarea>
                    <p id="comment-error" class="font-mono text-xs text-orange-400 mt-1 {{ $errors->has('body') ? '' : 'hidden' }}">
                        @error('body'){{ $message }}@enderror
                    </p>
                </div>
                <button id="comment-submit" type="submit"
                        class="px-4 py-2 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-xs uppercase tracking-wider font-semibold transition-colors cursor-pointer">
                    Post Reply
                </button>
            </form>
        @else
            <p class="font-mono text-xs text-[#8a7d75] mb-8">
                <a href="{{ route('login') }}" class="text-orange-400 hover:underline">Log in</a> to join the discussion.
            </p>
        @endauth

        <div id="comments-list" class="divide-y divide-[#2b2320] border-t border-b border-[#2b2320]">
            @forelse ($post->comments ?? [] as $comment)
                <div class="py-4">
                    <div class="flex items-center justify-between font-mono text-[11px] uppercase tracking-wider text-[#8a7d75] mb-1.5">
                        @if ($comment->user)
                            <a href="{{ route('users.show', $comment->user) }}" class="text-purple-300 hover:text-orange-400 underline transition-colors">
                                {{ $comment->user->name }}
                            </a>
                        @else
                            <span class="text-purple-300">Driver</span>
                        @endif
                        <span>{{ $comment->created_at?->diffForHumans() }}</span>
                    </div>
                    <p class="text-sm text-[#cfc6be] leading-relaxed">{{ $comment->body }}</p>

                    @auth
                        @if (auth()->user()->id === $comment->user_id || auth()->user()->isAdmin())
                            <div class="mt-2 flex items-center gap-3 font-mono text-[11px] uppercase tracking-wider">
                                <button type="button"
                                        onclick="document.getElementById('edit-comment-{{ $comment->id }}').classList.toggle('hidden')"
                                        class="text-orange-400 hover:text-orange-300 underline cursor-pointer uppercase">
                                    Edit
                                </button>

                                <form method="POST" action="{{ route('comments.destroy', ['id' => $comment->id]) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-purple-300 hover:text-orange-400 underline cursor-pointer uppercase">
                                        Delete
                                    </button>
                                </form>
                            </div>

                            <form id="edit-comment-{{ $comment->id }}"
                                  method="POST"
                                  action="{{ route('comments.update', ['id' => $comment->id]) }}"
                                  class="mt-3 space-y-2 {{ $errors->has('body') ? '' : 'hidden' }}">
                                @csrf
                                @method('PUT')
                                <textarea name="body" rows="2"
                                          class="w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none p-2.5 text-sm text-[#f5efe9]">{{ old('body', $comment->body) }}</textarea>
                                <button type="submit"
                                        class="px-3 py-1.5 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-[11px] uppercase tracking-wider font-semibold cursor-pointer">
                                    Save
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p id="no-replies-message" class="py-6 font-mono text-xs text-[#7d7068]">No replies yet.</p>
            @endforelse
        </div>
    </section>

    @auth
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const form = document.getElementById('comment-form');
                const textarea = document.getElementById('body');
                const errorEl = document.getElementById('comment-error');
                const submitBtn = document.getElementById('comment-submit');
                const commentsList = document.getElementById('comments-list');
                const repliesCount = document.getElementById('replies-count');

                if (!form) return;

                form.addEventListener('submit', async (event) => {
                    event.preventDefault();

                    errorEl.textContent = '';
                    errorEl.classList.add('hidden');
                    submitBtn.disabled = true;

                    const csrfToken = form.querySelector('input[name="_token"]')?.value
                        || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
                        || '';

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                            body: JSON.stringify({
                                body: textarea.value,
                            }),
                        });

                        const data = await response.json();

                        if (response.status === 422) {
                            errorEl.textContent = data.errors?.body?.[0] || data.message || 'Please enter a valid reply.';
                            errorEl.classList.remove('hidden');
                            return;
                        }

                        if (!response.ok) {
                            throw new Error(data.message || 'Could not post reply.');
                        }

                        const emptyMsg = document.getElementById('no-replies-message');
                        if (emptyMsg) {
                            emptyMsg.remove();
                        }

                        const item = document.createElement('div');
                        item.className = 'py-4';

                        const header = document.createElement('div');
                        header.className = 'flex items-center justify-between font-mono text-[11px] uppercase tracking-wider text-[#8a7d75] mb-1.5';

                        if (data.comment.user_url) {
                            const authorLink = document.createElement('a');
                            authorLink.href = data.comment.user_url;
                            authorLink.className = 'text-purple-300 hover:text-orange-400 underline transition-colors';
                            authorLink.textContent = data.comment.user_name;
                            header.appendChild(authorLink);
                        } else {
                            const authorSpan = document.createElement('span');
                            authorSpan.className = 'text-purple-300';
                            authorSpan.textContent = data.comment.user_name;
                            header.appendChild(authorSpan);
                        }

                        const timeSpan = document.createElement('span');
                        timeSpan.textContent = data.comment.created_at_human;
                        header.appendChild(timeSpan);

                        const bodyP = document.createElement('p');
                        bodyP.className = 'text-sm text-[#cfc6be] leading-relaxed';
                        bodyP.textContent = data.comment.body;

                        item.appendChild(header);
                        item.appendChild(bodyP);

                        const commentId = data.comment.id;
                        if (commentId) {
                            const actions = document.createElement('div');
                            actions.className = 'mt-2 flex items-center gap-3 font-mono text-[11px] uppercase tracking-wider';

                            const editBtn = document.createElement('button');
                            editBtn.type = 'button';
                            editBtn.className = 'text-orange-400 hover:text-orange-300 underline cursor-pointer uppercase';
                            editBtn.textContent = 'Edit';

                            const editForm = document.createElement('form');
                            editForm.id = `edit-comment-${commentId}`;
                            editForm.method = 'POST';
                            editForm.action = `/comments/${commentId}`;
                            editForm.className = 'mt-3 space-y-2 hidden';

                            editBtn.addEventListener('click', () => {
                                editForm.classList.toggle('hidden');
                            });

                            const editCsrf = document.createElement('input');
                            editCsrf.type = 'hidden';
                            editCsrf.name = '_token';
                            editCsrf.value = csrfToken;

                            const editMethod = document.createElement('input');
                            editMethod.type = 'hidden';
                            editMethod.name = '_method';
                            editMethod.value = 'PUT';

                            const editTextarea = document.createElement('textarea');
                            editTextarea.name = 'body';
                            editTextarea.rows = 2;
                            editTextarea.className = 'w-full bg-[#120f0e] border border-[#362c28] focus:border-orange-400 focus:outline-none p-2.5 text-sm text-[#f5efe9]';
                            editTextarea.value = data.comment.body;

                            const saveBtn = document.createElement('button');
                            saveBtn.type = 'submit';
                            saveBtn.className = 'px-3 py-1.5 bg-orange-400 hover:bg-orange-300 text-[#120f0e] font-mono text-[11px] uppercase tracking-wider font-semibold cursor-pointer';
                            saveBtn.textContent = 'Save';

                            editForm.appendChild(editCsrf);
                            editForm.appendChild(editMethod);
                            editForm.appendChild(editTextarea);
                            editForm.appendChild(saveBtn);

                            const deleteForm = document.createElement('form');
                            deleteForm.method = 'POST';
                            deleteForm.action = `/comments/${commentId}`;
                            deleteForm.className = 'inline';

                            const deleteCsrf = document.createElement('input');
                            deleteCsrf.type = 'hidden';
                            deleteCsrf.name = '_token';
                            deleteCsrf.value = csrfToken;

                            const deleteMethod = document.createElement('input');
                            deleteMethod.type = 'hidden';
                            deleteMethod.name = '_method';
                            deleteMethod.value = 'DELETE';

                            const deleteBtn = document.createElement('button');
                            deleteBtn.type = 'submit';
                            deleteBtn.className = 'text-purple-300 hover:text-orange-400 underline cursor-pointer uppercase';
                            deleteBtn.textContent = 'Delete';

                            deleteForm.appendChild(deleteCsrf);
                            deleteForm.appendChild(deleteMethod);
                            deleteForm.appendChild(deleteBtn);

                            actions.appendChild(editBtn);
                            actions.appendChild(deleteForm);

                            item.appendChild(actions);
                            item.appendChild(editForm);
                        }

                        commentsList.appendChild(item);

                        if (repliesCount && typeof data.comments_count !== 'undefined') {
                            repliesCount.textContent = `Replies (${data.comments_count})`;
                        }

                        textarea.value = '';
                    } catch (err) {
                        errorEl.textContent = err.message || 'Something went wrong while posting your reply.';
                        errorEl.classList.remove('hidden');
                    } finally {
                        submitBtn.disabled = false;
                    }
                });
            });
        </script>
    @endauth
@endsection