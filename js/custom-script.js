/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */
$(document).ready(function(){
   $('.sidenav').sidenav();
   $('.fixed-action-btn').floatingActionButton();

   $('input.autocompleteCompany').autocomplete({
      data: {
        "Dangote": null,
        "Golden Penny": null,
        "Crown Flour Mills": null,
        "Pure Flour Mills": null,
        "Honeywell Flour Mills": null
      },
    });

    $('input.autocompleteBrand').autocomplete({
       data: {
         "Honeywell Flour": null,
         "Dangote Spagetti (Pasta)": null,
         "Diamond Flour": null,
         "Mama Gold Flour": null,
         "Golden Penny": null
       },
     });

     $('input.autocompleteSubBrand').autocomplete({
        data: {
          "Selfie": null,
          "Slim": null,
          "Standard": null,
          "Cavato": null,
        },
      });

      $('input.autocompleteSearchBrand').autocomplete({
         data: {
           "Honeywell Flour": null,
           "Dangote Spagetti (Pasta)": null,
           "Diamond Flour": null,
           "Mama Gold Flour": null,
           "Golden Penny": null
         },
       });

    $('.carousel').carousel();

    $('.tabs li a:first-child').addClass('active');

    $('.tabs').tabs();

    $(".mobile-menu-icon").on("click", function(){
     $(".primary-nav").toggleClass("active");
     $(this).toggleClass("open");
   });

   $('.sidenav').sidenav();

   $('.modal').modal();

//--------------------------- MY CUSTOM SCRIPTS  ---------------------------
   var brand = $('.brand input');
   var subBrand = $('.sub_brand');
   var roomAvailValue = $('#room_avail_val');
   $(brand).on('blur click',function() {
     if ($(this).val() !== "") {
       subBrand.css({display : 'block', background : 'rgba(204, 204, 204, 0.18)', padding : '10px'});
     }else {
       subBrand.css({display : 'none', background : 'rgba(204, 204, 204, 0.18)', padding : '5px'});
     }
   });
   $(roomAvailValue).on('change',function() {
     // console.log($(roomNo).val());
     if ($(this).val() > $(roomNo).val()) {
        $('.room_available span').after('<small class="error">Please specify how many rooms you want to rent out. Make sure this number does not exceed the total number of bedrooms in your property!.</small>');
     }else {
       $('.error').remove();
     }
   });
   $('.utility_cost input[type="checkbox"]').change(function() {
     var chck = $(this).is(":checked"); // return true or false
     if (chck) {
       $('.utility_cost--extra').css({display : 'block'});
     }else {
       $('.utility_cost--extra').css({display : 'none'});
     }
   });

 });
 // document.addEventListener('DOMContentLoaded', function() {
 //     var elems = document.querySelectorAll('.autocomplete');
 //     var instances = M.Autocomplete.init(elems, options);
 //   });
