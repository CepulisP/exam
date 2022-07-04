<?php

namespace Model;

use Core\AbstractModel;
use Helper\DBHelper;


class Answer extends AbstractModel
{
    private $requestId;
    private $name;
    private $surname;
    private $message;

    protected const TABLE = 'answers';

    public function __construct($id = null)
    {
        if ($id !== null) {
            $this->load($id);
        }
    }

    /**
     * @return mixed
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param mixed $requestId
     */
    public function setRequestId($requestId): void
    {
        $this->requestId = $requestId;
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

    public function assignData()
    {
        $this->data = [
            'request_id' => $this->requestId,
            'name' => $this->name,
            'surname' => $this->surname,
            'message' => $this->message
        ];
    }

    public function load($id)
    {
        $db = new DBHelper();

        $answer = $db->select()->from(self::TABLE)->where('id', $id)->getOne();

        if (!empty($answer)) {
            $this->id = $answer['id'];
            $this->name = $answer['name'];
            $this->surname = $answer['surname'];
            $this->requestId = $answer['request_id'];
            $this->message = $answer['message'];
            return $this;
        }
        return null;
    }

    public static function getAll($requestId)
    {
        $db = new DBHelper();

        $data = $db->select()->from(self::TABLE)->where('request_id', $requestId)->get();

        $answers = [];

        foreach ($data as $element) {
            $answers[] = new Answer($element['id']);;
        }

        return $answers;
    }
}