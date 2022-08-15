$(document).reday(function(){


    /*****************************alert ****************************/
    alert ('welcome');



    /*****************************on click  ****************************/


    $('.Element') . on ('click',function(e){


        e.preventDefault();

        alert('cliced');

    });


    /*****************************Defrent between $this & this   ****************************/




     /***********$this to use jquuery function
      * 
      * var name = $this.data('name');
      * 
      * 
      * $(this).closest('tr').remove;
      * 
      * 
    /***********this to use js function
     * 
     *       * var name = this.input('name');
    */




    /*****************************convert string numper "10" to real numper 10   ****************************/

    /**** var price  = parseInt($('.price').html); if numper is 2.5 willl make it => 2
    /**** var price  = Numper($('.price').html); if numper is 2.5 willl make it => 2.5



    /*****************************  numper format to show your numper puty string ************************/

   /*****  $.numper(5020.2365   ,  2) ; //outputs => 5,020.24
    


   /*********************************convert string numper with coma to real numper **********************/

    /***   string numper 1,5033 to 15033 
    
    /***   parseFloat(yourNumper,replace(/,/g,'')) 

















});

