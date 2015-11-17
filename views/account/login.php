<div class="container" id="login-form">
    <a href="/" class="login-logo"><h1>BotNet Factory</h1></a>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <form action="/Account/Login" class="form-horizontal" id="validate-form" method="post">
                <div class="panel-heading">
                    <h2>Login</h2>
                </div>
                    <div class="panel-body">
                        <div class="form-group mb-md">
                            <div class="col-xs-12">
                                <div class="input-group">							
										<span class="input-group-addon">
											<i class="ti ti-user"></i>
										</span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-md">
                            <div class="col-xs-12">
                                <div class="input-group">
										<span class="input-group-addon">
											<i class="ti ti-key"></i>
										</span>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="clearfix">
                            <input type="submit" class="btn btn-primary pull-right" value="Login" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>