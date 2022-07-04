<?php

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;


class Request extends AbstractModel
{
    private $name;
    private $surname;
    private $categoryId;
    private $category;
    private $email;
    private $seen;
    private $answered;
    private $phone;
    private $subject;
    private $message;

    protected const TABLE = 'requests';

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load($id);
        }
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function isSeen()
    {
        return $this->seen;
    }

    /**
     * @param mixed $seen
     */
    public function setSeen($seen): void
    {
        $this->seen = $seen;
    }

    /**
     * @return mixed
     */
    public function isAnswered()
    {
        return $this->answered;
    }

    /**
     * @param mixed $answered
     */
    public function setAnswered($answered): void
    {
        $this->answered = $answered;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function assignData()
    {
        $this->data = [
            'name' => $this->name,
            'surname' => $this->surname,
            'category_id' => $this->categoryId,
            'email' => $this->email,
            'seen' => $this->seen,
            'answered' => $this->answered,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();
        $category = new Category();

        $request = $db->select()->from(self::TABLE)->where('id', $id)->getOne();

        if (!empty($request)) {
            $this->id = $request['id'];
            $this->name = $request['name'];
            $this->surname = $request['surname'];
            $this->categoryId = $request['category_id'];
            $this->email = $request['email'];
            $this->seen = $request['seen'];
            $this->answered = $request['answered'];
            $this->phone = $request['phone'];
            $this->subject = $request['subject'];
            $this->message = $request['message'];
            $this->category = $category->load($this->categoryId)->getName();
            return $this;
        }
        return null;
    }

    public static function getAll($categoryId = null)
    {
        $db = new DBHelper();

        $db->select()->from(self::TABLE);

        if ($categoryId != null) {
            $db->where('category_id', $categoryId);
        }

        $data = $db->get();

        $requests = [];

        foreach ($data as $element) {
            $requests[] = new Request($element['id']);;
        }

        return $requests;
    }
}