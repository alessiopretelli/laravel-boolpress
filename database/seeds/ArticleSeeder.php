<?php

use Illuminate\Database\Seeder;
use App\Article;
use Faker\Generator as Faker;


class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $articles = [
            [
                'title' => 'Finalmente riaprono le palestre!',
                'intro' => 'All\'autore di questo articolo scendevano da qui a Napoli per l\'attesa.',
                'body' => 'Sensazionale svolta del Governo delle ciquita sulle riaperture dei luoghi di sport, cultura fisica e fitness, che, ironicamente, in Paesi che in passato erano realmente etichettati dai media come \'Repubblica delle Banane\' hanno sempre tenuto aperti come inequivocabile Diritto alla Salute. Studiosi, politologi affermano che il QI del governo ha acquistato un incremento del 2%, anche se sappiamo tutti che, tranne i politici, il 2% di 0 e\' sempre 0...',
                'category_id' => 1,
                'user_id' => 1
            ],
            [
                'title' => 'Sgarbi su tutte le furie',
                'intro' => 'Il ministro Speranza e\' una capra!',
                'body' => 'Che l\'eta\' dello stimatissimo critico d\'arte sia direttamente proporzionale alla sua incontinenza e\' ormai un dato di fatto, cosi\' come il soggetto corrisposto all\'offesa nella suddetta dichiarazione, specie dopo essersi espresso negativamente sull\'apertura delle palestre; pensiero che corrobora l\'articolo del mio caro collega Alessio Pretelli.',
                'category_id' => 1,
                'user_id' => 1
            ],
            [
                'title' => 'Russian guys in CS:GO',
                'intro' => 'Former President Donald Trump asks President Biden to \'wallban\' Russia and every other former COMINTERN country from CS:GO servers: \'I won\'t stand another CYKA BLYAT when I play!\'',
                'body' => 'Here we go again, former President Trump\'s last wife is going to drop him and its depression led him to play his son\'s favorite game, CS:GO, a notorius PC game developed by american company VALVe that draws many young players all around the world... well, especially the eastern countries. I\'ve got to say it, and I won\'t regret it, that he is right for the first time. I mean, who can stand those gloomy language, son of a hacker, guys?',
                'category_id' => 2,
                'user_id' => 1
            ]
        ];

        foreach ($articles as $article) {
            $new_article = new Article;

            $new_article->title = $article['title'];
            $new_article->intro = $article['intro'];
            $new_article->body = $article['body'];
            $new_article->category_id = $article['category_id'];
            $new_article->user_id = $article['user_id'];

            $new_article->save();
        }
    }
}
