<?php

namespace App\Http\Controllers;

use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function testAPI()
    {
        return $this->userRepository->testAPI();
    }
}
