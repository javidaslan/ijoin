<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model backend\models\Events */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="events-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(\common\models\User::find()->all(),'id','name'),
        [
            'prompt' => 'Organizer',
        ]
    );?>

    <?= $form->field($model, 'category_id')->dropDownList(
        ArrayHelper::map(\backend\models\Category::find()->all(),'id','title'),
        [
            'prompt' => 'Category',
        ]
    );?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions(
            ['fm', 'path' => 'post1'],
            ['preset' => 'full']
        )
    ]); ?>

    <?= $form->field($model, 'quota')->textInput() ?>

    <?= $form->field($model, 'numOfPart')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'lng')->textInput() ?>

    <?= $form->field($model, 'ltd')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
