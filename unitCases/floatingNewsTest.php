<?php
require_once 'floatingNews.php';

class floatingNewsTest extends PHPUnit_Framework_TestCase
{

    private $floatingNews;
    private $choices;

    protected function setUp()
    {
        parent::setUp();
        
        $this->floatingNews = new floatingNews(/* parameters */);
        $this->floatingNews->numberOfFeedItems = 10;
        $this->choices = array(1, 3, 7);
        $this->floatingNews->setNewsSources($this->choices);
    }

    protected function tearDown()
    {
        // TODO Auto-generated floatingNewsTest::tearDown()
        $this->floatingNews = null;
        
        parent::tearDown();
    }

    public function testImportedConstants()
    {
       // $this->assertNotEquals(null, $this->floatingNews->MSN_FEED);
    }

    public function testGetNumberofFeedItems()
    {
        $numFeed = $this->floatingNews->getNumberofFeedItems();
        
        $this->assertEquals(10, $numFeed);
    }

    public function testSetNumberofFeedItems()
    {   
        $this->floatingNews->setNumberofFeedItems(null);
        $numFeedItems = $this->floatingNews->getNumberofFeedItems();
        
        $this->assertEquals(40, $numFeedItems);
        
        $this->floatingNews->setNumberofFeedItems(100);
        $numFeedItems = $this->floatingNews->getNumberofFeedItems();
        
        $this->assertEquals(100, $numFeedItems);
    }

    public function testGetNewsSources()
    {
        $this::assertNotEquals(null, $this->choices);
        
        $this::assertEquals("http://feeds2.feedburner.com/time/topstories",  
            $this->floatingNews->getNewsSources()[0]);
        
        $this::assertEquals("http://feeds.wired.com/wired/index", 
            $this->floatingNews->getNewsSources()[1]);
        
        $this::assertEquals("http://rss.msn.com/",  $this->floatingNews->getNewsSources()[2]);
         
    }

    public function testSetNewsSourcesWithNullValue()
    {   
        $this->choices = null;
        $this->floatingNews->setNewsSources($this->choices);
        
        $this::assertEquals(null, $this->choices);
        
        $this::assertEquals("http://feeds2.feedburner.com/time/topstories",
            $this->floatingNews->getNewsSources()[1]);
        
        $this::assertEquals("http://feeds.wired.com/wired/index",
            $this->floatingNews->getNewsSources()[3]);
        
        $this::assertEquals("http://rss.msn.com/",  $this->floatingNews->getNewsSources()[7]);        
    }
    
    public function testSetNewsSourcesWithAllValues()
    {
        $this->choices = array(0,1,2,3,4,5,6,7);
        $this->floatingNews->setNewsSources($this->choices);
    
        $this::assertEquals("http://feeds2.feedburner.com/time/topstories",
            $this->floatingNews->getNewsSources()[1]);
    
        $this::assertEquals("http://feeds.wired.com/wired/index",
            $this->floatingNews->getNewsSources()[3]);
    
        $this::assertEquals("http://rss.msn.com/",  $this->floatingNews->getNewsSources()[7]);
    }    

    public function testGetFeed()
    {
        $feed = $this->floatingNews->getFeed();
        $this::assertNotEquals(null,  $feed);
        $this::assertNotEquals(null,  $feed[0]['feed']);
        $this::assertNotEquals(null,  $feed[0]['image']);
        $this::assertNotEquals(null,  $feed[0]['headline']);
        $this::assertNotEquals(null,  $feed[0]['storyPreview']);
        $this::assertNotEquals(null,  $feed[0]['link']);
    }

    public function testPushFeedToScreen()
    {
        //not implemented , several unit cases not implemented; only providing examples of work
        // TODO Auto-generated floatingNewsTest->testPushFeedToScreen()
        $this->markTestIncomplete("pushFeedToScreen test not implemented");
        
        $this->floatingNews->pushFeedToScreen(/* parameters */);
    }
}

