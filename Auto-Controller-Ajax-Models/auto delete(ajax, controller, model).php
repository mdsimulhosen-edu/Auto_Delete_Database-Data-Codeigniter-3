<!-- Auto Data pass Ajax code -->

<script>
    //  =======================================================
    $(function() {
        <?php date_default_timezone_set('Asia/Dhaka') ?>
        var f_time = "<?php echo date('Y-m-d') ?>";

        $.ajax({
            url: "<?= base_url('index.php/Admin/auto_delete/') ?>",
            type: "POST",
            data: {
                'f_time': f_time
            },
            success: function(dataResult) {
                alert(dataResult)
            }
        });
    });
</script>


// Controller  Delete Homeslider Item---------------------------- 

    public function auto_delete()
    {
        // this for selecting old date 
        $f_time = $this->input->post('f_time');

        // getting all old dates 
        $data['match'] = $this->AdminModel->auto_delete($f_time);

        // for deleting data 
        foreach ($data['match'] as $key) {
            date_default_timezone_set('Asia/Dhaka');
            $c_time = date('H:i:s');

            if ($key->format != 'ODI' && $key->format != 'TEST' || $key->format == '') {
                $m_time = $key->match_time;
                $extra_time = date('H:i:s', strtotime($m_time . ' + 4 hours'));
                if (strtotime($c_time) > strtotime($extra_time)) {
                    $this->AdminModel->auto_delete_date($key->match_date, $key->slider_id);
                }else{
                    // echo "Remain" . ' - '.$key->slider_id;
                }
            }
        }
    }





//Model for Auto select and delete data

//  Fetching Old Dates from Slider Item------------------------- 
    public function auto_delete($d)
    {
        $this->db->where('match_date <=', $d);
        return $this->db->get('homeslider')->result();
    }
    // auto Delete Slider Item------------------------- 
    public function auto_delete_date($d, $id)
    {
        $array = array('slider_id' => $id, 'match_date' => $d);
        $this->db->where($array)->delete('homeslider');
    }

    