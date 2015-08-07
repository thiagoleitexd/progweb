<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Sobre';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Esta pagina referente-se à prática de Programação WEB.
    </p>

    <?php echo $datadehoje; ?>

    <code><?= __FILE__ ?></code>
</div>
