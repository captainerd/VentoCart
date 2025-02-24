<?php
namespace Ventocart\Catalog\Model\Cms;
/**
 * Class Topic
 *
 * @package Ventocart\Catalog\Model\Cms
 */
class Topic extends \Ventocart\System\Engine\Model
{
	/**
	 * @param int $topic_id
	 *
	 * @return array
	 */
	public function getTopic(int $topic_id): array
	{
		$sql = "SELECT DISTINCT * 
		FROM `" . DB_PREFIX . "topic` `t` 
		LEFT JOIN `" . DB_PREFIX . "topic_description` `td` ON (`t`.`topic_id` = `td`.`topic_id`) 
		WHERE `t`.`topic_id` = '" . (int) $topic_id . "' 
		AND `td`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'";

		$topic_data = $this->cache->get('topic.' . md5($sql));

		if (!$topic_data) {
			$query = $this->db->query($sql);

			$topic_data = $query->row;

			$this->cache->set('topic.' . md5($sql), $topic_data);
		}

		return $topic_data;
	}

	/**
	 * @return array
	 */
	public function getTopics(): array
	{


		$sql = "SELECT * FROM `" . DB_PREFIX . "topic` `t`
				LEFT JOIN `" . DB_PREFIX . "topic_description` `td` ON (`t`.`topic_id` = `td`.`topic_id`)
 
				WHERE `td`.`language_id` = '" . (int) $this->config->get('config_language_id') . "'";



		$topic_data = $this->cache->get('topic.' . md5($sql));

		if (!$topic_data) {
			$query = $this->db->query($sql);
			$topic_data = $query->rows;
			$this->cache->set('topic.' . md5($sql), $topic_data);
		}

		return $topic_data;
	}

}
