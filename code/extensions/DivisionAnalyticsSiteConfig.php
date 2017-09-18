<?php

class DivisionAnalyticsSiteConfig extends DataExtension {

	private static $db = array(
		'GoogleAnalyticsID' => 'Text',
		'DisableUITracking' => 'Boolean',
	);

	private static $has_one = array(

	);

	private static $defaults = array(

	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldToTab('Root.Main', new TextField('GoogleAnalyticsID', 'Google Analytics ID (UA-XXXXX-X)'), 'PosterImage');
		$fields->addFieldToTab('Root.Main', new CheckboxField('DisableUITracking', 'Disable UI Tracking Utility'), 'PosterImage');

		return $fields;
	}

	public function UITrackingID(){
		$config = SiteConfig::current_site_config(); 

		$prefix = 'uiowa.edu.md-';
		$filter = URLSegmentFilter::create();
		$siteName = $config->Title;

		$filteredSiteName = $filter->filter($siteName);

		return $prefix.$filteredSiteName;

	}

}