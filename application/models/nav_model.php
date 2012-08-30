<?php


class Nav_model extends CI_Model 
{
	public function __construct()
    {
        parent::__construct();
        
        
    }
	
  public function nav ($SiteSection)
    {
		if ($SiteSection == 'personnel') {
			$NavLinks = array(
				"Home"=>"home",
				"Services"=>"personnel/services",
				"About"=>"personnel/about",
				"Contact"=>"personnel/contact"
			);
			$SiteSection = "Top of the Line Security";
		} else {
			$NavLinks = array(
				"Home"=>"home",
				"Courses"=>"training/courses",
				"About"=>"training/about",
				"Contact"=>"training/contact"
				);
			$SiteSection = "Top of the Line Security Training";
		}
		
		$Nav = array(
			"NavLinks"=>$NavLinks,
			"SiteSection"=>$SiteSection
			);
		return $Nav;
		
	}
	
}
?>