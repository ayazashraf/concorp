<template>
  <div class="container mb-4">
    <div class="slideshow-container">
      <div class="mySlides" v-for="testimonial in testimonials" :key="testimonial.id">
        <p class="author"><cite>{{ testimonial.name }}</cite></p>
        <i class="fas fa-quote-left quote"></i> <span class="testimonial">{{ testimonial.testimonial }}</span> <i class="fas fa-quote-right quote"></i>     
      </div>
    </div>
  </div>
</template>
<script>

    export default {

        data(){
            return {
              testimonials: {}
            }
        },
        methods: {
            getTestimonial(){
                axios.get('/api/testmonials/list')
                     .then((response)=>{
                       this.testimonials = response.data.testimonials;                       
                     })
            },
            currentSlide: function(n) {
              this.showSlides(slideIndex = n);
            },
            plusSlides: function(n) {
              this.showSlides(slideIndex += n);
            },
             showSlides: function() {
               var i;
              var slides = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
             /* for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }*/
              slides[slideIndex-1].style.display = "block";  
              //dots[slideIndex-1].className += " active";
              setTimeout(this.showSlides, 2000); 
            }
        },
        created(){
            this.getTestimonial()
        },
        mounted() {        
        
        },
        updated: function () {
          this.$nextTick(function () {
             this.showSlides();
          })
        }
    }
 var slideIndex = 0;
 
</script> 
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}

/* Slideshow container */
.slideshow-container {
  position: relative;  
  outline-style: solid;
  outline-color:lightgray;
}

/* Slides */
.mySlides {
  display: none;
  padding: 80px;
  text-align: center;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -30px;
  padding: 16px;
  color: #888;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  position: absolute;
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
  color: white;
}

/* The dot/bullet/indicator container */
.dot-container {
    text-align: center;
    padding: 20px;
    background: #ddd;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

/* Add a background color to the active dot/circle */
.active, .dot:hover {
  background-color: #717171;
}

/* Add an italic font style to all quotes */
q {font-style: italic;}

/* Add a blue color to the author */
.author {color: black;font-size:30px;}

.testimonial {font-size:16px;}

.quote
{
	 vertical-align: super;
   font-size: smaller;
   color: #ff0000;
   font-weight: bold;
}
</style>