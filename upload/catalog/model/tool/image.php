<?php
namespace Ventocart\Catalog\Model\Tool;
/**
 * Class Image
 *
 * @package Ventocart\Catalog\Model\Tool
 */
class Image extends \Ventocart\System\Engine\Model
{
	/**
	 * @param string $filename
	 * @param int    $width
	 * @param int    $height
	 * @param string $default
	 *
	 * @return string
	 * @throws \Exception
	 */
	public function resize(string $filename, int $width, int $height, string $default = '', bool $crop = false): string
	{



		$fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

		if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {

			return $this->config->get('config_url') . 'image/' . $filename;

		}
		if (!is_file(DIR_IMAGE . $filename) || substr(str_replace('\\', '/', realpath(DIR_IMAGE . $filename)), 0, strlen(DIR_IMAGE)) != DIR_IMAGE) {
			return '';
		}
		$image_format = $this->config->get('config_image_filetype');
		$image_quality = $this->config->get('config_image_quality');
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		if ($image_format != 'as_uploaded') {
			$extension = $image_format;
		} else {
			$image_format = '';
		}
		$image_old = $filename;
		$image_new = 'cache/' . oc_substr($filename, 0, oc_strrpos($filename, '.')) . '-' . (int) $width . 'x' . (int) $height . '.' . $extension;


		if (!is_file(DIR_IMAGE . $image_new) || (filemtime(DIR_IMAGE . $image_old) > filemtime(DIR_IMAGE . $image_new))) {
			list($width_orig, $height_orig, $image_type) = getimagesize(DIR_IMAGE . $image_old);

			if (!in_array($image_type, [IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_WEBP])) {
				return $this->config->get('config_url') . 'image/' . $image_old;
			}

			$path = '';

			$directories = explode('/', dirname($image_new));

			foreach ($directories as $directory) {
				if (!$path) {
					$path = $directory;
				} else {
					$path = $path . '/' . $directory;
				}

				if (!is_dir(DIR_IMAGE . $path)) {
					@mkdir(DIR_IMAGE . $path, 0777);
				}
			}

			if ($width_orig != $width || $height_orig != $height) {
				$image = new \Ventocart\System\Library\Image(DIR_IMAGE . $image_old);
				if (!$crop) {

					$image->resize($width, $height, $default);
				} else {
					$image->crop($width, $height, $default);
				}
				// Convert to the selected format if necessary

				$image->save(DIR_IMAGE . $image_new, (int) $image_quality, $image_format);

			} else {
				$image = new \Ventocart\System\Library\Image(DIR_IMAGE . $image_old);

				// Convert the image format (if necessary)
				$image->save(DIR_IMAGE . $image_new, $image_quality, $image_format);
			}
		}

		$image_new = str_replace(' ', '%20', $image_new);  // fix bug when attach image on email (gmail.com). it is automatically changing space from " " to +

		return $this->config->get('config_url') . 'image/' . $image_new;
	}
}
