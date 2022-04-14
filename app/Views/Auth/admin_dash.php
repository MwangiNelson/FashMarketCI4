<div class="container py-0">
    <div class="row" style="width: 100%;">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                    <h5 class="my-3 " id="AdminName"><?php echo   $_SESSION['name']; ?></h5>
                    <div class="d-flex justify-content-center mb-2">
                        <button type="button" class="btn btn-primary ad_log" style="width: 50%; margin:2px;"> <a href="authenticate/logout">Log Out</a> </button>
                        <button type="button" class="btn btn-danger ad_log" style="width: 50%; margin:2px;"> <a href="ad_register">Add Admin</a> </button>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8">
            <div class="card mb-5">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Full Name</p>
                        </div>
                        <div class="col-sm-9" style="display: flex; flex-wrap:nowrap; " id="full_name">
                            <p class='text-muted mb-0' style='width:80%;'></p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9" style="display: flex; flex-wrap:nowrap;" id="admin_email">
                            <p class="text-muted mb-0" style="width:80%;" id="email"></p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Status</p>
                        </div>
                        <div class="col-sm-9" style="display: flex; flex-wrap:nowrap;">
                            <p class="text-muted mb-0" style="width:80%;">Administrator</p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Phone Number:</p>
                        </div>
                        <div class="col-sm-9" style="display: flex; flex-wrap:nowrap;">
                            <p class="text-muted mb-0" style="width:80%;">(+254) - 714 165105</p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Instagram :</p>
                        </div>
                        <div class="col-sm-9" style="display: flex; flex-wrap:nowrap;">
                            <p class="text-muted mb-0" style="width:80%;">theradbrad.__</p>

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>

    <div class="revenue">

        <div class="rev_table">
            <div class="tableHolder">
                <table>
                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Orders</th>
                            <th>Purchases</th>
                            <th>Income</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>January</td>
                            <td>200</td>
                            <td>300</td>
                            <td>$50,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>