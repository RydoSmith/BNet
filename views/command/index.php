<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="/Dashboard">BotNet</a></li>
            <li class="active"><a href="#">Commands</a></li>
        </ol>
        <!-- Messages -->
        <?php if(isset($model->message)): ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12">
                        <?= $model->message; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <h1 class="mt0">Commands <a href="/command/addcommand" class="btn btn-default pull-right btn-lg">Add Command</a></h1>
            <div data-widget-group="group1" class="ui-sortable">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                            <div class="panel-heading">
                                <h2>Command List</h2>
                                <div class="panel-ctrls"></div>
                            </div>
                            <div class="panel-body no-padding" style="min-height: 500px">
                                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" style="display: none;">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th style="width: 133px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($model->commands as $command): ?>
                                        <tr>
                                            <td><?= $command['name']; ?></td>
                                            <td><?= $command['description'] ?></td>
                                            <td>
                                                <form action="/command/deletecommand" method="post">
                                                    <input type="hidden" name="id" value="<?=$command['id']?>" />
                                                    <input type="submit" class="btn btn-danger pull-right" value="delete">
                                                </form>
                                                <a href="/command/editcommand/<?=$command['id']?>" class="btn btn-default pull-right" style="margin-right: 10px;">Edit</a>
                                                <div class="clearfix"></div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <div id="loader" style="width: 100%; text-align:center;">
                                    <img src="/public/img/loading.gif" alt="" style="display: inline-block; width: 50px; margin: 0 auto; margin-top: 200px;" >
                                </div>
                            </div>
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // -------------------------------
    // Initialize Data Tables
    // -------------------------------
    $('#example').dataTable({
//        "data": <?//= json_encode($model->users) ?>//,
        "language": {
            "lengthMenu": "_MENU_",
            "order": [[ 0, "desc" ]]
        }
    });
    $('.dataTables_filter input').attr('placeholder','Search...');


    //DOM Manipulation to move datatable elements integrate to panel
    $('.panel-ctrls').append($('.dataTables_filter').addClass("pull-right")).find("label").addClass("panel-ctrls-center");
    $('.panel-ctrls').append("<i class='separator'></i>");
    $('.panel-ctrls').append($('.dataTables_length').addClass("pull-left")).find("label").addClass("panel-ctrls-center");

    $('.panel-footer').append($(".dataTable+.row"));
    $('.dataTables_paginate>ul.pagination').addClass("pull-right m-n");

    $(document).ready(function() {
        $('#loader').hide();
        $('#example').show();


//        $('.add-note-btn').click(function(){
//
//            //Get customer id
//            var customerId = $(this).attr('data-customer-id');
//
//            //Get input and clear field
//            var note = $('.add-note-input[data-customer-id="' + customerId + '"]').val();
//            $('.add-note-input[data-customer-id="' + customerId + '"]').val('');
//
//            //Add note
//            $('.note-modal-body[data-customer-id="' + customerId + '"]').append('<div class="alert alert-info" style="margin: 0 0 10px 0 !important; padding: 10px 15px !important;"><i class="ti ti-info-alt"></i>&nbsp; Note created by <strong></strong> on <strong></strong> at <strong></strong><br>' + note + '</div>');
//        });
    });

</script>