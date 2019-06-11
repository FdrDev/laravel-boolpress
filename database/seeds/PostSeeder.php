<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Author;
use App\Category;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
      factory(Post::class, 50)->make()->each(function($post) {

          $author = Author::inRandomOrder()->first();
          $post->author()->associate($author);
          $post->save();

          $categories = Category::inRandomOrder()->take(rand(1, 3))->get();
          $post->categories()->attach($categories);
      });
    }
}

//###############APPUNTI##########################
// factory(App\Post::class , 20)->make()
//         ->each(function($post){
// //
// // //creo la variabile = indirizzo del model::ordine casuale()->prendo(rdn nunb(1,3))->prendile();
// //                   $categories = App\Category::inRandomOrder()->take(rand(1,3))->get();
// //
// // //variabile contenuta in function->collegamentoConIlNomeDellaFunctionNelModel()->attaccale(categorie)
// //                   $post->categories()->attach($categories);
// //
// // //salvataggio
// //                   $post->save();
// //Dato che in questo caso abbiamo una relazione 1aN e NaN, occorre prima collegare quella 1aN
// //va salvata
