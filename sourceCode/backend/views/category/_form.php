<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'avatar')->textInput(['maxlength' => 255])->widget(InputFile::className(), [
	        'language'      => 'en',
	        'controller'    => 'fm',
	        'path' => 'avatar',
	        'filter' => 'image',
	        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
	        'options'       => ['class' => 'form-control'],
	        'buttonOptions' => ['class' => 'btn btn-default'],
	    ]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
