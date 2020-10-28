<?php

// print_r(this->session->userdata('status'));
	if($this->session->userdata('status') != 'login'){
		$message = "Maaf, anda harus login terlebih dahulu!";
			$this->session->sess_destroy();
	   	echo "<script type='text/javascript'>
	   			alert('$message');
	   			window.location.href = '". base_url() ."Login';</script>";
		//redirect(base_url("Login"));
	}
?>