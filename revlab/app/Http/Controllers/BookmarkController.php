<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use App\Notifications\BookmarkPost;

class BookmarkController extends Controller
{
    private function getBookmarkable(string $type, string $id): Model
    {
        $models = [
            'car' => CarModel::class,
            'post' => Post::class,
        ];

        abort_unless(isset($models[$type]), 404);

        return $models[$type]::findOrFail($id);
    }

    public function store(Request $request, string $type, string $id)
    {
        $item = $this->getBookmarkable($type, $id);

        $bookmark = $item->bookmarks()->firstOrCreate([
            'user_id' => $request->user()->id,
        ]);

        if ($item instanceof Post && $bookmark->wasRecentlyCreated) {
            if ($item->user && $item->user_id !== $request->user()->id) {
                $item->user->notify(
                    new BookmarkPost($item, $request->user()->name)
                );
            }
        }

        return back();
    }

    public function destroy(Request $request, string $type, string $id)
    {
        $item = $this->getBookmarkable($type, $id);

        $item->bookmarks()
            ->where('user_id', $request->user()->id)
            ->delete();

        return back();
    }
}
