
document.readyState === 'loading'
  ? window.addEventListener('DOMContentLoaded', main)
  : main();
function main() {
  // bouton pour ajouter une question
  const boutonQuestion = `\
    <div class="col-12">
        <button class="btn-primary" type="button" class="add_Question_link">
            Ajouter une question
        </button>
    </div>
    `;
  // il s'agit de la div constituant le formulaire de question
  const $collectionQuestion = document.querySelector('div.row.questionwrapper');
  // injecte le bouton question avant le début du formulaire question
  $collectionQuestion.insertAdjacentHTML('afterbegin', boutonQuestion);
  // indique que le bouton est le premier enfant de la 1re question
  $nouveau = $collectionQuestion.firstElementChild;
  $boutonAjouterQuestion = $nouveau.firstElementChild;

  // $collectionQuestion.setAttribute(
  //   'data-index',
  //   $collectionQuestion.querySelectorAll('input').length
  // );

  $boutonAjouterQuestion.addEventListener('click', () =>
    addQuestionForm($collectionQuestion, $nouveau)
  );
}
function addQuestionForm($collectionQuestion, $nouveau) {
  const boutonReponse = `\
    <div class="col-12">
        <button class="btn-primary" type="button" class="add_Reponse_link">
            Ajouter une Reponse
        </button>
    </div>
    `;
  // Get the data-prototype explained earlier
  const prototype = $collectionQuestion.getAttribute('data-prototype');
  // get the new index
  const index = $collectionQuestion.getAttribute('data-index');

  // Replace '__name__' in the prototype's HTML to
  // instead be a number based on how many items we have
  const newForm = prototype.replace(/__name__/g, 'index');

  // increase the index with one for the next item
  $collectionQuestion.setAttribute('data-index', index + 1);
  console.log(index);

  $nouveau.insertAdjacentHTML('beforeend', newForm);
  const $question = $nouveau.lastElementChild;
  $nouveau.insertAdjacentHTML('beforeend', boutonReponse);
  $boutonAjouterReponse = $nouveau.lastElementChild.firstElementChild;

  $boutonAjouterReponse.addEventListener('click', () =>
    addReponseForm(document.querySelector('div.row.questionwrapper'), $question)
  );
}

function addReponseForm($collectionReponse, $nouveauReponse) {
  // Get the data-prototype explained earlier
  const prototype = $collectionReponse.getAttribute('data-prototype-reponse');

  // get the new index
  const indexRep = $collectionReponse.getAttribute('data-index-reponse');
  console.log(indexRep)


  // remplace le nom  '_rep_prot__'dans le prototype's HTML avec le nombre de l'indexRep
  const newForm = prototype.replace(/__rep_prot__/g, 'indexRep');

  // increase the index with one for the next item
  $collectionReponse.setAttribute('data-index-reponse', indexRep + 1);

  // Display the form in the page in an Div, before the "Add a Reponse" link Div
  $nouveauReponse.insertAdjacentHTML('beforeend', newForm);
}