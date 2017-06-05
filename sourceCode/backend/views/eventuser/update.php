<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Eventuser */

$this->title = 'Update Eventuser: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Eventusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventuser-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
