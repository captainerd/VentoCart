<?php
/*
Upgrade Process

1. Check for latest version

2. Download a copy of the latest version

3. Add and replace the files with the ones from latest version

4. Redirect to upgrade page
*/
namespace Ventocart\Admin\Controller\Tool;
/**
 * Class Upgrade
 *
 * @package Ventocart\Admin\Controller\Tool
 */
class Upgrade extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('tool/upgrade');

		// Set document title
		$this->document->setTitle($this->language->get('heading_title'));

		// Initialize breadcrumbs
		$data['breadcrumbs'] = [
			[
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token']),
			],
			[
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('tool/upgrade', 'user_token=' . $this->session->data['user_token']),
			]
		];

		// Retrieve current version
		$data['current_version'] = VERSION;
		$data['upgrade'] = false;

		// Fetch latest version
		$latestVersionUrl = 'https://raw.githubusercontent.com/captainerd/VentoCart/refs/heads/main/VERSION';
		$data['latest_version'] = $this->fetchContent($latestVersionUrl);
		$data['latest_version'] = trim($data['latest_version']);
		$versionNew = $data['latest_version'];
		$versionOld = VERSION;

		if (version_compare($versionNew, $versionOld, '>')) {
			$data['upgrade'] = true;
		}

		// Fetch changelog
		$changelogUrl = 'https://raw.githubusercontent.com/captainerd/VentoCart/refs/heads/main/changelog.md';
		$data['log'] = $this->formatChangelog($this->fetchContent($changelogUrl));

		// Fetch creation date of VERSION file
		$data['date_added'] = $this->getFileCreationDate('VERSION');

		// Pass user token
		$data['user_token'] = $this->session->data['user_token'];

		// Load common controllers
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		// Render the output
		$this->response->setOutput($this->load->view('tool/upgrade', $data));
	}

	private function fetchContent(string $url): string
	{
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, true);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);

		$response = curl_exec($curl);
		curl_close($curl);

		return $response ?: '';
	}

	private function formatChangelog(string $changelog): string
	{
		if (empty($changelog)) {
			return '';
		}

		$logParts = explode("\n## What's New in VentoCart", $changelog);
		$formattedLog = $logParts[0] ?? $changelog;
		return nl2br($formattedLog);
	}

	private function getFileCreationDate(string $filePath): string
	{
		$url = "https://api.github.com/repos/captainerd/VentoCart/commits?path={$filePath}";
		$curl = curl_init($url);

		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_HTTPHEADER, [
			'User-Agent: MyUserAgent', // Required by GitHub API
			'Accept: application/vnd.github.v3+json',
		]);

		$response = curl_exec($curl);
		curl_close($curl);

		$commits = json_decode($response, true);

		if (!empty($commits)) {
			$creationCommit = end($commits);
			return $creationCommit['commit']['author']['date'] ?? '';
		}

		return '';
	}

	/**
	 * @return void
	 */
	public function download(): void
	{
		$this->load->language('tool/upgrade');

		$json = [];

		if (isset($this->request->get['version'])) {
			$version = $this->request->get['version'];
		} else {
			$version = '';
		}

		if (!$this->user->hasPermission('modify', 'tool/upgrade')) {
			$json['error'] = $this->language->get('error_permission');
		}

		if (version_compare($version, VERSION, '<')) {
			$json['error'] = $this->language->get('error_version');
		}

		$file = DIR_DOWNLOAD . 'ventocart-' . $version . '.zip';

		$handle = fopen($file, 'w');

		set_time_limit(0);

		$curl = curl_init('https://github.com/captainerd/VentoCart/archive/refs/heads/main.zip');

		curl_setopt($curl, CURLOPT_USERAGENT, 'ventocart ' . VERSION);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($curl, CURLOPT_FORBID_REUSE, 1);
		curl_setopt($curl, CURLOPT_FRESH_CONNECT, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 300);
		curl_setopt($curl, CURLOPT_FILE, $handle);

		curl_exec($curl);

		fclose($handle);

		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		if ($status != 200) {
			$json['error'] = $this->language->get('error_download');
		}

		curl_close($curl);

		if (!$json) {
			$json['text'] = $this->language->get('text_install');

			$json['next'] = $this->url->link('tool/upgrade.install', 'user_token=' . $this->session->data['user_token'] . '&version=' . $version, true);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function install(): void
	{
		$this->load->language('tool/upgrade');

		$json = [];

		// Retrieve version or set to empty string
		$version = isset($this->request->get['version']) ? $this->request->get['version'] : '';

		// Check for required permission
		if (!$this->user->hasPermission('modify', 'tool/upgrade')) {
			$json['error'] = $this->language->get('error_permission');
			$this->sendJsonResponse($json);
			return;
		}

		$file = DIR_DOWNLOAD . 'ventocart-' . $version . '.zip';

		// Check if file exists
		if (!is_file($file)) {
			$json['error'] = $this->language->get('error_file');
			$this->sendJsonResponse($json);
			return;
		}

		// Unzip the files
		$zip = new \ZipArchive();
		if ($zip->open($file, \ZipArchive::RDONLY) === TRUE) {
			$remove = 'VentoCart-main/upload/';
			$admin = DIR_VENTOCART . rtrim(substr(DIR_APPLICATION, strlen(DIR_VENTOCART), -1));

			// Iterate through the files in the zip archive
			for ($i = 0; $i < $zip->numFiles; $i++) {
				$source = $zip->getNameIndex($i);

				if (substr($source, 0, strlen($remove)) === $remove) {
					$destination = str_replace('\\', '/', substr($source, strlen($remove)));

					// Skip files in the /install directory and config.php
					if (substr($destination, 0, 8) === 'install/' || basename($destination) === 'config.php') {
						continue;
					}

					// Handle /admin extraction separately
					$destinationPath = (substr($destination, 0, 6) === 'admin/')
						? $admin . "/" . substr($destination, 5)
						: DIR_VENTOCART . $destination;

					// Ensure directories exist
					$this->createDirectories($destinationPath);

					// If it's a file, check if it exists, delete it, and copy the new one
					if (substr($destinationPath, -1) !== '/') {
						if (is_file($destinationPath)) {
							unlink($destinationPath); // Delete the existing file
						}

						// Write the file from the zip
						if (file_put_contents($destinationPath, $zip->getFromIndex($i)) === false) {
							$json['error'] = sprintf($this->language->get('error_copy'), $source, $destinationPath);
							break; // Exit the loop on error
						}
					}
				}
			}

			// Close the zip file after extraction
			$zip->close();

			// Delete extracted /install directory if it exists
			$installDir = DIR_VENTOCART . 'install/';
			if (is_dir($installDir)) {
				$this->deleteDirectory($installDir);
			}

			// Return success response
			if (empty($json['error'])) {
				$json['text'] = $this->language->get('text_patch');
				$json['finish'] = 'index.php?route=tool/upgrade&user_token=' . $this->session->data['user_token'];
			}
		} else {
			$json['error'] = $this->language->get('error_unzip');
		}

		$this->sendJsonResponse($json);
	}


	private function deleteDirectory($dir)
	{
		if (!is_dir($dir)) {
			return false;
		}

		$files = array_diff(scandir($dir), array('.', '..'));

		foreach ($files as $file) {
			$filePath = $dir . DIRECTORY_SEPARATOR . $file;
			if (is_dir($filePath)) {
				$this->deleteDirectory($filePath); // Recursively delete subdirectories
			} else {
				unlink($filePath); // Delete file
			}
		}

		return rmdir($dir); // Remove the now-empty directory
	}

	private function createDirectories(string $path): void
	{
		// Ensure the path is not empty or just spaces
		if (empty($path) || trim($path) === '') {
			$json['error'] = 'Invalid directory path';
			$this->sendJsonResponse($json);
			return;
		}

		// Normalize the path to avoid issues with relative paths
		$path = rtrim($path, DIRECTORY_SEPARATOR); // Remove trailing slashes if any
		$directories = explode(DIRECTORY_SEPARATOR, dirname($path));

		$currentPath = '';

		foreach ($directories as $directory) {
			if (!$currentPath) {
				$currentPath = $directory;
			} else {
				$currentPath .= DIRECTORY_SEPARATOR . $directory;
			}

			// Check if the directory exists or try to create it

			if (!is_dir($currentPath)) {
				// Step 1: Ensure the path is not empty or invalid
				if (empty($currentPath) || !is_string($currentPath)) {
					$this->log->write("Invalid path: " . $currentPath);
					return;
				}

				// Step 2: Resolve the absolute path using realpath()
				$resolvedPath = realpath($currentPath);
				if ($resolvedPath === false) {
					$this->log->write("Invalid resolved path: " . $currentPath);
					return;  // If realpath can't resolve the path, it's invalid
				}

				// Assign back to $currentPath after resolving
				$currentPath = $resolvedPath;

				// Step 3: Check if the parent directory is writable
				$parentDir = dirname($currentPath);
				if (!is_writable($parentDir)) {
					$this->log->write("Parent directory is not writable: " . $parentDir);
					$json['error'] = sprintf($this->language->get('error_directory'), $currentPath);
					$this->sendJsonResponse($json);
					return;  // Parent directory is not writable
				}

				// Step 4: Attempt to create the directory
				if (!mkdir($currentPath, 0777, true)) {
					$error = error_get_last();  // Get the last error
					$this->log->write("Failed to create directory: " . $error['message']);
					$json['error'] = sprintf($this->language->get('error_directory'), $currentPath);
					$this->sendJsonResponse($json);
					return;  // Failed to create directory
				}
			}
		}
	}

	private function sendJsonResponse(array $json): void
	{
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

}
