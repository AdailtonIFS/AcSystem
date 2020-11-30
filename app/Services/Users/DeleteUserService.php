<?php

namespace App\Services\Users;

use App\Contracts\UsersInterface;
use phpDocumentor\Reflection\Types\Mixed_;

class DeleteUserService
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
     * @param integer id
     * @return array[]|mixed
     */
    public function run($id)
    {
        try {
            $this->usersInterface->delete($id);
            return [
                'message' => 'Usuário deletado com sucesso',
                'status' => 200
            ];
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'title' => $e->getMessage(),
                ]
            ];
        }
    }
}
