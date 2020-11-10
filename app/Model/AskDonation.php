<?php
namespace model;

class AskDonation
{
    public static function create(array $data)
    {
        $new = \ORM::for_table("AskDonation")->create();
        $new->delete_flag = 0;
        
        $new->address = $data["address"];
            
        $new->hospital = $data["hospital"];
            
        $new->bloodtype = $data["bloodtype"];
            
        $new->name = $data["name"];
            
        $new->state = $data["state"];
            
        if ($new->save()) {
            return true;
        } else {
            return false;
        }
    }

    public static function update(array $data)
    {
        $update = \ORM::for_table("AskDonation")->find_one([$data["id"]]);
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
        return \ORM::for_table("AskDonation")->findArray();
    }

    public static function find(int $id)
    {
        return \ORM::for_table("AskDonation")->find_one([$id])->as_array();
    }
    
    public static function delete(int $id)
    {
        $delete = \ORM::for_table("AskDonation")->find_one([$id]);
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
