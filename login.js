$("#login-form").submit(function(e) {

    e.preventDefault(); // avoid to execute the actual submit of the form.

    var form = $(this);
    
    
    $.ajax({
        type: "POST",
        url: "http://localhost/interview/php/login.php",
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            
         let result = JSON.parse(data);
         if(result.error){

             alert(result.error); 
         } else if(result.success) {
            window.location.href  = 'profile.html?profileid='+result.success;

         }
        }
    });
    
});