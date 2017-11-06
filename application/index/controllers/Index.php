<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
    public function __construct() {
        parent::__construct();
    }
	
	public function index(){
        $this->smarty->assign('id',1);
	   $this->smarty->display('index.php');     
	}
	public function programm(){
        $this->smarty->assign('id',2);
	   $this->smarty->display('program.php');     
	}
	public function allChannel(){
        $this->smarty->assign('id',3);	
	   $this->smarty->display('channel.php');     
	}
	public function memberService(){
       $this->smarty->assign('id',4);
	   $this->smarty->display('member.php');     
	}
	public function addUs(){
        $this->smarty->assign('id',5);
	   $this->smarty->display('addus.php');     
	}
}
