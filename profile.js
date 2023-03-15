
var queries = {};
$.each(document.location.search.substr(1).split('&'),function(c,q){
  var i = q.split('=');
  queries[i[0].toString()] = i[1].toString();
});
console.log(queries.profileid);

if(queries.profileid < 1) {
    window.location.href  = 'login.html';

}
(function(e) {


    var form = $(this);
    
    
    $.ajax({
        type: "GET",
        url: "http://localhost/interview/php/getprofile.php?profileid="+queries.profileid,
        success: function(data)
        {
            
         let result = JSON.parse(data);
         if(result.error){

             alert(result.error); 
         } else if(result.success) {
            $('#profiledata').html(result.success);

         }
        }
    });
    
})();