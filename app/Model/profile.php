<?php
namespace model;

class profile
{
    public static function create(array $data)
    {
        $new = \ORM::for_table("profile")->create();
        $new->delete_flag = 0;
        
        $new->user_id = $data["user_id"];
            
        $new->bloodtype = $data["bloodtype"];

        $new->last_donation = $data["last_donation"];
            
        $new->next_donation = $data["next_donation"];
            
        $new->dob = $data["dob"];
            
        $new->name = $data["name"];
            
        $new->address = $data["address"];
            
        $new->email = $data["email"];
            
        $new->nid = $data["nid"];
            
        $new->bloodtest = $data["bloodtest"];
            
        if ($new->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update(array $data)
    {
        $update = \ORM::for_table("profile")->find_one([$data["id"]]);
        if (is_bool($update)) {
            return false ;
        }
        
        foreach ($data as $key => $value) {
            if ($key == "id") {
                continue;
            }
            $update->set($key, $value);
        }
        if ($update->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function select()
    {
        return \ORM::for_table("profile")->findArray();
    }

    public static function find(int $id)
    {
        return \ORM::for_table("profile")->find_one([$id])->as_array();
    }
    
    public static function delete(int $id)
    {
        $delete = \ORM::for_table("profile")->find_one([$id]);
        if (is_bool($delete)) {
            return false ;
        }
        if ($delete->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
