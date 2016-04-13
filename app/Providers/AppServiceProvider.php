<?php

namespace App\Providers;
use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('row', function($data)
        {

            $data = str_replace(['(',')'], "", $data);
            
            $class = "success";
            $dangerArray = array("Admin. complaint recommended", "Warning issued");
            $warningArray = array("Call Back");

            foreach ($warningArray as $phrase) 
            { 
                if (stripos($data, $phrase) !== false) 
                {
                    $class = "warning";
                    break;
                }
            }

            foreach ($dangerArray as $phrase) 
            {
                if (stripos($data, $phrase) !== false) 
                {
                    $class = "danger";
                    break;
                }
            }
            
            return "<?php echo '<tr class=\"{$class}\">' ?>";


        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
