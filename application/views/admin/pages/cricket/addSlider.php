<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Add Home Page Slider Items & Schedule</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page & Schedule</a></li>
                        <li class="breadcrumb-item active">Add Slider</li>
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
                    <form action="<?php echo base_url('admin/add_slider') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="mb-3">
                                <label for="matchType">MATCH</label>
                                <select class="form-select" name="matchType" id="matchType" required>
                                    <?php
                                    foreach ($matchType as $type) { ?>
                                        <option value="<?php echo $type->match_type ?>"><?php echo $type->match_type ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select class='form-select formate mb-3' name='formate' id="formate" style="display:none">
                                    <option value='TEST'>TEST</option>
                                    <option value='ODI'>ODI</option>
                                    <option value='T20'>T20</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg-5 col-xl-5 col-md-12">
                                <div class="mb-3">
                                    <label for="firstTeam">FIRST TEAM NAME</label>
                                    <input id="firstTeam" name="firstTeam" type="text" class="form-control" placeholder="Example:  Argentina" required>
                                </div>
                                <div class="mb-3">
                                    <label for="matchDate">LIVE MATCH DATE</label>
                                    <input id="matchDate" name="matchDate" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-2 col-xl-2 col-md-12">
                                <h4 class="text-center mt-4 pt-2">VS</h4>
                            </div>
                            <div class="col-sm-12 col-lg-5 col-xl-5 col-md-12">
                                <div class="mb-3">
                                    <label for="secondTeam">SECOND TEAM NAME</label>
                                    <input id="secondTeam" name="secondTeam" type="text" class="form-control" placeholder="Example:  Brazil" required>
                                </div>
                                <div class="mb-3">
                                    <label for="matchTime">LIVE MATCH TIME</label>
                                    <input id="matchTime" name="matchTime" type="time" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="sliderImage">IMAGE</label>
                                <input id="sliderImage" name="sliderImage" type="file" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="matchLink">CHANNEL</label>
                                <select class="form-select" name="matchLink" id="matchLink" required>
                                    <?php
                                    foreach ($channels as $channel) { ?>
                                        <option value="<?php echo $channel->channel_link ?>"><?php echo $channel->channel_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3 mt-3">
                                <span class="td-switch">
                                    <div class="d-flex align-items-center">
                                        <h5 class="me-2">Show On Slider</h5>
                                        <input class="pm" type="checkbox" id="status" switch="bool" value="" name="status">
                                        <label for="status" data-on-label="Yes" data-off-label="No" class="mb-0"></label>
                                    </div>
                                    <input type="hidden" class="form-control" id="showSlider" name="showSlider" value="" required>
                                </span>
                            </div>
                            <div class="d-flex flex-wrap gap-2 float-end  mt-4">
                                <button type="reset" class="btn btn-secondary waves-effect waves-light me-3">Reset</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Insert</button>
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

    // Select Cricket  Match Formate 
    $('#matchType').on('change', function() {
        $('#formate').css('display', 'none');
        if ($(this).val() === 'Cricket') {
            $('.formate').css('display', 'block');
        }
    });
</script>