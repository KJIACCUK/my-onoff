<?php

namespace app\models;

use Yii;
use yii\base\Model;

class ImageUpload extends Model{

    public $img;

    public function rules()
    {
        return [
            [['img'], 'required'],
            [['img'], 'file', 'extensions'=>'jpg,png'],
        ];
    }

    public function uploadFile($file, $currentImage){
        $this->img = $file;

        if($this->validators){
            $this->deleteCurrentImage($currentImage);

            return $this->saveImage();
        }
    }

    private function getFolder(){
        if(Yii::$app->controller->id == 'categories') {
            return Yii::getAlias('@web') . 'images/categories/';
        }

        if(Yii::$app->controller->id == 'post') {
            return Yii::getAlias('@web') . 'images/posts/';
        }

        if(Yii::$app->controller->id == 'products') {
            return Yii::getAlias('@web') . 'images/products/';
        }

        if(Yii::$app->controller->id == 'help') {
            return Yii::getAlias('@web') . 'images/help/';
        }

        if(Yii::$app->controller->id == 'documentation') {
            return Yii::getAlias('@web') . 'images/documentation/';
        }

        if(Yii::$app->controller->id == 'solutions') {
            return Yii::getAlias('@web') . 'images/solutions/';
        }

        if(Yii::$app->controller->id == 'subsection') {
            return Yii::getAlias('@web') . 'images/subsection/';
        }
    }

    private function generateFilename(){
        return strtolower(md5(uniqid($this->img->baseName)) . '.' . $this->img->extension);
    }

    public function deleteCurrentImage($currentImage){
        if($this->fileExists($currentImage)){
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function fileExists($currentImage){
        if(!empty($currentImage) && $currentImage != null) {
            return file_exists($this->getFolder() . $currentImage);
        }
    }

    public function saveImage(){
        $filename = $this->generateFilename();
        $this->img->saveAs($this->getFolder() . $filename);
        return $filename;
    }

}