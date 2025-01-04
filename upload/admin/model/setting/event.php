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
	 * Add a new event.
	 *
	 * @param array $data
	 * @return int
	 */
	public function addEvent(array $data): int
	{
		// Load current events from the cache file
		$events = $this->getEvents();

		// Generate a new event ID (based on the next available integer)
		$event_id = count($events) + 1;

		// Get the trigger key from the event data
		$trigger = $data['trigger'];

		// If no events exist for this trigger, initialize it as an array
		if (!isset($events[$trigger])) {
			$events[$trigger] = [];
		}

		// Add the new event to the corresponding trigger
		$events[$trigger][] = [
			'event_id' => $event_id,
			'code' => $data['code'],
			'description' => $data['description'],
			'trigger' => $data['trigger'],
			'action' => $data['action'],
			'status' => $data['status'],
			'sort_order' => $data['sort_order'],
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
		$events = $this->getEvents();

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
	public function deleteEventByCode(string $code): void
	{
		// Load current events from the cache file
		$events = $this->getEvents();

		// Iterate over each trigger to find and remove the event by code
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as $index => $event) {
				if ($event['code'] === $code) {
					unset($triggerEvents[$index]);
					break 2; // Break out of both loops once the event is found and deleted
				}
			}
		}

		// Save the updated events array to the cache file
		$this->saveEvents($events);
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
		$events = $this->getEvents();

		// Iterate over each trigger to find the event by ID and update its status
		foreach ($events as $trigger => &$triggerEvents) {
			foreach ($triggerEvents as &$event) {
				if ($event['event_id'] === $event_id) {
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
		$events = $this->getEvents();

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
}