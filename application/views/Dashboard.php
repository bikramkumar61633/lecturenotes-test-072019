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
                    <table id="table" data-source="<?= site_url('customer/ajaxGetCustomerList') ?>" data-module="customer">
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

                            } else {

                            }
                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <nav>
                                <ul class="pagination pagination-lg" id="paging"  data-source="<?= site_url('customer/ajaxGetCustomerListPaging') ?>">
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //blank-page -->
    </div>
</div>
