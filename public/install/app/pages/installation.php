<div class="content">
    <div class="row"> 
        <div class="col-sm-12">
            <div id="message"></div>
        </div>
        
        <div class="col-sm-12">
            <form action="./app/controller/Setup_process.php" method="post" class="form-horizontal" id="setupForm">

                <input type="hidden" name="csrf_token" value="<?= (!empty($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : null) ?>">

                <h4>Application Information</h4>
                <!-- App Name -->
                <div class="form-group">
                    <label for="app_name"  class="col-sm-4 control-label">App Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="app_name" placeholder="App Name" name="app_name" value="<?= (isset($_POST['app_name']) ? $_POST['app_name'] : 'Laravel') ?>" readonly>
                    </div>
                </div>
                <!-- App URL -->
                <div class="form-group">
                    <label for="app_url"  class="col-sm-4 control-label">App URL</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="app_url" placeholder="App URL" name="app_url" value="<?= (isset($_POST['app_url']) ? $_POST['app_url'] : 'http://localhost') ?>">
                    </div>
                </div> 
                <!-- App Key -->
                <div class="form-group">
                    <label for="app_key"  class="col-sm-4 control-label">App Key</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="app_key" placeholder="App Key" name="app_key" value="<?= (isset($_POST['app_key']) ? $_POST['app_key'] : 'base64:LekM6n65QWp/PmDilWh0cCZSr1v8t4/MqDYzgTL94K8=') ?>">
                    </div>
                </div> 

                <h4>Database Information</h4>
                <!-- Database Connection -->
                <div class="form-group">
                    <label for="db_connection" class="col-sm-4">Database Connection</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="db_connection" name="db_connection">
                            <option value="mysql">MySql</option> 
                        </select>
                    </div>
                </div>

                <!-- Upload SQL File -->
                <div class="form-group">
                    <label for="upload" class="col-sm-4">Upload SQL File</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="upload">
                        <p class="green upload-message" id="upload-help-block">
                          <?php 
                            if(file_exists('./public/files/Load.sql')) {
                              echo "The database file is already exits!. you can replace it by uploading another database file.";
                            } else {
                              echo "The Upload SQL File field is required";
                            }
                          ?>
                        </p>                
                    </div>
                </div>

                <!-- Database Hostname -->
                <div class="form-group">
                    <label for="db_host"  class="col-sm-4 control-label">Database Hostname</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="db_host" placeholder="Database Hostname" name="db_host" value="<?= (isset($_POST['db_host']) ? $_POST['db_host'] : '127.0.0.1') ?>">
                    </div>
                </div>   

                <!-- Database Port -->
                <div class="form-group">
                    <label for="db_port"  class="col-sm-4 control-label">Database Port</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="db_port" placeholder="Database Port" name="db_port" value="<?= (isset($_POST['db_port']) ? $_POST['db_port'] : '3306') ?>">
                    </div>
                </div> 

                <!-- Database Name -->
                <div class="form-group">
                    <label for="db_name"  class="col-sm-4 control-label">Database Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="db_name" placeholder="Database Name" name="db_name" value="<?= (isset($_POST['db_name']) ? $_POST['db_name'] : '') ?>">
                    </div>
                </div>  
                
                <!-- Database Username -->
                <div class="form-group">
                    <label for="db_username"  class="col-sm-4 control-label">Database Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="db_username" placeholder="Database Username" name="db_username" value="<?= (isset($_POST['db_username']) ? $_POST['db_username'] : 'root') ?>">
                    </div>
                </div>  
                
                <!-- Database Password -->
                <div class="form-group">
                    <label for="db_password"  class="col-sm-4 control-label">Database Password</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="db_password" placeholder="Database Password" name="db_password" value="<?= (isset($_POST['db_password']) ? $_POST['db_password'] : '') ?>">
                    </div>
                </div>   

                <h4>Mail Information <input type="checkbox" id="isMailInfo" name="isMailInfo" value="1"></h4> 
                <div class="hide">
                <!-- Mail Driver -->
                <div class="form-group">
                    <label for="mail_driver"  class="col-sm-4 control-label">Mail Driver</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mail_driver" placeholder="Mail Driver" name="mail_driver" value="<?= (isset($_POST['mail_driver']) ? $_POST['mail_driver'] : 'smtp') ?>">
                    </div>
                </div> 

                <!-- Mail Host -->
                <div class="form-group">
                    <label for="mail_host"  class="col-sm-4 control-label">Mail Host</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mail_host" placeholder="Mail Host" name="mail_host" value="<?= (isset($_POST['mail_host']) ? $_POST['mail_host'] : 'mailtrap.io') ?>">
                    </div>
                </div>  

                <!-- Mail Port -->
                <div class="form-group">
                    <label for="mail_port"  class="col-sm-4 control-label">Mail Port</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mail_port" placeholder="Mail Port" name="mail_port" value="<?= (isset($_POST['mail_port']) ? $_POST['mail_port'] : '2525') ?>">
                    </div>
                </div>   
 
                <!-- Mail Username -->
                <div class="form-group">
                    <label for="mail_username"  class="col-sm-4 control-label">Mail Username</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mail_username" placeholder="Mail Username" name="mail_username" value="<?= (isset($_POST['mail_username']) ? $_POST['mail_username'] : '') ?>">
                    </div>
                </div>   
 
                <!-- Mail Password -->
                <div class="form-group">
                    <label for="mail_password"  class="col-sm-4 control-label">Mail Password</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="mail_password" placeholder="Mail Password" name="mail_password" value="<?= (isset($_POST['mail_password']) ? $_POST['mail_password'] : '') ?>">
                    </div>
                </div>   
                </div> <!-- ENDS OF #mailInfo --> 

                <div class="btn-group pull-right">
                    <a href="?step=requirements" class="cbtn left-right"> <i class="fa fa-backward"></i> Previous</a>
                    <button type="reset" class="cbtn"><i class="fa fa-refresh"></i> Reset</button>
                    <button type="submit" class="cbtn"><i class="fa fa-download"></i> Install</button>
                </div>

            </form> 
        </div>
    </div>
</div>
