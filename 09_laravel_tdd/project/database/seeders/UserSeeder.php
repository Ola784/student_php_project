<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\HtmlString;
use Parsedown;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $johndoe = User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => bcrypt('secret'),
            'url'=> 'mypage',
        ]);

        $johndoe->website()->create([
            'url' => 'mypage',
        ]);

        $example_user = User::create([
            'name' => 'Bartosz',
            'email' => 'laravelprojekt@gmail.com',
            'password' => bcrypt('abc'),
            'url'=> 'example',
        ]);

        $example = $example_user->website()->create([
            'url' => 'example',
        ]);

        $page0 = $example->pages()->create([
            'title' => "Art",
            'content' => "ART IS IMPORTANT!",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('')),
        ]);

        $page_renaissance = $example->pages()->create([
            'title' => "Renaissance",
            'content' => "good guy Leonardo",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('')),
        ]);

        $page_postimpressionism = $example->pages()->create([
            'title' => "Post-Impressionism",
            'content' => "fdafdskjkfdskldsf",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('***Van Gogh Time!***')),
        ]);

        $page_empty = $example->pages()->create([
            'title' => "",
            'content' => "",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('')),
        ]);

        $page0->menu()->create(['title' => 'Renaissance', 'link' => '/example.com/page/'.$page_renaissance->id]);
        $page0->menu()->create(['title' => 'Post-Impressionism', 'link' => '/example.com/page/'.$page_postimpressionism->id]);
        $page0->menu()->create(['title' => 'Empty', 'link' => '/example.com/page/'.$page_empty->id]);
        $page_renaissance->menu()->create(['title' => 'Home', 'link' => '/example.com']);
        $page_postimpressionism->menu()->create(['title' => 'Home', 'link' => '/example.com']);

        $gallery_ldv = $page_renaissance->gallery()->create(['title' => 'Leonardo da Vinci']);
        $gallery_r = $page_renaissance->gallery()->create(['title' => 'Raphael']);
        $gallery_vvg = $page_postimpressionism->gallery()->create(['title' => 'Vincent van Gogh']);

        $gallery_ldv->images()->create(['title' => 'Mona Lisa', 'file' => 'example-ldv-monalisa.jpeg', 'description' => 'Painted between 1503 and 1506.',]);
        $gallery_ldv->images()->create(['title' => 'Vitruvian Man','file' => 'example-ldv-vitruve.jpeg','description' => 'Painted circa 1492.',]);
        $gallery_ldv->images()->create(['title' => 'The Last Supper','file' => 'example-ldv-supper.jpeg','description' => 'Painted from 1495 until 1498.',]);
        $gallery_ldv->images()->create(['title' => 'Lady with an Ermine','file' => 'example-ldv-ermine.jpeg','description' => 'Painted circa 1490 1483-1490.',]);
    
        $gallery_r->images()->create(['title' => 'Pope Julius II', 'file' => 'example-r-pope.jpeg', 'description' => 'Me during quarantine.',]);
        $gallery_r->images()->create(['title' => 'The School of Athens','file' => 'example-r-schoolofathens.jpeg','description' => 'Painted circa 1511.',]);
        $gallery_r->images()->create(['title' => 'The Holy Family','file' => 'example-r-holyfamily.jpeg','description' => 'Painted circa 1518.',]);
    
        $gallery_vvg->images()->create(['title' => 'Starry Night', 'file' => 'example-vvg-starrynight.jpeg', 'description' => 'Painted circa 1889.',]);
        $gallery_vvg->images()->create(['title' => 'Harvest in Provence', 'file' => 'example-vvg-harvest.jpeg', 'description' => 'Arles, June 1888',]);
    }
}
