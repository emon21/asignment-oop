<?php



class Book
{
    // TODO: Add properties as Private

    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies)
    {
        // TODO: Initialize properties
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }


    // TODO: Add getTitle method

    function getTitle()
    {
        return $this->title;
    }


    // TODO: Add getAvailableCopies method

    function getAvailableCopies()
    {

        return $this->availableCopies;
    }


    // TODO: Add borrowBook method

    public function borrowBook()
    {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }


    // TODO: Add returnBook method


    public function returnBook()
    {
        $this->availableCopies++;
    }
}


// Member Class

class Member
{
    // TODO: Add properties as Private

    private $name;
    private $borrowedBooks;


    public function __construct($name)
    {
        // TODO: Initialize properties
        $this->name = $name;
    }

    // TODO: Add getName method

    function getName()
    {
        return $this->name;
    }


    // TODO: Add getAvailableCopies method

    public function borrowBook($book)
    {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            echo $this->name . " borrowed \"" . $book->getTitle() . "\".\n";
        } else {
            echo "No available copies of \"" . $book->getTitle() . "\" for " . $this->name . " to borrow.\n";
        }
    }

    // TODO: Add borrowBook method

    public function returnBook($book)
    {
        $book->returnBook();
        $index = array_search($book, $this->borrowedBooks);
        if ($index !== false) {
            unset($this->borrowedBooks[$index]);
            echo $this->name . " returned \"" . $book->getTitle() . "\".\n";
        }
    }
    // TODO: Add returnBook method

    public function getBorrowedBooks()
    {
        return $this->borrowedBooks;
    }
}




echo "\n";

// Create books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);


// Create members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");


echo "\n ---------------------- Book ------------------\n";


echo  "Book 1 - Name : {$book1->getTitle()} \n";
echo "Book 2 - Name : {$book2->getTitle()} ";

// $book1->borrowBook($member1);
// $book1->borrowBook($member1);



echo "\n ------------------- Member ------------------\n\n";

echo "Member 1 - Name : " . $member1->getName() . "\n";
echo "Member 2 - Name : " . $member2->getName() . "\n";

echo "-------------------------------------\n";


// Members borrowing books
$member1->borrowBook($book1); // John Doe borrows "The Great Gatsby"
$member2->borrowBook($book2); // Jane Smith borrows "To Kill a Mockingbird"

echo "-------------------------------------\n";




// Display available copies
echo "Available copies of \"" . $book1->getTitle() . "\": " . $book1->getAvailableCopies() . "\n";
echo "Available copies of \"" . $book2->getTitle() . "\": " . $book2->getAvailableCopies() . "\n";

echo "-------------------------------------\n";

// Members returning books
$member1->returnBook($book1); // John Doe returns "The Great Gatsby"
$member2->returnBook($book2); // Jane Smith returns "To Kill a Mockingbird"


echo "-------------------------------------\n";


// Display available copies again
echo "Available copies of \"" . $book1->getTitle() . "\": " . $book1->getAvailableCopies() . "\n";
echo "Available copies of \"" . $book2->getTitle() . "\": " . $book2->getAvailableCopies() . "\n";
