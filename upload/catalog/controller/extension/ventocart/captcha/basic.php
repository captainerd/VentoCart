<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Captcha;

/**
 * Class Basic
 *
 * @package Ventocart\Catalog\Controller\Extension\VentoCart\Captcha
 */
class Basic extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return string
	 */
	public function index(): string
	{

		$this->load->language('extension/ventocart/captcha/basic');

		$data['route'] = (string) $this->request->get['route'];

		$data['feedback'] = password_hash($_SERVER['HTTP_USER_AGENT'] . "-captcha", PASSWORD_DEFAULT);
		$this->session->data['feedback_name'] = $this->generateRandomName();
		$data['feedback_class'] = $this->generateRandomName();
		$data['feedback_name'] = $this->session->data['feedback_name'];





		return $this->load->view('extension/ventocart/captcha/basic', $data);
	}

	/**
	 * @return string
	 */
	public function validate(): string
	{
		$this->load->language('extension/ventocart/captcha/basic');


		if (!isset($this->request->post[$this->session->data['feedback_name']]) || !isset($this->session->data['captcha']) || !isset($this->request->post['captcha']) || ($this->session->data['captcha'] != $this->request->post['captcha'])) {


			return $this->language->get('error_captcha');
		} else {

			if (password_verify(password_hash($_SERVER['HTTP_USER_AGENT'] . "-captcha", PASSWORD_DEFAULT), $this->request->post[$this->session->data['feedback_name']])) {

				return $this->language->get('error_captcha');
			}

			return '';
		}
	}

	/**
	 * @return void
	 */
	public function graphic(): void
	{
		$this->session->data['captcha'] = strtoupper(substr(oc_token(100), rand(0, 94), 6));
		$captchaText = $this->session->data['captcha'];


		$image = imagecreatetruecolor(150, 35);

		$width = imagesx($image);
		$height = imagesy($image);

		$black = imagecolorallocate($image, 0, 0, 0);
		$white = imagecolorallocate($image, 255, 255, 255);

		imagefilledrectangle($image, 0, 0, $width, $height, $white);


		$captchaText = $this->session->data['captcha'];

		$font_size = 30; // Adjusted font size
		$font_path = DIR_VENTOCART . 'themes/default/assets/extension/ventocart/fonts/zonaarmada.ttf'; // Replace with the actual path to your TrueType font file

		imagettftext($image, $font_size, 0, 10, 0 + $font_size, $black, $font_path, $captchaText);



		for ($y = 0; $y < $height; $y++) {
			for ($x = 0; $x < $width; $x++) {
				if (mt_rand(0, 2) == 2) {
					imagesetpixel($image, $x, $y, $black);
				}
				if (mt_rand(0, 8) == 2) {
					imagesetpixel($image, $x, $y, $white);
				}
			}
		}



		header('Content-type: image/jpeg');
		header('Cache-Control: no-cache');
		header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');

		imagejpeg($image);

		imagedestroy($image);
		exit();
	}

	function generateRandomName($prefix = 'input_', $length = 10)
	{
		$characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
		$randomString = '';

		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}

		return $prefix . $randomString;
	}

}
