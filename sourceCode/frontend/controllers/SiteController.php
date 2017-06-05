<?php
namespace frontend\controllers;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use backend\models\Events;
use backend\models\Eventuser;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */

    public function beforeAction($action) {
      $this->enableCsrfValidation = false;
      return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'actions' => ['profile'],
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                ],
            ],
            
        ];
    }

    /**
     * @inheritdoc
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
            'auth' => [
              'class' => 'yii\authclient\AuthAction',
              'successCallback' => [$this, 'oAuthSuccess'],
              'successUrl'=>yii::$app->request->referrer.'?'.time().rand(99999,9999999)
            ],
        ];
    }

    /**
    * This function will be triggered when user is successfuly authenticated using some oAuth client.
    *
    * @param yii\authclient\ClientInterface $client
    * @return boolean|yii\web\Response
    */
    public function oAuthSuccess($client) {
      // get user data from client
      $userAttributes = $client->getUserAttributes();
      session_regenerate_id();
      
	  //session_regenerate_id();

      //var_dump($userAttributes);die();
      $user = User::findByUsername($userAttributes["id"]);
      if($user)
      {

        //var_dump("urra");die();
        $model = new LoginForm();
        $model->username = $userAttributes["id"];
        $model->password = $userAttributes["id"];
        $model->login();
        if ($model->login()) {var_dump("Logged in");
          sleep(2);
          echo "<script>window.opener.location.reload()</script>";
          echo "<script>window.close();</script>";

          }
        else var_dump("no");die();
      }
      else
      {

        $model = new User();
        $model->username =  $userAttributes["id"];
        $model->userId =  $userAttributes["id"];
        $model->auth_key = Yii::$app->security->generateRandomString();
        $model->name = $userAttributes["first_name"];
        $model->surname =  $userAttributes["last_name"];
        $model->status = 10;
        $model->password = $userAttributes["id"];
        $model->email = $userAttributes["email"];
        $model->isStaff = 0;
        $model->save();
        if(!$model->save())
          var_dump($user);die();

      }
      

      // do some thing with user data. for example with $userAttributes['email']
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

      if (Yii::$app->request->isAjax)
        {
            $model = new Events();


            
            // ~~~~~~~~~~~~~~~ Getting data from ajax ~~~~~~~~~~~~~~~~~

            $event_name = Yii::$app->request->post('event_name');  
            $event_desc = Yii::$app->request->post('event_description');
            $category = Yii::$app->request->post('category'); 
            $address = Yii::$app->request->post('address'); 
            $user = Yii::$app->user->getId();   
            $participants = Yii::$app->request->post('participants'); 
            $date = Yii::$app->request->post('date'); 
            $time = Yii::$app->request->post('time');
            $coords = explode(",",Yii::$app->request->post('coords'));


            // ~~~~~~~~~~~~ Saving to DB ~~~~~~~~~~~~~~~~~

            $model->user_id = $user;
            $model->category_id = $category;
            $model->address = $address;
            $model->title = $event_name;
            $model->description = $event_desc;
            $model->numOfPart = (int) $participants;
            $model->ltd = $coords[1];
            $model->lng = $coords[0];
            $model->date = $date;
            $model->time = $time;
            $model->quota = 1;


            $model->save();
            if ($model->save())
            {
                $modelManyToMany = new Eventuser();
                $modelManyToMany->user_id = $user;
                $modelManyToMany->event_id = $model->id;
                $modelManyToMany->admin = 1;
                $modelManyToMany->save();
                $result = 1;
            }
              else $result = 0;

            Yii::$app->response->format = 'json';
            return $result;
        }
        else 
        {
          //var_dump(Yii::$app->request->url);die();
          //Yii::$app->user->logout();
          $events = Events::find()->with('user')->with('category')->all();
          //var_dump($events[0]->lng);die();

          $data = 
          [
            'events' => $events
          ];

          return $this->render('index',$data);
        }
        
    }

    public function actionJoin()
    {
       if (Yii::$app->request->isAjax)
        {

            $event_id = Yii::$app->request->post('event_id'); 
            $user = Yii::$app->user->getId();
            $modelManyToMany = Eventuser::find()->where(['and',['event_id' => $event_id],['user_id' => $user]])->one();

            if ($modelManyToMany != null)
              $result = 0;
            else
            {
              $modelManyToMany = new Eventuser();
              $modelManyToMany->user_id = $user;
              $modelManyToMany->event_id = $event_id;
              $modelManyToMany->save();

              if($modelManyToMany->save())
              {

                  $event = Events::find()->where(['id' => $event_id])->one();
                  $event->quota = $event->quota+1;
                  $event->save();
                  $result = 1;
              }
              else $result = -1;
            }
            
            Yii::$app->response->format = 'json';
              return $result;

        }


    }

    public function actionDelete()
    {
       if (Yii::$app->request->isAjax)
        {


            $event_id = Yii::$app->request->post('event_id'); 
            $user = Yii::$app->user->getId();
            //$model = $this->findModel($id);

            Eventuser::deleteAll(['and',['event_id' => $event_id],['user_id' => $user]]);


            $result = $event_id;
            
            Yii::$app->response->format = 'json';
              return $result;

        }


    }

    public function actionProfile()
    {
       $this->layout = 'profile';
       $i = 0;
       $joinEvents = [];
       if (\Yii::$app->user->isGuest)
          return $this->render('error',['name' => 'Error','message' => 'Error']);
        else
        {
           $user = Yii::$app->user->getId();



           $myEvents = Eventuser::find()->where(['and',['admin' => 1],['user_id' => $user]])->orderBy('id DESC')->all();

           $joinedEvents = Eventuser::find()->where(['user_id' => $user])->with('event')->orderBy('id DESC')->all();

           for ($i = 0; $i < count($joinedEvents); $i++)  {
            // var_dump($event[0]->description);
             array_push($joinEvents,$joinedEvents[$i]);
          }
           //}
           //die();

           $data = 
           [
              'myEvents' => $myEvents,
              'joinedEvents' => $joinedEvents
           ];

           //var_dump($user = Yii::$app->user->getId());die();
           return $this->render('profile',$data);
        }
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
