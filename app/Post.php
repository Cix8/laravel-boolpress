<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public static function generatePostSlugFromTitle($title) {
        $original_slug = Str::slug($title, '-');
        $result_slug = $original_slug;
        $count = 1;
        $post_found = Post::where('slug', '=', $result_slug)->first();
        while ($post_found) {
            $result_slug = $original_slug . '-' . $count;
            $post_found = Post::where('slug', '=', $result_slug)->first();
            $count++;
        }

        return $result_slug;
    }
}
