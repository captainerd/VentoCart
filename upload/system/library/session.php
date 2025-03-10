<?php
/**
 * @package		VentoCart
 * @author		Daniel Kerr
 * @copyright	Copyright (c) 2005 - 2022, VentoCart, Ltd. (https://www.ventocart.com/)
 * @license		https://opensource.org/licenses/GPL-3.0
 * @link		https://www.ventocart.com
 */
namespace Ventocart\System\Library;
/**
 * Class Session
 */
class Session
{
	/**
	 * @var object
	 */
	protected object $adaptor;
	/**
	 * @var string
	 */
	protected string $session_id;
	/**
	 * @var array
	 */
	public array $data = [];

	/**
	 * Constructor
	 *
	 * @param string $adaptor
	 * @param object $registry
	 */
	public function __construct(string $adaptor, \Ventocart\System\Engine\Registry $registry)
	{
		$class = 'Ventocart\System\Library\Session\\' . $adaptor;

		if (class_exists($class)) {
			if ($registry) {
				$this->adaptor = new $class($registry);
			} else {
				$this->adaptor = new $class();
			}

			register_shutdown_function([&$this, 'close']);
			register_shutdown_function([&$this, 'gc']);
		} else {
			throw new \Exception('Error: Could not load session adaptor ' . $adaptor . ' session!');
		}
	}

	/**
	 * Get Session ID
	 *
	 * @return string
	 */
	public function getId(): string
	{
		return $this->session_id;
	}

	/**
	 * Start
	 *
	 * Starts a session.
	 *
	 * @param string $session_id
	 *
	 * @return string Returns the current session ID.
	 */
	public function start(string $session_id = ''): string
	{
		if (empty($session_id)) {
			if (function_exists('random_bytes')) {
				$session_id = substr(bin2hex(random_bytes(26)), 0, 26);
			} else {
				$session_id = substr(bin2hex(openssl_random_pseudo_bytes(26)), 0, 26);
			}
			// Your chances are low, but never zero.
			if (!empty($this->adaptor->read($session_id))) {
				return $this->start();
			}
		}

		if (preg_match('/^[a-zA-Z0-9,\-]{22,52}$/', $session_id)) {
			$this->session_id = $session_id;
		} else {
			throw new \Exception('Error: Invalid session ID!');
		}

		$this->data = $this->adaptor->read($session_id);

		return $session_id;
	}

	/**
	 * Close
	 *
	 * Writes the session data to storage
	 *
	 * @return void
	 */
	public function close(): void
	{
		$this->adaptor->write($this->session_id, $this->data);
	}

	/**
	 * Destroy
	 *
	 * Deletes the current session from storage
	 *
	 * @return void
	 */
	public function destroy(): void
	{
		$this->data = [];

		$this->adaptor->destroy($this->session_id);
	}

	/**
	 * GC
	 *
	 * Garbage Collection
	 *
	 * @return void
	 */
	public function gc(): void
	{
		$this->adaptor->gc($this->session_id);
	}
}
