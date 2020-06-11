<?php

namespace App\Console\Commands;
   
use DB;
use Illuminate\Console\Command;
use App\Http\Controllers\PostsController;
   
class MigrationCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migration:cron';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function fire()
    {
        $schedule->call(function () {
            DB::table('permissions')->delete();
        })->everyMinute();

        /*

        $json = json_decode(file_get_contents('https://sq1-api-test.herokuapp.com/posts'), true);
        foreach ($json as $obj)  
        {
            foreach ($obj as $key => $value) 
            {
                $insertArr[Str::slug($key,'_')] = $value;
                $insertArr[Str::slug($key,'_')]['system_created'] = 'admin';
            }
            DB::table('posts')->insert($insertArr);
        }

        */

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");
     
        /*
           Write your database logic we bellow:
           Item::create(['name'=>'hello new']);
        */
      
        

        //$request = Request::create('/importData', 'GET');
        //$response = app()->handle($request);

        //$controller = new PostsController();
       // $controller->importData();

        $this->info('Migration:Cron Cummand Run successfully!');
    }
}
