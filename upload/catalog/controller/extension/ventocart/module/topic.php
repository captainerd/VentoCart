<?php
namespace Ventocart\Catalog\Controller\Extension\VentoCart\Module;

/**
 * Class Topic
 *
 * @package Ventocart\Catalog\Controller\Extension\Ventocart\Module
 */
class Topic extends \Ventocart\System\Engine\Controller
{
	/**
	 * @return mixed
	 */


	public function index(array $setting = []): mixed
	{


		if (empty($setting))
			return '';
		$this->load->language('extension/ventocart/module/topic');

		if (isset($this->request->get['article_id'])) {
			$data['article_id'] = (int) $this->request->get['article_id'];
		} else {
			$data['article_id'] = 0;
		}

		if (isset($this->request->get['topic_id'])) {
			$data['topic_id'] = (int) $this->request->get['topic_id'];
		} else {
			$data['topic_id'] = 0;
		}
		$data['topics'] = [];


		$this->load->model('cms/topic');
		$this->load->model('cms/article');
		$this->load->model('localisation/language');

		$topics = $this->model_cms_topic->getTopics();


		$articles = $this->model_cms_article->getArticles(['limit' => $setting['limit_topics'], 'start' => 0]);

		if (empty($topics) || empty($articles)) {
			return '';
		}

		$data['hide_date'] = $setting['hidedate'];
		foreach ($articles as $article) {
			$topicDescription = html_entity_decode($article['description']);
			$wordLimit = $setting['preview_word_count'];
			// Strip HTML tags
			$plainText = strip_tags($topicDescription);

			// Count words
			$wordCount = str_word_count($plainText);

			// Truncate to x words if the word count is more than 100
			if ($wordCount > $wordLimit) {
				// Explode the string into an array of words
				$words = explode(' ', $plainText);
				$truncatedText = implode(' ', array_slice($words, 0, $wordLimit));
				$truncatedText .= '...';
				$topicDescription = $truncatedText;
			}
			$dateString = $article['date_added'];


			$formatter = new \IntlDateFormatter($this->config->get('config_language'), \IntlDateFormatter::LONG, \IntlDateFormatter::NONE, 'UTC');
			$dateTime = new \DateTime($dateString);
			$formattedDate = $formatter->format($dateTime);
			if ($setting['hidedate']) {
				$formattedDate = '';
			}

			$data['articles'][] = [
				'article_id' => $article['article_id'],
				'image' => $article['image'],
				'date' => $formattedDate,
				'date_added' => $article['date_added'],
				'name' => $article['name'],
				'preview' => $topicDescription,
				'href' => $this->url->link('cms/blog.info', '&article_id=' . $article['article_id'] . '&topic_id=' . $article['topic_id'])
			];
		}

		foreach ($topics as $topic) {


			$data['topics'][] = [
				'topic_id' => $topic['topic_id'],
				'image' => $topic['image'],
				'name' => $topic['name'] . ($this->config->get('config_article_count') ? ' (' . $this->model_cms_article->getTotalArticles(['filter_topic_id' => $topic['topic_id']]) . ')' : ''),
				'preview' => $topicDescription,
				'href' => $this->url->link('cms/blog', '&topic_id=' . $topic['topic_id'])
			];
		}



		if ($setting['preview']) {
			return $this->load->view('extension/ventocart/module/topic_preview', $data);
		} else {
			return $this->load->view('extension/ventocart/module/topic', $data);

		}

	}
}
