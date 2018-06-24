<?php

namespace App\Prototype;


abstract class MenuPrototype
{
    private $menu_code;
    private $name;
    private $price;
    private $category;
    private $comments;

    public function __construct($menu_code, $name, $price, $category)
    {
        $this->menu_code    = $menu_code;
        $this->name         = $name;
        $this->price        = $price;
        $this->category     = $category;
    }

    public function getMenuCode() { return $this->menu_code; }
    public function getName()     { return $this->name;      }
    public function getPrice()    { return $this->price;     }
    public function getCategory() { return $this->category;  }
    public function getComments() { return $this->comments;  }

    public function setComments(\stdClass $comment)
    {
        $this->comments = $comment;
    }

    public function cngComment($idx, $comment)
    {
        $this->comments->comment[$idx] = $comment;
    }

    private function getData()
    {
        return [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'category' => $this->getCategory(),
            'comments' => $this->getComments()
        ];
    }

    public function display()
    {
        $data = $this->getData();

        $html = '';
        $html .= '<ul>';
        $html .= $this->getHtmlList($data['name']);
        $html .= $this->getHtmlList($data['price']);
        $html .= $this->getHtmlList($data['category']);
        $html .= '<li><ul>';
        foreach ($data['comments']->comment as $comment) {
            $html .= $this->getHtmlList($comment['comment']);
        }
        $html .= '</li></ul>';
        $html .= '</ul>';

        return $html;
    }

    private function getHtmlList($value)
    {
        return sprintf('<li>%s</li>', $value);
    }

    public function newInstance()
    {
        return clone $this;
    }

    protected abstract function __clone();
}