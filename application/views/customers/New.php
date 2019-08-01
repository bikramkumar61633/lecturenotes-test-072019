<div class="main-grid">
    <div class="agile-grids">	
        <div class="banner">
            <h2>
                <a href="index.html"><?= $module ?></a>
                <i class="fa fa-angle-right"></i>
                <span><?= $page ?></span>
            </h2>
        </div>
        <div class="blank">
            <div class="blank-page">
                <div class="pull-right">
                <a href="<?= site_url('customer') ?>" class="btn btn-primary">Back To List</a><br>
                </div>
                <form action="<?= site_url('customer/save') ?>" method="post" id="ajax-form" class="ajax_post_form">
                    <input type="hidden" name="id" id="id" value="<?= $customer_data['id'] ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Full Name (<span class="text-danger">*</span>)</label>
                                <input type="text" name="fullname" id="fullname" required="" class="form-control" value="<?= $customer_data['fullname'] ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email Id (<span class="text-danger">*</span>)</label>
                                <input type="text" name="emailid" id="emailid" required class="form-control" value="<?= $customer_data['emailid'] ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Phone (<span class="text-danger">*</span>)</label>
                                <input type="text" name="phone" id="phone" required class="form-control" value="<?= $customer_data['phone'] ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Address (<span class="text-danger">*</span>)</label>
                                <textarea type="text" name="address" id="address" required class="form-control"><?= $customer_data['address'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Payment Status (<span class="text-danger">*</span>)</label>
                                <select name="status" id="status" class="form-control">
                                    <option <?php if ($customer_data['status'] == 'Not Paid') {
                                                echo "selected";
                                            } ?> selected value="Not Paid">Not Paid</option>
                                    <option <?php if ($customer_data['status'] == 'Paid') {
                                                echo "selected";
                                            } ?> value="Paid">Paid</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <br>
                <div class="alert alert-success" role="alert" id="alert-message" style="display:none">
                    
                </div>
            </div>
        </div>
        <!-- //blank-page -->
    </div>
</div>