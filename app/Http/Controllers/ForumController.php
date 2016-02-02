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
        $tagFilters = config('forum.tag_filters');
        $userFilters = $this->getUserFilters($tagFilters);
        $activityOfTagsLimitInDays = config('forum.days_before_unactive_tag', 10);

        self::checkFilters($tagFilters);

        switch ($userFilters->tags_filter_by) {

            /**
             * Displaying the classic way.
             *
             * We show the tags ordering them by categories.
             */
            case 'classic':

                /**
                 * Selecting the Categories following the filters applied by the user.
                 */
                switch ($userFilters->tags_show_by) {
                    case 'all':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters, $activityOfTagsLimitInDays) {
                            if ($userFilters->tags_unactives == 'exclude') {
                                $query->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                            }
                        }, 'tags.topics'
                        ])->get();
                        break;

                    case 'official':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters, $activityOfTagsLimitInDays) {
                            $query->where('is_official', true);
                            if ($userFilters->tags_unactives == 'exclude') {
                                $query->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                            }
                        }])->get();
                        break;

                    case 'unofficial':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters, $activityOfTagsLimitInDays) {
                            $query->where('is_official', false);
                            if ($userFilters->tags_unactives == 'exclude') {
                                $query->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                            }
                        }, 'tags.topics'
                        ])->get();
                        break;
                }

                /**
                 * Filtering the Categories to exclude all the empty ones.
                 */
                $filteredCategories = $categories->reject(function($category) {
                    return $category->tags->isEmpty();
                })->all();

                /**
                 * Clearing each Category to exclude empty Tags.
                 */
                foreach($filteredCategories as $category) {
                    $category->clearedTags = $category->tags->reject(function($tag) {
                        return $tag->topics->isEmpty();
                    })->all();
                }

                /**
                 * Returning the view with the parameters.
                 */
                return view('forum.index')->with([
                    'categories' => $filteredCategories,
                    'isClassicDisplay' => true,
                    'tagFilters' => $tagFilters,
                    'userFilters' => $userFilters,
                ]);

                /**
                 * Get to the other Case.
                 */
                break;

            /**
             * Displaying by popularity.
             *
             * We show the tags ordering them by the amount of posts they contain.
             */
            case 'popular':

                /**
                 * Selecting the Tags following the filters applied by the user.
                 */
                switch ($userFilters->tags_show_by) {

                    case 'all':
                        $tags = Tag::with('topics');
                        if ($userFilters->tags_unactives == 'exclude') {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                        }
                        $tags = $tags->get();
                        break;

                    case 'official':
                        $tags = Tag::with('topics')->where('is_official', true);
                        if ($userFilters->tags_unactives == 'exclude') {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                        }
                        $tags = $tags->get();
                        break;

                    case 'unofficial':
                        $tags = Tag::with('topics')->where('is_official', false);
                        if ($userFilters->tags_unactives == 'exclude') {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($activityOfTagsLimitInDays));
                        }
                        $tags = $tags->get();
                        break;

                }

                /**
                 * Filtering the Tags to exclude all the empty ones and ordering them by activity.
                 */
                $filteredTags = $tags->reject(function($tag) {
                    return $tag->topics->isEmpty();
                })->sortByDesc(function($tag) {
                    return $tag->topics->count();
                })->all();

                /**
                 * Returning the view with the parameters.
                 */
                return view('forum.index')->with([
                    'filteredTags' => $filteredTags,
                    'isClassicDisplay' => false,
                    'tagFilters' => $tagFilters,
                    'userFilters' => $userFilters,
                ]);

                /**
                 * The end.
                 */
                break;
        }
    }

    /**
     * Retrieve the filters used by the User basing on the Cookies.
     *
     * @param $filters
     * @return \stdClass
     */
    private function getUserFilters($filters)
    {
        $return = new \stdClass();
        foreach ($filters as $filter => $values) {
            $return->$filter = \Cookie::get($filter, $values[0]);
        }
        return $return;
    }

    /**
     * Check if the User has not set a new filter, or if his Cookies are empty.
     * Update/Create a new Cookie and then redirect if needed (in a bool return).
     *
     * @param $filters
     * @return void
     */
    private function checkFilters($filters)
    {
        foreach ($filters as $filter => $values) {

            /**
             * We check the filters in the Cookies.
             */
            if (!\Cookie::has($filter)) {
                \Cookie::queue(\Cookie::forever($filter, $values[0])); // The default value is the first one.
            }
        }
    }

    /**
     * Validating the new filters selection by user.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateTags()
    {
        $filters = config('forum.tag_filters');
        foreach ($filters as $filter => $values) {
            if (\Request::has($filter)) {
                if (in_array(\Request::input($filter), $values)) {
                    \Cookie::queue(\Cookie::forever($filter, \Request::get($filter)));
                }
            }
        }
        return redirect(route('forum.getForum'));
    }

    /**
     * Show the tag dashboard.
     *
     * @return Response
     */
    public function getTag($slug)
    {
        $tag = Tag::where(['slug' => $slug])->firstOrFail();

        $topics = $tag->topics()->with('posts.user', 'posts.votes')->paginate(20);

        foreach ($topics as $topic) {
            $score = 0;
            foreach ($topic->posts()->first()->votes as $vote) {
                $score += (int)$vote->value;
            }
            $topic->score = $score;
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
