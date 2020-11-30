<?php

namespace App\Services\Users;

use App\Contracts\UsersInterface;
use Illuminate\Support\Facades\Hash;

class StoreUserService
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
    public function run($data)
    {
        try {
            $data['password'] = Hash::make($data['id']);
            $this->usersInterface->save($data);
            return [
                'message' => 'Usuário cadastrado com sucesso',
                'status' => '200'
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
