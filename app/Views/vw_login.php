<?= $this->extend('layout/admin/layoutlogin') ?>

<?= $this->section('contentlogin') ?>
 
<div class="container position-sticky z-index-sticky top-0">
    
  </div>
  <main class="main-content  mt-0">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="card-header pb-0 text-start">
                  <h4 class="font-weight-bolder">Sign In</h4>
                  <p class="mb-0">Enter your username and password to sign in</p>
                </div>
                <div class="card-body">
                  <form method="post" action="<?= base_url(); ?>/login/process" role="form">
                  <?= csrf_field(); ?>
                    <div class="mb-3">
                      <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Username" aria-label="Email" required autofocus>
                    </div>
                    <div class="mb-3">
                      <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="<?= base_url('register') ?>" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div style="z-index: -10" class="col-10 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                <img src="<?= base_url('img/pkm1.png') ?>" class="col-13 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


 
 
 
  <?= $this->endSection() ?>