<?php
    namespace App\Providers;

use App\Models\Ingredient;
use App\views\Composers\ProfilCsomposers;
    use Illuminate\Support\Facades\View;
    use Illuminate\Support\ServiceProvider;

    class ViewServiceProvider extends ServiceProvider{
        /**
         * 
         * 
         * @return void
         */
    
        public function registrer(){

            //
        }
        /**
         * 
         * Bootstrap any application services
         * 
         * @return void
         * 
         */


        public function boot(){
            //using class based composers..
            
            //
            view::composer('recipes.create',function($view){
                $view->with('ingredients',Ingredient::all());
            });

            

    }
}
?>