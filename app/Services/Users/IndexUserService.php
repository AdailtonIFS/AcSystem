<?php

namespace App\Services\Users;

use App\Contracts\UsersInterface;

class IndexUserService
{
    /**
     * @var UserRepository
     */
    private $usersInterface;

    public function __construct(UsersInterface $usersInterface)
    {
        $this->usersInterface = $usersInterface;
    }

    /**
     * @param $data
     * @return array[]|mixed
     */
    public function run()
    {
        try {
            return $this->usersInterface->getUsersWithCategoriesName();
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'title' => $e->getMessage(),
                ]
            ];
        }
    }
}