<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\fileapi\Widget as FileAPI;

/* @var $this yii\web\View */
/* @var $model app\modules\tutorial\models\Tutorial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tutorial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'description_short')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?=
    $form->field($model, 'logo')->widget(
            FileAPI::className(), [
        'settings' => [
            'url' => ['/tutorial/default/fileapi-upload']
        ]
            ]
    )
    ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort_order')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

<?= $form->field($model, 'views')->textInput() ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? Yii::t('ru', 'Create') : Yii::t('ru', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
