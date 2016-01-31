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
     * Number of days to stop considering a tag as active.
     *
     * @var int activityOfTagsLimitInDays
     */
    private $activityOfTagsLimitInDays = 10;

    /**
     * Show the forum dashboard.
     *
     * @return Response
     */
    public function getForum()
    {
        $userFilters = self::getUserFilters();

        switch ($userFilters->filteringTagsType) {

            /**
             * Displaying the classic way.
             *
             * We show the tags ordering them by categories.
             */
            case 'classic':

                /**
                 * Selecting the Categories following the filters applied by the user.
                 */
                switch ($userFilters->showTagsByType) {
                    case 'all':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters) {
                            if ($userFilters->showActiveTags == 1) {
                                $query->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
                            }
                        }, 'tags.topics'
                        ])->get();
                        break;

                    case 'official':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters) {
                            $query->where('is_official', true);
                            if ($userFilters->showActiveTags == 1) {
                                $query->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
                            }
                        }])->get();
                        break;

                    case 'unofficial':
                        $categories = Category::with(['tags' => function ($query) use ($userFilters) {
                            $query->where('is_official', false);
                            if ($userFilters->showActiveTags == 1) {
                                $query->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
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
                switch ($userFilters->showTagsByType) {

                    case 'all':
                        $tags = Tag::with('topics');
                        if ($userFilters->showActiveTags == 1) {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
                        }
                        $tags = $tags->get();
                        break;

                    case 'official':
                        $tags = Tag::with('topics')->where('is_official', true);
                        if ($userFilters->showActiveTags == 1) {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
                        }
                        $tags = $tags->get();
                        break;

                    case 'unofficial':
                        $tags = Tag::with('topics')->where('is_official', false);
                        if ($userFilters->showActiveTags == 1) {
                            $tags->where('updated_at', '>', Carbon::now()->subDays($this->activityOfTagsLimitInDays));
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
                    'isClassicDisplay' => false,
                    'tags' => $filteredTags,
                    'userFilters' => $userFilters,
                ]);

                /**
                 * The end.
                 */
                break;
        }
    }

    private function getUserFilters()
    {
        /**
         * Filtering method.
         */
        $filteringTagsType = \Cookie::get('filteringTagsType', 'classic');

        $filteringMethods = array('classic', 'popular');
        if (\Input::has('filteringTagsType')) {
            if (in_array(\Input::get('filteringTagsType'), $filteringMethods)) {
                \Cookie::queue(\Cookie::forever('filteringTagsType', \Input::get('filteringTagsType')));
            }
            return redirect(route('forum.getForum'));
        }
        if (!\Cookie::has('filteringTagsType')) {
            \Cookie::queue(\Cookie::forever('filteringTagsType', 'classic'));
        }

        /**
         * ShowBy method.
         */
        $showTagsByType = \Cookie::get('showTagsByType', 'all');

        $showMethods = array('all', 'official', 'unofficial');
        if (\Input::has('showTagsByType')) {
            if (in_array(\Input::get('showTagsByType'), $showMethods)) {
                \Cookie::queue(\Cookie::forever('showTagsByType', \Input::get('showTagsByType')));
            }
            return redirect(route('forum.getForum'));
        }
        if (!\Cookie::has('showTagsByType')) {
            \Cookie::queue(\Cookie::forever('showTagsByType', 'all'));
        }


        /**
         * ShowActive method.
         */
        $showActiveTags = \Cookie::get('showActiveTags', 0);

        $activeMethods = array(1, 0);
        if (\Input::has('showActiveTags')) {
            if (in_array(\Input::get('showActiveTags'), $activeMethods)) {
                \Cookie::queue(\Cookie::forever('showActiveTags', \Input::get('showActiveTags')));
            }
            return redirect(route('forum.getForum'));
        }
        if (!\Cookie::has('showActiveTags')) {
            \Cookie::queue(\Cookie::forever('showActiveTags', 0));
        }

        /**
         * Creating a global variable for displaying in the view.
         */
        $userFilters = new \stdClass();

        $userFilters->filteringTagsType = $filteringTagsType;
        $userFilters->showTagsByType = $showTagsByType;
        $userFilters->showActiveTags = $showActiveTags;

        return $userFilters;
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

        foreach($topics as $topic) {
            $score = 0;
            foreach($topic->posts()->first()->votes as $vote) {
                $score += (int) $vote->value;
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
