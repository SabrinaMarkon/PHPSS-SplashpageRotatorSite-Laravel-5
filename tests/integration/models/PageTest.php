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

    To set up the test database in the first place, use
    php artisan migrate --database mysql_testing

    And to phpunit.xml add
    <env name="DB_CONNECTION" value="mysql_testing"/>
    */
    //use DatabaseMigrations;


    function setUp()
    {
        parent::setUp(); // was missing

//        $this->page = factory(Page::class)->create();
    }

    /** @test */

    function it_shows_admins_custom_html() {

        // Given ('given this world exists'):

// UNCOMMENT BELOW IF WE WANT TO MAKE RANDOM FAKER DATA INSTEAD OF COPYING REAL DB EXACTLY.
//        // creates 4 non-core dummy pages and persists them to our test database.
//        factory(Page::class, 5)->create();
//
//        // create 1 more dummy pages but make them core (field in db) site pages.
//        $corePage = factory(Page::class)->create(['core' => true]);
//


        // When ('when I execute this action'):
        // method to get a collection, in this case 1 core page.
        $pages = Page::showCorePage();
        // what will happen (then):
        // Then ('then what do I expect to happen?'):
        // I expect that the first core page in the collection
        // will have htmlcode that is the same as what is
        // retrieved with the showpage() method above.
//  UNCOMMENT BELOW LINE IF WE CREATE FAKER ROWS INSTEAD OF COPY OF LIVE DB:
//        $this->assertEquals($corePage->htmlcode, $pages->first()->htmlcode);
        $this->visit($pages->first()->slug)
            ->see($pages->first()->htmlcode);
        // how many records should be returned?
        // 'take' in Page.php indicates 1 only.
        $this->assertCount(1,$pages);


        // When:
        // method to get a collection, in this case 1 custom (non-core) page.
        $pages = Page::showCustomPage();
        // see if the html is viewed when we visit the slug url. Fails test if we haven't
        // set up dynamic url routing yet.
        $this->visit($pages->first()->slug)
            ->see($pages->first()->htmlcode);


        // When:
        // method to get a collection, in this case 1 custom (non-core) page.
        $pages = Page::countCustomPages();
        // how many non-core custom pages should be returned?
        // 'take' in Page.php indicates 4. There should be 4.
        $this->assertCount(13, $pages);


    }

}