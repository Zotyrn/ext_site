<?php

/**
 * Blogs list view.
 *
 * @var \yii\base\View $this View
 * @var \yii\data\ActiveDataProvider $dataProvider Data provider
 * @var \vova07\blogs\models\backend\BlogSearch $searchModel Search model
 * @var array $statusArray Statuses array
 */
use vova07\themes\admin\widgets\Box;
use vova07\themes\admin\widgets\GridView;
use yii\grid\CheckboxColumn;

$this->title = yii::t('ru', 'Video Users');
$this->params['subtitle'] = yii::t('ru', 'Video Users Panel');
$this->params['breadcrumbs'] = [
    $this->title
];
$gridId = 'blogs-grid';
$gridConfig = [
    'id' => $gridId,
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => CheckboxColumn::classname()
        ],
        'id',
        [
            'attribute' => 'video_id',
            'value' => 'videos.title'
        ],
        [
            'attribute' => 'user_id',
            'value' => 'users.username'
        ],
    ]
];
?>

<div class="row">
    <div class="col-xs-12">
        <?php
        Box::begin(
                [
                    'title' => $this->params['subtitle'],
                    'bodyOptions' => [
                        'class' => 'table-responsive'
                    ],
                    'grid' => $gridId
                ]
        );
        ?>
        <?= GridView::widget($gridConfig); ?>
<?php Box::end(); ?>
    </div>
</div>