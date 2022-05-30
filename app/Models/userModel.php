<?php
namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'ID';
    protected $allowedFields = ['NomeCompleto', 'Email', 'created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getUser($id = null){
        if($id === null){
            return $this->findAll();     
            // return $this->withDelete()->findAll();    
        }
        return $this->asArray()->where(['ID' => $id])->first();
    }
}