<?php
class error_page extends Controller
{

    public function error_404()
    {

        $this->view('error/404.php');
    }
}
