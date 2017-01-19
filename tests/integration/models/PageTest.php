<?php

use App\Models\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PageTest extends TestCase {

    /*
     every time test class is run, the "Given", the world,
     should be the same. So with DatabaseTransactions, the
     database is rolled back (reset) each time after a test
     is run. The transaction never persists to the database.
     USE DatabaseTransactions every time you are changing a
     database.
    */
    use DatabaseMigrations;


    function setUp()
    {
        parent::setUp(); // was missing

        $this->page = factory(Page::class)->create();
    }

    /** @test */

    function it_shows_admins_custom_html() {

        // Given ('given this world exists'):

        // creates 4 non-core dummy pages and persists them to our test database.
        factory(Page::class, 4)->create();

        // create 2 more dummy pages but make them core (field in db) site pages.
        $corePage = factory(Page::class)->create(['core' => true]);



        // When ('when I execute this action'):

        // method to get a collection, in this case 1 core page.
        $pages = Page::showCorePage();
        // what will happen (then):

        // Then ('then what do I expect to happen?'):

        // I expect that the first core page in the collection
        // will have htmlcode that is the same as what is
        // retrieved with the showpage() method above.
        $this->assertEquals($corePage->htmlcode, $pages->first()->htmlcode);

        // how many records should be returned?
        // 'take' in Page.php indicates 1 only.
        $this->assertCount(1,$pages);


        // When:
        // method to get a collection, in this case 1 core page.
        $pages = Page::showCustomPage();

        // see if the html is viewed when we visit the slug url. Fails test if we haven't
        // set up dynamic url routing yet.
        $this->visit($pages->first()->slug)
            ->see($pages->first()->htmlcode);



    }

}