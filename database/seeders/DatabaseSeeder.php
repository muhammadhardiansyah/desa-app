<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Post;
use \App\Models\User;
use \App\Models\Category;
use \App\Models\Authorizations;
use \App\Models\Products;
use \App\Models\Position;
use \App\Models\Staff;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Muhammad Hardiansyah',
            'username' => 'ardian',
            'email' => 'ardian@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'H. Narno',
            'username' => 'h-narno',
            'email' => 'narno@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'name' => 'M. Rofii',
            'username' => 'm-rofii',
            'email' => 'rofii@gmail.com',
            'password' => bcrypt('password')
        ]);
        
        User::factory(8)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // User::create([
        //     'name' => 'Ardian',
        //     'email'=> 'ardian@gmail.com',
        //     'password'=> bcrypt('ardian')
        // ]);
        
        // User::create([
        //     'name' => 'Dian',   
        //     'email'=> 'dian@gmail.com',
        //     'password'=> bcrypt('dian')
        // ]);

        Category::create([
            'name'=> 'Programming',
            'slug'=> 'programming'
        ]);

        Category::create([
            'name'=> 'Personal',
            'slug'=> 'personal'
        ]);

        Authorizations::create([
            'name' => 'user',
        ]);

        Authorizations::create([
            'name' => 'admin',
        ]);

        Products::create([
            'name'  => 'Products 1',
            'slug'  => 'products-1',
            'by'    => 'Ardian',
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti minus, repellendus suscipit id magni dicta excepturi repudiandae! Unde aperiam eius repellat minus ullam culpa nostrum sapiente repudiandae, autem, dicta exercitationem! Nihil hic ipsa sint amet obcaecati blanditiis facilis ex ratione eum possimus explicabo exercitationem dolore voluptatibus accusamus, iure magni consequatur.'
        ]);

        Position::create([
            'name'  => 'Kepala Desa',
            'slug'  => 'kepala-desa'
        ]);
        Position::create([
            'name'  => 'Sekretaris Desa',
            'slug'  => 'sekretaris-desa'
        ]);
        Position::create([
            'name'  => 'Mahasiswa Magang',
            'slug'  => 'mahasiswa-magang'
        ]);

        Staff::create([
            'user_id'=> '2',
            'position_id' => '1'
        ]);
        Staff::create([
            'user_id'=> '3',
            'position_id' => '2'
        ]);
        Staff::create([
            'user_id'=> '1',
            'position_id' => '3'
        ]);



        Post::factory(20)->create();

        // Post::create([
        //     'title'=>'Judul Pertama',
        //     'slug' =>'judul-pertama',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi',
        //     'category_id' => 1,
        //     'user_id' => 2,
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi facilis maxime sequi dolorem iusto perferendis illum numquam! Corrupti, nisi tempore aliquid hic earum vitae ipsa. Fugiat iste quisquam fuga temporibus necessitatibus voluptatum iusto, dolores libero vel, explicabo reprehenderit, nam soluta voluptatibus sapiente sint vero! Nam minus eaque accusantium, ullam aspernatur recusandae ipsa, ipsum deserunt aliquid est pariatur sit ipsam tenetur hic sequi velit, amet beatae. Voluptas quaerat, dicta odio quas reiciendis maxime. Culpa harum, iusto facilis cupiditate iure amet sint dicta labore reiciendis odio quae fugiat nostrum aspernatur nesciunt omnis possimus nam officiis, consequatur corporis error repellendus pariatur! Blanditiis labore harum pariatur eveniet sint beatae, dignissimos ex nobis quibusdam facere nihil iure itaque quas possimus dicta eligendi fugit aut repudiandae hic minima veritatis placeat nemo? Quo consequatur illum eum mollitia, consequuntur adipisci vel aliquid cum molestiae. Aperiam ut vel aliquid inventore, assumenda sed quisquam id enim porro eius? Vitae dolore laborum culpa deleniti neque sapiente adipisci fugiat eveniet repellat eligendi, numquam sequi, recusandae beatae harum consequatur voluptatem nihil perspiciatis. Veritatis deleniti voluptatem rerum quam repellat fuga nesciunt, quaerat aperiam nobis, libero ab atque iusto dolorum amet dicta doloremque earum. Neque debitis facilis magnam cumque corporis nemo eligendi molestias in doloremque distinctio possimus quaerat alias sunt sed, labore est nobis assumenda ipsam aliquid quibusdam reprehenderit esse? Ipsum quis nesciunt quam rem consequatur libero tenetur ratione at nobis repellendus odio, sunt architecto quo laborum earum laboriosam dolorem velit magnam dolorum fugiat. Voluptatibus quidem ipsum dicta assumenda aliquid illo! Temporibus, perferendis excepturi! Officiis odio nobis facilis veritatis cum veniam molestiae quas eum pariatur quidem odit reprehenderit soluta facere autem nulla voluptatum sed corporis, aspernatur blanditiis tempore animi est iusto ipsum! Alias, necessitatibus delectus! Maxime dolores praesentium fugit mollitia ipsam animi et alias rem aliquam? Maiores, rem quisquam! Asperiores dicta omnis accusantium repudiandae cumque voluptatem commodi. Nostrum itaque qui inventore, corrupti minus deserunt ab eius nobis repellat consequatur enim nisi? Officia asperiores aperiam accusantium iste quas debitis saepe recusandae sed corporis ut consequatur amet doloribus omnis, deserunt quia? Eum nisi officia dicta sed cum at eveniet quidem quas. Alias nobis maxime voluptates voluptatibus in dolorem earum, iure blanditiis numquam porro ratione sequi repudiandae consequuntur natus nostrum similique assumenda, cupiditate nam dolores accusamus? Commodi alias error impedit aperiam fugiat recusandae incidunt voluptatum debitis quas. Culpa iure rerum rem, eaque nesciunt sequi id?'
        // ]);
        // Post::create([
        //     'title'=>'Judul Kedua',
        //     'slug' =>'judul-kedua',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi',
        //     'category_id' => 2,
        //     'user_id' => 1,
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi facilis maxime sequi dolorem iusto perferendis illum numquam! Corrupti, nisi tempore aliquid hic earum vitae ipsa. Fugiat iste quisquam fuga temporibus necessitatibus voluptatum iusto, dolores libero vel, explicabo reprehenderit, nam soluta voluptatibus sapiente sint vero! Nam minus eaque accusantium, ullam aspernatur recusandae ipsa, ipsum deserunt aliquid est pariatur sit ipsam tenetur hic sequi velit, amet beatae. Voluptas quaerat, dicta odio quas reiciendis maxime. Culpa harum, iusto facilis cupiditate iure amet sint dicta labore reiciendis odio quae fugiat nostrum aspernatur nesciunt omnis possimus nam officiis, consequatur corporis error repellendus pariatur! Blanditiis labore harum pariatur eveniet sint beatae, dignissimos ex nobis quibusdam facere nihil iure itaque quas possimus dicta eligendi fugit aut repudiandae hic minima veritatis placeat nemo? Quo consequatur illum eum mollitia, consequuntur adipisci vel aliquid cum molestiae. Aperiam ut vel aliquid inventore, assumenda sed quisquam id enim porro eius? Vitae dolore laborum culpa deleniti neque sapiente adipisci fugiat eveniet repellat eligendi, numquam sequi, recusandae beatae harum consequatur voluptatem nihil perspiciatis. Veritatis deleniti voluptatem rerum quam repellat fuga nesciunt, quaerat aperiam nobis, libero ab atque iusto dolorum amet dicta doloremque earum. Neque debitis facilis magnam cumque corporis nemo eligendi molestias in doloremque distinctio possimus quaerat alias sunt sed, labore est nobis assumenda ipsam aliquid quibusdam reprehenderit esse? Ipsum quis nesciunt quam rem consequatur libero tenetur ratione at nobis repellendus odio, sunt architecto quo laborum earum laboriosam dolorem velit magnam dolorum fugiat. Voluptatibus quidem ipsum dicta assumenda aliquid illo! Temporibus, perferendis excepturi! Officiis odio nobis facilis veritatis cum veniam molestiae quas eum pariatur quidem odit reprehenderit soluta facere autem nulla voluptatum sed corporis, aspernatur blanditiis tempore animi est iusto ipsum! Alias, necessitatibus delectus! Maxime dolores praesentium fugit mollitia ipsam animi et alias rem aliquam? Maiores, rem quisquam! Asperiores dicta omnis accusantium repudiandae cumque voluptatem commodi. Nostrum itaque qui inventore, corrupti minus deserunt ab eius nobis repellat consequatur enim nisi? Officia asperiores aperiam accusantium iste quas debitis saepe recusandae sed corporis ut consequatur amet doloribus omnis, deserunt quia? Eum nisi officia dicta sed cum at eveniet quidem quas. Alias nobis maxime voluptates voluptatibus in dolorem earum, iure blanditiis numquam porro ratione sequi repudiandae consequuntur natus nostrum similique assumenda, cupiditate nam dolores accusamus? Commodi alias error impedit aperiam fugiat recusandae incidunt voluptatum debitis quas. Culpa iure rerum rem, eaque nesciunt sequi id?'
        // ]);
        // Post::create([
        //     'title'=>'Judul Ketiga',
        //     'slug' =>'judul-ketiga',
        //     'excerpt'=> 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi',
        //     'category_id' => 1,
        //     'user_id' => 1,
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia quae, aspernatur ex asperiores deleniti quis aut nesciunt excepturi architecto incidunt dolorum modi facilis maxime sequi dolorem iusto perferendis illum numquam! Corrupti, nisi tempore aliquid hic earum vitae ipsa. Fugiat iste quisquam fuga temporibus necessitatibus voluptatum iusto, dolores libero vel, explicabo reprehenderit, nam soluta voluptatibus sapiente sint vero! Nam minus eaque accusantium, ullam aspernatur recusandae ipsa, ipsum deserunt aliquid est pariatur sit ipsam tenetur hic sequi velit, amet beatae. Voluptas quaerat, dicta odio quas reiciendis maxime. Culpa harum, iusto facilis cupiditate iure amet sint dicta labore reiciendis odio quae fugiat nostrum aspernatur nesciunt omnis possimus nam officiis, consequatur corporis error repellendus pariatur! Blanditiis labore harum pariatur eveniet sint beatae, dignissimos ex nobis quibusdam facere nihil iure itaque quas possimus dicta eligendi fugit aut repudiandae hic minima veritatis placeat nemo? Quo consequatur illum eum mollitia, consequuntur adipisci vel aliquid cum molestiae. Aperiam ut vel aliquid inventore, assumenda sed quisquam id enim porro eius? Vitae dolore laborum culpa deleniti neque sapiente adipisci fugiat eveniet repellat eligendi, numquam sequi, recusandae beatae harum consequatur voluptatem nihil perspiciatis. Veritatis deleniti voluptatem rerum quam repellat fuga nesciunt, quaerat aperiam nobis, libero ab atque iusto dolorum amet dicta doloremque earum. Neque debitis facilis magnam cumque corporis nemo eligendi molestias in doloremque distinctio possimus quaerat alias sunt sed, labore est nobis assumenda ipsam aliquid quibusdam reprehenderit esse? Ipsum quis nesciunt quam rem consequatur libero tenetur ratione at nobis repellendus odio, sunt architecto quo laborum earum laboriosam dolorem velit magnam dolorum fugiat. Voluptatibus quidem ipsum dicta assumenda aliquid illo! Temporibus, perferendis excepturi! Officiis odio nobis facilis veritatis cum veniam molestiae quas eum pariatur quidem odit reprehenderit soluta facere autem nulla voluptatum sed corporis, aspernatur blanditiis tempore animi est iusto ipsum! Alias, necessitatibus delectus! Maxime dolores praesentium fugit mollitia ipsam animi et alias rem aliquam? Maiores, rem quisquam! Asperiores dicta omnis accusantium repudiandae cumque voluptatem commodi. Nostrum itaque qui inventore, corrupti minus deserunt ab eius nobis repellat consequatur enim nisi? Officia asperiores aperiam accusantium iste quas debitis saepe recusandae sed corporis ut consequatur amet doloribus omnis, deserunt quia? Eum nisi officia dicta sed cum at eveniet quidem quas. Alias nobis maxime voluptates voluptatibus in dolorem earum, iure blanditiis numquam porro ratione sequi repudiandae consequuntur natus nostrum similique assumenda, cupiditate nam dolores accusamus? Commodi alias error impedit aperiam fugiat recusandae incidunt voluptatum debitis quas. Culpa iure rerum rem, eaque nesciunt sequi id?'
        // ]);



    }
}
