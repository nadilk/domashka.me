<?php


namespace App\models;


use CActiveRecord;

class PostRecord extends CActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'tbl_posts';
    }

    public function primaryKey()
    {
        return 'id';
    }
}