$( document ).ready(function() {
    $( ".all" ).click(function() {
  		$(".cadre-web").css( "display", "block" );
  		$(".cadre-pao").css( "display", "block" );
  		$(".cadre-photo").css( "display", "block" );
	});
	$( ".web" ).click(function() {
  		$(".cadre-web").css( "display", "block" );
  		$(".cadre-pao").css( "display", "none" );
  		$(".cadre-photo").css( "display", "none" );
	});
	$( ".pao" ).click(function() {
  		$(".cadre-web").css( "display", "none" );
  		$(".cadre-pao").css( "display", "block" );
  		$(".cadre-photo").css( "display", "none" );
	});
	$( ".photo" ).click(function() {
  		$(".cadre-web").css( "display", "none" );
  		$(".cadre-pao").css( "display", "none" );
  		$(".cadre-photo").css( "display", "block" );
	});


// Validation formulaire
    
  $("#mail").keyup(function(){
    if(!$("#mail").val().match(/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/) ) {
      $("#mail").addClass("wrong");
    } else {
      $("#mail").removeClass("wrong");
    }
  });

  $("#name").keyup(function(){
    var nbName = $("#name").val().length;
    console.log(nbName);
    if(nbName > 50) {
      $("#name").addClass("wrong");
    } else {
      $("#name").removeClass("wrong");
    }
  });

  $("#objet").keyup(function(){
    var nbObjet = $("#objet").val().length;
    console.log(nbObjet);
    if(nbObjet > 100) {
      $("#objet").addClass("wrong");
    } else {
      $("#objet").removeClass("wrong");
    }
  });

  $("#msg").keyup(function(){
    var nbMsg = $("#msg").val().length;
    console.log(nbMsg);
    if(nbMsg < 6 || nbMsg > 1666) {
      $("#msg").addClass("wrong");
    } else {
      $("#msg").removeClass("wrong");
    }
  });

  // Message d'envoi

  
  

});
