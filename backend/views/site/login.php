<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;

$this->title = 'Login';
?>

<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><?= Html::encode($this->title) ?>Welcome Back!</h1>
            </div>
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'user']
            ]); ?>
            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'class' => 'form-control form-control-user',
                    'placeholder' => 'Enter Email Address...'
                ]
            ])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'class' => 'form-control form-control-user',
                        'placeholder' => 'Password'
                    ]
            ])->passwordInput() ?>

            <?= $form->field($model, 'rememberMe', [
                'inputOptions' => [
                    'class' => 'custom-control-input',
                    'placeholder' => 'Password'
                ]
            ])->checkbox() ?>

            <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>

<!--                <hr>-->
<!--                <a href="index.html" class="btn btn-google btn-user btn-block">-->
<!--                    <i class="fab fa-google fa-fw"></i> Login with Google-->
<!--                </a>-->
<!--                <a href="index.html" class="btn btn-facebook btn-user btn-block">-->
<!--                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook-->
<!--                </a>-->
<!--            </form>-->
            <?php ActiveForm::end(); ?>
            <hr>
            <div class="text-center">
                <a class="small" href="<?= \yii\helpers\Url::to(['site/forgot-password']) ?>">Forgot Password?</a>
            </div>
<!--            <div class="text-center">-->
<!--                <a class="small" href="register.html">Create an Account!</a>-->
<!--            </div>-->
        </div>
    </div>
</div>
