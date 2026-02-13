<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function testAPI()
    {
        return response()->json([
            'message' => 'Test API'
        ]);
    }
}
