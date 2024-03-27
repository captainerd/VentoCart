<?php

namespace Opencart\System\Library\Session;

/**
 * Class PhpSession
 *
 * @package Opencart\System\Library\Session
 */
class PhpSession {
    
    /**
     * Read session data
     *
     * @param string $session_id
     *
     * @return array
     */
	private object $config;

	/**
     * Constructor
     *
     * @param object $registry
     */
	public function __construct(\Opencart\System\Engine\Registry $registry) {
	 
		$this->config = $registry->get('config');
 
        session_set_cookie_params(  $this->config->get('session_expire'), '/', $this->config->get('session_domain'));
        session_start();

	}
 

    public function read(string $session_id): array {
        // Check if session exists
       
        if (isset($_SESSION[$session_id])) {
            return $_SESSION[$session_id];
        } else {
            return [];
        }
    }
    
    /**
     * Write session data
     *
     * @param string $session_id
     * @param array  $data
     *
     * @return bool
     */
    public function write(string $session_id, array $data): bool {
        // Write session data
        $_SESSION[$session_id] = $data;
    
        return true;
    }
    
    /**
     * Destroy session
     *
     * @param string $session_id
     *
     * @return bool
     */
    public function destroy(string $session_id): bool {
        // Check if session exists before destroying it
        if (isset($_SESSION[$session_id])) {
            unset($_SESSION[$session_id]);
        }
        return true;
    }
    
    /**
     * Garbage Collection (GC) for sessions
     *
     * @return bool
     */
    public function gc(): bool {
        // PHP automatically handles garbage collection for sessions, no need for explicit action
        return true;
    }
}
