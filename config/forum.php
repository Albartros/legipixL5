<?php

return [

    /**
     * When do we consider that a Tag is unacive.
     */
    'days_before_unactive_tag' => 10,

    /**
     * Authorized filters for tags.
     */
    'tag_filters' => [
        'tags_filter_by' => ['classic', 'popular'],
        'tags_show_by' => ['all', 'official', 'unofficial'],
        'tags_unactives' => ['include', 'exclude'],
    ],

];
