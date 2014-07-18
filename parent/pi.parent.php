<?php
class Plugin_parent extends Plugin
{

	var $meta = array(
		'name'       => 'Parent Page Helper',
		'version'    => '1.0',
		'author'     => 'Andrew Munsell',
		'author_url' => 'http://andrewmunsell.com/'
	);

	/**
	 * Retrieve the parent page
	 * @return Array Array containing the content of the parent page
	 */
	private function getParent() {
		$parent = URL::popLastSegment(URL::getCurrent(false));
		return Content::get($parent);
	}

	/**
	 * Retrieve any var from the parent page's YAML
	 * @return String Variable from the parent page
	 */
	public function index()
	{
		$page = $this->getParent();
		$var = $this->fetchParam('var', false, null, false, false);
		
		// Exit if no $var
        	if (!$var)
        	{
            		return NULL;
        	}
		
		return count($page) == 0 ? null: $page[$var];
	}

	/**
	 * Retrieve the title of the parent page
	 * @return String Title of the parent page
	 */
	public function title()
	{
		$page = $this->getParent();

		return count($page) == 0 ? null: $page['title'];
	}

	/**
	 * Retrieve the URL of the parent page
	 * @return String URL of the parent page
	 */
	public function url()
	{
		$page = $this->getParent();

		return count($page) == 0 ? null: $page['url'];
	}
}
