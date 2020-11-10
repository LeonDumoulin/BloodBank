<?php
namespace model;

class users
{
    public static function create(array $data)
    {
        $new = \ORM::for_table("users")->create();
        $new->delete_flag = 0;
        
        $new->user = $data["user"];
            
        $new->password = $data["password"];
            
        $new->phone = $data["phone"];
            
        $new->role = $data["role"];
            
        if ($new->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update(array $data)
    {
        $update = \ORM::for_table("users")->find_one([$data["id"]]);
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
        return \ORM::for_table("users")->findArray();
    }

    public static function find(int $id)
    {
        return \ORM::for_table("users")->find_one([$id])->as_array();
    }
    
    public static function delete(int $id)
    {
        $delete = \ORM::for_table("users")->find_one([$id]);
        if (is_bool($delete)) {
            return false ;
        }
        if ($delete->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public static function check(array $data)
    {
        $check = \ORM::for_table("users")->where(
            array(
            'user' => $data['user'] ,'pass' => $data['user']
            )
        )->find_one();

        return $check;
    }
}
