<?php
namespace Ventocart\Admin\Controller\Common;

/**
 * Class File Manager
 *
 * @package Ventocart\Admin\Controller\Common
 */
class FileManager extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('common/filemanager');

		$data['error_upload_size'] = sprintf($this->language->get('error_upload_size'), $this->config->get('config_file_max_size'));

		$data['config_file_max_size'] = ((int) $this->config->get('config_file_max_size') * 1024 * 1024);

		// Return the target ID for the file manager to set the value
		if (isset($this->request->get['target'])) {
			$data['target'] = $this->request->get['target'];
		} else {
			$data['target'] = '';
		}

		// Return the thumbnail for the file manager to show a thumbnail
		if (isset($this->request->get['thumb'])) {
			$data['thumb'] = $this->request->get['thumb'];
		} else {
			$data['thumb'] = '';
		}

		if (isset($this->request->get['ckeditor'])) {
			$data['ckeditor'] = $this->request->get['ckeditor'];
		} else {
			$data['ckeditor'] = '';
		}

		$data['user_token'] = $this->session->data['user_token'];

		$this->response->setOutput($this->load->view('common/filemanager', $data));
	}

	/**
	 * @return void
	 */
	public function list(): void
	{
		$this->load->language('common/filemanager');

		$base = DIR_IMAGE . 'catalog/';

		// Make sure we have the correct directory
		if (isset($this->request->get['directory'])) {
			$directory = $base . html_entity_decode($this->request->get['directory'], ENT_QUOTES, 'UTF-8') . '/';
		} else {
			$directory = $base;
		}

		if (isset($this->request->get['filter_name'])) {
			$filter_name = basename(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		} else {
			$filter_name = '';
		}

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$allowed = [
			'.ico',
			'.jpg',
			'.jpeg',
			'.png',
			'.gif',
			'.avif',
			'.webp',
			'.JPG',
			'.JPEG',
			'.PNG',
			'.avi',
			'.mkv',
			'.mp4',
			'.GIF'
		];

		$data['directories'] = [];
		$data['images'] = [];

		$this->load->model('tool/image');

		// Get directories and files
		$paths = array_merge(
			glob($directory . $filter_name . '*', GLOB_ONLYDIR),
			glob($directory . $filter_name . '*{' . implode(',', $allowed) . '}', GLOB_BRACE)
		);

		$total = count($paths);
		$limit = 25;
		$start = ($page - 1) * $limit;

		if ($paths) {
			// Split the array based on current page number and max number of items per page of 10
			foreach (array_slice($paths, $start, $limit) as $path) {
				$path = str_replace('\\', '/', realpath($path));

				if (substr($path, 0, strlen($path)) == $path) {
					$name = basename($path);

					$url = '';

					if (isset($this->request->get['target'])) {
						$url .= '&target=' . $this->request->get['target'];
					}

					if (isset($this->request->get['thumb'])) {
						$url .= '&thumb=' . $this->request->get['thumb'];
					}

					if (isset($this->request->get['ckeditor'])) {
						$url .= '&ckeditor=' . $this->request->get['ckeditor'];
					}

					if (is_dir($path)) {
						$data['directories'][] = [
							'name' => $name,
							'path' => oc_substr($path, oc_strlen($base)) . '/',
							'href' => $this->url->link('common/filemanager.list', 'user_token=' . $this->session->data['user_token'] . '&directory=' . urlencode(oc_substr($path, oc_strlen($base))) . $url)
						];
					}

					if (is_file($path) && in_array(substr($path, strrpos($path, '.')), $allowed)) {
						$data['images'][] = [
							'name' => $name,
							'path' => oc_substr($path, oc_strlen($base)),
							'href' => HTTP_CATALOG . 'image/catalog/' . oc_substr($path, oc_strlen($base)),
							'thumb' => $this->model_tool_image->resize(oc_substr($path, oc_strlen(DIR_IMAGE)), $this->config->get('config_image_default_width'), $this->config->get('config_image_default_height'))
						];
					}
				}
			}
		}
		$data['width'] = $this->config->get('config_image_default_width');
		$data['height'] = $this->config->get('config_image_default_height');

		if (isset($this->request->get['directory'])) {
			$data['directory'] = urldecode($this->request->get['directory']);
		} else {
			$data['directory'] = '';
		}

		if (isset($this->request->get['filter_name'])) {
			$data['filter_name'] = $this->request->get['filter_name'];
		} else {
			$data['filter_name'] = '';
		}

		// Parent
		$url = '';

		if (isset($this->request->get['directory'])) {
			$pos = strrpos($this->request->get['directory'], '/');

			if ($pos) {
				$url .= '&directory=' . urlencode(substr($this->request->get['directory'], 0, $pos));
			}
		}

		if (isset($this->request->get['target'])) {
			$url .= '&target=' . $this->request->get['target'];
		}

		if (isset($this->request->get['thumb'])) {
			$url .= '&thumb=' . $this->request->get['thumb'];
		}

		if (isset($this->request->get['ckeditor'])) {
			$url .= '&ckeditor=' . $this->request->get['ckeditor'];
		}

		$data['parent'] = $this->url->link('common/filemanager.list', 'user_token=' . $this->session->data['user_token'] . $url);

		// Refresh
		$url = '';

		if (isset($this->request->get['directory'])) {
			$url .= '&directory=' . urlencode(html_entity_decode($this->request->get['directory'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['target'])) {
			$url .= '&target=' . $this->request->get['target'];
		}

		if (isset($this->request->get['thumb'])) {
			$url .= '&thumb=' . $this->request->get['thumb'];
		}

		if (isset($this->request->get['ckeditor'])) {
			$url .= '&ckeditor=' . $this->request->get['ckeditor'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['refresh'] = $this->url->link('common/filemanager.list', 'user_token=' . $this->session->data['user_token'] . $url);

		$url = '';

		if (isset($this->request->get['directory'])) {
			$url .= '&directory=' . urlencode(html_entity_decode($this->request->get['directory'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['target'])) {
			$url .= '&target=' . $this->request->get['target'];
		}

		if (isset($this->request->get['thumb'])) {
			$url .= '&thumb=' . $this->request->get['thumb'];
		}

		if (isset($this->request->get['ckeditor'])) {
			$url .= '&ckeditor=' . $this->request->get['ckeditor'];
		}

		// Get total number of files and directories
		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $total,
			'page' => $page,
			'limit' => $limit,
			'url' => $this->url->link('common/filemanager.list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}')
		]);

		$this->response->setOutput($this->load->view('common/filemanager_list', $data));
	}

	/**
	 * @return void
	 */

	public function uploadFromURL(): void
	{
		$this->load->language('common/filemanager');

		if (!$this->user->hasPermission('modify', 'common/filemanager')) {
			$json['error'] = $this->language->get('error_permission');
			$this->response->setOutput(json_encode($json));
			return;
		}

		if (isset($this->request->post['imgUrl'], $this->request->post['directory'])) {
			// Sanitize user input
			$imageUrl = filter_var($this->request->post['imgUrl'], FILTER_SANITIZE_URL);
			$directory = filter_var($this->request->post['directory'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$json = [];
			// Validate directory format
			if (preg_match('/^[a-zA-Z0-9_\/]+$/', $directory)) {
				// Fetch image content
				$imageUrl = html_entity_decode($imageUrl);
				$imageContent = file_get_contents($imageUrl);
				// If image content is successfully fetched
				if ($imageContent !== false) {
					// Get image size information
					$imageSize = getimagesizefromstring($imageContent);
					// Extract file extension from image type
					$extension = image_type_to_extension($imageSize[2], false);
					if ($extension === 'jpeg') {
						$extension = 'jpg'; // Adjust extension format to match commonly used convention
					}
					// Generate filename
					$filename = "pasted_" . substr(md5($imageUrl), 0, 10) . '.' . $extension;
					// Construct absolute path
					$base = DIR_IMAGE . 'catalog/' . $directory . $filename;
					// Save image content to file
					file_put_contents($base, $imageContent);
					$json['filename'] = $filename;
				} else {
					$json['error'] = 'Failed to fetch image content.';
				}
			} else {
				$json['error'] = 'Invalid directory format.';
			}
		} else {
			$json['error'] = 'Required parameters are missing.';
		}

		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function upload(): void
	{
		$this->load->language('common/filemanager');

		$json = [];
		$files = [];
		$ckeditor = false;
		$base = DIR_IMAGE . 'catalog/';

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'common/filemanager')) {
			$json['error'] = $this->language->get('error_permission');
		}

		// Make sure we have the correct directory
		if (isset($this->request->get['directory'])) {
			$directory = $base . html_entity_decode($this->request->get['directory'], ENT_QUOTES, 'UTF-8') . '/';
		} else {
			$directory = $base;
		}

		// Check it's a directory
		if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)) . '/', 0, strlen($base)) != $base) {
			$json['error'] = $this->language->get('error_directory');
		}

		if (!$json) {
			// Check if multiple files are uploaded or just one


			if (!empty($this->request->files['file']['name']) && is_array($this->request->files['file']['name'])) {
				foreach (array_keys($this->request->files['file']['name']) as $key) {
					$files[] = [
						'name' => $this->request->files['file']['name'][$key],
						'type' => $this->request->files['file']['type'][$key],
						'tmp_name' => $this->request->files['file']['tmp_name'][$key],
						'error' => $this->request->files['file']['error'][$key],
						'size' => $this->request->files['file']['size'][$key]
					];
				}
			}

			foreach ($files as $file) {
				if (is_file($file['tmp_name'])) {
					// Sanitize the filename
					$filename = preg_replace('/[\/\\\\?%*:|"<>]/', '', basename(html_entity_decode($file['name'], ENT_QUOTES, 'UTF-8')));

					// Validate the filename length
					if ((oc_strlen($filename) < 4) || (oc_strlen($filename) > 255)) {
						$json['error'] = $this->language->get('error_filename');
					}

					// Allowed file extension types
					$allowed = [
						'ico',
						'jpg',
						'jpeg',
						'png',
						'gif',
						'avif',
						'webp',
						'JPG',
						'JPEG',
						'PNG',
						'GIF',
						'avi',
						'mp4',
						'mkv'
					];

					if (!in_array(substr($filename, strrpos($filename, '.') + 1), $allowed)) {
						$json['error'] = $this->language->get('error_file_type');
					}

					// Allowed file mime types
					$allowed = [
						'image/x-icon',
						'image/jpeg',
						'image/avif',
						'image/pjpeg',
						'image/png',
						'image/x-png',
						'image/gif',
						'video/mp4',
						'video/mkv',
						'video/webp',
						'video/avi',
						'image/webp'
					];

					if (!in_array($file['type'], $allowed)) {
						$json['error'] = $this->language->get('error_file_type');
					}

					// Return any upload error
					if ($file['error'] != UPLOAD_ERR_OK) {
						$json['error'] = $this->language->get('error_upload_' . $file['error']);
					}
				} else {
					$json['error'] = $this->get_upload_error_message($file['error']);
				}

				if (!$json) {
					move_uploaded_file($file['tmp_name'], $directory . $filename);
				}
			}
		}

		if (!$json) {

			$json['success'] = $this->language->get('text_uploaded');

		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	private function get_upload_error_message($error_code)
	{
		switch ($error_code) {
			case UPLOAD_ERR_INI_SIZE:
				return 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
			case UPLOAD_ERR_FORM_SIZE:
				return 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
			case UPLOAD_ERR_PARTIAL:
				return 'The uploaded file was only partially uploaded.';
			case UPLOAD_ERR_NO_FILE:
				return 'No file was uploaded.';
			case UPLOAD_ERR_NO_TMP_DIR:
				return 'Missing a temporary folder.';
			case UPLOAD_ERR_CANT_WRITE:
				return 'Failed to write file to disk.';
			case UPLOAD_ERR_EXTENSION:
				return 'A PHP extension stopped the file upload.';
			default:
				return 'Unknown upload error.';
		}
	}

	/**
	 * @return void
	 */
	public function folder(): void
	{
		$this->load->language('common/filemanager');

		$json = [];

		$base = DIR_IMAGE . 'catalog/';

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'common/filemanager')) {
			$json['error'] = $this->language->get('error_permission');
		}

		// Make sure we have the correct directory
		if (isset($this->request->get['directory'])) {
			$directory = $base . html_entity_decode($this->request->get['directory'], ENT_QUOTES, 'UTF-8') . '/';
		} else {
			$directory = $base;
		}

		// Check its a directory
		if (!is_dir($directory) || substr(str_replace('\\', '/', realpath($directory)) . '/', 0, strlen($base)) != $base) {
			$json['error'] = $this->language->get('error_directory');
		}

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			// Sanitize the folder name
			$folder = preg_replace('/[\/\\\\?%*&:|"<>]/', '', basename(html_entity_decode($this->request->post['folder'], ENT_QUOTES, 'UTF-8')));

			// Validate the filename length
			if ((oc_strlen($folder) < 3) || (oc_strlen($folder) > 128)) {
				$json['error'] = $this->language->get('error_folder');
			}

			// Check if directory already exists or not
			if (is_dir($directory . $folder)) {
				$json['error'] = $this->language->get('error_exists');
			}
		}

		if (!$json) {
			mkdir($directory . '/' . $folder, 0777);

			chmod($directory . '/' . $folder, 0777);

			@touch($directory . '/' . $folder . '/' . 'index.html');

			$json['success'] = $this->language->get('text_directory');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function delete(): void
	{
		$this->load->language('common/filemanager');

		$json = [];

		$base = DIR_IMAGE . 'catalog/';

		// Check user has permission
		if (!$this->user->hasPermission('modify', 'common/filemanager')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (isset($this->request->post['path'])) {
			$paths = $this->request->post['path'];
		} else {
			$paths = [];
		}

		// Loop through each path to run validations
		foreach ($paths as $path) {
			// Convert any html encoded characters.
			$path = html_entity_decode($path, ENT_QUOTES, 'UTF-8');

			// Check path exists
			if (($path == $base) || (substr(str_replace('\\', '/', realpath($base . $path)) . '/', 0, strlen($base)) != $base)) {
				$json['error'] = $this->language->get('error_delete');

				break;
			}
		}

		if (!$json) {
			// Loop through each path
			foreach ($paths as $path) {
				$path = rtrim($base . html_entity_decode($path, ENT_QUOTES, 'UTF-8'), '/');

				$files = [];

				// Make path into an array
				$directory = [$path];

				// While the path array is still populated keep looping through
				while (count($directory) != 0) {
					$next = array_shift($directory);

					if (is_dir($next)) {
						foreach (glob(trim($next, '/') . '/{*,.[!.]*,..?*}', GLOB_BRACE) as $file) {
							// If directory add to path array
							$directory[] = $file;
						}
					}

					// Add the file to the files to be deleted array
					$files[] = $next;
				}

				// Reverse sort the file array
				rsort($files);

				foreach ($files as $file) {
					// If file just delete
					if (is_file($file)) {


						// Get the file extension and base name
						$fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
						$baseName = pathinfo($file, PATHINFO_FILENAME);

						// Check if the file is a video
						if (in_array($fileExtension, ['mp4', 'mkv', 'avi'])) {
							$screenshotFile = dirname($file) . DIRECTORY_SEPARATOR . $baseName . '.png';

							// Delete screenshot if it exists
							if (is_file($screenshotFile)) {
								unlink($screenshotFile);
							}
						}
						unlink($file);
					}

					// If directory use the remove directory function
					if (is_dir($file)) {
						$this->deleteDirectory($file);
					}
				}
			}

			$json['success'] = $this->language->get('text_delete');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	private function deleteDirectory(string $dir): bool
	{
		if (!is_dir($dir)) {
			return false;
		}

		$items = scandir($dir);
		foreach ($items as $item) {
			if ($item === '.' || $item === '..') {
				continue;
			}

			$path = $dir . DIRECTORY_SEPARATOR . $item;
			if (is_dir($path)) {
				// Recursively delete subdirectories
				$this->deleteDirectory($path);
			} else {
				// Delete file
				unlink($path);
			}
		}

		// Remove the directory itself
		return rmdir($dir);
	}
}
