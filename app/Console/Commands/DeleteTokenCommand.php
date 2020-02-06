<?php

namespace App\Console\Commands;

use App\Repositories\TokenRepository;
use Illuminate\Console\Command;

class DeleteTokenCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:deleteToken';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'if token lives > 1 hour, this command will delete it';

    protected $tokenRepository;

    /**
     * Create a new command instance.
     *
     * @param $tokenRepository
     */
    public function __construct(TokenRepository $tokenRepository)
    {
        $this->tokenRepository = $tokenRepository;

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tokens = $this->tokenRepository->getAllOverdueTokens();

        foreach ($tokens as $token) {
            $this->info("token: $token->token for (ID: $token->id, USER_ID: $token->user_id )  - deleted");
            $token->delete();
        }

        $this->comment('cleaner finished');
    }
}
