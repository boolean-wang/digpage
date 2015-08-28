<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/8/28
 * Time: 23:06
 */

namespace console\controllers;
use common\models\User;
use yii\console\controller;

class InitController extends Controller
{
    public function actionUser(){
        echo "create init user ...\n";
        $username = $this->prompt('Input UserName: ');
        $email = $this->prompt('Input Email for ' . $username . ':');
        $password = $this->prompt('Input Password for' . $username . ':');

        $model = new User();
        $model->username = $username;
        $model->email = $email;
        $model->password = $password;

        if(!$model->save()){
            foreach($model->getErrors() as $errors){
                foreach($errors as $e){
                    echo "$e\n";
                }
                return 1;
            }
            return 0;
        }

    }
}