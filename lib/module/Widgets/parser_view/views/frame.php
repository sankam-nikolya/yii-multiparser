<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\multiparser\widgets\ParserViewAsset;

ParserViewAsset::register($this);
$title = '';
if ( !empty( $params['title'] ) ) {
    $title = $params['title'];
}
$action_save = '';
if ( !empty( $params['action_save'] ) ) {
    $action_save = $params['action_save'];
}
$action_read = '';
if ( !empty( $params['action_read'] ) ) {
    $action_read = $params['action_read'];
}
echo Html::tag( 'h3', $title );
?>

<div class="row">

        <?php
        $show_arr = [10, 100, 'все'];
        $model = false;
        if ( !empty( $params['model'] ) ) {
            $model = $params['model'];
        }

        $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'read-form', 'data-save_action' => Url::to( $action_save ), 'class' => 'form-inline'],'action'=>$action_read]);

        $this->beginBlock('model_data');
        if ( $model ) {
            echo $form->field($model, 'file',['options' =>['class' => 'col-md-4']])->fileInput()->label( false );
            echo $form->field($model, 'read_line_end',['options' =>['class' => 'col-md-2']])->dropDownList(array_combine( $show_arr, $show_arr ) );

        }
        $this->endBlock();

        echo $this->blocks['model_data'];


        echo Html::tag('div', Html::submitButton('Прочитать', ['class' => 'btn btn-primary']),['class' => 'form-group col-md-2']);

        ActiveForm::end();
        ?>

</div>

<?php
echo  Html::tag('div','',['id' => 'data-container', 'class' => 'row text-center']);
echo  Html::tag('div','',['id' => 'message-container', 'class' => 'row text-center']);
