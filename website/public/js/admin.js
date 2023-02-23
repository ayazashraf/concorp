$('#adminsearch').on('keyup',function(){
    $value=$(this).val();
    $.ajax(
        {
            type : 'get',
            url : 'admins/search',
            data:{'search':$value},
            success:function(data)
            {
                $('#dataRecords').html(data);
            }
        });
});
$('#usersearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'users/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
});
$('#pagesearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'pages/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
});
$('#blogsearch').on('keyup',function(){
$value=$(this).val();
$.ajax(
    {
        type : 'get',
        url : 'blogs/search',
        data:{'search':$value},
        success:function(data)
        {
            $('#dataRecords').html(data);
        }
    });
});
$('#testimonialsearch').on('keyup',function(){
  $value=$(this).val();
  $.ajax(
      {
          type : 'get',
          url : 'testimonials/search',
          data:{'search':$value},
          success:function(data)
          {
              $('#dataRecords').html(data);
          }
      });
  });
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}  
$(function(){
    $('body').css('background-color', 'blue !important');
});

function toggleItemPhotoSwitch(cb,item_id,photo_id) {
  var add = 0;
  if(cb.checked)
  {
    add = 1;
  }
  $.ajax({
        type : 'GET',
        url : '/admin/photos/assigntoitem',        
        encode  : true,
        data: { 
          add: add, 
          id: item_id, 
          photo_id:photo_id
        },        
        success:function(data)
        {
         // alert('added');  
          return;
        },
        error: function(response){
            alert('Error'+response.responseCode);
        }
  });
}
function togglePropertyPhotoSwitch(business_id,photo_id,cb) {
  var add = 0;
  if(cb.checked)
  {
    add = 1;
  }
  $.ajax({
        type : 'GET',
        url : '/admin/photos/assignToBusiness',        
        encode  : true,
        data: { 
          add: add, 
          id: business_id, 
          photo_id:photo_id
        },        
        success:function(data)
        {         
          return;
        },
        error: function(response){
            alert('Error'+response.responseCode);
        }
  });
}


// Document Ready function
$(document).ready(function(){
  
  // Set Date picker 
  $('#datepicker').datepicker({
    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
  });
  //$('#datepicker').datepicker("setDate", new Date());

 


    // Change Page table Text area to CKEditor rich text Classic Editor
  var myEle = document.getElementById("description");
  if(myEle)
  {
    var myEditor;
    ClassicEditor
      .create( document.querySelector( '#description' ) )
      .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
        myEditor.setData($('#description').val());
      } )
      .catch( error => {
          console.error( error );
      } );
  }
  var myEle2 = document.getElementById("content");
  if(myEle2)
  {
    var myEditor;
    ClassicEditor
      .create( document.querySelector( '#content' ) )
      .then( editor => {
        console.log( 'Editor was initialized', editor );
        myEditor = editor;
        myEditor.setData($('#content').val());
      } )
      .catch( error => {
          console.error( error );
      } );
  }  
  // Upload image for Page table when Admin add/edit a page.
  $('#imageUploadForm').on('submit',(function(e) {

    $.ajaxSetup({     
      headers: {     
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
      }     
    });     
    e.preventDefault();     
    var formData = new FormData(this);
     
     
     
    $.ajax({
     
       type:'POST',
     
       url: "{{ url('save-photo')}}",
     
       data:formData,
     
       cache:false,
     
       contentType: false,
     
       processData: false,
     
       success:function(data){
     
           $('#original').attr('src', 'public/images/'+ data.photo_name);
     
       },
     
       error: function(data){
     
           console.log(data);
     
       }
     
    });     
    })); // End of  $('#imageUploadForm').on      
    $("#image").change(function() {
      readURL(this);
    });

 

});// End of Document.ready

// Preview Image as selected from the image dialog
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#thumbImg').attr('src', e.target.result);
      $("#remove_page_image").show();
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

// Remove page image on Edit form.
function removepageimage(id){   
  
  $("#thumbImg").attr('src','#');
  $("#thumbImg").attr('alt','');  
  $("#image").val('');
}

// Remove blog image on Edit form.
function removeblogimage(id){   
  
  $("#thumbImg").attr('src','#');
  $("#thumbImg").attr('alt','');  
  $("#image").val('');
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

$(function() {
  $('#business_id').change(function() {

      var url = "../../../admin/properties/" + $(this).val() + '/items/';

      $.get(url, function(data) {
          var select = $('#item_id');

          select.empty();

          $.each(data,function(key, value) {
              select.append('<option value=' + value.id + '>' + value.type + ' - $'+value.rent+'- name/number: '+value.name + '</option>');
          });
      });
  });
});

// Remove user image on create/edit form
function removeuserimage(id){     
  $("#thumbImg").attr('src','#');
  $("#thumbImg").attr('alt','');  
  $("#image").val('');
}
