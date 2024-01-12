<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "title" => 'Judul Post Pertama',
            "slug"  => 'judul-post-pertama',
            "author" => 'Ardian',
            "body"  =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, officia temporibus! Non exercitationem explicabo odit deserunt similique nostrum expedita nam, alias ipsam unde aspernatur natus quam saepe obcaecati tempore, doloribus atque. Quod ipsam doloremque aliquid aspernatur corrupti tenetur ullam excepturi cupiditate! Cum quo modi illo debitis possimus in et omnis distinctio facilis inventore sint, praesentium quae accusantium officia exercitationem eligendi est ratione. Odit nisi quibusdam fuga incidunt impedit? Culpa unde error doloremque sapiente cum praesentium distinctio blanditiis voluptas ut magnam!'
        ],
        [
            "title" => 'Judul Post Kedua',
            "slug"  => 'judul-post-kedua',
            "author" => 'Dian',
            "body"  =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, officia temporibus! Non exercitationem explicabo odit deserunt similique nostrum expedita nam, alias ipsam unde aspernatur natus quam saepe obcaecati tempore, doloribus atque. Quod ipsam doloremque aliquid aspernatur corrupti tenetur ullam excepturi cupiditate! Cum quo modi illo debitis possimus in et omnis distinctio facilis inventore sint, praesentium quae accusantium officia exercitationem eligendi est ratione. Odit nisi quibusdam fuga incidunt impedit? Culpa unde error doloremque sapiente cum praesentium distinctio blanditiis voluptas ut magnam!'
        ],
        [
            "title" => 'Judul Post Ketiga',
            "slug"  => 'judul-post-ketiga',
            "author" => 'Ansyah',
            "body"  =>  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, officia temporibus! Non exercitationem explicabo odit deserunt similique nostrum expedita nam, alias ipsam unde aspernatur natus quam saepe obcaecati tempore, doloribus atque. Quod ipsam doloremque aliquid aspernatur corrupti tenetur ullam excepturi cupiditate! Cum quo modi illo debitis possimus in et omnis distinctio facilis inventore sint, praesentium quae accusantium officia exercitationem eligendi est ratione. Odit nisi quibusdam fuga incidunt impedit? Culpa unde error doloremque sapiente cum praesentium distinctio blanditiis voluptas ut magnam!'
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        return $post -> firstWhere('slug',$slug);
        // foreach ($post as $p) {
        //     if ($p['slug'] == $slug) {
        //         $post = $p;
        //     }
        // }
    }
}
