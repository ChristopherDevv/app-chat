<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class UpdateUsernames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-usernames';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update usernames for all users based on their name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        foreach($users as $user){
            $user->username = Str::slug($user->name);
            $user->save();
            
        }
        $this->info('Usernames updated successfully!');
    }
}
