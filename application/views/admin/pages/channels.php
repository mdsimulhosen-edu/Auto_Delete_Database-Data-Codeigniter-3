<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Channels</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                        <li class="breadcrumb-item active">Channels</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-header">
            <a href="<?php echo base_url('viewAddChannel') ?>" class="btn btn-primary px-3 float-end me-5">Add Channel</a>
        </div>
        <div class="card-body">
            <div class="datatable-example my-4 px-2" style="width:100%;overflow-x:auto;">
                <table id="example" class="table display nowrap mt-3 text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">Serial</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Channel Name</th>
                            <th class="text-center">Logo</th>
                            <th class="text-center">Channel Link</th>
                            <!-- <th class="text-center">Show On Slider</th> -->
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serial = 0;
                        foreach ($channels as $channel) {
                            $serial++;
                        ?>
                            <tr>
                                <td><?php echo $serial ?></td>
                                <td><?php echo $channel->channel_category ?></td>
                                <td><?php echo $channel->channel_name ?></td>
                                <td><img src="<?php echo base_url($channel->channel_logo) ?>" class="img-fluid" alt="" style="height: 80px; width:100px"></td>
                                <td><?php echo $channel->channel_link ?></td>
                                <!-- <td><?php
                                    if ($channel->show_slider == 1) { ?>
                                        <p class='bg-success rounded-circle ms-5' style="height:15px; width:15px;" data-bs-toggle='tooltip' title="Show on Slider"></p>
                                    <?php } else { ?>
                                        <p class='bg-danger rounded-circle ms-5' style="height:15px; width:15px;" data-bs-toggle='tooltip' title="Hidden"></p>
                                    <?php } ?>
                                </td> -->
                                <td>
                                    <a href="<?php echo base_url('editChannel/') . $channel->channel_id ?>" class="me-3"><i class="fa-solid fa-pen-to-square fs-4 text-success fs-4"></i></a>
                                    <a href="<?php echo base_url('admin/delete_channel/' . $channel->channel_id)  ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash-can fs-4 text-danger"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>