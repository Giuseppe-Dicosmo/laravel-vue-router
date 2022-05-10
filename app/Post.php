<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'publisheder_at',
        'category_id',
        'slug'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function getDate( $passDate ) {

        if ($passDate) {

            $date = Carbon::createFromFormat('Y-m-d H:i:s', $passDate);
            return $date->format('d/m/Y');

        } else {
            return Carbon::now()->format('d/m/Y');
        }


    }

    public static function getUniqueSlug( $title ) {

        $slug = str::slug($title);
        $slug_dase = $slug;
        $counter = 1;

        $post_present = Post::where('slug', $slug)->first();

        while( $post_present ) {

            $slug = $slug_dase . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();

        }

        return $slug;
    }
}
