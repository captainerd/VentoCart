<?php
namespace Opencart\Admin\Controller\Localisation;

/**
 * Class Language
 *
 * @package Opencart\Admin\Controller\Localisation
 */

use ResourceBundle;

class Language extends \Opencart\System\Engine\Controller
{
	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->load->language('localisation/language');

		$this->document->setTitle($this->language->get('heading_title'));

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('localisation/language', 'user_token=' . $this->session->data['user_token'] . $url)
		];

		$data['add'] = $this->url->link('localisation/language.form', 'user_token=' . $this->session->data['user_token'] . $url);
		$data['delete'] = $this->url->link('localisation/language.delete', 'user_token=' . $this->session->data['user_token']);

		$data['list'] = $this->getList();

		$data['user_token'] = $this->session->data['user_token'];

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/language', $data));
	}

	/**
	 * @return void
	 */
	public function list(): void
	{
		$this->load->language('localisation/language');

		$this->response->setOutput($this->getList());
	}

	/**
	 * @return string
	 */
	protected function getList(): string
	{
		if (isset($this->request->get['sort'])) {
			$sort = (string) $this->request->get['sort'];
		} else {
			$sort = 'name';
		}

		if (isset($this->request->get['order'])) {
			$order = (string) $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = (int) $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['action'] = $this->url->link('localisation/language.list', 'user_token=' . $this->session->data['user_token'] . $url);

		$data['languages'] = [];

		$filter_data = [
			'sort' => $sort,
			'order' => $order,
			'start' => ($page - 1) * $this->config->get('config_pagination_admin'),
			'limit' => $this->config->get('config_pagination_admin')
		];

		$this->load->model('localisation/language');

		$results = $this->model_localisation_language->getLanguages($filter_data);

		foreach ($results as $result) {
			$data['languages'][] = [
				'language_id' => $result['language_id'],
				'name' => $result['name'] . (($result['code'] == $this->config->get('config_language')) ? $this->language->get('text_default') : ''),
				'code' => $result['code'],
				'status' => $result['status'],
				'sort_order' => $result['sort_order'],
				'edit' => $this->url->link('localisation/language.form', 'user_token=' . $this->session->data['user_token'] . '&language_id=' . $result['language_id'] . $url)
			];
		}

		$url = '';

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		$data['sort_name'] = $this->url->link('localisation/language.list', 'user_token=' . $this->session->data['user_token'] . '&sort=name' . $url);
		$data['sort_code'] = $this->url->link('localisation/language.list', 'user_token=' . $this->session->data['user_token'] . '&sort=code' . $url);
		$data['sort_sort_order'] = $this->url->link('localisation/language.list', 'user_token=' . $this->session->data['user_token'] . '&sort=sort_order' . $url);

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$language_total = $this->model_localisation_language->getTotalLanguages();

		$data['pagination'] = $this->load->controller('common/pagination', [
			'total' => $language_total,
			'page' => $page,
			'limit' => $this->config->get('config_pagination_admin'),
			'url' => $this->url->link('localisation/language.list', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}')
		]);

		$data['results'] = sprintf($this->language->get('text_pagination'), ($language_total) ? (($page - 1) * $this->config->get('config_pagination_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_pagination_admin')) > ($language_total - $this->config->get('config_pagination_admin'))) ? $language_total : ((($page - 1) * $this->config->get('config_pagination_admin')) + $this->config->get('config_pagination_admin')), $language_total, ceil($language_total / $this->config->get('config_pagination_admin')));

		$data['sort'] = $sort;
		$data['order'] = $order;

		return $this->load->view('localisation/language_list', $data);
	}

	/**
	 * @return void
	 */
	public function loadTranslation(): void
	{

		if (!isset($this->request->post['file'])) {
			return;
		}
		//Check integrity 
		$fileInfo = explode("|", $this->request->post['file']);
		$hash = hash('sha256', $fileInfo[0] . DB_PASSWORD . DB_USERNAME);
		if ($hash != $fileInfo[1]) {
			die(json_encode(["error" => "Compromised integrity"]));
		}

		$fileContents = file_get_contents($fileInfo[0]);
		$fileContents = str_replace("<?php", "", $fileContents);
		$fileContents = str_replace("?>", "", $fileContents);
		$this->response->setOutput(json_encode(["contents" => $fileContents]));

	}

	/**
	 * @return void
	 */public function saveTranslation(): void
	{
		if (!isset($this->request->post['file']) || !isset($this->request->post['content'])) {
			return;
		}
		$this->load->language('localisation/language');

		// Check integrity, (As a security measure each file comes with its unique hash, salted with db pass and user)
		$fileInfo = explode("|", $this->request->post['file']);
		$hash = hash('sha256', $fileInfo[0] . DB_PASSWORD . DB_USERNAME);
		if ($hash !== $fileInfo[1]) {
			die(json_encode(["error" => "Compromised integrity"]));
		}


		$filePath = $fileInfo[0];
		$newContent = $this->request->post['content'];



		//Check for syntax errors in PHP
		if (!$this->isPhpStringValid($newContent)) {
			die(json_encode(["error" => $this->language->get('text_file_contains_errors')]));

		}


		// Check for missing keys in the user's content
		$defaultContent = file_get_contents(str_replace($this->request->get['code'], "/en-gb/", $filePath));
		$keysDefault = $this->extractTranslations($defaultContent);
		$keysUser = $this->extractTranslations($newContent);

		// Iterate through the keys of the first array
		foreach ($keysDefault as $key => $value) {
			// Check if the key exists in the second array
			if (!array_key_exists($key, $keysUser)) {
				// Insert the missing key-value pair
				$newContent .= "\n" . '$' . "_['" . $key . "'] = '" . $value . "';\n";
			}
		}
		// Save the new content to the file
		$success = file_put_contents($filePath, "<?php\n" . $newContent . "\n?>");

		if ($success !== false) {

			$this->response->setOutput(json_encode(["message" => $this->language->get('text_file_content_saved')]));
		} else {

			$this->response->setOutput(json_encode(["error" => $this->language->get('text_error_saving_file')]));
		}
	}


	private function isPhpStringValid($phpCode)
	{
		$codeToCheck = 'return true; ' . trim($phpCode);

		try {
			ob_start();
			$result = eval($codeToCheck);
			ob_end_clean();

			if ($result === false) {
				return false;
			}

			return true;
		} catch (Throwable $e) {
			// Catch any exception (including ParseError) and return false
			return false;
		}

	}
	private function stripComments($content)
	{
		// Remove lines starting with //
		$content = preg_replace('/^\s*\/\/.*$/m', '', $content);

		// Remove lines enclosed in /* */
		$content = preg_replace('/\/\*.*?\*\//s', '', $content);

		// Remove lines starting with #
		$content = preg_replace('/^\s*#.*$/m', '', $content);

		return $content;
	}
	private function extractTranslations($content)
	{
		$translations = [];
		$content = $this->stripComments($content);
		// Define the pattern to match lines containing translations with single quotes
		$patternSingleQuotes = '/\$_\[\'([^\']+)\'\]\s*=\s*\'((?:[^\'\\\\]|\\\\.)+)\'/s';


		// Match all occurrences of the pattern in the content
		preg_match_all($patternSingleQuotes, $content, $matchesSingleQuotes, PREG_SET_ORDER);

		// Iterate over the matches and store in the $translations array
		foreach ($matchesSingleQuotes as $match) {
			$key = $match[1];
			$text = $match[2];
			$translations[$key] = $text;
		}

		// Define the pattern to match lines containing translations with double quotes
		$patternDoubleQuotes = '/\$_\[\'([^\']+)\'\]\s*=\s*\"([^"]+)\"/s';

		// Match all occurrences of the pattern in the content
		preg_match_all($patternDoubleQuotes, $content, $matchesDoubleQuotes, PREG_SET_ORDER);

		// Iterate over the matches and store in the $translations array
		foreach ($matchesDoubleQuotes as $match) {
			$key = $match[1];
			$text = $match[2];
			$translations[$key] = $text;
		}

		return $translations;
	}
	/**
	 * @return void
	 */
	public function importFile(): void
	{
		$this->load->language('localisation/language');
		// Check if a file is uploaded
		if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
			// Get the temporary file name
			$tmpFileName = $_FILES['file']['tmp_name'];
			$type = $this->request->get['type'];
			// Read the content of the file
			$fileContent = file_get_contents($tmpFileName);

			$myKeys = $this->extractfileKeys($fileContent);


			$langCode = $this->request->get['code'];
			// Define the directories
			$catalogDir = DIR_CATALOG . "language/" . $langCode;
			$adminDir = DIR_APPLICATION . "language/" . $langCode;

			// Search for PHP files in the specified directories
			$catalogFiles = $this->getPhpFiles($catalogDir);
			$adminFiles = $this->getPhpFiles($adminDir);

			// Search for PHP files in the extension directories
			$extensionFiles = $this->getExtensionPhpFiles($langCode);

			// Merge all files into one array
			$allFiles = array_merge($catalogFiles, $adminFiles, $extensionFiles);
			$id_file = 0;

			$filef = "";
			$files_translated = 0;
			if ($type == "numeric") {
				foreach ($allFiles as $file) {
					$translations = $this->extractTranslations(file_get_contents($file));

					$id_key = 0;
					$file_new_contents = "";
					foreach ($translations as $translation => $key) {

						if (isset($myKeys[$id_file . '-' . $id_key])) {

							//Retrieve the translated text from the id
							$ntext = $myKeys[$id_file . '-' . $id_key];

							//Ensure single quotes are escaped as we will be opening and closing with them our strings
							$ntext = stripslashes($ntext);
							$ntext = str_replace("\\", "", $ntext);
							$ntext = str_replace("'", "\'", $ntext);

							$ntext = mb_convert_encoding($ntext, 'UTF-8');
							//Build our variable
							$file_new_contents .= '$_[\'' . $translation . '\'] ' . '= \'' . $ntext . "';\n";
						}

						$id_key++;
					}

					// Check for missing keys in the user's content
					$defaultContent = file_get_contents(str_replace($langCode, "/en-gb/", $file));
					$keysDefault = $this->extractTranslations($defaultContent);
					$keysUser = $this->extractTranslations($file_new_contents);

					// Iterate through the keys of the first array
					foreach ($keysDefault as $key => $value) {
						// Check if the key exists in the second array
						if (!array_key_exists($key, $keysUser)) {
							// Insert the missing key-value pair
							$file_new_contents .= "\n" . '$' . "_['" . $key . "'] = '" . $value . "';\n";
						}
					}
					// Save the new content to the file
					$success = file_put_contents($file, "<?php\n" . $file_new_contents . "\n?>");

					if ($success !== false) {
						$files_translated++;
					}

					$id_file++;
				}
			}


			if ($type == "variable") {
				$lines = explode("\n", $fileContent);
				$file = '';
				$previousfile = '';
				$newcontent = '';
				foreach ($lines as $line) {
					$pattern = '/^\$\\*file\\*=(.+)/';
					if (preg_match($pattern, $line, $matches)) {
						$file = DIR_OPENCART . trim($matches[1]);
					 
						 
						 
							if (file_exists($previousfile)) {
								// Check for missing keys in the user's content
								$defaultContent = file_get_contents(str_replace($langCode, "/en-gb/", $previousfile));
								$keysDefault = $this->extractTranslations($defaultContent);
								$keysUser = $this->extractTranslations($newcontent);
								 
								// Iterate through the keys of the first array
								foreach ($keysDefault as $key => $value) {
									 
									// Check if the key exists in the second array
									if (!array_key_exists($key, $keysUser)) {
										 
										// Insert the missing key-value pair
										$newcontent .= "\n" . '$' . "_['" . $key . "'] = '" . $value . "';\n";
									}
								}
								// Save the new content to the file
								$success = file_put_contents($previousfile, "<?php\n" . $newcontent . "\n?>");
								if ($success !== false) {
									$files_translated++;
								}
								//reset for the next file
								$newcontent = '';
							}
							 
						 
						$previousfile = $file;

					} else {
						$linecontent = $this->extractKeyVariable($line);
						if (!empty($linecontent)) {
							$ntext = $linecontent['value'];
							$ntext = stripslashes($ntext);
							$ntext = str_replace("\\", "", $ntext);
							$ntext = str_replace("'", "\'", $ntext);

							$ntext = mb_convert_encoding($ntext, 'UTF-8');

							$newcontent .= '$_[\'' . $linecontent['key'] . '\']' . ' = ' . "'" . $ntext. "';\n";
						}
					}

				}

			}


			// Respond with a success message
			$response = ['success' => true, 'message' => $this->language->get('text_file_imported') . ' ' . $files_translated];
			$this->response->setOutput(json_encode($response));
		} else {
			// Respond with an error message

			$response = ['success' => false, 'message' => $this->language->get('text_error_importing')];
			$this->response->setOutput(json_encode($response));
		}
	}


	/**
	 * @param string
	 * @return array
	 */
	private function extractKeyVariable($contentString)
	{
		 
		// Define the pattern to match generic key-value pairs
		$pattern = '/^(\$[\p{L}_][\p{L}\p{N}_]*)\s*=\s*(.+)/u';

		// Match the pattern in the content
		if (preg_match($pattern, $contentString, $matches)) {
	 
	 

			// Extract the key and the value
			 
			$value = trim($matches[2]);
			$key = $matches[1];
			$key = str_replace('$', '', $key);
		 
			// Output the extracted key and value
		 
			return ['key' => $key, 'value' => $value];
		} else {
			return [];
		}
	}







	/**
	 * @return void
	 */
	public function downloadFile(): void
	{
		$this->load->language('localisation/language');

		$langCode = $this->request->get['code'];

		$part = $this->request->get['part'];

		$type = $this->request->get['type'];

		// Define the directories
		$catalogDir = DIR_CATALOG . "language/" . $langCode;
		$adminDir = DIR_APPLICATION . "language/" . $langCode;
		$allFiles = [];
		// Search for PHP files in the specified directories
		if ($part == "everything") {
			$catalogFiles = $this->getPhpFiles($catalogDir);
			$adminFiles = $this->getPhpFiles($adminDir);

			// Search for PHP files in the extension directories
			$extensionFiles = $this->getExtensionPhpFiles($langCode);

			// Merge all files into one array
			$allFiles = array_merge($catalogFiles, $adminFiles, $extensionFiles);

		}
		if ($part == "front") {
			$allFiles = $this->getPhpFiles($catalogDir);
		}
		if ($part == "admin") {
			$allFiles = $this->getPhpFiles($adminDir);
		}
		if ($part == "extensions") {
			$allFiles = $this->getExtensionPhpFiles($langCode);
		}

		$id_file = 0;

		$filef = "";
		if ($type == "numeric") {
			foreach ($allFiles as $file) {
				$translations = $this->extractTranslations(file_get_contents($file));

				$id_key = 0;
				$filef .= "\n[F]=[" . str_replace(DIR_OPENCART, "", $file) . "]\n";

				foreach ($translations as $translation => $key) {

					$filef .= '[' . $id_file . '-' . $id_key . ']=[' . $key . "]\n";
					$filef = str_replace('%s]', '%s ]', $filef);
					$id_key++;
				}

				$id_file++;
			}
		}
		if ($type == "variable") {
			foreach ($allFiles as $file) {
				$translations = $this->extractTranslations(file_get_contents($file));

				$id_key = 0;
				$filef .= "\n" . '$*' . "file*=" . str_replace(DIR_OPENCART, "", $file) . "\n";

				foreach ($translations as $translation => $key) {

					$filef .= '$' . $translation . ' = ' . $key . "\n";

					$id_key++;
				}

				$id_file++;
			}
		}
		$filef .= "\n$*file*=end";

		$outputFileName = $langCode . '_output.txt';

		// Set headers for file download
		header('Content-Type: text/plain');
		header('Content-Disposition: attachment; filename="' . $outputFileName . '"');

		// Output the file content
		echo $filef;

	}
	/**
	 * @param string
	 * @return array
	 */
	private function extractfileKeys(string $string)
	{

		$pattern = '/\[(\d+-\d+)\]=\[(.*?)\]\s/s';

		preg_match_all($pattern, $string, $matches, PREG_SET_ORDER);

		$result = [];

		foreach ($matches as $match) {
			$id = $match[1];
			$text = $match[2];
			$result[$id] = $text;
		}
		return $result;
	}


	/**
	 * @return void
	 */
	public function translate(): void
	{
		$this->load->language('localisation/language');
		$this->document->setTitle($this->language->get('heading_title'));

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');
		$data['user_token'] = $this->session->data['user_token'];
		$data['code'] = $this->request->get['code'];
		$langCode = $this->request->get['code'];

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];
		$data['back'] = "index.php?route=localisation/language.form&user_token=" . $this->session->data['user_token'] . "&language_id=" . $this->request->get['language_id'];




		// Define the directories
		$catalogDir = DIR_CATALOG . "language/" . $langCode;
		$adminDir = DIR_APPLICATION . "language/" . $langCode;

		// Search for PHP files in the specified directories
		$catalogFiles = $this->getPhpFiles($catalogDir);
		$adminFiles = $this->getPhpFiles($adminDir);

		// Search for PHP files in the extension directories
		$extensionFiles = $this->getExtensionPhpFiles($langCode);

		// Merge all files into one array
		$allFiles = array_merge($catalogFiles, $adminFiles, $extensionFiles);
		$filesWithHash = [];
		foreach ($allFiles as $file) {
			$filesWithHash[] = [
				'file' => $file,
				'hash' => hash('sha256', $file . DB_PASSWORD . DB_USERNAME),
			];
		}
		$data['files'] = $filesWithHash;

		$this->response->setOutput($this->load->view('localisation/translation_form', $data));
	}


	/**
	 * Get PHP files in a directory recursively
	 *
	 * @param string $directory
	 * @return array
	 */
	private function getPhpFiles(string $directory): array
	{
		$phpFiles = [];

		if (is_dir($directory)) {
			$iterator = new \RecursiveIteratorIterator(
				new \RecursiveDirectoryIterator($directory, \RecursiveDirectoryIterator::SKIP_DOTS),
				\RecursiveIteratorIterator::SELF_FIRST
			);

			foreach ($iterator as $file) {
				if ($file->isFile() && $file->getExtension() === 'php') {
					$phpFiles[] = $file->getPathname();
				}
			}
		}

		return $phpFiles;
	}

	/**
	 * Get PHP files in extension directories
	 *
	 * @param string $langCode
	 * @return array
	 */
	private function getExtensionPhpFiles(string $langCode): array
	{
		$phpFiles = [];

		$contents = scandir(DIR_EXTENSION);
		$contents = array_diff($contents, array('.', '..'));

		foreach ($contents as $item) {
			$extensionAdminDir = DIR_EXTENSION . $item . "/admin/language/";
			$extensionCatalogDir = DIR_EXTENSION . $item . "/catalog/language/";

			$phpFiles = array_merge($phpFiles, $this->getPhpFiles($extensionAdminDir . $langCode));
			$phpFiles = array_merge($phpFiles, $this->getPhpFiles($extensionCatalogDir . $langCode));
		}

		return $phpFiles;
	}


	/**
	 * @return void
	 */
	public function form(): void
	{
		$this->load->language('localisation/language');

		$directory = DIR_CATALOG . "language/flags";
		$countries = [];

		if (is_dir($directory)) {
			$files = scandir($directory);

			foreach ($files as $file) {
				if ($file != "." && $file != "..") {
					$country = str_replace(".png", "", $file);
					$country = str_replace("_", " ", $country);
					$country = ucwords($country);
			
					$locales = [];
					$isoCountryCode = null;
			
					$allLocales = \ResourceBundle::getLocales('');
			
					foreach ($allLocales as $loc) {
						$countryNames = explode(', ', \Locale::getDisplayRegion($loc));
						if (in_array($country, $countryNames)) {
							$isoCountryCode = \Locale::getRegion($loc);
							$locales[] = [
								'locale' => $loc,
								'languageFullName' => \Locale::getDisplayLanguage($loc),
							];
						}
					}
			
					if ($locales) {
						$countries[] = [
							'flag' => $file,
							'country' => $country,
							'locales' => $locales,
							'isoCountryCode' => $isoCountryCode,
						];
					}
				}
			}
		}
	 


		$data['countries'] = $countries;
		$this->document->setTitle($this->language->get('heading_title'));

		$data['text_form'] = !isset($this->request->get['language_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$url = '';

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = [];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'])
		];

		$data['breadcrumbs'][] = [
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('localisation/language', 'user_token=' . $this->session->data['user_token'] . $url)
		];
		$data['user_token'] = $this->session->data['user_token'];

		$data['save'] = $this->url->link('localisation/language.save', 'user_token=' . $this->session->data['user_token']);
		$data['back'] = $this->url->link('localisation/language', 'user_token=' . $this->session->data['user_token'] . $url);

		if (isset($this->request->get['language_id'])) {
			$this->load->model('localisation/language');

			$language_info = $this->model_localisation_language->getLanguage($this->request->get['language_id']);
		}

		if (isset($this->request->get['language_id'])) {
			$data['language_id'] = (int) $this->request->get['language_id'];
		} else {
			$data['language_id'] = 0;
		}

		if (!empty($language_info)) {
			$data['name'] = $language_info['name'];
		} else {
			$data['name'] = '';
		}

		if (!empty($language_info)) {
			$data['code'] = $language_info['code'];

			//create language files for newly installed extensions
			$contents = scandir(DIR_EXTENSION);
			$contents = array_diff($contents, array('.', '..'));
			foreach ($contents as $item) {


				$defaultLang = DIR_EXTENSION . $item . "/admin/language/en-gb";
				$targetLang = DIR_EXTENSION . $item . "/admin/language/" . $language_info['code'];

				if (is_dir($defaultLang) && filetype($defaultLang) === 'dir' && !is_dir($targetLang)) {
					$this->recursiveCopy($defaultLang, $targetLang);
				}
				$defaultLang = DIR_EXTENSION . $item . "/catalog/language/en-gb";
				$targetLang = DIR_EXTENSION . $item . "/catalog/language/" . $language_info['code'];

				if (is_dir($defaultLang) && filetype($defaultLang) === 'dir' && !is_dir($targetLang)) {
					$this->recursiveCopy($defaultLang, $targetLang);
				}

			}

		} else {
			$data['code'] = '';
		}

		if (!empty($language_info)) {
			$data['locale'] = $language_info['locale'];
		} else {
			$data['locale'] = '';
		}

		if (!empty($language_info)) {
			$data['extension'] = $language_info['extension'];
		} else {
			$data['extension'] = '';
		}

		if (!empty($language_info)) {
			$data['sort_order'] = $language_info['sort_order'];
		} else {
			$data['sort_order'] = 1;
		}

		if (!empty($language_info)) {
			$data['status'] = $language_info['status'];
		} else {
			$data['status'] = 1;
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('localisation/language_form', $data));
	}

	/**
	 * @return void
	 */
	public function save(): void
	{
		$this->load->language('localisation/language');

		$json = [];


		if (!$this->user->hasPermission('modify', 'localisation/language')) {
			$json['error']['warning'] = $this->language->get('error_permission');
		}

		if ((oc_strlen($this->request->post['name']) < 1) || (oc_strlen($this->request->post['name']) > 32)) {
			$json['error']['name'] = $this->language->get('error_name');
		}

		if ((oc_strlen($this->request->post['code']) < 2) || (oc_strlen($this->request->post['code']) > 5)) {
			$json['error']['code'] = $this->language->get('error_code');
		}

		if ((oc_strlen($this->request->post['locale']) < 2) || (oc_strlen($this->request->post['locale']) > 255)) {
			$json['error']['locale'] = $this->language->get('error_locale');
		}

		$language_info = $this->model_localisation_language->getLanguageByCode($this->request->post['code']);
	 
		if (!$this->request->post['language_id']) {
			if ($language_info) {
				$json['error']['warning'] = $this->language->get('error_exists');
			}
		} else {
			if ($language_info && ($this->request->post['language_id'] != $language_info['language_id'])) {
				$json['error']['warning'] = $this->language->get('error_exists');
			}
		}

		if (!$json) {
			$this->load->model('localisation/language');


			//Flag is set, it is a new language
			if (isset($this->request->post['flag'])) {
			$langCode = $this->request->post['code'];
			$catalogDir = DIR_CATALOG . "language/" . $langCode;
			$adminDir = DIR_APPLICATION . "language/" . $langCode;

			$this->recursiveDelete($adminDir);
			$this->recursiveDelete($catalogDir);

			$this->recursiveCopy(DIR_CATALOG . "language/en-gb", $catalogDir);
			$this->recursiveCopy(DIR_APPLICATION . "language/en-gb", $adminDir);


			$contents = scandir(DIR_EXTENSION);
			$contents = array_diff($contents, array('.', '..'));
			foreach ($contents as $item) {


				$defaultLang = DIR_EXTENSION . $item . "/admin/language/en-gb";
				$targetLang = DIR_EXTENSION . $item . "/admin/language/" . $langCode;

				if (is_dir($defaultLang) && filetype($defaultLang) === 'dir' && !is_dir($targetLang)) {
					$this->recursiveDelete($targetLang);
					$this->recursiveCopy($defaultLang, $targetLang);
				}
				$defaultLang = DIR_EXTENSION . $item . "/catalog/language/en-gb";
				$targetLang = DIR_EXTENSION . $item . "/catalog/language/" . $langCode;

				if (is_dir($defaultLang) && filetype($defaultLang) === 'dir' && !is_dir($targetLang)) {
					$this->recursiveDelete($targetLang);
					$this->recursiveCopy($defaultLang, $targetLang);
				}

			}

			unlink($adminDir . "/en-gb.png");
			unlink($catalogDir . "/en-gb.png");

			if ($this->request->post['flag'] != "") {
				copy(DIR_CATALOG . "language/flags/" . $this->request->post['flag'], $catalogDir . "/" . $langCode . ".png");
				copy(DIR_CATALOG . "language/flags/" . $this->request->post['flag'], $adminDir . "/" . $langCode . ".png");

			}
		}

			if (!$this->request->post['language_id']) {
				$json['language_id'] = $this->model_localisation_language->addLanguage($this->request->post);
			} else {
				$this->model_localisation_language->editLanguage($this->request->post['language_id'], $this->request->post);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	/**
	 * @return void
	 */
	public function delete(): void
	{
		$this->load->language('localisation/language');

		$json = [];

		if (isset($this->request->post['selected'])) {
			$selected = $this->request->post['selected'];
		} else {
			$selected = [];
		}

		if (!$this->user->hasPermission('modify', 'localisation/language')) {
			$json['error'] = $this->language->get('error_permission');
		}

		$this->load->model('setting/store');
		$this->load->model('sale/order');

		foreach ($selected as $language_id) {
			$language_info = $this->model_localisation_language->getLanguage($language_id);

			if ($language_info) {
				if ($this->config->get('config_language') == $language_info['code']) {
					$json['error'] = $this->language->get('error_default');
				}

				if ($this->config->get('config_language_admin') == $language_info['code']) {
					$json['error'] = $this->language->get('error_admin');
				}

				$store_total = $this->model_setting_store->getTotalStoresByLanguage($language_info['code']);

				if ($store_total) {
					$json['error'] = sprintf($this->language->get('error_store'), $store_total);
				}
			}

			$order_total = $this->model_sale_order->getTotalOrdersByLanguageId($language_id);

			if ($order_total) {
				$json['error'] = sprintf($this->language->get('error_order'), $order_total);
			}
		}

		if (!$json) {
			 
			if (isset($language_info['code']) && $language_info['code'] != "en-gb") {
				$this->load->model('localisation/language');
				$catalogDir = DIR_CATALOG . "language/" . $language_info['code'];
				$adminDir = DIR_APPLICATION . "language/" . $language_info['code'];

				$this->recursiveDelete($adminDir);
				$this->recursiveDelete($catalogDir);



				$contents = scandir(DIR_EXTENSION);
				$contents = array_diff($contents, array('.', '..'));
				foreach ($contents as $item) {



					$targetLang = DIR_EXTENSION . $item . "/admin/language/" . $language_info['code'];

					if (is_dir($targetLang)) {
						$this->recursiveDelete($targetLang);
					}

					$targetLang = DIR_EXTENSION . $item . "/catalog/language/" . $language_info['code'];

					if (is_dir($targetLang)) {
						$this->recursiveDelete($targetLang);
					}

				}


			}

			foreach ($selected as $language_id) {
				$this->model_localisation_language->deleteLanguage($language_id);
			}

			$json['success'] = $this->language->get('text_success');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	function recursiveDelete($directory)
	{
		if (!is_dir($directory)) {
			// If it's not a directory, delete the file
			if (file_exists($directory)) { unlink($directory); }
		} else {
			// If it's a directory, delete its contents and then the directory itself
			$files = scandir($directory);

			foreach ($files as $file) {
				if ($file != "." && $file != "..") {
					$path = $directory . '/' . $file;

					$this->recursiveDelete($path);
				}
			}

			// Remove the directory itself after deleting its contents
			rmdir($directory);
		}
	}


	function recursiveCopy($source, $destination)
	{
		if (is_dir($source)) {
			if (!is_dir($destination)) {
				mkdir($destination, 0755, true);
			}

			$files = scandir($source);

			foreach ($files as $file) {
				if ($file != "." && $file != "..") {
					$src = $source . '/' . $file;
					$dst = $destination . '/' . $file;

					$this->recursiveCopy($src, $dst);
				}
			}
		} else {
			copy($source, $destination);
		}
	}




}
