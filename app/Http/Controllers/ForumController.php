<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use App\Topic;
use DebugBar\DebugBar;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use SebastianBergmann\Environment\Console;

class ForumController extends Controller
{
    /**
     * Show the forum dashboard.
     *
     * @return Response
     */
    public function getForum()
    {
        // Manually assigning the filters for now.
        // Temporary
        $filteringTagsType = 'popular';
        $showTagsByType = 'all';
        $showOnlyActiveTags = false;

        switch ($filteringTagsType) {

            /**
             * Displaying the classic way.
             *
             * We show the tags ordering them by categories.
             */
            case 'classic':
                switch ($showTagsByType) {

                    /**
                     * Displaying all Tags.
                     *
                     * Including the empty ones.
                     */
                    case 'all':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $categories = Category::with(['tags.topics' => function($query) {
                                $query->where('updated_at', '>', Carbon::now()->subDays(10));
                            }])->orderBy('order')->get();
                        } else {
                            $categories = Category::with('tags.topics')->orderBy('order')->get();
                        }

                        $filtered = $categories->reject(function($category) {
                            return $category->tags->isEmpty();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => true, 'categories' => $filtered]);
                        break;

                    /**
                     * Diplaying the official Tags.
                     *
                     * Including all the tags, even the empty ones, as these are the official ones.
                     */
                    case 'official':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $categories = Category::with(['tags' => function($query) {
                                $query->where('is_official', true)->where('updated_at', '>', Carbon::now()->subDays(10));
                            }])->orderBy('order')->get();
                        } else {
                            $categories = Category::with(['tags' => function($query) {
                                $query->where('is_official', true);
                            }])->orderBy('order')->get();
                        }

                        $filtered = $categories->reject(function($category) {
                            return $category->tags->isEmpty();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => true, 'categories' => $filtered]);
                        break;

                    /**
                     * Displaying the unofficial Tags.
                     *
                     * Not including the empty ones.
                     */
                    case 'unofficial':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $categories = Category::with(['tags.topics' => function($query) {
                                $query->where('is_official', false)->where('updated_at', '>', Carbon::now()->subDays(10));
                            }])->orderBy('order')->get();
                        } else {
                            $categories = Category::with(['tags.topics' => function($query) {
                                $query->where('is_official', false);
                            }])->orderBy('order')->get();
                        }

                        $filtered = $categories->reject(function($category) {
                            return $category->tags->isEmpty();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => true, 'categories' => $filtered]);
                        break;
                }
                break;

            /**
             * Displaying by popularity.
             *
             * We show the tags ordering them by the amount of posts they contain.
             */
            case 'popular':
                switch ($showTagsByType) {

                    /**
                     * Diplaying all Tags.
                     */
                    case 'all':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $tags = Tag::with('topics')->where('updated_at', '>', Carbon::now()->subDays(10))->get();
                        } else {
                            $tags = Tag::with('topics')->get();
                        }

                        $filtered = $tags->sortByDesc(function($tag) {
                            return $tag->topics->count();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => false, 'tags' => $filtered]);
                        break;

                    /**
                     * Diplaying the official Tags.
                     */
                    case 'official':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $tags = Tag::with('topics')->where('is_official', true)->where('updated_at', '>', Carbon::now()->subDays(10))->get();
                        } else {
                            $tags = Tag::with('topics')->where('is_official', true)->get();
                        }

                        $filtered = $tags->sortByDesc(function($tag) {
                            return $tag->topics->count();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => false, 'tags' => $filtered]);
                        break;

                    /**
                     * Diplaying the unofficial Tags.
                     */
                    case 'unofficial':
                        // Applying the "recently active" filter here.
                        if ($showOnlyActiveTags == true) {
                            $tags = Tag::with('topics')->where('is_official', false)->where('updated_at', '>', Carbon::now()->subDays(10))->get();
                        } else {
                            $tags = Tag::with('topics')->where('is_official', false)->get();
                        }

                        $filtered = $tags->sortByDesc(function($tag) {
                            return $tag->topics->count();
                        })->all();

                        return view('forum.index')->with(['isClassicDisplay' => false, 'tags' => $filtered]);
                        break;
                }
                break;
        }
    }

    /**
     * Show the tag dashboard.
     *
     * @return Response
     */
    public function getTag($slug)
    {
        $tag = Tag::where(['slug' => $slug])->firstOrFail();
        $topics = $tag->topics()->with('posts.user')->paginate(2);

        foreach ($topics as $topic) {
            if (\Auth::check()) {

            }
        }

        return view('forum.tag')->with(['tag' => $tag, 'topics' => $topics]);
    }

    /**
     * Showing user's favourite tags
     *
     * @return object
     */
    private function getUserTags()
    {
        if (\Auth::check()) {
            //
        }
    }
}
