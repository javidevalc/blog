<?php
 
namespace App\Listeners;
 
class ImportData
{
    /**
     * Handle the event.
     *
     * @param  ImportDataEv  $event
     * @return void
     */
    public function handle(ImportDataEv $event)
    {
        //do

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
}