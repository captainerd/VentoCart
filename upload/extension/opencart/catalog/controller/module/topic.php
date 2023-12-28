<?php
namespace Opencart\Catalog\Controller\Extension\Opencart\Module;
/**
 * Class Topic
 *
 * @package Opencart\Catalog\Controller\Extension\Opencart\Module
 */
class Topic extends \Opencart\System\Engine\Controller {
	/**
	 * @return string
	 */

 
	public function index(array $setting = []): string {
		if (empty($setting)) return '';
		$this->load->language('extension/opencart/module/topic');

		if (isset($this->request->get['topic_id'])) {
			$data['topic_id'] = (int)$this->request->get['topic_id'];
		} else {
			$data['topic_id'] = 0;
		}
	 
		$data['topics'] = [];

		$data['topics'][] = [
			'topic_id' => 0,
			'name'     => $this->language->get('text_all') . ($this->config->get('config_article_count') ? ' (' . $this->model_cms_article->getTotalArticles() . ')' : ''),
			'href'     => $this->url->link('cms/blog', 'language=' . $this->config->get('config_language'))
		];

		$this->load->model('cms/topic');
		$this->load->model('cms/article');

		$topics = $this->model_cms_topic->getTopics();
	 
		foreach ($topics as $topic) {
			$topicDescription = html_entity_decode($topic['description']);
			$wordLimit = $setting['preview_word_count'];
			// Strip HTML tags
			$plainText = strip_tags($topicDescription);
			
			// Count words
			$wordCount = str_word_count($plainText);
			
			// Truncate to x words if the word count is more than 100
			if ($wordCount >$wordLimit ) {
				// Explode the string into an array of words
				$words = explode(' ', $plainText);
			
				// Take the first x words and join them back into a string
				$truncatedText = implode(' ', array_slice($words, 0, $wordLimit ));
			
				// Add ellipsis (...) to indicate truncation
				$truncatedText .= '...';
			
				// Assign the truncated text back to $topicDescription
				$topicDescription = $truncatedText;
			}
			
			$data['topics'][] = [
				'topic_id' => $topic['topic_id'],
				'name'     => $topic['name'] . ($this->config->get('config_article_count') ? ' (' . $this->model_cms_article->getTotalArticles(['filter_topic_id' => $data['topic_id']]) . ')' : ''),
				'preview'  => $topicDescription,
				'href'     => $this->url->link('cms/blog', 'language=' . $this->config->get('config_language') . '&topic_id=' . $topic['topic_id'])
			];
		}
		if ($setting['preview']) {
		return $this->load->view('extension/opencart/module/topic_preview', $data);
		} else {
		 return $this->load->view('extension/opencart/module/topic', $data);
		}
	}
}
