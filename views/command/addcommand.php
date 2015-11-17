<div class="static-content">
    <div class="page-content">
        <ol class="breadcrumb">
            <li><a href="/Dashboard">Dashboard</a></li>
            <li class="active"><a href="/command">Commands</a></li>
            <li><a href="#">Add Command</a></li>
        </ol>
        <div class="container-fluid">
            <h1 class="mt0">Add Command</h1>
            <div data-widget-group="group1" class="ui-sortable">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-bluegray" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="" style="visibility: visible; opacity: 1; display: block; transform: translateY(0px);">
                            <form class="form-horizontal" action="/command/addcommand" method="post">
                            <div class="panel-heading">
                                <h2>Add a new command</h2>
                            </div>
                            <div class="panel-body">
                                <div class="tab-content">

                                    <div class="form-group mb-n <?= $this->htmlHelper->FieldHasError($model, 'name'); ?>">
                                        <label for="largeinput" class="col-sm-3 control-label label-input-lg">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control input-lg" name="name" placeholder="enter the command name" <?php $this->htmlHelper->DisplayValueFor($model, 'name'); ?>>
                                        </div>
                                        <div class="col-sm-3">
                                            <?php $this->htmlHelper->DisplayErrorFor($model, 'name'); ?>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-3 control-label label-input-lg ">Code</label>
                                        <div class="col-sm-6">
                                            <textarea id="code" cols="50" rows="10" class="form-control" placeholder="add the payload here" name="code"><?php $this->htmlHelper->DisplayTextareaValueFor($model, 'code'); ?></textarea>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-group mb-n">
                                        <label for="largeinput" class="col-sm-3 control-label label-input-lg ">Description</label>
                                        <div class="col-sm-6">
                                            <textarea id="description" cols="50" rows="4" class="form-control" placeholder="add a short description" name="description"><?php $this->htmlHelper->DisplayTextareaValueFor($model, 'description'); ?></textarea>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-3">
                                        <input type="submit" class="btn-primary btn" value="Save new command">
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>