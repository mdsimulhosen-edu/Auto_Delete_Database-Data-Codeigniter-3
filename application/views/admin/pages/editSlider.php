<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Home Page Slider Items & Schedule</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page & Schedule</a></li>
                        <li class="breadcrumb-item active">Edit Slider</li>
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
                    <a href="<?php echo base_url('homeSlider') ?>" class="btn btn-dark px-3">
                        << Back To Slider Item</a>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('admin/update_slider/' . $homeslider->slider_id) ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <input type="hidden" name="sliderId" value="<?php echo $homeslider->slider_id ?>">

                            <div class="mb-3">
                                <label for="matchType">MATCH</label>
                                <select class="form-select" name="matchType" id="matchType">
                                    <?php
                                    foreach ($matchType as $type) { ?>
                                        <option value="<?= $type->match_type; ?>" <?= isset($matchType) ? (($type->match_type == $homeslider->match_type) ? "selected" : "") : "" ?>><?= $type->match_type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class="form-select format" name="format" id="format" style="display: none;">
                                    <option value="">Select Format</option>
                                    <?php
                                    foreach ($cricket_format as $format) { ?>
                                        <option value="<?= $format->format; ?>" <?= isset($cricket_format) ? (($format->format == $homeslider->format) ? "selected" : "") : "" ?>><?= $format->format; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg-5 col-xl-5 col-md-12">
                                <div class="mb-3">
                                    <label for="firstTeam">FIRST TEAM NAME</label>
                                    <input id="firstTeam" name="firstTeam" type="text" class="form-control" placeholder="Example:  Argentina" value="<?php echo $homeslider->first_team ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="matchDate">LIVE MATCH DATE</label>
                                    <input id="matchDate" name="matchDate" type="date" class="form-control" value="<?php echo $homeslider->match_date ?>">
                                </div>

                            </div>
                            <div class="col-sm-12 col-lg-2 col-xl-2 col-md-12">
                                <h4 class="text-center mt-4 pt-2">VS</h4>
                            </div>
                            <div class="col-sm-12 col-lg-5 col-xl-5 col-md-12">
                                <div class="mb-3">
                                    <label for="secondTeam">SECOND TEAM NAME</label>
                                    <input id="secondTeam" name="secondTeam" type="text" class="form-control" placeholder="Example:  Brazil" value="<?php echo $homeslider->second_team ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="matchTime">LIVE MATCH TIME</label>
                                    <input id="matchTime" name="matchTime" type="time" class="form-control" value="<?php echo $homeslider->match_time ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="matchLink">CHANNEL</label>
                                <select class="form-select" name="matchLink" id="matchLink">
                                    <?php
                                    foreach ($channels as $channel) { ?>
                                        <option value="<?= $channel->channel_link; ?>" <?= isset($channels) ? (($channel->channel_link == $homeslider->channel_link) ? "selected" : "") : "" ?>><?= $channel->channel_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sliderImage">IMAGE</label>
                                <input id="sliderImage" name="sliderImage" type="file" class="form-control">
                                <input id="old_image" name="old_image" type="hidden" class="form-control" value="<?php echo $homeslider->image ?>">
                            </div>
                            <div class="text-center">
                                <h4>Previous Image</h4>
                                <img src="<?php echo base_url($homeslider->image) ?>" height="250px" width="500px" alt="">
                            </div>
                            <div class="mb-3 mt-3">
                                <span class="">
                                    <div class="">
                                        <h5 class="me-2">Show On Slider</h5>
                                        <?php
                                        if (1 == $homeslider->show_slider) {
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
                                        <input type="hidden" class="form-control" id="showSlider" name="showSlider" value="<?php echo $homeslider->show_slider ?>" required>
                                    </div>
                                </span>
                            </div>
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
        var format = $("#matchType").val();
        if (format == "Cricket") {
            $('.format').css('display', 'block');
        }

    });

    // Select Cricket  Match format 
    $('#matchType').on('change', function() {
        $('.format').css('display', 'none');
        $("#format").val('');
        if ($(this).val() === 'Cricket') {
            $('.format').css('display', 'block');
        }
    });
</script>