$('#asset').show(1000, function(){
  setTimeout(function(){
    $('#asset').hide(500);
  }, 1000);
});

$('#bingo').click(function() {
        console.log('click');
    });