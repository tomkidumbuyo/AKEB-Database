<!doctype html>
<html lang="en" dir="ltr">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>AKEB</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo base_url() ?>static/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="<?php echo base_url() ?>static/css/dashboard.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>static/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="<?php echo base_url() ?>static/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>static/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="<?php echo base_url() ?>static/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="<?php echo base_url() ?>static/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="<?php echo base_url() ?>static/plugins/input-mask/plugin.js"></script>
    </head>
    <body class="">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6"><h2>AKEB System</h2></div>
              <form class="card" action="" method="post">
                <div class="card-body p-6">
                  <div class="card-title"><?php echo lang('login_heading');?></div>
                  <div id="infoMessage"><?php echo $message;?></div>
                  <?php echo form_open("auth/login");?>
                  <div class="form-group">
                    <label class="form-label"><?php echo lang('login_identity_label', 'identity');?></label>
                    <?php echo form_input($identity);?> </div>
                  <div class="form-group">
                    <label class="form-label"><?php echo lang('login_password_label', 'password');?></label>
                    <?php echo form_input($password);?> </div>
                  <div class="form-group">
                    <label class="custom-control custom-checkbox"> <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"','class="custom-control-input"');?> <span class="custom-control-label"><?php echo lang('login_remember_label', 'remember');?></span> </label>
                  </div>
                  <div class="form-footer"><?php echo form_submit('submit', lang('login_submit_btn'),'class="btn btn-primary btn-block"');?></div>
                  <?php echo form_close();?> </div>
              </form>
              <div class="text-center text-muted"> Problems Login in? <a href="forgot_password"><?php echo lang('login_forgot_password');?></a> </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>