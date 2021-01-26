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
            'content' => "<img src=\"/images/example-r-schoolofathens.jpeg\" style=\"max-width: 33%\" />",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('')),
        ]);

        $page_renaissance = $example->pages()->create([
            'title' => "Renaissance",
            'content' => "<div style=\"font-size: 64px\">RENAISSANCE</div>",
            'content_markdown' => new HtmlString(app(Parsedown::class)->text('***Markdown***<br>*Renaissance* was a cool **period**')),
        ]);

        $page_postimpressionism = $example->pages()->create([
            'title' => "Post-Impressionism",
            'content' => "",
            'content_markdown' => "",
        ]);

        $page_empty = $example->pages()->create([
            'title' => "empty",
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
    
        $page0->post()->create([
            'title' => 'What is Art? 🤔',
            'body' => new HtmlString(app(Parsedown::class)->text('<b>Art</b> is a diverse range of human activities involving the creation of visual, auditory or performing artifacts (artworks), which express the creator\'s imagination, conceptual ideas, or technical skill, intended to be appreciated primarily for their beauty or emotional power. Other activities related to the production of works of art include art criticism and the history of art. <br><br><p align="center"><i>source: <a href="https://en.wikipedia.org/wiki/Art">Wikipedia</a></i></p>'))
        ]);

        $page_renaissance->post()->create([
            'title' => 'DaVinky? 😂😂😂',
            'body' => new HtmlString(app(Parsedown::class)->text('<div align="center"><img src="/images/example-ldv-monalisa.jpeg" /></div>'))
        ]);

        $page_postimpressionism->post()->create([
            'title' => 'Lorem Ipsum',
            'body' => new HtmlString(app(Parsedown::class)->text('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'))
        ]);

        $page_postimpressionism->post()->create([
            'title' => 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC',
            'body' => new HtmlString(app(Parsedown::class)->text('Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?'))
        ]);

        $page_postimpressionism->post()->create([
            'title' => '1914 translation by H. Rackham',
            'body' => new HtmlString(app(Parsedown::class)->text('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?'))
        ]);
    }
}
