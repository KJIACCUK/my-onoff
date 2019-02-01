<?php

namespace app\controllers;

use app\models\Categories;
use app\models\Post;
use app\models\Products;
use app\models\Subsection;
use app\modules\admin\models\Manufacturer;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm as Login;
use app\models\Signup;
use app\models\ContactForm;
use app\modules\admin\models\Messages;

class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $categories = Categories::find()->all();
        $posts = Post::find()->limit('3')->orderBy('updated_at DESC')->all();

        $this->showCart();
        return $this->render('index', compact('categories', 'posts'));
    }

    public function showCart(){
        $session = Yii::$app->session;
        $session->open();
        Yii::$app->params['form'] = $session['cart.col'];
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->getUser()->isGuest) {
            return $this->goHome();
        }
        $this->showCart();

        $model = new Login();
        if ($model->load(Yii::$app->getRequest()->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->getUser()->logout();

        return $this->goHome();
    }

    /**
     * Signup new user
     * @return string
     */
    public function actionSignup()
    {
        $this->showCart();
        $model = new Signup();
        if ($model->load(Yii::$app->getRequest()->post())) {
            if ($user = $model->signup()) {
                //return $this->goHome();
                return $this->render('login');
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->showCart();
        $model = new Messages();
        if ($model->load(Yii::$app->request->post())){ //&& $model->contact(Yii::$app->params['adminEmail'])) {
            $model->message();
//            Yii::$app->session->setFlash('contactFormSubmitted');
            Yii::$app->mailer->compose('order')
                ->setFrom([Yii::$app->params['supportEmail'] => 'ONOFF'])
                ->setTo('miwa.knx@gmail.com')
                ->setSubject('Уведомление | ONOFF')
                ->send();

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->showCart();
        return $this->render('about');
    }

    public function actionNews(){
        $this->showCart();
        $posts = Post::find()->orderBy('created_at DESC')->all();
        $categories = Categories::find()->all();
        $products = Products::find()->limit('4')->orderBy('id DESC')->all();
        $courses = $this->Kurs();
        return $this->render('news', compact('posts', 'categories', 'products','courses'));
    }

    public function actionCatalogOld(){
        $id = trim(Yii::$app->request->get('id'));
        if(!empty($id)){
            $categories = Categories::find()->where('id = :id',[':id'=>$id])->all();
            $products = Products::find()->where('category_id = :id',[':id'=>$id])->all();
            $this->showCart();
            return $this->render('catalog', compact('categories','products'));
        }

        $categories = Categories::find()->all();
        $products = Products::find()->all();
        $this->showCart();
        return $this->render('catalog-old', compact('categories','products'));
    }

    public function actionCatalog(){
        $id = trim(Yii::$app->request->get('id'));
        if(!empty($id)){
            $categories = Categories::find()->where('id = :id',[':id'=>$id])->all();
            $subsection = Subsection::find()->where('sections_id = :id',[':id'=>$id])->all();
            $this->showCart();
            return $this->render('catalog', compact('categories','subsection'));
        }

        $categories = Categories::find()->all();
        $subsection = Subsection::find()->all();
        $this->showCart();
        return $this->render('catalog', compact('categories','subsection'));
    }

    public function actionCatalogSubsection($id){
            $section = Subsection::find()->andWhere('id = :id',[':id'=>$id])->one();
            $products = Products::find()->where('category_id = :id',[':id'=>$id])->all();
            $manufacturer = Manufacturer::find()->all();
            $this->showCart();
            $courses = $this->Kurs();
            return $this->render('catalog-subsection', compact('section','products', 'manufacturer','courses'));
    }

    public function actionNewsDetail($id){
        $post = Post::findOne($id);
        $categories = Categories::find()->all();
        $products = Products::find()->limit('4')->orderBy('id DESC')->all();
        $courses = $this->Kurs();
        return $this->render('news-detail', compact('post','categories', 'products', 'courses'));
    }

    public function actionModalDetail($id){
        $this->view->registerJsFile('js/main.js');
        $product = Products::findOne($id);
        $this->layout = false;
        $courses = $this->Kurs();
        return $this->render('modal-detail', compact('product', 'courses'));
    }

    public function actionSection($id){
        $categories = Categories::findOne($id);
        return $this->render('section', compact('categories'));
    }
}
