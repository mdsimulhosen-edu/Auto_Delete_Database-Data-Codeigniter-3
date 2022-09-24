<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Channel</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                        <li class="breadcrumb-item active">Edit Channel</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo base_url('channels') ?>" class="btn btn-dark px-3">
                        << Back To Channel List</a>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('admin/update_channel/' . $channels->channel_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="channelId" value="<?php echo $channels->channel_id ?>">
                            <div class="mb-3">
                                <label for="matchType">CHANNEL CATEGORY</label>
                                <select class="form-select" name="channelCategory" id="channelCategory">
                                    <?php
                                    foreach ($channel_category as $category) { ?>
                                        <option value="<?= $category->channel_category; ?>" <?= isset($channel_category) ? (($category->channel_category == $channels->channel_category) ? "selected" : "") : "" ?>><?= $category->channel_category; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="channelName">CHANNEL NAME</label>
                                <input id="channelName" name="channelName" value="<?php echo $channels->channel_name ?>" type="text" class="form-control" placeholder="Channel Name">
                            </div>
                            <div class="mb-3">
                                <label for="channel_logo">IMAGE</label>
                                <input id="channel_logo" name="channel_logo" type="file" class="form-control">
                                <input type="hidden" name="old_logo" value="<?php echo $channels->channel_logo ?>">
                            </div>
                            <div class="text-center mt-2">
                                <h4>Previous Image</h4>
                                <img src="<?php echo base_url($channels->channel_logo) ?>" class="img-fluid" style="width: 200px;" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="channelLink">CHANNEL LINK</label>
                                <input id="channelLink" name="channelLink" type="url" class="form-control" value="<?php echo $channels->channel_link ?>" placeholder="https://Example.com">
                            </div>
                            
                            <!-- <div class="mb-3 mt-3">
                                <span class="">
                                    <div class="">
                                        <h5 class="me-2">Show On Slider</h5>
                                        <?php
                                        if (1 == $channels->show_slider) {
                                        ?>
                                            <div class="mb-3 mt-3">
                                                <span class="td-switch">
                                                    <div class="d-flex align-items-center">
                                                        <input class="pm" type="checkbox" id="status" switch="bool" value="" checked>
                                                        <label for="status" data-on-label="Yes" data-off-label="No" class="mb-0"></label>
                                                    </div>
                                                </span>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="mb-3 mt-3">
                                                <span class="td-switch">
                                                    <div class="d-flex align-items-center">
                                                        <input class="pm" type="checkbox" id="status" switch="bool" value="">
                                                        <label for="status" data-on-label="Yes" data-off-label="No" class="mb-0"></label>
                                                    </div>
                                                </span>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <input type="hidden" class="form-control" id="showSlider" name="showSlider" value="<?php echo $channels->show_slider ?>" required>
                                    </div>
                                </span>
                            </div> -->
                            <div class="d-flex flex-wrap gap-2 float-end  mt-4">
                                <button type="reset" class="btn btn-secondary waves-effect waves-light me-3">Reset</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $("#status").change(function() {
            if ($(this).prop('checked')) {
                $("#showSlider").val(1);
            } else {
                $("#showSlider").val(0);
            }
        });
    });
</script>