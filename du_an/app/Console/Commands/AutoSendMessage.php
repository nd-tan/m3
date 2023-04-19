<?php

namespace App\Console\Commands;

use App\Models\Message;
use Illuminate\Console\Command;

class AutoSendMessage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:sendMessage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
            $mess = new Message();
            $mess->room_name = 13;
            $mess->content = "oke ae";
            $mess->user_id = 1;
            $mess->save();
            return 0;
    }
}
