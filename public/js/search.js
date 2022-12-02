console.log('coucou');

$.ajax({
    dataType: 'json',
    type: 'POST',
    url: 'validation.php',
    data: data,
    success: function(reponse){
        console.log(reponse);
    }
});