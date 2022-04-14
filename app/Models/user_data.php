<?php 

namespace App\Models;
use CodeIgniter\Model;
 
class user_data extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['id','full_name','username', 'email'];

    public function getUsers($id = false) {
      if($id === false) {
        return $this->findAll();
      } else {
          return $this->getWhere(['id' => $id]);
      }
    }
    
}
?>