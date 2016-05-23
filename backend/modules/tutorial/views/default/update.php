<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\tutorial\models\Tutorial */

$this->title = Yii::t('ru', 'Update {modelClass}: ', [
    'modelClass' => 'Tutorial',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('ru', 'Tutorials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('ru', 'Update');
?>
<div class="tutorial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
