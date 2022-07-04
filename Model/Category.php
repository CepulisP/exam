<?php

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;


class Category extends AbstractModel
{
    private string $name;

    protected const TABLE = 'categories';

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load($id);
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function assignData()
    {
        $this->data = [
            'name' => $this->name,
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();

        $category = $db->select()->from(self::TABLE)->where('id', $id)->getOne();

        if (!empty($category)) {
            $this->id = $category['id'];
            $this->name = $category['name'];
            return $this;
        }
        return null;
    }

    public static function getAll()
    {
        $db = new DBHelper();

        $data = $db->select()->from(self::TABLE)->get();

        $categories = [];

        foreach ($data as $element) {
            $categories[] = new Category($element['id']);;
        }

        return $categories;
    }
}