<?php

namespace app\models;

class Product
{
    public ?int $id = null;
    public ?string $title = null;
    public ?string $description = null;
    public ?float $price = null;
    public ?string $imagePath = null;
    public ?array $imageFile = null;

    public function load($data)
    {
        $this->id= $data['id'] ?? null;
        $this->title = $data['title'];
        $this->description = $data['description'] ?? '';
        $this->price = $data['price'];
        $this->imageFile = $data['imageFile'] ?? null;
        $this->imagePath = $data['image'] ?? null;
    }

    public function save(){
        $errors = [];
        
        if(!$this->title){
            $errors[] = 'Product title is required';
        }

        if(!$this->price){
            $errors[] = 'Product price is required';
        }

        if(!is_dir(__DIR__.'/../public/images')){  //if images not exists
            mkdir(__DIR__.'/../public/images');    //create directory images
        }

        if (empty($errors)) { 

            if($this->imageFile && $this->imageFile['tmp_name']){
        
                if($this->imagePath){
                    unlink(__DIR__.'/../public/'.$this->imagePath);
                }
                $this->imagePath = 'images/'. randomString(8) .'/'.$this->imageFile['name'];
                //create folder with random string and upload image inside
                mkdir(dirname(__DIR__.'/../public/'.$this->imagePath));
                move_uploaded_file($this->imageFile['tmp_name'], __DIR__.'/../public/'.$this->imagePath);
            }
        }
        return $errors;
    }

}
