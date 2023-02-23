function togglemenu()
{
    $('#navbar').toggle('collapse');
}
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
$('#myCarousel').carousel({
  interval: 3000,
  cycle: true
}); 
function toggleMap(e,v)
{
  switch(v)
  {
    case 1://map
      $('#businessImage').hide();
      $('#showMap').show();   
      

      $('#btnMap').hide();   
      $('#btnPhoto').show();   
      $('#btnVideo').show();   
      $('#showVideo').hide();   
      break;
    case 2://photo
      $('#businessImage').show();
      $('#showMap').hide();   
      
      
      $('#btnMap').show();   
      $('#btnPhoto').hide();   
      $('#showVideo').hide();  
      $('#btnVideo').show();   

      break;
    case 3://video
      $('#businessImage').hide();
      $('#showMap').hide();   
      

      $('#btnMap').show();   
      $('#btnPhoto').show();   
      $('#showVideo').show(); 
      $('#btnVideo').hide();   

      break;
  }
 
}
$("#pop").on("click", function(e) {
  $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
  $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
function showImagePopup(e)
{
  var res = e.src.split("/");
  var name = res[res.length - 1];
  var base_path = $("#url").val(); 
  var url =  base_path + '/images/photos/'+name;
  $('#imgLarge').attr("src", url);
}

$(function () {

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
});

$('#submitBooking').click(function (e) {
    e.preventDefault();
    $(this).html('Sending..');

    $.ajax({
      data: $('#BookingForm').serialize(),
      url: "/booking/inquiry",
      type: "POST",
      dataType: 'json',
      success: function (data) {

          $('#BookingForm').trigger("reset");
          $('#bookingmodal').modal('hide');         
          // alert success message
      },
      error: function (data) {
          console.log('Error:', data);
          $('#saveBtn').html('Save Changes');
      }
  });
});

});

$(function(){

  $(".dropdown-item").click(function(){

    $("#btnBusiness").text($(this).text());
    $("#btnBusiness").val($(this).text());
  
  });
  
});



function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
           
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

$('#subscribeBtn').on('click', function(){
  // Remove previous status message
  $('.status').html('');

  // Email and name regex
  var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
  var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

  // Get input values
  var name = $('#name').val();
  var email = $('#newsletteremail').val();

  // Validate input fields
  if(email.trim() == '' ){
      alert('Please enter your email.');
      $('#newsletteremail').focus();
      return false;
  }else if(email.trim() != '' && !regEmail.test(email)){
      alert('Please enter a valid email.');
      $('#newsletteremail').focus();
      return false;
  }else{
      // Post subscription form via Ajax
      $.ajax({
          type:'POST',
          url:'/subscription',
          dataType: "json",
          data:{subscribe:1,name:name,email:email},
          beforeSend: function () {
              $('#subscribeBtn').attr("disabled", "disabled");
              $('.content-frm').css('opacity', '.5');
          },
          success:function(data){
              if(data[0].status[0] == 'success'){
                  alert('Thank you for subscription.');
              }else{
                  $('.status').html('<p class="error">'+data.msg+'</p>');
              }
              $('#subscribeBtn').removeAttr("disabled");
              $('.content-frm').css('opacity', '');
          }
      });
  }
});
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}
function openModal() {
  document.getElementById("propertyPhotosModal").style.display = "block";
}

function closeModal() {
  document.getElementById("propertyPhotosModal").style.display = "none";
}


function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
} 

var modal = document.getElementById("propertyModal");

$(document).ready(function(){
    $('.imagethumb').click(function()
{
    modal.style.display = "block";
    $('#preview').attr('src', $(this).attr('src').replace("thumbnail", ""));
});
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close-property")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

});

