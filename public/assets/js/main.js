
// pour pouvoir afficher autant de form question que de nombre rentrer dans l'input  
//  jQuery(document).ready(function() {
//    console.log ('ppl')

//         var $wrapper = $('.row.questionwrapper')
        
            
//       $wrapper.on('click', '.jsaddquestion', function(e) {
//             e.preventDefault();
//            // var nbrequestion=$('input[id="questionnaire_global_questionnaire_nbreQuestion"]').val();
//             //console.log(nbrequestion) //
//             var prototype = $wrapper.data('prototype');
//                         // get the new index
//             var index = $wrapper.data('index');
            
//             // Replace '__name__' in the prototype's HTML to
//             // instead be a number based on how many items we have
//             var newForm = prototype.replace(/__name__/g, index);
//             // increase the index with one for the next item
                            
//             $wrapper.data('index', index + 1);
//             // Display the form in the page before the "new" link
//             $(this).before(newForm);
//         });
// }); 

 // js pour afficher autant de reponses possibles que de choix mis dans input nombre de choix  
         $(document).ready(function() {
            var $wrapperreponse = $('.reponsewrapper');
           
            
            $wrapperreponse.on('click', "jsaddquestion", function(e) {
                 console.log( $( this ).text() );
                
                e.preventDefault();
        //        var nbrequestion=$('input[id="questionnaire_global_question_0_baremeQuestion"]').val();
        //        console.log(nbrequestion); 
                var prototype = $wrapperreponse.data('prototype'); 
        //         // get the new index
                var index = $wrapperreponse.data('index'); 
                // Replace '__name__' in the prototype's HTML to
        //         // instead be a number based on how many items we have
                var newForm = prototype.replace(/__name__/g, index); 
        //         // increase the index with one for the next item
                               
                $wrapperreponse.data('index', nbrequestion); 
        //         // Display the form in the page before the "new" link
                return $(this).before(newForm); 
                }
            ); 
        });  
  

   