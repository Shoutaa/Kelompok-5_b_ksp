<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Database extends CI_Controller {

    public function backup() {
        $this->load->dbutil();
        $this->load->helper('file');
        $this->load->helper('download');
    
        $prefs = array(
            'format'      => 'txt',            // gzip, zip, txt
            'filename'    => 'backup.sql',     // Nama file sql
            'add_drop'    => TRUE,             // Menambah DROP TABLE statement
            'add_insert'  => TRUE,             // Menambah INSERT data
            'newline'     => "\n"              // Baris baru yang digunakan dalam file sql
        );
    
        $backup = $this->dbutil->backup($prefs);
    
        // Simpan file sql ke dalam direktori temporer
        $backup_file_name = 'backup_ksp ' . date('Y-m-d_H-i-s') . '.sql';
        $temp_path = sys_get_temp_dir() . '/' . $backup_file_name;
        write_file($temp_path, $backup);
    
        // Buat file zip
        $zip = new ZipArchive();
        $zip_name = 'backup_ksp ' . date('Y-m-d_H-i-s') . '.zip';
        $zip_path = sys_get_temp_dir() . '/' . $zip_name;
    
        if ($zip->open($zip_path, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($temp_path, $backup_file_name);
            $zip->close();
        }
    
        // Hapus file sql setelah dimasukkan ke zip
        unlink($temp_path);
    
        // Download file zip
        force_download($zip_name, file_get_contents($zip_path));
    
        // Hapus file zip setelah di-download
        unlink($zip_path);
    }
    

    public function restore() {
        $this->load->helper('file');
        $this->load->database();
    
        // Tentukan path direktori upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = 10000;
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('db_restore')) {
            $data = $this->upload->data();
            $file_path = $data['full_path'];
    
            $zip = new ZipArchive;
            if ($zip->open($file_path) === TRUE) {
                $extract_path = './uploads/';
                $zip->extractTo($extract_path);
                $zip->close();
    
                $backup_file = $extract_path . 'backup_ksp.sql';
                $sql_contents = file_get_contents($backup_file);
    
                $queries = explode(";\n", $sql_contents);
    
                foreach ($queries as $query) {
                    if (trim($query) !== '') {
                        $this->db->query($query);
                    }
                }
    
                // Hapus file sql setelah restore selesai
                unlink($backup_file);
    
                echo 'Database restored successfully!';
            } else {
                echo 'Failed to open the zip file.';
            }
        } else {
            echo $this->upload->display_errors();
        }
    }
    
