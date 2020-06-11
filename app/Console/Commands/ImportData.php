<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data';

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
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
