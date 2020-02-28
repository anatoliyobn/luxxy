var books = $('.book');
current = 0;
books.hide();
Rotator();
function Rotator() {
    $(books[current]).fadeIn('slow').delay(3000).fadeOut('slow');
    $(books[current]).queue(function() {
        current = current < books.length - 1 ? current + 1 : 0;
        Rotator();
        $(this).dequeue();
    }); 
 } 