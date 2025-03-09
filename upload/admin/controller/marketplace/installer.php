<?php
namespace Ventocart\Admin\Controller\Marketplace;
/**
 * Class Installer
 *
 * @package Ventocart\Admin\Controller\Marketplace
 */
class Installer extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('marketplace/installer');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('marketplace/installer', 'user_token=' . $this->session->data['user_token'])
		];

		// Use the  for the max file size
		$data['error_upload_size'] = sprintf($this->language->get('error_file_size'), ini_get('upload_max_filesize'));

		$data['config_file_max_size'] = ((int) preg_filter('/[^0-9]/', '', ini_get('upload_max_filesize')) * 1024 * 1024);

		$data['upload'] = $this->url->link('tool/installer.upload', 'user_token=' . $this->session->data['user_token']);

		$data['list'] = $this->getList();

		if (isset($this->request->get['filter_extension_id'])) {
			$data['filter_extension_download_id'] = (int) $this->request->get['filter_extension_download_id'];
		} else {
			$data['filter_extension_download_id'] = '';
		}

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('marketplace/installer', $data));
	}


	/* 
																																																																																																																																																																																																																																																																																																											Extracts an theme out into a zip file
																																																																																																																																																																																																																																																																																																											*/

	public function downloadTheme(): void
	{
		$code = $this->request->get['code'];

		// Define the theme directory
		$themeDir = DIR_VENTOCART . '/themes/' . $code;

		// Check if the theme directory exists
		if (!is_dir($themeDir)) {
			throw new \Exception("Theme directory not found: {$themeDir}");
		}

		// Define the output zip file
		$zipFileName = DIR_CACHE . '/' . $code . '.vetheme.zip';

		// Prepare a zip file
		$zip = new \ZipArchive();

		if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
			// Add theme directory contents to the zip file
			$iterator = new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator($themeDir, \FilesystemIterator::SKIP_DOTS),
				\RecursiveIteratorIterator::SELF_FIRST
			);

			foreach ($iterator as $file) {
				$filePath = $file->getPathname();
				$relativePath = 'themes/' . $code . '/' . substr($filePath, strlen($themeDir) + 1);

				if ($file->isFile()) {
					$zip->addFile($filePath, $relativePath);
				} elseif ($file->isDir()) {
					$zip->addEmptyDir($relativePath);
				}
			}

			$zip->close();

			// Output the zip file for download
			header('Content-Type: application/zip');
			header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
			header('Content-Length: ' . filesize($zipFileName));
			readfile($zipFileName);

			// Cleanup
			unlink($zipFileName);
		} else {
			throw new \Exception('Could not create zip file.');
		}
	}
	/* 
																																																																																																																																																																																																																																																																																																														Extracts an extension out into a zip file
																																																																																																																																																																																																																																																																																																												  */
	public function download(): void
	{
		$code = $this->request->get['code'];
		$this->load->model('setting/extension');
		$install_info = $this->model_setting_extension->getInstallByCode($code);

		if (!$install_info) {
			$install_info['name'] = $code;
			$install_info['code'] = $code;
			$install_info['version'] = "1.0.0";
			$install_info['author'] = "Good Joe";
			$install_info['link'] = "https://ventocart.com";
		}

		$adminDir = str_replace(DIR_VENTOCART, '', DIR_APPLICATION);
		$pathsToZip = [];
		$zipFileName = DIR_CACHE . '/' . $code . '.vemod.zip';

		// Create the install.json file contents
		$installJsonContent = json_encode([
			'name' => str_replace('Ext: ', '', $install_info['name']) ?? '',
			'code' => $install_info['code'] ?? '',
			'license' => 'GPL',
			'version' => $install_info['version'] ?? '1.0.0',
			'author' => $install_info['author'] ?? '',
			'link' => $install_info['link'] ?? '',
		], JSON_PRETTY_PRINT);

		// Recursive function to scan directories
		$iterator = new \RecursiveIteratorIterator(
			new \RecursiveDirectoryIterator(DIR_VENTOCART, \FilesystemIterator::SKIP_DOTS),
			\RecursiveIteratorIterator::SELF_FIRST
		);

		// Search for matching directories
		foreach ($iterator as $file) {
			if ($file->isDir() && strpos($file->getPathname(), "/extension/{$code}/") !== false) {
				$pathsToZip[] = $file->getPathname();
			}
		}

		// Prepare a zip file
		$zip = new \ZipArchive();

		if ($zip->open($zipFileName, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === true) {
			// Add install.json to the root of the zip
			$zip->addFromString('install.json', $installJsonContent);

			foreach ($pathsToZip as $path) {
				$relativePath = str_replace(DIR_VENTOCART, '', $path);

				// Adjust relative paths for admin directory
				if (strpos($path, DIR_VENTOCART . $adminDir) === 0) {
					$relativePath = str_replace($adminDir, 'admin', $relativePath);
				}

				// Add the directory to the zip file
				$iterator = new \RecursiveIteratorIterator(
					new \RecursiveDirectoryIterator($path, \FilesystemIterator::SKIP_DOTS),
					\RecursiveIteratorIterator::SELF_FIRST
				);

				foreach ($iterator as $file) {
					$filePath = $file->getPathname();
					$localPath = str_replace(DIR_VENTOCART, '', $filePath);

					// Ensure the local path reflects 'admin' if under adminDir
					if (strpos($filePath, DIR_VENTOCART . $adminDir) === 0) {
						$localPath = "/" . str_replace($adminDir, 'admin/', $localPath);
					}

					// Add files while ensuring relative paths
					if ($file->isFile()) {
						$zip->addFile($filePath, $localPath);
					}
				}
			}

			$zip->close();

			// Output the zip file for download
			header('Content-Type: application/zip');
			header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
			header('Content-Length: ' . filesize($zipFileName));
			readfile($zipFileName);

			// Cleanup
			unlink($zipFileName);
		} else {
			throw new \Exception('Could not create zip file.');
		}
	}


	/**
	 * @return void
	 */
	public function list(): void
	{
		$this->load->language('marketplace/installer');

		$this->response->setOutput($this->getList());
	}

	/**
	 * @return string
	 */
	public function getList(): string
	{
		$this->load->language('marketplace/installer');

		// Retrieve GET parameters or set default values
		$filter_extension_download_id = isset($this->request->get['filter_extension_download_id']) ? (int) $this->request->get['filter_extension_download_id'] : '';
		$sort = isset($this->request->get['sort']) ? (string) $this->request->get['sort'] : 'name';
		$order = isset($this->request->get['order']) ? (string) $this->request->get['order'] : 'ASC';
		$page = isset($this->request->get['page']) ? (int) $this->request->get['page'] : 1;

		$this->load->model('setting/extension');

		// Look for both .vemod.zip and .vetheme.zip files
		$files = glob(DIR_STORAGE . 'marketplace/*.zip');

		foreach ($files as $file) {
			// Extract base name based on extension
			if (substr($file, -9) === '.vemod.zip') {
				$code = basename($file, '.vemod.zip');
			} elseif (substr($file, -10) === '.vetheme.zip') {
				$code = basename($file, '.vetheme.zip');
			} else {
				continue;  // Skip files that don't match the expected extensions
			}

			$install_info = $this->model_setting_extension->getInstallByCode($code);

			if (!$install_info) {
				// Unzip the files
				$zip = new \ZipArchive();

				if ($zip->open($file, \ZipArchive::RDONLY)) {
					$install_info = json_decode($zip->getFromName('install.json'), true);

					if ($install_info) {
						$keys = [
							'extension_id',
							'extension_download_id',
							'name',
							'description',
							'code',
							'version',
							'author',
							'link'
						];

						foreach ($keys as $key) {
							if (!isset($install_info[$key])) {
								$install_info[$key] = '';
							}
						}

						$extension_data = [
							'extension_id' => $install_info['extension_id'],
							'extension_download_id' => $install_info['extension_download_id'],
							'name' => strip_tags($install_info['name']),
							'description' => nl2br(strip_tags($install_info['description'])),
							'code' => $code,
							'version' => $install_info['version'],
							'author' => $install_info['author'],
							'link' => $install_info['link']
						];

						$this->model_setting_extension->addInstall($extension_data);
					}

					$zip->close();
				}
			}
		}

		// Setup data for rendering
		$data['extensions'] = [];

		$filter_data = [
			'filter_extension_download_id' => $filter_extension_download_id,
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_pagination_admin'),
			'limit' => $this->config->get('config_pagination_admin')
		];

		$results = $this->model_setting_extension->getInstalls($filter_data);

		foreach ($results as $result) {
			if ($result['extension_id']) {
				$link = $this->url->link('marketplace/marketplace.info', 'user_token=' . $this->session->data['user_token'] . '&extension_id=' . $result['extension_id']);
			} elseif ($result['link']) {
				$link = $result['link'];
			} else {
				$link = '';
			}
			if (substr($result['name'], 0, 6) === "Theme:") {
				$downMethod = 'downloadTheme';
			} else {
				$downMethod = 'download';
			}
			$data['extensions'][] = [
				'extension_install_id' => $result['extension_install_id'],
				'name' => $result['name'],
				'description' => $result['description'],
				'code' => $result['code'],
				'version' => $result['version'],
				'author' => $result['author'],
				'status' => $result['status'],
				'link' => $link,
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'download' => $this->url->link('marketplace/installer.' . $downMethod, 'user_token=' . $this->session->data['user_token'] . '&code=' . $result['code']),
				'install' => $this->url->link('marketplace/installer.install', 'user_token=' . $this->session->data['user_token'] . '&extension_install_id=' . $result['extension_install_id']),
				'uninstall' => $this->url->link('marketplace/installer.uninstall', 'user_token=' . $this->session->data['user_token'] . '&extension_install_id=' . $result['extension_install_id']),
				'delete' => $this->url->link('marketplace/installer.delete', 'user_token=' . $this->session->data['user_token'] . '&extension_install_id=' . $result['extension_install_id'])
			];
		}

		// Sorting URLs
		$url = '';
		if (isset($this->request->get['filter_extension_id'])) {
			$url .= '&filter_extension_id=' . $this->request->get['filter_extension_id'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		$data['sort_name'] = $this->url->link('marketplace/installer.list', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url);
		$data['sort_version'] = $this->url->link('marketplace/installer.list', 'user_token=' . $this->session->data['user_token'] . '&sort=version' . $url);
		$data['sort_date_added'] = $this->url->link('marketplace/installer.list', 'user_token=' . $this->session->data['user_token'] . '&sort=date_added' . $url);

		$extension_total = $this->model_setting_extension->getTotalInstalls($filter_data);

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $extension_total,
			'page' => $page,
			'limit' => $this->config->get('config_pagination_admin'),
			'url' => $this->url->link('marketplace/installer.list', 'user_token=' . $this->session->data['user_token'] . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($extension_total) ? (($page - 1) * $this->config->get('config_pagination_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_pagination_admin')) > ($extension_total - $this->config->get('config_pagination_admin'))) ? $extension_total : ((($page - 1) * $this->config->get('config_pagination_admin')) + $this->config->get('config_pagination_admin')), $extension_total, ceil($extension_total / $this->config->get('config_pagination_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		return $this->load->view('marketplace/installer_extension', $data);
	}


	/**
	 * @return void
	 */
	public function upload(): void
	{
		$this->load->language('marketplace/installer');
		$this->load->model('setting/extension');
		$json = [];
		$code = '';
		$theme = false;

		// 1. Validate the file uploaded.
		if (isset($this->request->files['file']['name'])) {
			$filename = basename($this->request->files['file']['name']);
			$filename = str_replace('.ocmod', '.vemod', $filename);
			// Check the file extension
			if (substr($filename, -10) == '.vemod.zip') {
				$code = basename($filename, '.vemod.zip');
			} elseif (substr($filename, -12) == '.vetheme.zip') {
				$code = basename($filename, '.vetheme.zip');
				$theme = true;  // Set theme to true
			} else {

				$json['error'] = $this->language->get('error_file_type');
			}
			$code = strtolower($code);
			// 2. Validate the filename length.
			if ((oc_strlen($filename) < 1) || (oc_strlen($filename) > 128)) {
				$json['error'] = $this->language->get('error_filename');
			}

			// 4. Check if there is already a file with the same name.
			$file = DIR_STORAGE . 'marketplace/' . $filename;

			if (is_file($file)) {
				unlink($file);
			}

			if ($this->request->files['file']['error'] != UPLOAD_ERR_OK) {
				$json['error'] = $this->language->get('error_upload_' . $this->request->files['file']['error']);
			}

			if ($this->model_setting_extension->getInstallByCode($code)) {
				$json['error'] = $this->language->get('error_installed');
			}
		} else {
			$json['error'] = $this->language->get('error_upload');
		}

		// 5. Validate if the file can be opened and there is install.json that can be read (unless it's a theme).
		if (!$json) {
			move_uploaded_file($this->request->files['file']['tmp_name'], $file);

			// Unzip the files
			$zip = new \ZipArchive();
			if (!$theme) {
				if ($zip->open($file, \ZipArchive::RDONLY)) {
					$install_info = json_decode($zip->getFromName('install.json'), true);
					$keys = [
						'extension_id',
						'extension_download_id',
						'name',
						'description',
						'code',
						'version',
						'author',
						'link'
					];
					if (!$install_info) {


						$install_info = [
							'name' => ucfirst($code),
							'description' => $code,
							'code' => $code,
							'version' => "1.0",
							'author' => 'VentoCart',
							'link' => 'http://ventocart.com',
						];
					}
					foreach ($keys as $key) {
						if (!isset($install_info[$key])) {
							$install_info[$key] = '';
						}
					}


					$zip->close();
				} else {
					$json['error'] = $this->language->get('error_unzip');
				}
			} else {
				// If it's a theme, don't require install.json, just use the theme code
				$install_info = [
					'name' => 'Theme: ' . $code,  // Generic name for the theme
					'description' => 'Theme installation',  // Generic description
					'version' => '1.0',  // Default version
					'author' => 'Unknown',  // Default author
					'link' => '',  // No specific link for the theme
				];
			}
		}

		// If no errors, proceed with the installation.
		if (!$json) {
			$extension_data = [
				'extension_id' => 0,
				'extension_download_id' => 0,
				'name' => $theme ? "Theme: " . $install_info['name'] : "Ext: " . $install_info['name'],
				'description' => $install_info['description'],
				'code' => $code,
				'version' => $install_info['version'],
				'author' => $install_info['author'],
				'link' => $install_info['link']
			];

			// Add the extension installation record
			$instid = $this->model_setting_extension->addInstall($extension_data);

			// If it's being installed immediately, call the install method
			if (isset($this->request->get['install'])) {

				$this->request->get['extension_install_id'] = $instid;
				$this->install();
			}

			$json['success'] = $this->language->get('text_upload');
		}

		// Return the response in JSON format
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}


	/**
	 * @return void
	 */
	public function install(): void
	{
		$this->load->language('marketplace/installer');

		$json = [];

		$extension_install_id = $this->request->get['extension_install_id'] ?? 0;
		$page = $this->request->get['page'] ?? 1;

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/extension');

		$extension_install_info = $this->model_setting_extension->getInstall((int) $extension_install_id);

		if ($extension_install_info) {
			// Check if it's a theme or extension file
			$file = DIR_STORAGE . 'marketplace/' . $extension_install_info['code']; // Default file path

			if (substr($extension_install_info['name'], 0, 6) === "Theme:") {
				// It is a theme
				$is_theme = true;
				$file .= '.vetheme.zip'; // Set the file path for the theme
			} else {
				// It is not a theme (likely an extension)
				$is_theme = false;
				$file .= '.vemod.zip'; // Set the file path for the extension
			}

			if (!is_file($file)) {
				$json['error'] = sprintf($this->language->get('error_file'), $file); // Show correct file name
			}

			$admin_path = rtrim(str_replace(DIR_VENTOCART, '', DIR_APPLICATION), '/');


		} else {
			$json['error'] = $this->language->get('error_extension');
		}
		if (!$json) {
			$zip = new \ZipArchive();
			$filelist = [];
			$code = strtolower($extension_install_info['code']);
			if ($zip->open($file, \ZipArchive::RDONLY)) {
				$total = $zip->numFiles;
				$limit = 200;

				$start = ($page - 1) * $limit;
				$end = $start > ($total - $limit) ? $total : ($start + $limit);

				// Flag to check if /upload/ folder exists
				$root_is_upload = false;

				// Iterate through the files to check if there's a /upload/ directory
				for ($i = 0; $i < $total; $i++) {
					$source = $zip->getNameIndex($i);
					$source = str_replace('\\', '/', $source); // Normalize slashes

					// Check if the file path starts with 'upload/'
					if (strpos($source, 'upload/') === 0) {
						$root_is_upload = true;
						break; // No need to check further once we find the upload folder
					}
				}

				// Now process the ZIP files based on the existence of the /upload/ root folder
				for ($i = $start; $i < $end; $i++) {
					$source = $zip->getNameIndex($i);
					$source = str_replace('\\', '/', $source); // Normalize slashes

					// If the root is "upload", remove it from the source path
					if ($root_is_upload) {
						// Remove 'upload/' from the start of the path
						$source = substr($source, 6); // Skip the "upload/" prefix
					}

					//check for system library or other 
					$expl = explode("/", ltrim($source, '/'));
					$issystem = false;
					if (($expl[0] == "system" || $expl[0] == "library") && $expl[1] != "extension") {
						$source = str_replace('system/', "/system/extension/$code/", $source);
						$issystem = true;

					}
					if (isset($expl[3]) && ($expl[1] == "language") && $expl[3] != "extension") {
						$source = str_replace($expl[2], '', $source);
						$source = str_replace('language/', "language/" . $expl[2] . "/extension/$code", $source);



					}

					$sourceb = $source;
					$source = str_replace('admin/view/template', 'admin/view/default/plates/extension/' . $code, $source);
					if ($sourceb != $source) {
						$source = str_replace("$code/extension", "$code/", $source);
					}
					if (
						str_replace('admin/view/', '', $source) != $source &&
						str_replace('admin/view/default/plates', '', $source) == $source
					) {
						$source = str_replace('admin/view', 'admin/view/default/assets/extension/' . $code, $source);
					}
					$source = str_replace('catalog/view/theme/default/template', 'themes/default/plates/extension/' . $code, $source);

					$source = str_replace('catalog/view/template', 'themes/default/plates/extension/' . $code, $source);


					if (
						str_replace('catalog/view/', '', $source) != $source &&
						str_replace('catalog/view/default/plates', '', $source) == $source
					) {
						$source = str_replace('catalog/view', 'themes/default/assets/extension/' . $code, $source);
					}

					// If it's not part of the theme directory, continue as usual
					if ($is_theme) {
						// For theme files, we only want to extract certain directories (themes/code/plates, themes/code/assets, etc.)
						if (strpos($source, "themes/") === 0) {
							// Remove the 'theme/' part and extract into the appropriate theme directory in Ventocart
							$target_path = DIR_VENTOCART . "/themes/" . substr($source, 6); // Skip the "theme/" prefix

							// Create directory if it doesn't exist
							if (substr($target_path, -1) == '/') {
								if (!is_dir($target_path)) {
									mkdir($target_path, 0777, true);
								}
							} else {
								// Extract the file
								$contents = $zip->getFromIndex($i);
								if ($contents !== false) {
									file_put_contents($target_path, $contents);
								}
							}

						} else {
							// If it's not part of the theme directory, skip it
							continue;
						}
					} else {
						// For extensions, process as usual

						if ($source === 'install.json') {
							continue;
						}

						if (substr(ltrim(trim($source), '/'), 0, 5) == "admin") {
							$source = $admin_path . substr(ltrim(trim($source), '/'), 5);
						}
						// Remove any _ from the filenames

						if (preg_match('#/(controller|model|view|language)/#i', $source) && substr($source, -4) === '.php') {
							// Extract the file name and path
							$file_info = pathinfo($source);

							// Replace underscores in the filename

							$new_filename = str_replace('_', '', $file_info['filename']);

							// Rebuild the full path with the modified filename
							$source = $file_info['dirname'] . '/' . $new_filename . '.' . $file_info['extension'];

						}

						// Target path in Ventocart structure
						$target_path = DIR_VENTOCART . $source;
					}


					// OpenCart 2, no stray files in /controller/type, instead /extension/name/type
					if (str_replace("/controller/extension", "", $target_path) == $target_path) {
						$target_path = str_replace("/controller", "/controller/extension/$code/", $target_path);
					}
					if (str_replace("/model/extension", "", $target_path) == $target_path) {
						$target_path = str_replace("/model", "/model/extension/$code/", $target_path);
					}

					// OpenCart 3 compatibility, no stray files in /extension/type/ instead /extension/name/type/
					if (str_replace("extension/$code", '', $target_path) == $target_path) {
						$target_path = str_replace('extension/', "extension/$code/", $target_path);
					}


					if (str_replace("catalog/view", '', $target_path) != $target_path) {
						continue;
					}
					// Create directory if it doesn't exist
					if (substr($source, -1) == '/') {
						if (!is_dir($target_path)) {
							mkdir($target_path, 0777, true);
						}
					} else {
						// Extract the file
						$contents = $zip->getFromIndex($i);
						if ($contents !== false) {
							$targetDir = dirname($target_path);
							if (!is_dir($targetDir)) {
								if (!mkdir($targetDir, 0777, true) && !is_dir($targetDir)) {
									throw new \RuntimeException("Failed to create directory: $targetDir");
								}
							}

							if (preg_match('#/(controller|model|view|language)/#i', $target_path) && !$issystem) {

								$target_path = strtolower($target_path);
								if (strpos($target_path, '/view/') !== false && pathinfo($target_path, PATHINFO_EXTENSION) === 'tpl') {
									// Replace .tpl with .php
									$target_path = preg_replace('/\.tpl$/i', '.php', $target_path);
									$filename = pathinfo($target_path, PATHINFO_FILENAME);
									$filename = str_replace('_', '', $filename);

									// Replace .tpl with .php and update the filename
									$target_path = dirname($target_path) . '/' . $filename . '.php';
								}
								$target_path = str_replace('//', '/', $target_path);
								$target_path = str_replace('//', '/', $target_path);
								$filelist[] = $target_path;
							}

							file_put_contents($target_path, $contents);

						}
					}


				}

				$zip->close();

				// Update the extension status to installed
				$this->model_setting_extension->editStatus($extension_install_id, 1);
			} else {
				$json['error'] = $this->language->get('error_unzip');
			}
		}



		if (!$json) {
			if (!$is_theme) {
				$this->sanitizeExtension($filelist, $code);
			}
			$json['text'] = sprintf($this->language->get('text_install'), $start, $end, $total);

			$url = '';

			if (isset($this->request->get['extension_install_id'])) {
				$url .= '&extension_install_id=' . $this->request->get['extension_install_id'];
			}

			if ($end < $total) {
				$json['next'] = $this->url->link('marketplace/installer.install', 'user_token=' . $this->session->data['user_token'] . $url . '&page=' . ($page + 1), true);
			} else {
				$json['next'] = $this->url->link('marketplace/installer.xml', 'user_token=' . $this->session->data['user_token'] . $url, true);
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}



	private function sanitizeExtension($filelist, $code)
	{

		// Loop through each file in the file list

		foreach ($filelist as $file) {
			if (in_array(pathinfo($file, PATHINFO_EXTENSION), ['php', 'twig'])) {
				if (preg_match('#/(controller|model|view)/#i', $file)) {
					$content = file_get_contents($file);
					// Lets start by fixing the template paths
					$admin_path = rtrim(str_replace(DIR_VENTOCART, '', DIR_APPLICATION), '/');
					// For styles
					$pattern1 = '/\.\.\/extension\/(\w+)\/admin\/view\/(.*)/i';
					$replacement1 = "/" . $admin_path . '/view/default/assets/extension/$1/$2';
					$content = preg_replace($pattern1, $replacement1, $content);

					// Pattern 2: catalog/view/stylesheet/ to theme/default/assets/extension/$code/
					$pattern2 = '/extension\/(\w+)\/catalog\/view\/(.*?)/i';  // Non-greedy match for any characters after the path
					$replacement2 = 'themes/default/assets/extension/$1/$2';
					$content = preg_replace($pattern2, $replacement2, $content);

					//$content = str_ireplace($code, ucfirst($code), $content);
					$content = str_replace('catalog/view/javascript/', 'themes/default/assets/core/js/', $content);
					$content = str_replace('catalog/view/stylesheet/', 'themes/default/assets/core/css/', $content);
					file_put_contents($file, $content);
				}

			}
			// Check if it's a PHP file and it is in "controller/" or "model/"
			if (
				pathinfo($file, PATHINFO_EXTENSION) === 'php' &&
				(strpos($file, 'controller/') !== false || strpos($file, 'model/') !== false)
			) {

				// Read the file content
				$content = file_get_contents($file);

				// Rule 1: If it already has "namespace Ventocart", skip it
				if (strpos($content, 'namespace Ventocart\\') !== false) {
					continue;  // Skip to the next file
				}

				// Rule 2: If it has "namespace Opencart", replace it with "namespace Ventocart"
				if (strpos($content, 'namespace Opencart\\') !== false) {
					$content = str_replace('namespace Opencart\\', 'namespace Ventocart\\', $content);
					$content = str_replace('\Opencart', '\Ventocart', $content);

					// handle system
					$content = str_replace("$code/system/", "", $content);

					$content = str_replace('DIR_EXTENSION', 'DIR_SYSTEM . "extension/' . $code . '/"', $content);
					file_put_contents($file, $content); // Save the file with the new namespace
					continue; // Skip to the next file
				}

				// Rule 3: If no namespaces were found, handle based on controller or model path
				$classPath = '';
				$hasSomething = false;
				if (strpos($file, 'controller/') !== false) {
					$hasSomething = "Controller";
				}
				if (strpos($file, 'model/') !== false) {
					$hasSomething = "Model";
				}
				if ($hasSomething) {
					// Controller files: Modify namespace path according to the controller structure
					$admin = rtrim(str_replace(DIR_VENTOCART, "", DIR_APPLICATION), '/');
					$classPath = str_replace($admin, "Admin", $file);
					$classPath = str_replace(DIR_VENTOCART, '', dirname($classPath)); // Get directory path without DIR_VENTOCART
					$classPath = 'Ventocart\\' . str_replace(['_', '/'], ['', '\\'], ucwords($classPath, '_/'));
					$classPathEnd = explode("\\", $classPath);
					$classPathEnd = end($classPathEnd);
					$classPath = str_replace('\\\\', '\\', $classPath);

					// Replace class name and insert the namespace
					$content = str_replace('class ' . $hasSomething, 'class ', $content); // OC 2
					$content = str_replace('class Extension' . $classPathEnd, 'class ', $content); // OC 3
					$content = str_replace('extends ' . $hasSomething, "extends \Ventocart\System\Engine\\" . $hasSomething, $content);
					$content = str_replace('<?php', "<?php \rnamespace " . $classPath . ";\r\r", $content);


					// Replace loads() to /extension/name/type/thing 
					$patterns = [
						'/view\([\'"]([^\'"]*extension[^\'"]+)[\'"]\)/',  // Match paths in view() starting with 'extension'
						'/language\([\'"]([^\'"]*extension[^\'"]+)[\'"]\)/',  // Match paths in language() starting with 'extension'
						'/model\([\'"]([^\'"]*extension[^\'"]+)[\'"]\)/',  // Match paths in model() starting with 'extension'
					];

					// Loop through patterns
					foreach ($patterns as $pattern) {
						// Find all matches in the content
						preg_match_all($pattern, $content, $matches);

						if (!empty($matches[1])) {
							foreach ($matches[1] as $match) {
								// Use a regex to ensure the path starts with 'extension/'
								if (preg_match('/^extension\//', $match)) {
									// Extract the last word from the path  
									$last_segmentf = basename($match);  // Get the last part of the path, filename

									$last_segment = str_replace('_', '', $last_segmentf);  // Remove underscores
									$content = str_replace($last_segmentf, strtolower($last_segment), $content);
									$rest_of_path = dirname($match);
									$new_path = "extension/$code" . substr($rest_of_path, 9) . "/" . strtolower($last_segment);
									$content = str_replace($match, $new_path, $content);
								}
							}
						}
					}
					$content = preg_replace_callback(
						'/\bclass\s+(\w+)/', // Match "class " followed by the class name
						function ($matches) {
							return 'class ' . ucfirst($matches[1]); // Capitalize the first letter of the class name
						},
						$content
					);
					$content = str_replace("'extension/", "'extension/$code/", $content);
					$content = str_replace('$this->model_extension_', '$this->model_extension_' . $code . "_", $content);
					$content = str_replace('$this->session->data[\'token\']', '$this->session->data[\'user_token\']', $content);
					$content = str_replace('\'token=', '\'user_token=', $content);
					$content = str_replace('.tpl', '', $content);
					$content = str_replace('DIR_EXTENSION', 'DIR_SYSTEM . "extension/' . $code . '/"', $content);
					$content = str_replace("DIR_SYSTEM", "DIR_SYSTEM . 'extension/$code/'", $content);

					// Save the modified file
					file_put_contents($file, $content);
				}
			}
		}
	}





	/**
	 * @return void
	 */
	public function xml(): void
	{
		$this->load->language('marketplace/installer');

		$json = [];

		if (isset($this->request->get['extension_install_id'])) {
			$extension_install_id = $this->request->get['extension_install_id'];
		} else {
			$extension_install_id = 0;
		}

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/extension');
		$is_theme = false;
		$extension_install_info = $this->model_setting_extension->getInstall($extension_install_id);
		if (substr($extension_install_info['name'], 0, 6) === "Theme:") {
			// It is a theme
			$is_theme = true;

		}

		if ($extension_install_info) {
			$file = DIR_STORAGE . 'marketplace/' . $extension_install_info['code'] . '.vemod.zip';
			if ($is_theme) {
				$file = DIR_STORAGE . 'marketplace/' . $extension_install_info['code'] . '.vetheme.zip';
			}

			if (!is_file($file)) {
				$json['error'] = sprintf($this->language->get('error_file'), $extension_install_info['code']);
			}
		} else {
			$json['error'] = $this->language->get('error_extension');
		}



		if (!$json) {
			$json['text'] = $this->language->get('text_vendor');

			$json['next'] = str_replace('&amp;', '&', $this->url->link('marketplace/installer.vendor', 'user_token=' . $this->session->data['user_token'], true));
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Generate new autoloader file
	 *
	 * @return void
	 */
	public function vendor(): void
	{
		$this->load->language('marketplace/installer');

		$json = [];

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (!$json) {
			// Generate php autoload file
			$code = '<?php' . "\n";

			$files = glob(DIR_STORAGE . 'vendor/*/*/composer.json');

			foreach ($files as $file) {
				$output = json_decode(file_get_contents($file), true);

				$code .= '// ' . $output['name'] . "\n";

				if (isset($output['autoload'])) {
					$directory = substr(dirname($file), strlen(DIR_STORAGE . 'vendor/'));

					// Autoload psr-4 files
					if (isset($output['autoload']['psr-4'])) {
						$autoload = $output['autoload']['psr-4'];

						foreach ($autoload as $namespace => $path) {
							if (!is_array($path)) {
								$code .= '$autoloader->register(\'' . rtrim($namespace, '\\') . '\', DIR_STORAGE . \'vendor/' . $directory . '/' . rtrim($path, '/') . '/' . '\', true);' . "\n";
							} else {
								foreach ($path as $value) {
									$code .= '$autoloader->register(\'' . rtrim($namespace, '\\') . '\', DIR_STORAGE . \'vendor/' . $directory . '/' . rtrim($value, '/') . '/' . '\', true);' . "\n";
								}
							}
						}
					}

					// Autoload psr-0 files
					if (isset($output['autoload']['psr-0'])) {
						$autoload = $output['autoload']['psr-0'];

						foreach ($autoload as $namespace => $path) {
							if (!is_array($path)) {
								$code .= '$autoloader->register(\'' . rtrim($namespace, '\\') . '\', DIR_STORAGE . \'vendor/' . $directory . '/' . rtrim($path, '/') . '/' . '\', true);' . "\n";
							} else {
								foreach ($path as $value) {
									$code .= '$autoloader->register(\'' . rtrim($namespace, '\\') . '\', DIR_STORAGE . \'vendor/' . $directory . '/' . rtrim($value, '/') . '/' . '\', true);' . "\n";
								}
							}
						}
					}

					// Autoload classmap
					if (isset($output['autoload']['classmap'])) {
						$autoload = [];

						$classmaps = $output['autoload']['classmap'];

						foreach ($classmaps as $classmap) {
							$directories = [dirname($file) . '/' . $classmap];

							while (count($directories) != 0) {
								$next = array_shift($directories);

								if (is_dir($next)) {
									foreach (glob(trim($next, '/') . '/{*,.[!.]*,..?*}', GLOB_BRACE) as $file) {
										if (is_dir($file)) {
											$directories[] = $file . '/';
										}

										if (is_file($file)) {
											$namespace = substr(dirname($file), strlen(DIR_STORAGE . 'vendor/' . $directory . $classmap) + 1);

											if ($namespace) {
												$autoload[$namespace] = substr(dirname($file), strlen(DIR_STORAGE . 'vendor/'));
											}
										}
									}
								}
							}
						}

						foreach ($autoload as $namespace => $path) {
							$code .= '$autoloader->register(\'' . rtrim($namespace, '\\') . '\', DIR_STORAGE . \'vendor/' . rtrim($path, '/') . '/' . '\', true);' . "\n";
						}
					}

					// Autoload files
					if (isset($output['autoload']['files'])) {
						$files = $output['autoload']['files'];

						foreach ($files as $file) {
							$code .= 'if (is_file(DIR_STORAGE . \'vendor/' . $directory . '/' . $file . '\')) {' . "\n";
							$code .= '	require_once(DIR_STORAGE . \'vendor/' . $directory . '/' . $file . '\');' . "\n";
							$code .= '}' . "\n";
						}
					}
				}

				$code .= "\n";
			}

			file_put_contents(DIR_SYSTEM . 'vendor.php', trim($code));

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Uninstall
	 *
	 * @return void
	 */
	public function uninstall(): void
	{
		$this->load->language('marketplace/installer');

		$json = [];
		$admin_path = rtrim(str_replace(DIR_VENTOCART, '', DIR_APPLICATION), '/');
		$extension_install_id = $this->request->get['extension_install_id'] ?? 0;

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/extension');

		$extension_install_info = $this->model_setting_extension->getInstall((int) $extension_install_id);

		if ($extension_install_info) {
			if ($extension_install_info['code'] === 'ventocart') {
				$json['error'] = $this->language->get('error_default');
			}

			$extension_total = $this->model_setting_extension->getTotalExtensionsByExtension($extension_install_info['code']);

			if ($extension_total) {
				$json['error'] = sprintf($this->language->get('error_uninstall'), $extension_total);
			}
		} else {
			$json['error'] = $this->language->get('error_extension');
		}

		if (!$json) {
			$extension_code = $extension_install_info['code'];

			$target_dirs = [];



			$baseDir = DIR_VENTOCART; // Base directory to search

			// Use Recursive Directory Iterator to search all subdirectories
			$iterator = new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator($baseDir, \FilesystemIterator::SKIP_DOTS),
				\RecursiveIteratorIterator::SELF_FIRST
			);
			$extension_code = strtolower($extension_code);
			foreach ($iterator as $file) {



				if ($file->isDir() && strpos($file->getPathname(), "/extension/{$extension_code}/") !== false) {
					$path = explode("/extension/{$extension_code}/", $file->getPathname());
					$target_dirs[] = $path[0] . "/extension/{$extension_code}/";

				}
			}
			if (substr($extension_install_info['name'], 0, 6) == "Theme:") {
				$target_dirs = [];
				$target_dirs[] = DIR_VENTOCART . 'themes/' . $extension_code;

			}

			// Delete files and directories recursively
			foreach ($target_dirs as $dir) {


				if (is_dir($dir)) {

					$this->deleteDirectory($dir);
				}
			}



			// Deactivate extension
			$this->model_setting_extension->editStatus($extension_install_id, 0);

			// Remove OCMOD modifications
			$this->load->model('setting/modification');
			$this->model_setting_modification->deleteModificationsByExtensionInstallId($extension_install_id);

			$json['text'] = $this->language->get('text_success');

			//$json['next'] = $this->url->link('marketplace/installer.list', 'user_token=' . $this->session->data['user_token'], true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * Helper function to delete a directory and its contents.
	 *
	 * @param string $dir
	 * @return void
	 */
	private function deleteDirectory(string $dir): void
	{
		$dir = rtrim(preg_replace('#/+#', '/', $dir), '/');
		if (is_dir($dir)) {

			$files = array_diff(scandir($dir), array('.', '..'));
			foreach ($files as $file) {
				$filePath = $dir . DIRECTORY_SEPARATOR . $file;
				if (is_dir($filePath)) {
					$this->deleteDirectory($filePath);
				} else {
					unlink($filePath);
				}
			}
			rmdir($dir);
		}
	}



	/**
	 * @return void
	 */
	public function delete(): void
	{
		$this->load->language('marketplace/installer');

		$json = [];

		if (isset($this->request->get['extension_install_id'])) {
			$extension_install_id = (int) $this->request->get['extension_install_id'];
		} else {
			$extension_install_id = 0;
		}

		if (!$this->user->hasPermission('modify', 'marketplace/installer')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/extension');

		$extension_install_info = $this->model_setting_extension->getInstall($extension_install_id);

		if ($extension_install_info && $extension_install_info['code'] == 'ventocart') {
			$json['error'] = $this->language->get('error_default');
		}

		if (!$extension_install_info) {
			$json['error'] = $this->language->get('error_extension');
		}

		if (!$json) {
			$file = DIR_STORAGE . 'marketplace/' . $extension_install_info['code'] . '.vemod.zip';

			// Remove file
			if (is_file($file)) {
				unlink($file);
			}

			$this->model_setting_extension->deleteInstall($extension_install_id);

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
