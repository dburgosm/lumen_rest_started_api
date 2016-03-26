<?php namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppzcoderRoutesCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'route:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display all registered routes.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {  
        global $app;
        $routeCollection = $app->getRoutes();

        $rows = array();
        $x = 0;
        foreach ($routeCollection as $route) {
            if( !empty($route['action']['uses']) ) {
                $action = $route['action']['uses'];
            } else {
                $action = '';
            }
            $rows[$x]['method'] = $route['method'];
            $rows[$x]['uri'] = $route['uri'];
            $rows[$x]['action'] = $action;
            $x++;
        }

        $headers = array( 'Method', 'URI', 'Action' );
        $this->table($headers, $rows);
    }

}
