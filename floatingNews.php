<?php
include_once 'floatingNewsConstants.php';
class floatingNews extends floatingNewsConstants
{

    public $numberOfFeedItems;

    //declared here in order to allow blank form entry
    //for ease of tablet and mobile use
    public $rssArray = array(        
            parent::CNN_FEED,
            parent::TIME_FEED,
            parent::PROJ_CENSORED_FEED,
            parent::WIRED_FEED,
            parent::TECH_CRUNCH_FEED,
            parent::REUTERS_FEED,
            parent::ALTERNEET_FEED, 
            parent::MSN_FEED);

    function getNumberofFeedItems()
    {
        if($this->numberOfFeedItems > 0){
            return $this->numberOfFeedItems;
        }else{
            return 40;
        }
    }

    function setNumberofFeedItems($numberFeedItems)
    {
        if ($numberFeedItems > 0) {
            $this->numberOfFeedItems = $numberFeedItems;
        } else {
            $this->numberOfFeedItems = 40;
        }
    }

    function getNewsSources()
    {
        return $this->rssArray;
    }

    function setNewsSources($rssCheckboxesArr)
    {
        $rssArrayValues = array(        
            parent::CNN_FEED,
            parent::TIME_FEED,
            parent::PROJ_CENSORED_FEED,
            parent::WIRED_FEED,
            parent::TECH_CRUNCH_FEED,
            parent::REUTERS_FEED,
            parent::ALTERNEET_FEED, 
            parent::MSN_FEED);
        
        $chosenArray = array();
        
        if(!empty($rssCheckboxesArr)){
            foreach ($rssCheckboxesArr as $selected) {        
                array_push($chosenArray, $rssArrayValues[$selected]);
            }
            $this->rssArray = $chosenArray;
        }else{
            $this->rssArray = $rssArrayValues;
        }
    }

    private function getImageURL($rssFeedUrl)
    {
        if ($this->contains(parent::WIRED_FEED, $rssFeedUrl)) {
            return parent::WIRED_IMAGE;
        }
        
        if ($this->contains(parent::CNN_FEED, $rssFeedUrl)) {
            return parent::CNN_IMAGE;
        }
        
        if ($this->contains(parent::PROJ_CENSORED_FEED, $rssFeedUrl)) {
            return parent::PROJ_CENSORED_IMAGE;
        }
        
        if ($this->contains(parent::TIME_FEED, $rssFeedUrl)) {
            return parent::TIME_IMAGE;
        }
        
        if ($this->contains(parent::TECH_CRUNCH_FEED, $rssFeedUrl)) {
            return parent::TECH_CRUNCH_IMAGE;
        }
        
        if ($this->contains(parent::REUTERS_FEED, $rssFeedUrl)) {
            return parent::REUTERS_IMAGE;
        }
        
        if ($this->contains(parent::ALTERNEET_FEED, $rssFeedUrl)) {
            return parent::ALTERNET_IMAGE;
        }
        
        if ($this->contains(parent::MSN_FEED, $rssFeedUrl)) {
            return parent::MSN_IMAGE;
        }        
    }

    private function contains($stringToFind, $containerString)
    {
        return strpos($containerString, $stringToFind) !== false;
    }

    function getFeed()
    {
        $rss = new DOMDocument();
        
        $feed = array();
        
        foreach ($this->getNewsSources() as $rssFeedUrl) {
            
            $rss->load($rssFeedUrl);
            
            foreach ($rss->getElementsByTagName('item') as $story) {
                $item = array(
                    'feed' => $rssFeedUrl,
                    'image' => $this->getImageURL($rssFeedUrl),
                    'headline' => $story->getElementsByTagName('title')->item(0)->nodeValue,
                    'storyPreview' => $story->getElementsByTagName('description')->item(0)->nodeValue,
                    'link' => $story->getElementsByTagName('link')->item(0)->nodeValue
                );
                
                array_push($feed, $item);
            }
        }
        
        shuffle($feed);
        
        return $feed;
    }

    function pushFeedToScreen($feed)
    {
        if ($this->getNumberofFeedItems() > count($feed)) {
            $maxNum = count($feed);
        } else {
            $maxNum = $this->getNumberofFeedItems();
        }
        
        for ($itemNumber = 0; $itemNumber < $maxNum; $itemNumber ++) {
            $headline = str_replace(' & ', ' &amp; ', $feed[$itemNumber]['headline']);
            $link = $feed[$itemNumber]['link'];
            $storyPreview = $feed[$itemNumber]['storyPreview'];
            
            echo '<div id="parent">';
            echo '<div class="message">';
            echo '<a target="_blank" href="' . $link . '" title="' . $headline . '">';
            echo '<img class="logo" src=' . $feed[$itemNumber]['image'] . '/><br/>';
            echo $headline;
            echo '<div id="sidebar">';
            echo '<div>' . $storyPreview . '</div>';
            echo '</div></div></a></div>';
        }
    }
}

?>