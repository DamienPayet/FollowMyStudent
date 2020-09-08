var arr = new Array();


function startquest(){
  $.ajax({
    type:'GET',
    url:"questions",
    data: {
      _token: '{{csrf_token()}}'
    },
    dataType: 'JSON',
    success:function(response){
      console.log(response);
      arr.push(response);
      arr.push(1);
      questionnaire();
    },
    error: function(){console.log('Erreur');}
  });
  return "ok";
}

function questionnaire(){
  resetscreen();
  affichage();

}
function affichage(){
  console.log(arr[1] +' vs '+ arr[0].parts.length );
  if(( arr[1] < arr[0].parts.length +1 ) == true){
    var page = '   <br><br> <div class="col-md-10 ml-auto col-xl-6 mr-auto"> <div class="card"> <div class="card-header"> <ul class="nav nav-tabs justify-content-center" role="tablist"> <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"> '+arr[0].parts[arr[1]-1].titre+' '+arr[1]+'/'+arr[0].parts.length +' </a> </li> </ul> </div> <div class="card-body"> <!-- Tab panes --> <div class="tab-content text-center"> <div class="tab-pane active" id="home" role="tabpanel"> ';
    for (var i = 0; i < arr[0].questions.length; i++)
    {
      if (arr[0].questions[i].part_id === arr[1]){
        page += '<p>'+ arr[0].questions[i].question +'</p>' ;
        page += '<input type="text" id='+arr[0].questions[i].id+'>' ;
      }
    }
    page += ' <br><bouton class="btn btn-lg btn-info"  onclick="next()">next</button></div> </div> </div> </div> </div>';
    var element = document.getElementById("acceuil");
    var newDiv = document.createElement("div");
    element.appendChild(newDiv);
    newDiv.id = "wizard";
    document.getElementById("wizard" ).innerHTML = page;
    // Retour Haut de la page
    window.top.window.scrollTo(0,0);
  }else {
    document.location.href="questions_start"
  }

}
function next(){
  stockage();
  arr[1] = arr[1] + 1;
  questionnaire();

}

function stockage(){
  var tab = new Array();
  for (var i = 0; i < arr[0].questions.length; i++)
  {
    if (arr[0].questions[i].part_id === arr[1]){
      var reponse = new Array();
      reponse.push(arr[0].questions[i].id);
      reponse.push(document.getElementById(arr[0].questions[i].id).value);
      tab.push(reponse);
    }
  }
console.log(tab);
  $.ajax({
    type:'get',
    url:"response_store",
    data: {
      _token: '{{csrf_token()}}',
      tab : tab
    },
    dataType: 'JSON',
    success:function(response){
      console.log(response);
    },
    error: function(){console.log('Erreur');}
  });
  return "ok";
}

function resetscreen(){
  var element = document.getElementById("acceuil");
  while (element.firstChild) {
    element.removeChild(element.firstChild);
  }
}
