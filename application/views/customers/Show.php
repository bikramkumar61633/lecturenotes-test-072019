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
                <a href="<?= site_url('customer') ?>" class="btn btn-primary">Back To List</a> 
                <a href="<?= site_url('customer/new') ?>" class="btn btn-primary">New Customer</a><br>
                <br>

                </div>
                <div class="row">
                    <div class="col-md-2">
                        Full name : 
                    </div>
                    <div class="col-md-6">
                        <?= $customer_data['fullname'] ?>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-2">
                        Email ID : 
                    </div>
                    <div class="col-md-6">
                        <?= $customer_data['emailid'] ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        Phone : 
                    </div>
                    <div class="col-md-6">
                        <?= $customer_data['phone'] ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">
                        Address : 
                    </div>
                    <div class="col-md-6">
                        <?= $customer_data['address'] ?>
                    </div>
                </div>
                <hr>
                <div class="pull-right list-view">
                    <button  class="btn btn-success" id="new-activity">New Activity</button><br>
                </div>
                <h4>Activities</h4>
                <br>
                <form action="<?= site_url("customer/saveActivity") ?>" method="post" style="display:none;" class="new-view ajax_post_form12">
                    <input type="hidden" name="customer_id" id="customer_id" value="<?= $customer_data['id'] ?>">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Type (<span class="text-danger">*</span>)</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="Call">Call</option>
                                    <option value="Email">Email</option>
                                    <option value="Visit">Visit</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Description (<span class="text-danger">*</span>)</label>
                                <input type="text" name="description" id="description" required="" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Next activity date/time </label>
                                <input type="datetime-local" name="next_time" id="next_time" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Next Activity Description (<span class="text-danger">*</span>)</label>
                                <input type="text" name="next_act_description" id="next_act_description" required="" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <br><br>
                                <button type="submit" id="create-activity" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                <button type="button" id="create-activity-cancel" class="btn btn-danger"><i class="fa fa-save"></i> Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
                <table id="table" class="table list-view" data-source="<?= site_url('customer/ajaxGetActivities/' . $customer_data['id']) ?>">
                    <thead>
                        <th>Sr</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Description</th>
                        <th>Next Activity</th>
                        <!-- <th>Action</th> -->
                    </thead>
                    <tbody id="activity-data">
                        <?php
                        if (!empty($customer_activity)) {
                            $sr = 0;
                            foreach ($customer_activity as $idata) {
                                $sr++;
                                ?>
                                <tr>
                                    <td><?= $sr ?></td>
                                    <td><?= $idata['type'] ?></td>
                                    <td><?= date('d/m/Y h:i A', strtotime($idata['created_on'])) ?></td>
                                    <td><?= $idata['description'] ?></td>
                                    <td><?= $idata['next_act_description'] ?><br><small>Next Activity: 
                                        <?php if ($idata['next_time'] != '0000-00-00 00:00:00') {
                                            echo date('d/m/Y h:i A', strtotime($idata['next_time']));
                                        } ?></small></td>
                                    <td></td>
                                </tr> 
                                <?php 
                            }
                        } else {
                            ?><tr><td colspan="6" class="text-center">No records found</td></tr>
                            <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- //blank-page -->
    </div>
</div>