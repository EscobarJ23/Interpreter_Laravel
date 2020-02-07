<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BookList;
use App\Book;
use App\Interpreter;

class Interpretador extends Controller
{
    public function Index ()
    {

        echo('BEGIN TESTING INTERPRETER PATTERN');
        echo("<br/>");
      
        //load BookList for test data
        $bookList = new BookList();
        $inBook1 = new Book('PHP for Cats','Larry Truett');
        $inBook2 = new Book('MySQL for Cats','Larry Truett');
        $bookList->addBook($inBook1);
        $bookList->addBook($inBook2);
       
        $interpreter = new Interpreter($bookList);
       
        echo('test 1 - invalid request missing "book"');
        echo("<br/>");
        echo($interpreter->interpret('author 1'));
        echo("<br/>");

       
        echo('test 2 - valid book author request');
        echo("<br/>");
        echo($interpreter->interpret('book author 1'));
        echo("<br/>");

        echo('test 3 - valid book title request');
        echo("<br/>");
        echo($interpreter->interpret('book title 2'));
        echo("<br/>");
      
        echo('test 4 - valid book author title request');
        echo("<br/>");
        echo($interpreter->interpret('book author title 1'));
        echo("<br/>");
      
        echo('test 5 - invalid request with invalid book number');
        echo("<br/>");
        echo($interpreter->interpret('book title 3'));
        echo("<br/>");
      
        echo('test 6 - invalid request with nuo numeric book number');
        echo("<br/>");
        echo($interpreter->interpret('book title one'));
        echo("<br/>");
        
      
        echo('END TESTING INTERPRETER PATTERN');
      
        
        return view("Index");
      
    }

    function echo($line_in) {
        echo $line_in."<br/>";
      }

}

?>
