<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');
		$this->load->model('msec');
		$this->load->model('mfunction');
	}

	public function index()
	{
		$this->load->view("./admin/login");
	}

	function authlogin()
	{
		$email = $this->security->xss_clean($this->input->post('email'));
		$pass = $this->security->xss_clean($this->input->post('password'));
		$password = hash('sha512', $this->msec->salt() . $pass);
		$where = array(
			'email' => $email,
			'password' => $password,
			'status' => '1'
		);
		$clogin = $this->mlogin->getlog("user", $where)->num_rows();
		if ($clogin > 0) {
			$query = $this->db->query("SELECT us.user_id, us.email as email, us.name as name, us.avatar as avatar, us.level as level, lv.name as lname, lv.news as anews, lv.pages as apages, lv.messages as amessages, lv.market as amarket, lv.product as aproduct, lv.user as auser,lv.level as alevel
					FROM user us
					INNER JOIN level lv ON us.level = lv.level_id
					WHERE email = '$email' AND password = '$password'");
			$dlogin = $query->row();
			$data_session = array(
				'online' => 'Yes',
				'user_id' => $dlogin->user_id,
				'email' => $dlogin->email,
				'name' => $dlogin->name,
				'avatar' => $dlogin->avatar,
				'level' => $dlogin->level,
				'lname' => $dlogin->lname,
				'anews' => $dlogin->anews,
				'apages' => $dlogin->apages,
				'amessages' => $dlogin->amessages,
				'amarket' => $dlogin->amarket,
				'aproduct' => $dlogin->aproduct,
				'auser' => $dlogin->auser,
				'alevel' => $dlogin->alevel
			);
			$this->session->set_userdata($data_session);
			redirect(base_url('admin/admin'));
		} else {
			$this->mfunction->errorLogin();
			redirect(base_url('login'));
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	function forgot()
	{

		$email = $this->input->post('email');
		if (empty($email)) {
			$this->mfunction->errorForgot('email is empty');
			redirect(base_url('Login'));
		} else {
			$email = explode("@", $email);
			if (count($email) > 2) {
				$this->mfunction->errorForgot('wrong email');
				redirect(base_url('Login'));
			} else {
				$email = $this->mfunction->sql($email[0]) . "@" . $this->mfunction->sql($email[1]);
			}
			$where = array(
				'email' => $email,
				'forgot' => ''
			);
			$where = $this->security->xss_clean($where);
			$cuser = $this->mlogin->getlog('user', $where)->num_rows();

			if ($cuser > 0) {

				// generate random key
				$forgot_key = md5(md5(rand(1111, 9999) . microtime() . md5(rand(88888, 99999))) . microtime() . $email);
				$data = array(
					'forgot' => $forgot_key
				);
				$cuser = $this->mlogin->getUser($email);
				$uid = $cuser->user_id;
				$data = array(
					'forgot' => $forgot_key
				);
				//$this->mlogin->update($uid,$email,$data);

				$config = array(
					'protocol' => 'smtp',
					'smtp_host' => 'smtp.gmail.com',
					'smtp_port' => 587,
					'smtp_user' => 'sehariapp@gmail.com',
					'smtp_pass' => 'Hariini@2',
					'mailtype' => 'html',
					'charset' => 'iso-8859-1'
				);

				$this->load->library('email', $config);
				$this->email->set_newline('\r\n');
				$this->email->from('sehariapp@gmail.com', 'Admin Sehari');
				$this->email->to($email);

				$this->email->subject('Forgot Password');
				$this->email->message('Hello!,
					Click <a href="' . base_url('Login/reset/' . $forgot_key) . '">link</a> or copy link below to reset your password ' . base_url('Login/reset/' . $forgot_key));

				$this->email->send();

				if (!$this->email->send()) {
					show_error($this->email->print_debugger());
				} else {
					$this->mfunction->emailSent();
					redirect(base_url('Login'));
				}
			} else {

				// give error if email doesn't match
				$this->mfunction->errorForgot("email doesn't match");
				redirect(base_url('Login'));
			}
		}
	}

	function reset($kode)
	{
		$kode = $this->security->xss_clean($kode);
		if (isset($kode) && strlen($kode) > 20) {
			$data['kode'] = $kode;
			$this->load->view("./admin/reset", $data);
		} else {
			redirect(base_url('Login'));
		}
	}

	function resetProccess()
	{
		$this->setRules();
		$forgot = $this->security->xss_clean($this->input->post('forgot'));
		if ($this->form_validation->run() == true) {
			$pass = $this->security->xss_clean($this->input->post('password'));
			$password = hash('sha512', $this->msec->salt() . $pass);
			$where = array(
				'forgot' => $forgot
			);
			if (!empty($password)) {
				$cuser = $this->mlogin->getlog("user", $where)->num_rows();
				if ($cuser == 1) {
					$user = $this->mlogin->getUs($forgot);
					$data = array(
						'password' => $password,
						'forgot' => ''
					);
					$this->mlogin->updateF($user->user_id, $forgot, $data);
					$this->mfunction->successReset();
					redirect(base_url('Login'));
				} else {
					redirect(base_url('Login'));
				}
			}
		} else {
			$this->mfunction->errorForgot(' Wrong validation ');
			redirect(base_url('Login/reset/' . $forgot));
		}
	}

	function setRules()
	{
		$this->form_validation->set_rules('forgot', 'Forgot', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|min_length[8]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>", "</div>");
	}

}
