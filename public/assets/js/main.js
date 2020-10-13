//  var inputnbrequestion = document.querySelector('.nbrequestion');
//  var nbrequestion = inputnbrequestion.value;
// var html = '';
// for (var i = 1; i <= nbrequestion ; i++){
//                     html += '<div class="col-12"><label>Question '+ i +'<input name="questions[]" type="text"></label></div>'
//                 }

//                 $('.row.formQuestion').html(html);
                

// function questions(nbreQuestion) {
//                 var value = nbreQuestion.value;
//                 var html = '';
//                 for (var i = 1; i <= value ; i++){
//                     html += '<div class="col-12"><label>Question '+ i +'<input name="questions[]" type="text"></label></div>'
//                 }

//                 $('#question').html(html);

//             }






var $collectionQuestion;

// pour ajouter la div pour le bouton
var $boutonQuestionAAjouter = $('<button type="button" class="add_Question_link">Ajouter une question</button>');
var $nouveau = $('<div class="col-12"></div>').append($boutonQuestionAAjouter);



jQuery(document).ready(function() {
    // Get the div that holds the collection of Questions
    $collectionQuestion = $('div.row.questionwrapper');
   
    // add the "add a Question" anchor and li to the Questions ul
      
    $collectionQuestion.append($nouveau);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionQuestion.data('index', $collectionQuestion.find('input').length);
   


    $boutonQuestionAAjouter.on('click', function(e) {
        // add a new Question form (see next code block)
        addQuestionForm($collectionQuestion, $nouveau);
        
    });
});
function addQuestionForm($collectionQuestion, $nouveau) {
    // Get the data-prototype explained earlier
    var prototype = $collectionQuestion.data('prototype');

    // get the new index
    var index = $collectionQuestion.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your Questions field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionQuestion.data('index', index + 1);

    // Display the form in the page in an Div, before the "Add a Question" link Div
    var $newFormDiv = $('<div></div>').append(newForm);
    $nouveau.before($newFormDiv);
}


var $collectionReponse
var $boutonReponseAAjouter = $('<button type="button" class="add_Reponse_link">Ajouter une Reponse</button>');
 var $nouveauReponse = $('<div class="col-12"></div>').append($boutonReponseAAjouter);
 jQuery(document).ready(function() {
$collectionReponse = $('div.row.reponsewrapper');
$collectionReponse.append($nouveauReponse);
 $collectionReponse.data('index', $collectionReponse.find('input').length);
 $boutonReponseAAjouter.on('click', function(e) {
        addReponseForm($collectionReponse,$nouveauReponse);
        });
 });  
function addReponseForm($collectionReponse, $nouveauReponse) {
    // Get the data-prototype explained earlier
    var prototype = $collectionReponse.data('prototype');

    // get the new index
    var index = $collectionReponse.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your Reponses field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionReponse.data('index', index + 1);

    // Display the form in the page in an Div, before the "Add a Reponse" link Div
    var $newFormDiv = $('<div></div>').append(newForm);
    $nouveau.before($newFormDiv);
}