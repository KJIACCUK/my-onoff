<?php
/**
 * Created by PhpStorm.
 * User: Александр
 * Date: 09.08.2018
 * Time: 22:20
 */

namespace app\controllers;


use app\models\Categories;
use app\modules\admin\models\Documentation;
use app\modules\admin\models\Help;
use app\modules\admin\models\Sections;
use app\modules\admin\models\Software;
use app\modules\admin\models\Solutions;

class PartnersController extends AppController
{
    public function actionHelpProducts(){
        $sections = Sections::find()->where(['parent_id'=>'1'])->all();
        $categories = Categories::find()->all();
        return $this->render('help-products', compact('sections', 'categories'));
    }

    public function actionHelpProductsSection($id){
        $help = Help::find()->where('sections_id = :id',[':id'=>$id])->all();
        $section = Sections::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('help-products-section', compact('help', 'section'));
    }

    public function actionHelpProductDetail($id){
        $detail = Help::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('help-product-detail', compact('detail'));
    }



    public function actionDocumentation(){
        $sections = Sections::find()->where(['parent_id'=>'2'])->all();
        $categories = Categories::find()->all();
        return $this->render('documentation', compact('sections', 'categories'));
    }

    public function actionDocumentationSection($id){
        $documentation = Documentation::find()->where('sections_id = :id',[':id'=>$id])->all();
        $section = Sections::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('documentation-section', compact('documentation', 'section'));
    }

    public function actionDocumentationDetail($id){
        $detail = Documentation::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('documentation-detail', compact('detail'));
    }



    public function actionSolutions(){
        $sections = Sections::find()->where(['parent_id'=>'3'])->all();
        $categories = Categories::find()->all();
        return $this->render('solutions', compact('sections', 'categories'));
    }

    public function actionSolutionsSection($id){
        $solutions = Solutions::find()->where('sections_id = :id',[':id'=>$id])->all();
        $section = Sections::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('solutions-section', compact('solutions', 'section'));
    }

    public function actionSolutionDetail($id){
        $detail = Solutions::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('solution-detail', compact('detail'));
    }



    public function actionSoftware(){
        $sections = Sections::find()->where(['parent_id'=>'4'])->all();
        $categories = Categories::find()->all();
        return $this->render('software', compact('sections', 'categories'));
    }

    public function actionSoftwareSection($id){
        $software = Software::find()->where('sections_id = :id',[':id'=>$id])->all();
        $section = Sections::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('software-section', compact('software', 'section'));
    }

    public function actionSoftwareDetail($id){
        $detail = Software::find()->where('id = :id',[':id'=>$id])->one();
        return $this->render('software-detail', compact('detail'));
    }

}