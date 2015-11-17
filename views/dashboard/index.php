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
                                        <p>No command selected, currently idle!</p>
                                    <?php else: ?>
                                        <h1 style="margin-top: 0; margin-bottom: 0;"><?=$model->current_command['name']?> <a href="!#" class="btn btn-danger pull-right">Stop</a></h1>
                                        <p>
                                            <?=$model->current_command['description']?>
                                        </p>
                                        <h4><span class="text-success">3405 runs</span></h4>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <h4>Select Command</h4>
                                    <form action="" class="form-horizontal row-border">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <select class="form-control" placeholder="">
                                                    <?php foreach($model->commands as $command): ?>
                                                        <?php if($model->current_command['id'] == NULL): ?>
                                                            <option selected="selected" disabled="disabled">Select a command</option>
                                                        <?php endif; ?>
                                                        <option <?php if($model->current_command['id'] == $command['id']){ echo "selected=\"selected\""; } ?>><?=$command['name']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn-primary btn pull-right">Do it!</button>
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