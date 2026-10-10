<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Restrict this controller to CLI requests only for security
        if (!$this->input->is_cli_request()) {
            show_error('Direct computer access only.');
        }
        $this->load->library('migration');
    }

    // Runs 'up' to the latest version by default
    public function index() {
        if (!$this->migration->latest()) {
            show_error($this->migration->error_string());
        } else {
            echo "Successfully migrated to the latest version!\n";
        }
    }

    // Runs 'up' or 'down' to a specific target version number
    public function version($target_version) {
        if ($target_version === NULL) {
            echo "Please provide a target version number.\n";
            return;
        }

        if (!$this->migration->version($target_version)) {
            show_error($this->migration->error_string());
        } else {
            echo "Successfully moved to version: " . $target_version . "\n";
        }
    }
}