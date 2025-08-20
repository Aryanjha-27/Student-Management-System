<?php
// session_start();
$errors =$_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>
<!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h3 class="mb-0">Personal Details</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Personal Details</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-md-11">
                <div class="card">
    <div class="card-body register-card-body">
      <p class="register-box-msg">Add Personal Details</p>
      <?php if (!empty($errors)) : ?>
        <div style="color:red;">

          <ul>
            <?php
            foreach ($errors as $error) : ?>
              <li>
                <?php echo htmlspecialchars($error); ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form action="./function/personal_details.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Address" name="address" />
          <div class="input-group-text">
            <span class="bi bi-geo-alt"></span>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="tel" class="form-control" placeholder="Contact no." name="contact" />
          <div class="input-group-text">
            <span class="bi bi-phone"></span>
          </div>
        </div>
        <label for="Gender" class="form-check-label">Gender</label>&nbsp;&nbsp;
        <div class="form-check form-check-inline mb-3">
          <input type="radio" class="form-check-input" name="gender" value="Male" checked/>
          <label class="form-check-label" for="gender" >Male</label>
        </div>
         <div class="form-check form-check-inline mb-3">
          <input type="radio" class="form-check-input" name="gender" value="Female"/>
          <label class="form-check-label" for="gender">Female</label>
        </div>
        <div class="input-group mb-3">
          <input type="date" class="form-control" name="DOB" />
        </div>
          <div class="col-2">
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary btn-submit" id="btn-submit" >Add Details</button>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!--end::Row-->
      </form>
      <!-- <p class="mb-0">
        <a href="./login.php" class="text-center"> I already have a membership </a>
      </p> -->
    </div>
    <!-- /.register-card-body -->
  </div>
</div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->