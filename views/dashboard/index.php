<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="#">BotNet</a></li>
            <li class="active"><a href="/Dashboard">Dashboard</a></li>
        </ol>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="info-tile tile-success">
                        <div class="tile-icon"><i class="ti ti-pulse"></i></div>
                        <div class="tile-heading"><span>Active Slaves</span></div>
                        <div class="tile-body"><span>0</span></div>
                        <div class="tile-footer">Slaves currently connected.</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-tile tile-success">
                        <div class="tile-icon"><i class="ti ti-stats-up"></i></div>
                        <div class="tile-heading"><span>Slaves Current Session</span></div>
                        <div class="tile-body"><span>0</span></div>
                        <div class="tile-footer">Total slaves in current session.</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-tile tile-success">
                        <div class="tile-icon"><i class="ti ti-timer"></i></div>
                        <div class="tile-heading"><span>Commands Current Session</span></div>
                        <div class="tile-body"><span>0</span></div>
                        <div class="tile-footer">Amount of commands issued in session.</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info-tile tile-success">
                        <div class="tile-icon"><i class="ti ti-user"></i></div>
                        <div class="tile-heading"><span>Total Slaves</span></div>
                        <div class="tile-body"><span>0</span></div>
                        <div class="tile-footer">All slaves. Active and historical.</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Commands & Payloads</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Current Command</h4>
                                    <?php if($model->current_command['id'] == NULL): ?>
                                        <div id="command-info">
                                            <p>No command selected, currently idle!</p>
                                        </div>
                                    <?php else: ?>
                                        <div id="command-info">
                                            <h1 style="margin-top: 0; margin-bottom: 0;"><?=$model->current_command['name']?> <a href="#!" class="btn btn-danger pull-right" id="stop-command-btn">Stop</a><span class="pull-right small" style="font-size: 14px; margin-top: 16px; margin-right: 10px;">CURRENTLY RUNNING</span></h1>
                                            <p>
                                                <?=$model->current_command['description']?>
                                            </p>
                                            <h4><span class="text-success">3405 runs</span></h4>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <h4>Select Command</h4>
                                    <form action="" class="form-horizontal row-border">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <select class="form-control" placeholder="" id="command_selection">
                                                    <?php if($model->current_command['id'] == NULL): ?>
                                                        <option selected="selected" disabled="disabled">Select a command</option>
                                                    <?php endif; ?>
                                                    <?php foreach($model->commands as $command): ?>
                                                        <option <?php if($model->current_command['id'] == $command['id']){ echo "selected=\"selected\""; } ?> value="<?=$command['id']?>"><?=$command['name']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <a href="#!" class="btn-primary btn pull-right" id="change-command-btn">Do it!</a>
                                        <a href="/command/addcommand" style="margin-right: 10px;" class="btn-default btn pull-right" id="change-command-btn">Create New Command</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Newest Slaves</h2>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table browsers m-n">
                                <tbody>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <h2>Active Slaves</h2>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table browsers m-n">
                                <tbody>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                <tr>
                                    <td>google.cim</td>
                                    <td class="text-right">192.168.1.1</td>
                                    <td class="text-right">344</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

        $('#stop-command-btn').click(function(){
            stopCommand();
        });

        $('#change-command-btn').click(function(){
            changeCommand();
        });

        function stopCommand()
        {
            $.ajax({
                type: 'POST',
                url: '/command/stop',
                data: { },
                beforeSend:function(){

                },
                success:function(data){
                    //Remove selected option from command selection
                    document.getElementById('command_selection').selectedIndex = -1;
                    $('#command_selection').prepend('<option selected="selected" disabled="disabled">Select a command</option>');

                    $('#command-info').html("<p>No command selected</p>");
                },
                error:function(){
                    // failed request; give feedback to user
                    alert('Stop request failed!');
                }
            });
        }

        function changeCommand()
        {
            var newCommandId = $('#command_selection').val();

            $.ajax({
                type: 'POST',
                url: '/command/change',
                data: { command_id: newCommandId  },
                dataType: 'json',
                beforeSend:function(){

                },
                success:function(response){
                    //Remove selected option from command selection
                    $('#command-info').html('<h1 style="margin-top: 0; margin-bottom: 0;">' + response.name + '<a href="#!" class="btn btn-danger pull-right" id="stop-command-btn">Stop</a><span class="pull-right small" style="font-size: 14px; margin-top: 16px; margin-right: 10px;">CURRENTLY RUNNING</span></h1> <p>' + response.description + '</p> <h4><span class="text-success">3405 runs</span></h4>');
                    $('#stop-command-btn').click(function(){
                        stopCommand();
                    });
                },
                error:function(){
                    // failed request; give feedback to user
                    alert('Change request failed!');
                }
            });
        }
    });

</script>