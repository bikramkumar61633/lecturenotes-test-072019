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
                <a href="<?= site_url('customer/new') ?>" class="btn btn-primary">New Record</a><br>
                </div>
                <div class="row">
                    <div class="col-md-12">
                    <div class="alert alert-success" role="alert" id="alert-message" style="display:none">
                    </div>
                    <table id="" class="table" data-source="" data-module="customer">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Customer</th>
                                <th>Address</th>
                                <th>Log date</th>
                                <th>Description</th>
                                <th>Activity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($todays)) {
                                $sr = 0;
                                foreach ($todays as $idata) {
                                    $sr++;
                                    ?>
                                    <tr>
                                        <td><?= $sr ?></td>
                                        <td><?= $idata['fullname'] ?>,<br><?= $idata['emailid'] ?>, <?= $idata['phone'] ?></td>
                                        <td><?= $idata['address'] ?></td>
                                        <td><?= date('d/m/Y h:i A', strtotime($idata['created_on'])) ?></td>
                                        <td><?= $idata['description'] ?></td>
                                        <td><?= $idata['next_act_description'] ?><br><small>Next Activity: 
                                        <?php if ($idata['next_time'] != '0000-00-00 00:00:00') {
                                            echo date('d/m/Y h:i A', strtotime($idata['next_time']));
                                        } ?></small></td>
                                    </tr>
                                    <?php

                                }
                            } else {

                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- //blank-page -->
    </div>
</div>
