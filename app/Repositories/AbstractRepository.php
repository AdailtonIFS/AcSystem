<?php

namespace App\Repositories;

use App\Contracts\BaseInterface;

class AbstractRepository implements BaseInterface
{
    /**
     * Objeto que será setado pelos repositórios filhos
     * @var
     */
    protected $model;

    /**
     * Atribui o model na variavel
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }
    /**
     * Método responsável por receber o model
     */
    protected function resolveModel()
    {
        return app($this->model);
    }
    /**
     * Método responsável por salvar os objetos no banco de dados
     * @param $array
     * @return mixed
     */
    public function save($array)
    {
        if(isset($array['id'])){
            $obj = $this->model::find($array['id']);
            if($obj)
                $obj->update($array);
            else
                $obj = $this->model::create($array);
            return $obj;
        }
        else
            return $this->model::create($array);
    }

    /**
     * Métodos responsável por buscar todos os objetos de determinado tipo
     * @return mixed
     */
    public function all()
    {
        return $this->model::all();
    }

    /**
     * Buscar um objeto especifico a partir de um id passado
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Setar um objeto especifico a partir de uma id
     * @param $id
     * @param $array
     * @return mixed
     */
    public function update($id, $array)
    {
        $obj = $this->model::find($id);
        $obj->fill($array)->update();
        return $obj->refresh();
    }

    /**
     * Deletar um objeto especifico
     * @param $id
     * @return mixed|void
     */
    public function delete($id)
    {
        $obj = $this->model::find($id);
        return $obj->delete();
    }
}
