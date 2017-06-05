<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Eventuser */

$this->title = 'Create Eventuser';
$this->params['breadcrumbs'][] = ['label' => 'Eventusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventuser-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
