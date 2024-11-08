<?php require_once ('../config.php'); ?>

<!DOCTYPE html>

<html lang="en" class="" style="height: auto;"> <?php require_once ('inc/header.php') ?>

<body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar- fixed sidebar-mini-md sidebar-mini-xs"
    data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">

        <?php require_once ('inc/topBarNav.php') ?>

        <?php require_once ('inc/navigation.php') ?>

        <?php if ($_settings->chk_flashdata('success')): ?>

            <script>

                alert_toast("<?php echo $_settings->flashdata('success')
                    ?>", 'success')

            </script>

        <?php endif; ?>

        <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home'; ?> <!-- Content Wrapper. Contains page content -->


        <div class="content-wrapper pt-3" style="min-height: 567.854px;">



            <!-- Main content -->

            <section class="content ">

                <div class="container-fluid">

                    <?php

                    if (!file_exists($page . ".php") && !is_dir($page)) {
                        include '404.html';

                    } else {

                        if (is_dir($page))

                            include $page . '/index.php';
                        else
                            include $page . '.php';



                    }

                    ?>

                </div>

            </section>

            <!-- /.content -->

            <div class="modal fade" id="confirm_modal" role='dialog'>

                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title">Confirmation</h5>
                        </div>

                        <div class="modal-body">

                            <div id="delete_content"></div>

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="uni_modal" role='dialog'>

                <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                    <div class="modal-content">

                        <div class="modal-header">

                            <h5 class="modal-title"></h5>

                        </div>

                        <div class="modal-body">

                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-primary" id='submit'
                                onclick="$('#uni_modal form').submit()">Save</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="uni_modal_right" role='dialog'>

                <div class="modal-dialog modal-full-height modal-md" role="document">
                    <div class="modal-content">


                        <div class="modal-header">

                            <h5 class="modal-title"></h5>

                            <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                                <span class="fa fa-arrow-right"></span>

                            </button>

                        </div>

                        <div class="modal-body">

                        </div>

                    </div>

                </div>

            </div>

            <div class="modal fade" id="viewer_modal" role='dialog'>
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">

                        <button type="button" class="btn-close" data- dismiss="modal"><span
                                class="fa fa-times"></span></button>
                        <img src="" alt="">

                    </div>

                </div>

            </div>

        </div>

        <!-- /.content-wrapper -->

        <?php require_once ('inc/footer.php') ?>

</body>

</html>

<script>

    $(document).ready(function () {

        $('.delete_data').click(function () {


            conf("Are you sure to delete this User permanently?", "delete_user", [$(this).attr('data- id')])
        })

        $('.table td,.table th').addClass('py-1 px-2 align-middle')

        $('.table').dataTable();

        $('.verify_user').click(function () {

            _conf("Are you sure to verify
                < b > "+$(this).attr('data-name')+" < b />? ","verify_user",[$(this).attr('data-i d')])
})

    })

    function delete_user($id) {
        start_loader();
        $.ajax({

            url: _base_url_ + "classes/Users.php?f=delete", method: "POST",
            data: { id: $id }, dataType: "json", error: err => {
                console.log(err)

                alert_toast("An error occured.", 'error'); end_loader();
            },

            success: function (resp) {

                <?php

                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}'");
                    foreach ($user->fetch_array() as $k => $v) {
                        $meta[$k] = $v;

                    }

                }

                ?>
                <?php if ($_settings->chk_flashdata('success')): ?> < script > alert_toast("<?php echo $_settings->flashdata('success')
                       ?>", 'success')

    </script>

<?php endif; ?>

<div class="card card-outline card-primary">

    <?php

    if (isset($_GET['id']) && $_GET['id'] > 0) {

        $user = $conn->query("SELECT * FROM users where id ='{$_GET['id']}'");
        foreach ($user->fetch_array() as $k => $v) {
            $meta[$k] = $v;

        }

    }

    ?>
    <?php if ($_settings->chk_flashdata('success')): ?>
        <script> alert_toast("<?php echo $_settings->flashdata('success')
            ?>", 'success')

        </script>

    <?php endif; ?>

    <div class="card card-outline card-primary">


        <?php if (isset($_GET['id'])): ?>

            <small class="text-info"><i>Leave this blank if you dont want to change the password.</i></small>
        <?php endif; ?>

    </div>

    <div class="card-footer">

        <div class="col-md-12">

            <div class="row">

                <button class="btn btn-sm btn-primary mr-2" form="manage-user">Save</button>
                <a class="btn btn-sm btn-secondary" href="./?page=user/list">Cancel</a>
            </div>

        </div>

    </div>

</div>

<style>
    img#cimg {

        height: 15vh;
        width: 15vh;
        object-fit: cover;
        border-radius: 100% 100%;

    }
</style>

<script>

        $(function () {

            $('.select2').select2({

                width: 'resolve'

            })

        })

        function displayImg(input, _this) {

            if (input.files && input.files[0]) {
                var reader = new FileReader(); reader.onload = function (e) {
                    $('#cimg').attr('src', e.target.result);

                }



                reader.readAsDataURL(input.files[0]);

            }

        }

        $('#manage-user').submit(function (e) {
            e.preventDefault();
            var _this = $(this) start_loader()
            $.ajax({

                url: _base_url_ + 'classes/Users.php?f=save', data: new FormData($(this)[0]),
                cache: false,

                contentType: false, processData: false, method: 'POST', type: 'POST',
                success: function (resp) {

                    if (resp == 1) {

                        location.href = './?page=user/list';
                    } else {

                        $('#msg').html('<div class="alert alert- danger">Username already exist</div>')
                        $("html, body").animate({ scrollTop: 0 },
                            "fast");

                    }

                    end_loader()

                }

            })

        })



</script>

#package-details{ display:none
}

</style>

<div class="py-3">

    <div class="card card-outline card-navy rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title">Enrollment Form</h5>
            <div class="card-tools"> </div>
        </div>

        <div class="card-body rounded-0">

            <div class="container-fluid">

                <form action="" id="enrollment-form">

                    <input type="hidden" name="id">

                    <fieldset>

                        <legend class="text-navy">Enrollee
                            Information</legend>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="firstname" class="control-label">First Name</label>

                                    <input type="text" name="firstname" id="firstname" autofocus class="form-control form-control-border border-
navy" required>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="middlename" class="control-label">Middle Name <small><span class="texr-
muted">(optional)</span></small></label>
                                    <input type="text" name="middlename" id="middlename"
                                        class="form-control form-control-border border-navy" placeholder="optional">
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="lastname" class="control-label">Last Name</label>

                                    <input type="text" name="lastname" id="lastname"
                                        class="form-control form-control-border border-navy" required>
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-4">

                                <div class="form-group">

                                    <label for="gender" class="control-label">Gender</label>

                                    <select name="gender" id="gender"
                                        class="form-control form-control-border border-navy" required>

                                        if(isset($status)): switch($status){
                                        case '1':

                                        echo "<span class='badge badge-success badge-
pill'>Active</span>";
                                        break; case '0':
                                        echo "<span class='badge badge-secondary badge-
pill'>Inactive</span>";
                                        break;

                                        }

                                        endif;

                                        ?>

                                        </dd>

                                        </dl>

                                        <div class="col-12 text-right">

                                            <button class="btn btn-flat btn-sm btn-dark" type="button" data-
                                                dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                        </div>

                                </div>