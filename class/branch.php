<?php
class Branch extends Model{
    public function __construct(){
        Model::__construct();
        $this->table('branch');
    }

    // public function getBranchById($id){
    //     $attr = array(
    //         'where' => array('id'=> $id)
    //     );
    //     return $this->select($attr);
    // }

    public function getBranchById(){
        return $this->selectBranch();
    }

    // public function getAllBranch(){
    //     return $this->selectBranch();
    // }
}
?>