
// lorsque le dom se charge, on effectue la fonction "main"
document.readyState === "loading"
  ? window.addEventListener("DOMContentLoaded", main)
  : main();
  // la fonction main permet de créer une question au click du bouton 
function main() {
  // bouton pour ajouter une question
  const boutonQuestion = `\
    <div class="col-12">
        <button class="btn-primary" type="button" class="add_Question_link">
            Ajouter une question
        </button>
    </div>
    `;
  // on récupère le div des "questions"
  const $collectionQuestion = document.querySelector("div.row.questionwrapper");
  // on injecte dans le html le bouton d'ajout des questions dans le HTML avant le formulaire de question qu'on va demander de reproduire.
  $collectionQuestion.insertAdjacentHTML("afterbegin", boutonQuestion);
  // la div du formulaire question est le 1re enfant du formulaire question et succède le bouton "ajout"
  $nouveau = $collectionQuestion.firstElementChild;
  $boutonAjouterQuestion = $nouveau.firstElementChild;

  // $collectionQuestion.setAttribute(
  //   'data-index',
  //   $collectionQuestion.querySelectorAll('input').length
  // );
  //  sur le click du bouton d'ajout, on effectue la fonction d'ajout de la div et dans l'ordre spécifié(1er enfant)
  $boutonAjouterQuestion.addEventListener("click", () =>
    addQuestionForm($collectionQuestion, $nouveau)
  );
  
}

// fonction d'ajout du formulaire de question avec les deux paramètres précèdents 
function addQuestionForm($collectionQuestion, $nouveau) {
  // on crée la variable du bouton ajout de réponse dans ce form question
  const boutonReponse = `\
    <div class="col-12">
        <button class="btn-primary" type="button" class="add_Reponse_link">
            Ajouter une Reponse
        </button>
    </div>
    `;
  // on récupére les data du prototype qui est une string...
  const prototype = $collectionQuestion.getAttribute("data-prototype");
  // on récupère les data de l'index qui en général est à 0 (il s'agit du nombre de form question avant le click)
  const index = $collectionQuestion.getAttribute("data-index");
// dans la string généré en HTML par le data prototype, on remplace __NAME__(le nom du prototype) 
  // par le nombre de"formquestion" recupéré au dessus.
  const newForm = prototype.replace(/__name__/g, index);

//  un fois le 1er form question généré, on set le nouvel index en l'incrémentant de 1.
  $collectionQuestion.setAttribute("data-index", +index + 1);
  // console.log(index);
// avant la fin du formulaire question on insère le bouton reponse qui succédera au form-reponse et qui 
// lui même succèdera au form question qui lui succédera au bouton question.
  $nouveau.insertAdjacentHTML("beforeend", newForm);
  const $question = $nouveau.lastElementChild;
  $nouveau.insertAdjacentHTML("beforeend", boutonReponse);
  $boutonAjouterReponse = $nouveau.lastElementChild.firstElementChild;
  // au click de ce bouton reponse on fait la fonction add reponse avec les paramètres 
  // que sont la div comprenant le prototype, la position du formulaire(dernier enfant) 
  // et le compteur (nouvellement seté)de la question.
  $boutonAjouterReponse.addEventListener("click", () =>
    addReponseForm(
      document.querySelector("div.row.questionwrapper"),
      $question,
      index
    )
  );
  
}
// fonction d'ajout du formulaire de réponse avec les trois paramètres cités ci dessus.
function addReponseForm($collectionReponse, $question, indexQuestion) {
  // On récupére les datas du prototype spécial réponse (renommés pour le différencier du proto question)
  const prototype = $collectionReponse.getAttribute("data-prototype-reponse");

  //  on récupére le compteur mais cette fois du bloc formulaire reponse (seté à 0)
  const indexRep = $collectionReponse.getAttribute("data-index-reponse");

  // remplace le nom  '_rep_prot__'dans le prototype's HTML avec le nombre de l'indexRep
  // et remplace le nom '_name_' avec le paramètre passé dans la fonction.
  const newForm = prototype
    .replace(/__rep_prot__/g, indexRep)
    .replace(/__name__/g, indexQuestion);

//  on incrémente le compteur de réponse et on le set avant chaque click
  $collectionReponse.setAttribute("data-index-reponse", +indexRep + 1);
//  on insère le formulaire réponse dans la div en position avant le bouton reponse.

  $question.insertAdjacentHTML("beforeend", newForm);
}
// date picker
  jQuery(document).ready(function() {
            $('.js-datepicker').datepicker();
        });

// show next question
function goToNextQuestion(id){
  // console.log(id)
  var questionDiv = document.getElementById("question"+id)
  var reponses = document.querySelectorAll('input[type="checkbox"]')
// console.log(reponses);
  // console.log(questionDiv)
 
  // var nbrequestion =document.getElementById("inputLieu")
  // var valeurnbrequestion =nbrequestion.value
  if(questionDiv.style.display = 'block'){
  questionDiv.style.display = 'none';

  
  }
 
}


function getcheckrep(checkEleve){
   console.log(checkEleve);

    const correct = " <span class='material-icons md-55 text-success'>check_circle_outline</span>"
    const wrong ="<span class='material-icons md-55 text-danger'>close</span>"
  var valueRepData = checkEleve.dataset.rep;
  console.log("valueRepData :", valueRepData);


  var nbrequestion = +document.getElementById("inputNbre").value;
  console.log("nbrequestion : ", nbrequestion);

  var codeRep = document.getElementById("codeRep" + checkEleve.dataset.codequestion);

  if (checkEleve.checked && valueRepData === "1") {
    codeRep.innerHTML = correct;

  } else {
    codeRep.innerHTML = wrong;
  }
  //  checkEleve.setAttribute("readonly","");
  //  checkEleve.setAttribute("disabled","");

  console.log(codeRep);
}

    
  
  



