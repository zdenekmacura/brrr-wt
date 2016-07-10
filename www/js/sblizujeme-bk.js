
$(document).ready(function(){

	$("#profileForm").submit(function(){
	//var landmarkID = $(this).parent().attr('data-landmark-id');
	var postData = $(this).serialize();
	
	$.ajax({
		type: 'POST',
		//data: postData+'&amp;lid='+landmarkID,
		data: postData,
		url: 'http://www.google.com',
		success: function(data){
			console.log(data);
			alert('Action successful');
		},
		error: function(){
			console.log(data);
			alert('There was an error');
		}
	});
	
	return false;
});

//http://stackoverflow.com/questions/298745/how-do-i-send-a-cross-domain-post-request-via-javascript

	/*function crossDomainPost() {
  // Add the iframe with a unique name
  var iframe = document.createElement("iframe");
  var uniqueString = "CHANGE_THIS_TO_SOME_UNIQUE_STRING";
  document.body.appendChild(iframe);
  iframe.style.display = "none";
  iframe.contentWindow.name = uniqueString;

  // construct a form with hidden inputs, targeting the iframe
  var form = document.createElement("form");
  form.target = uniqueString;
  form.action = "http://INSERT_YOUR_URL_HERE";
  form.method = "POST";

  // repeat for each parameter
  var input = document.createElement("input");
  input.type = "hidden";
  input.name = "INSERT_YOUR_PARAMETER_NAME_HERE";
  input.value = "INSERT_YOUR_PARAMETER_VALUE_HERE";
  form.appendChild(input);

  document.body.appendChild(form);
  form.submit();
}


	$( "#profileForm" ).submit(function( event ) {
		var d = 'jarda';
		//$("#result").hide(300);
	//$("#result").empty().append("asasdasdasdsadasdasdasdsa");
			$.post( "http://zenyprotinasilnikum.cz/sblizujeme/result/index.php", function( data, status ) {
  		//alert( "Data Loaded:wwww " + data );
  		        alert("Data: " + data + "\nStatus: " + status);

		});
	$("#button").click(function(){
		$.post( "test.php", { name: "John", time: "2pm" })
  .done(function( data ) {
    alert( "Data Loaded: " + data );
  });
    //$.post("demo_test.asp", function(data, status){
      //  alert("Data: " + data + "\nStatus: " + status);
    //});
//});
	//$("#result").hide(3000);

  	//	alert( "Data Loaded:wwww dfsdfsdfsdf" + d);
  	//	alert( "Daw dfsdfsdfsdf" + d);
		//$.post( "http://zenyprotinasilnikum.cz/sblizujeme/result/index.php", function( data ) {
  		//alert( "Data Loaded:wwww " + data );
		//});
	//$("#result").hide(3000);
	});
	//$("#").click(function(){
	$("#result").click(function(){
		$("#profileForm").hide(300);
		$.post( "http://www.google.com", function( data, status ) {
  		//alert( "Data Loaded:wwww " + data );
  		        alert("Data: " + data + "\nStatus: " + status);

		});
		//alert("Data: " );
   		//$.post("http://zenyprotinasilnikum.cz/sblizujeme/result/index.php", function(data, status){
        //alert("Data: " + data + "\nStatus: " + status);
    	//});
	});
   			//alert( "Data Loaded: ");

  		// Stop form from submitting normally
  		//event.preventDefault();
 
  		// Get some values from elements on the page:
  		//var $form = $( this ),
    	//term = $form.find( "input[name='s']" ).val(),
    	//term = $( "#profileForm" ).serialize()
    	//url = $form.attr( "action" );
 		//url ='http://zenyprotinasilnikum.cz/sblizujeme/result/';
  		// Send the data using post
  		//var posting = $.post( url, $( "#profileForm" ).serialize());
 
  		// Put the results in a div
  		//posting.done(function( data ) {
  		//	alert( "Data Loaded:sss " + data );
    	//	var content = $( data ).find( "#content" );
    	//	$( "#result" ).empty().append( content );
 		//});
	//});
});