<?php
// session_start();
$errors = $_SESSION['errors'] ?? [];
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
                    <h3 class="mb-0">Academic Details</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Academic Details</li>
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
                            <p class="register-box-msg">Add Academic Details</p>
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

                            <form action="./function/academic_details.php" method="post">
                                <div class="input-group mb-3">
                                    <label for="level" class="input-group-text">Educational level</label>
                                    <select id="level" name="level" class="form-select">
                                        <option value="choose" selected>Choose</option>
                                        <option value="see">SEE</option>
                                        <option value="+2">+2</option>
                                        <option value="bachelor">Bachelor</option>
                                    </select>
                                    <div class="input-group-text">
                                        <span class="bi bi-list-ol"></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Institution Name" name="institution" />
                                    <div class="input-group-text">
                                        <span class="bi bi-mortarboard"></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="faculty" class="input-group-text">Faculty</label>
                                    <select id="faculty" name="faculty" class="form-select">
                                        <option value="choose" selected>Choose</option>
                                        <option value="management">Management</option>
                                        <option value="science">Science</option>
                                        <option value="bca">BCA</option>
                                        <option value="bba">BBA</option>
                                        <option value="bit">BIT</option>
                                    </select>
                                    <div class="input-group-text">
                                        <span class="bi bi-mortarboard"></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="board" class="input-group-text">Board</label>
                                    <select id="board" name="board" class="form-select">
                                        <option value="choose" selected>Choose</option>
                                        <option value="neb">NEB</option>
                                        <option value="tu">TU</option>
                                        <option value="pu">PU</option>
                                        <option value="ku">KU</option>
                                        <option value="fboard">Foreign Board</option>
                                    </select>
                                    <div class="input-group-text">
                                        <span class="bi bi-mortarboard"></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="number" step="0.01" class="form-control" placeholder="GPA" name="gpa" />
                                    <div class="input-group-text">
                                        <span class="bi bi-percent"></span>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <label for="completion" class="input-group-text">Completion Year</label>
                                    <input type="month" class="form-control" name="completion" />
                                </div>
                                <div class="col-2">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary btn-submit" id="btn-submit">Add Details</button>
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