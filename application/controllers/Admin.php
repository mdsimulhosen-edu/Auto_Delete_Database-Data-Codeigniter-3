<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("AdminModel");
    }

    public function index()
    {
        if (!isset($_SESSION)) redirect('login');

        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/dashboard',
            'title' => 'Admin Panel',
        ];
        $this->load->view('admin/base_layout/layout', $data);
    }

    public function login()
    {
        $this->load->view('admin/login');
    }
    public function loginprocess()
    {

        $data = $this->input->post();
        $login = $this->db->get_where('login', ['username' => $data['username'], 'password' => $data['password']])->row();
        if (isset($login)) {
            $_SESSION = $login;
            redirect('');
        } else {
            redirect('login?login=false');
        }
    }
    // Home Slider section +++++++++++++++++++++++++++
    public function home_slider()
    {
        if (!isset($_SESSION)) redirect('login');

        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/pages/homeSlider',
            'title' => 'Admin Panel | Home Slider',
            'homeSlider' => $this->AdminModel->show_home_slider(),

        ];
        $this->load->view('admin/base_layout/layout', $data);
    }

    public function viewAddSlider()
    {
        if (!isset($_SESSION)) redirect('login');

        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/pages/addSlider',
            'title' => 'Admin Panel | Add Home Slider',
            "matchType" => $this->AdminModel->matchType(),
            'channels' => $this->AdminModel->show_channel(),
            'cricket_format' => $this->AdminModel->cricket_format(),
        ];
        $this->load->view('admin/base_layout/layout', $data);
    }

    public function add_slider()
    {
        if (!isset($_SESSION)) redirect('login');

        $ori_filename = $_FILES['sliderImage']['name'];
        $insert_name = str_replace(' ', '-', $ori_filename);
        $config = [
            'upload_path' => 'images/home-slider-images/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'file_name' => $insert_name
            // 'encrypt_name' => TRUE
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('sliderImage')) {
            $table = "homeslider";
            $data = [
                'image' => $config['upload_path'] . $insert_name,
                'match_type' => $this->input->post('matchType'),
                'format' => $this->input->post('format'),
                'first_team' => $this->input->post('firstTeam'),
                'second_team' => $this->input->post('secondTeam'),
                'match_date' => $this->input->post('matchDate'),
                'match_time' => $this->input->post('matchTime'),
                'channel_link' => $this->input->post('matchLink'),
                'show_slider' => $this->input->post('showSlider'),
            ];

            if ($this->AdminModel->addData($table, $data) == true) {
                redirect('homeSlider', 'refresh');
            }
        } else if (!$this->upload->do_upload('sliderImage')) {
            $table = "homeslider";
            $data = [
                'image' => '',
                'match_type' => $this->input->post('matchType'),
                'format' => $this->input->post('format'),
                'first_team' => $this->input->post('firstTeam'),
                'second_team' => $this->input->post('secondTeam'),
                'match_date' => $this->input->post('matchDate'),
                'match_time' => $this->input->post('matchTime'),
                'channel_link' => $this->input->post('matchLink'),
                'show_slider' => $this->input->post('showSlider'),
            ];

            if ($this->AdminModel->addData($table, $data) == true) {
                redirect('homeSlider', 'refresh');
            }
        } else {
            redirect('addSlider', 'refresh');
        }
    }

    //Edit homeSlider-------+++++++++++++++++++++++
    public function edit_slider($slider_id)
    {
        $table = "homeslider";
        $table_id = 'slider_id';
        $data = [
            "title" => "Edit Home Slider",
            "body" => "admin/pages/editSlider",
            "homeslider" => $this->AdminModel->editData($table, $table_id, $slider_id),
            "matchType" => $this->AdminModel->matchType(),
            "channels" => $this->AdminModel->show_channel(),
            "cricket_format" => $this->AdminModel->cricket_format(),
        ];
        $this->load->view("admin/base_layout/layout", $data);
    }


    // Update HomeSlider ++++++++++++++++++++++++++++++
    public function update_slider($slider_id)
    {
        $table_id = 'slider_id';
        $oldFileName = $this->input->post('old_image');
        $newFileName = $_FILES['sliderImage']['name'];
        $table = "homeslider";

        if ($oldFileName == true || $oldFileName == false) {
            $updateFileName = str_replace(' ', '_', $newFileName);
            $config = [
                'upload_path' => 'images/home-slider-images/',
                'allowed_types' => 'jpg|jpeg|gif|png',
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('sliderImage')) {
                if (file_exists($oldFileName)) {
                    unlink($oldFileName);
                }
            }
            //Update code Here
            $data = [
                'slider_id' => $this->input->post('sliderId'),
                'match_type' => $this->input->post('matchType'),
                'format' => $this->input->post('format'),
                'first_team' => $this->input->post('firstTeam'),
                'second_team' => $this->input->post('secondTeam'),
                'match_date' => $this->input->post('matchDate'),
                'match_time' => $this->input->post('matchTime'),
                'channel_link' => $this->input->post('matchLink'),
                'show_slider' => $this->input->post('showSlider'),
            ];
            // Condition for update file without image or not 
            if ($newFileName == true) {
                $data += [
                    'image' => $config['upload_path'] . $updateFileName,
                ];
                $this->AdminModel->updateData($table, $table_id, $data, $slider_id);
            } else {
                $data += [
                    'image' => $oldFileName,
                ];
                $this->AdminModel->updateData($table, $table_id, $data, $slider_id);
            }
        } else {
            // $newFile = $oldFileName;
            // print_r($newFileName);
        }
        redirect('homeSlider', 'refresh');
    }

    // Delete Homeslider Item---------------------------- 
    public function delete_slider($id)
    {
        $table = "homeslider";
        $table_id = 'slider_id';
        if ($this->AdminModel->imageUnlink($table, $table_id, $id)) {
            $data = $this->AdminModel->imageUnlink($table, $table_id, $id);
            if (file_exists($data->image)) {
                unlink($data->image);
            }

            $this->AdminModel->deleteData($table, $table_id, $id);
            redirect('homeSlider', 'refresh');
        }
    }






    // ########################## Channels Section Start ####################### 

    public function channels()
    {
        $table = "channel";
        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/pages/channels',
            'title' => 'Admin Panel | Channels',
            'channels' => $this->AdminModel->show_all($table)
        ];
        $this->load->view('admin/base_layout/layout', $data,);
    }

    public function view_add_channel()
    {
        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/pages/addChannel',
            'title' => 'Admin Panel | Add Channel',
            'channel_category' => $this->AdminModel->channelCategory()
        ];
        $this->load->view('admin/base_layout/layout', $data);
    }


    public function add_channel()
    {
        $ori_filename = $_FILES['channel_logo']['name'];
        $insert_name = str_replace(' ', '-', $ori_filename);
        $config = [
            'upload_path' => 'images/channel-logo/',
            'allowed_types' => 'gif|jpg|jpeg|png',
            'file_name' => $insert_name,
            // 'encrypt_name' => TRUE
        ];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('channel_logo')) {
            $imageError = array('imageError' => $this->upload->display_errors());
            print_r($imageError);
        } else {
            $table = "channel";
            $data = [
                'channel_name' => $this->input->post('channelName'),
                'channel_logo' => $config['upload_path'] . $insert_name,
                'channel_link' => $this->input->post('channeLink'),
                'channel_category' => $this->input->post('channelCategory'),
                // 'show_slider' => $this->input->post('showSlider'),
                'public_key' => $this->input->post('public_key'),
                'private_key' => $this->input->post('private_key'),
                'video_id' => $this->input->post('video_id'),
                'encrypt_link' => $this->input->post('link_enc'),
                'encrypt_js' => $this->input->post('js_enc'),
                'video_js' => $this->input->post('video_js'),
                'stream_js' => $this->input->post('stream_js'),
                'script_js' => $this->input->post('script_js'),
            ];

            $this->AdminModel->addData($table, $data);
            redirect('channels', 'refresh');
        }
    }

    //Edit Channel -------+++++++++++++++++++++++
    public function edit_channel($id)
    {
        $table = "channel";
        $table_id = 'channel_id';
        $data = [
            "title" => "Admin Panel | Edit Channel",
            "body" => "admin/pages/editChannel",
            "channels" => $this->AdminModel->editData($table, $table_id, $id),
            "channel_category" => $this->AdminModel->channelCategory(),
        ];
        $this->load->view("admin/base_layout/layout", $data);
    }

    // Update Channel ++++++++++++++++++++++++++++++
    public function update_channel($id)
    {

        $table_id = 'channel_id';
        $oldFileName = $this->input->post('old_logo');
        $newFileName = $_FILES['channel_logo']['name'];
        $table = "channel";

        if ($oldFileName == true) {
            $updateFileName = str_replace(' ', '_', $newFileName);
            $config = [
                'upload_path' => 'images/channel-logo/',
                'allowed_types' => 'jpg|jpeg|gif|png',
            ];
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('channel_logo')) {
                if (file_exists($oldFileName)) {
                    unlink($oldFileName);
                }
            }
            //Update code Here
            $data = [
                'channel_id' => $this->input->post('channelId'),
                'channel_name' => $this->input->post('channelName'),
                'channel_link' => $this->input->post('channelLink'),
                'channel_category' => $this->input->post('channelCategory'),
                // 'show_slider' => $this->input->post('showSlider'),
            ];
            // Condition for update file without image or not 
            if ($newFileName == true) {
                $data += [
                    'channel_logo' => $config['upload_path'] . $updateFileName,
                ];
                $this->AdminModel->updateData($table, $table_id, $data, $id);
            } else {
                $data += [
                    'channel_logo' => $oldFileName,
                ];
                $this->AdminModel->updateData($table, $table_id, $data, $id);
            }
        } else {
            $newFile = $oldFileName;
            print_r($newFileName);
        }
        redirect('channels', 'refresh');
    }


    // Delete Channel ---------------------------- 
    public function delete_channel($id)
    {
        $table_id = 'channel_id';
        $table = "channel";
        if ($this->AdminModel->imageUnlink($table, $table_id, $id)) {
            $data = $this->AdminModel->imageUnlink($table, $table_id, $id);
            if (file_exists($data->channel_logo)) {
                unlink($data->channel_logo);
            }

            $this->AdminModel->deleteData($table, $table_id, $id);
            redirect('channels', 'refresh');
        }
    }

    // ########################## Channels Section End ####################### 


    // ########################## Cricket Section Start ####################### 
    public function cricket()
    {
        $data = [
            'css' => '',
            'js' => '',
            'body' => 'admin/pages/cricket',
            'title' => 'Admin Panel | Cricket',
        ];
        $this->load->view('admin/base_layout/layout', $data);
    }
    // ########################## Cricket Section End ####################### 












    // Auto Delete Homeslider Item---------------------------- 
    public function auto_delete()
    {
        $m_date = $this->input->post('f_date');

        $m_time = $this->input->post('f_time');
        // $query = $this->db->get('homdslider')->result();
        print_r($this->AdminModel->auto_delete());

        // $query = $this->db->select('*')->get_where('homeslider', array('match_date >' => $m_date))->result_array();

        // $this->db->where(array('match_date <', $m_date));
        // $query =  $this->db->get('homeslider')->result();
        // print_r($query);
        // echo $m_date;


        //die;
        //$this->AdminModel->auto_del($now);
    }
}
