<?php
namespace Ventocart\Admin\Model\Setting;

/**
 * Class Event
 *
 * @package Ventocart\Admin\Model\Setting
 */
class Event extends \Ventocart\System\Engine\Model
{
	/**
	 * Path to the events cache file
	 */
	const EVENTS_CACHE_FILE = DIR_STORAGE . 'events.php';
	/**
	 * Add a new event to the events cache.
	 *
	 * @param string $code The unique code for the event.
	 * @param string $description A brief description of the event.
	 * @param string $trigger The event trigger path.
	 * @param string $action The action to be performed when the event is triggered.
	 * @param bool $status The status of the event (active or inactive).
	 * @param int $sort_order The sort order of the event.
	 * @return int The ID of the newly created event.
	 */
	public function addEvent(string $code, string $description, string $trigger, string $action, bool $status, int $sort_order): int
	{
		$events = $this->deleteEventByCode($code);

		$keytrigger = ucfirst($trigger);

		// Generate a new event ID (based on the next available integer)
		$event_id = $this->countEventIds($events) + 1;

		// Add the new event to the corresponding trigger
		$events[$keytrigger][] = [
			'event_id' => $event_id,
			'code' => $code,
			'description' => $description,
			'trigger' => $trigger,
			'action' => $action,
			'status' => $status ? 1 : 0, // Convert boolean to integer (1 or 0)
			'sort_order' => $sort_order,
		];

		// Save the updated events array to the cache file
		$this->saveEvents($events);

		return $event_id;  // Return the generated event ID
	}

	/**
	 * Delete an event by its ID.
	 *
	 * @param int $event_id
	 * @return void
	 */
	public function deleteEvent(int $event_id): void
	{
		// Load current events from the cache file
		$events = include self::EVENTS_CACHE_FILE;

		// Iterate over each trigger to find and remove the event by ID
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as $index => $event) {
				if ($event['event_id'] === $event_id) {
					unset($triggerEvents[$index]);
					break 2; // Break out of both loops once the event is found and deleted
				}
			}
		}

		// Save the updated events array to the cache file
		$this->saveEvents($events);
	}

	/**
	 * Delete an event by its code.
	 *
	 * @param string $code
	 * @return void
	 */
	public function deleteEventByCode(string $code): array
	{

		// Load current events from the cache file
		$events = include self::EVENTS_CACHE_FILE;

		// Iterate over each trigger to find and remove the event by code
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as $index => &$event) {
				if ($event['code'] === $code) {

					unset($triggerEvents[$index]);
					if (count($triggerEvents) == 0) {
						unset($events[$trigger]);
					}

				}
			}
		}

		// Save the updated events array to the cache file
		$this->saveEvents($events);
		return $events;

	}

	/**
	 * Edit the status of an event by its ID.
	 *
	 * @param int  $event_id
	 * @param bool $status
	 * @return void
	 */
	public function editStatus(int $event_id, bool $status): void
	{

		// Load current events from the cache file
		$events = include self::EVENTS_CACHE_FILE;

		// Iterate over each trigger to find the event by ID and update its status
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as &$event) {
				if ($event['event_id'] == $event_id) {

					$event['status'] = $status;

					break 2; // Break out of both loops once the event is found and updated
				}
			}
		}

		// Save the updated events array to the cache file
		$this->saveEvents($events);
	}

	/**
	 * Edit the status of an event by its code.
	 *
	 * @param string $code
	 * @param bool   $status
	 * @return void
	 */
	public function editStatusByCode(string $code, bool $status): void
	{
		// Load current events from the cache file
		$events = include self::EVENTS_CACHE_FILE;


		// Iterate over each trigger to find the event by code and update its status
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as &$event) {
				if ($event['code'] === $code) {
					$event['status'] = $status;
					break 2; // Break out of both loops once the event is found and updated
				}
			}
		}

		// Save the updated events array to the cache file
		$this->saveEvents($events);

	}

	/**
	 * Get a specific event by its ID.
	 *
	 * @param int $event_id
	 * @return array
	 */
	public function getEvent(int $event_id): array
	{
		// Load events from the cache file
		$events = $this->getEvents();

		// Search through each trigger's events for the given event_id
		foreach ($events as $trigger => $triggerEvents) {
			foreach ($triggerEvents as $event) {
				if ($event['event_id'] === $event_id) {
					return $event;
				}
			}
		}

		// Return an empty array if event doesn't exist
		return [];
	}

	/**
	 * Get a specific event by its code.
	 *
	 * @param string $code
	 * @return array
	 */
	public function getEventByCode(string $code): array
	{
		// Load events from the cache file
		$events = $this->getEvents();

		// Iterate over each trigger's events to find the event by code
		foreach ($events as $trigger => $triggerEvents) {
			foreach ($triggerEvents as $event) {
				if ($event['code'] === $code) {
					return $event;
				}
			}
		}

		// Return an empty array if event doesn't exist
		return [];
	}

	/**
	 * Get all events, optionally filtered by criteria.
	 *
	 * @param array $data
	 * @return array
	 */
	public function getEvents(array $data = []): array
	{

		// Load events from the cache file
		if (file_exists(self::EVENTS_CACHE_FILE)) {
			$events = include self::EVENTS_CACHE_FILE;

			// Prepare a new array to store events in a numeric index format (like from DB)
			$flatEvents = [];

			// Loop through events grouped by trigger and flatten them
			foreach ($events as $trigger => $triggerEvents) {
				foreach ($triggerEvents as $event) {
					// Assign numeric index to each event and add it to the flat array
					$flatEvents[] = [
						'event_id' => $event['event_id'],
						'code' => $event['code'],
						'description' => $event['description'],
						'trigger' => $event['trigger'],
						'action' => $event['action'],
						'status' => $event['status'],
						'sort_order' => $event['sort_order'],
					];
				}
			}

			// Pagination logic using 'start' and 'limit'
			$start = isset($data['start']) ? (int) $data['start'] : 0;  // Default to 0 if not set
			$limit = isset($data['limit']) ? (int) $data['limit'] : 10; // Default to 10 if not set

			// Slice the events array to return only the items for the current page
			$flatEvents = array_slice($flatEvents, $start, $limit);

			return $flatEvents; // Return the paginated, flat array of events
		}

		return [];
	}




	/**
	 * Get the total number of events.
	 *
	 * @return int
	 */
	public function getTotalEvents(): int
	{
		// Load events from the cache file
		$events = $this->getEvents();

		// Count the total number of events across all triggers
		$total = 0;
		foreach ($events as $trigger => $triggerEvents) {
			$total += count($triggerEvents);
		}

		return $total;
	}

	/**
	 * Save the events array to the cache file.
	 *
	 * @param array $events
	 * @return void
	 */
	private function saveEvents(array $events): void
	{
		// Save the updated events array to the events cache file
		file_put_contents(
			self::EVENTS_CACHE_FILE,
			"<?php\n\nreturn " . var_export($events, true) . ";\n"
		);

	}

	private function countEventIds(array $collection): int
	{
		$count = 0;

		foreach ($collection as $item) {
			if (is_array($item)) {
				// Check if 'event_id' exists in the current array
				if (isset($item['event_id'])) {
					$count++;
				}
				// Recurse into sub-array
				$count += $this->countEventIds($item);
			}
		}

		return $count;
	}
}