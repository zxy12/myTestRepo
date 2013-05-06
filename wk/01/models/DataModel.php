<?php
class DataModel extends Cola_Model
{
    protected $_table = 'data';

    public function test()
    {
        try {
            $data = $this->sql("select * from data limit 5;");
            return $data;
        } catch (Exception $e) {
            echo $e;
        }
    }
}
