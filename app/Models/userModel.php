<?php
namespace App\Models;
use CodeIgniter\Model;

class userModel extends Model{
    protected $table = 'usuario';
    protected $primaryKey = 'ID';
    protected $returnType = 'array';
    protected $allowedFields = ['NomeCompleto', 'Email', 'created_at', 'updated_at', 'deleted_at'];
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function getUser($ID = null){
        if($ID === null){
            return $this->findAll();     
            // return $this->withDelete()->findAll();    
        }
        return $this->asArray()->where(['ID' => $ID])->first();
    }
}