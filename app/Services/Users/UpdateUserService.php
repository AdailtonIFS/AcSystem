<?php

namespace App\Services\Users;

use App\Contracts\UsersInterface;

class UpdateUserService
{
    /**
     * @var ActivitiesInterface
     */
    private $usersInterface;

    public function __construct(UsersInterface $usersInterface)
    {
        $this->$usersInterface = $usersInterface;
    }

    /**
     * @param array data
     * @return array[]|mixed
     * @param integer id
     * @return
     */
    public function run(int $id, array $array)
    {
        try {
            $this->usersInterface->update($id, $array);
            return [
                'message' => 'Usuário alterado com sucesso',
                'status' => '200'
            ];
        } catch (\Exception $e) {
            return [
                'errors' => [
                    'title' => $e->getMessage(),
                ],
            ];
        }
    }
}
