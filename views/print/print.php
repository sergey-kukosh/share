
<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Monitors */
$this->title = $staff->fio;
?>
<div class="monitors-view">

    <div class="col-lg-8">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b><i class="">Карточка сотрудника</i></b>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <table class="table">
                        <tr>
                            <th></th>
                            <th>Название</th>
                            <th>Дата поступления</th>
                            <th>Инв №</th>
                        </tr>

                        <tr>
                            <td>Отделение</td>
                            <td><?= $department->department?></td>
                        </tr>
                        <tr>
                            <td>ФИО</td>
                            <td><?= $staff->fio ?></td>
                        </tr>
                        <?php if( is_object($monitors)): // проверяем является ли переменная объектом, если нет значит этой конфигурации нет?>
                            <tr>
                                <td>Монитор</td>
                                <td><?=$monitors->monitor_1 ?></td>
                                <td><?=$monitors->date_1 ?></td>
                                <td><?=$monitors->invent_num_monitor_1 ?></td>
                            </tr>

                            <?php if( $monitors->monitor_2): // проверяем есть ли втророй монитор, если есть выводим?>
                                <tr>
                                    <td>Монитор 2</td>
                                    <td><?=$monitors->monitor_2 ?></td>
                                    <td><?=$monitors->date_2 ?></td>
                                    <td><?=$monitors->invent_num_monitor_2 ?></td>
                                </tr>
                            <?php endif?>
                        <?php endif?>


                        <?php if(is_object($brief_conf)) :?>
                            <tr>
                                <td>Конфигурация</td>
                                <td><?= $brief_conf->title ?></td>
                                <td><?=$configuration->date ?></td>
                                <td><?=$configuration->invent_num_system ?></td>
                            </tr>
                        <?php endif?>

                        <?php if(is_object($printers)) {
                            for ($i = 1; $i <= 5; $i++) { //для того чтоб не выводить пустые строки принтеров запустим цикл
                                if (!empty($printers['print_' . $i])) {//проверим не пустой ли ключ массива если нет, выводим
                                    echo '<tr><td>Принтер ' . $i . '</td>'; //выводим заголовок
                                    echo '<td>' . $printers['print_' . $i] . '</td>'; //название принтера
                                    echo '<td>' . $printers['date_' . $i] . '</td>'; //дата поступления
                                    echo '<td>' . $printers['invent_num_printer_' . $i] . '</td></tr>'; //инвентарный номер
                                }
                            }
                        }?>


                    </table>


                </div>
                <!-- /.list-group -->
                <p>
                    <?= Html::a('Посмотреть полную конфигурацию', ['view_all_configuration', 'id' => $staff->id_staff], ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Печать карточки сотрудника', ['/print/card', 'id' => $staff->id_staff], [
                        'class' => 'btn btn-primary',
                        'target'=>'_blank',
                    ]) ?>
                </p>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>



    <div class="col-lg-4">
        <div class="panel panel-info ">
            <div class="panel-heading">
                <b> <i class=" ">  QR code конфигурации</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <img src="../../web/img/qr-code.gif" alt="" width="200" height="200" align="center" >
                </div>
                <!-- /.list-group -->

                <a href="#" class="btn btn-primary btn-block">Печать QR code</a>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>


</div>