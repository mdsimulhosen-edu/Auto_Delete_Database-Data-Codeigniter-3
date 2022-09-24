<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    // ########################## Common Funtions Section Start ##############################################
    // Common Show Start================= 
    public function show_all($table)
    {
        $this->db->FROM($table);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    // Common Show Start================= 
    //Common Add Start  +++++++++++++++++++++++++++++++++++++++
    public function addData($table, $data)
    {
        $result = $this->db->insert($table, $data);
        return true;
    }
    //Common Add End  +++++++++++++++++++++++++++++++++++++++++
    //Common Edit Slider Item Start ---------+++++++++++##################3
    public function editData($table, $table_id, $id)
    {
        $this->db->where($table_id, $id);
        $query = $this->db->get($table);
        return $query->row();
    }
    //Common Edit Slider Item End ---------+++++++++++##################3

    //Common Update Slider Item Start +++++++++++++++++++
    public function updateData($table, $table_id, $data, $id)
    {
        $this->db->where($table_id, $id);
        $query = $this->db->update($table, $data);
        return $query;
    }
    //Common Update Slider Item End +++++++++++++++++++++

    // +++++++++++++++Delete Image++++++++++++++++ Common Fetch +++++++++++++++++++Delete Image++++++++++++++
    //Image Fatch/Chack for Image Unlink/Delete from path
    public function imageUnlink($table, $table_id, $id)
    {
        $this->db->where($table_id, $id);
        return $this->db->get($table)->row();
    }
    // +++++++++++++Delete Image+++++++++++++++++ Common Fetch +++++++++++++++Delete Image+++++++++++++++++++

    // Delete Slider Item------------------------- 
    public function deleteData($table, $table_id, $id)
    {
        $this->db->where($table_id, $id)->delete($table);
    }
    // ########################## Common Funtions Section End ##############################################





    // show Dropdown Match Types 
    function matchType()
    {
        return $this->db->get('matchType')->result();
    }
    // Home Slider Show 
    public function show_home_slider()
    {
        $this->db->FROM('homeslider');
        $this->db->join('channel', 'homeslider.channel_link = channel.channel_link');
        return $this->db->get()->result();
    }
    // Cricket format 
    public function cricket_format()
    {
        return $this->db->get('cricket_format')->result();
    }

    // ########################## Channels Section Start ############################################

    public function channelCategory()
    {
        return $this->db->get('channel_category')->result();
    }

    public function show_channel()
    {
        return $this->db->get('channel')->result();
    }
    // ########################## Channels Section End ##############################################






    // Delete Slider Item------------------------- 
    public function auto_del($now)
    {
        $all = $this->db->get('homeslider')->result();
        foreach ($all as $date) {
            if (strtotime($date->match_date) > $now) {
                // Delete Slider Item------------------------- 
                $id = $date->slider_id;
                $this->db->where('slider_id', $id)->delete('homeslider');
            }
        }
        // $this->db->where($table_id, $id)->delete($table);
    }

    public function auto_delete($m_date)
    {
        $query = $this->db->get('homdslider')->result();
        // $this->db->where(array('match_date', $m_date));
        // $query =  $this->db->get('homeslider')->result();
        // return $query;
    }
}
