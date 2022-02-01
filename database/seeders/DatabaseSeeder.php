<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Blog::truncate();
        Category::truncate();
        User::truncate();

        $frontend=Category::factory()->create(['name'=>'frontend','slug'=>'frontend']);
        $backend=Category::factory()->create(['name'=>'backend','slug'=>'backend']);

        $mgmg=User::factory()->create(['name'=>'mgmg','username'=>'mgmg']);
        $kyawkyaw=User::factory()->create(['name'=>'kyaw','username'=>'kyaw']);
        Blog::factory(10)->create(['category_id'=>$frontend->id,'user_id'=>$mgmg->id]);
        Blog::factory(10)->create(['category_id'=>$backend->id,'user_id'=>$kyawkyaw->id]);
    }
}
