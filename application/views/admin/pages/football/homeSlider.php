<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Slider Items & Schedule</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home Page</a></li>
                        <li class="breadcrumb-item active">Slider Item & Schedule</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="card">
        <div class="card-header">
            <a href="<?php echo base_url('viewAddSlider') ?>" class="btn btn-primary px-3 float-end me-5">Add Slider Item & Schedule</a>
        </div>
        <div class="card-body">
            <div class="datatable-example my-4 px-2" style="overflow-x: auto;width:100%;">
                <table id="example" class="table display nowrap mt-3 text-center">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th class="text-center">Serial</th>
                            <th class="text-center">Show Slider</th>
                            <th class="text-center">Match</th>
                            <th class="text-center">Match Formate</th>
                            <th class="text-center">First Team</th>
                            <th class="text-center">Second Team</th>
                            <th class="text-center">Match Date</th>
                            <th class="text-center">Channel</th>
                            <th class="text-center">Slider Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $serial = 0;
                        foreach ($homeSlider as $slider) {
                            $serial++;
                        ?>
                            <tr>
                                <td><?php echo $serial ?></td>
                                <td>
                                    <?php
                                    if ($slider->show_slider == 1) {
                                        echo "Show";
                                    } else {
                                        echo "Hidden";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $slider->match_type ?></td>
                                <td><?php echo $slider->formate ?></td>
                                <td><?php echo $slider->first_team ?></td>
                                <td><?php echo $slider->second_team ?></td>
                                <td><?php
                                    date_default_timezone_set("Asia/Dhaka");
                                    $date = $slider->match_date . ' ' . $slider->match_time;

                                    if ($slider->formate == 'TEST') {
                                        $newDate = date('Y-m-d h:i:s', strtotime($date . ' + 120 hours'));
                                        if (strtotime($newDate) < strtotime('now')) {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Finished";
                                        } else {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Remain" . "<br>";
                                        }
                                    } else if ($slider->formate == 'ODI') {
                                        $newDate = date('Y-m-d h:i:s', strtotime($date . ' + 12 hours'));
                                        if (strtotime($newDate) < strtotime('now')) {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Finished";
                                        } else {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Remain" . "<br>";
                                        }
                                    } else if ($slider->formate == 'T20') {
                                        $newDate = date('Y-m-d h:i:s', strtotime($date . ' + 4 hours'));
                                        if (strtotime($newDate) < strtotime('now')) {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Finished";
                                        } else {
                                            echo $slider->match_date . ' ' . $slider->match_time . "<br>";
                                            echo "Match Remain" . "<br>";
                                        }
                                    }
                                    ?></td>
                                <td><?php echo $slider->channel_name ?></td>
                                <td><img src="<?php echo base_url() . $slider->image ?>" class="img-fluid rounded-circle" style="height: 80px; width: 80px" alt=""></td>
                                <td>
                                    <a href="<?php echo base_url('editSlider/') . $slider->slider_id ?>" class="me-3"><i class="fa-solid fa-pen-to-square fs-4 text-success fs-4"></i></a>
                                    <a href="<?php echo base_url('admin/delete_slider/' . $slider->slider_id) ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-solid fa-trash-can fs-4 text-danger"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>