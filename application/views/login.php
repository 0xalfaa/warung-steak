<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url('assets')?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
                <span class="m-2"><?php echo $this->session->flashdata('pesan')?></span>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url()?>auth/login">
                  <div class="form-group">
                    <label for="U">Username</label>
                    <input id="USERNAME" type="text" class="form-control" name="USERNAME" tabindex="1" autofocus>
                    <?php echo form_error('USERNAME','<div class="text-danger text-small">','</div>')?>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="PASSWORD" class="control-label">Password</label>
                    </div>
                    <input id="PASSWORD" type="password" class="form-control" name="PASSWORD" tabindex="2" >
                    <?php echo form_error('PASSWORD','<div class="text-danger text-small">','</div>')?>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>