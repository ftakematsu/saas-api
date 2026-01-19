<?php 

namespace App\Application\User;

use App\Domain\User\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ListUsers {
    public function __construct(
        private UserRepository $repository
    ) {}

    public function execute()
    {
        $userId = Auth::user()->id;
        //Log::info("ID USUARIO: " .  $userId);

        return $this->repository->getAllUsers();
    }
}