<script>
    export default {
        name: 'BookingModal',
        data() {
            return {
                    errors: [],
                    name: "",
                    email: "",
                    year: "",
                    name1: "",
                    email1: "",
                    year1: "",
                    name2: "",
                    email2: "",
                    year2: "",
                    name3: "",
                    email3: "",
                    year3: "",
                    name4: "",
                    email4: "",
                    year4: "",
                    name5: "",
                    email5: "",
                    year5: "",
                    remember: 0,    
                    formdata: '', 
                    notes: '',
                    id: document.getElementById("business_id").value,
                    page: document.getElementById("page_url").value,                 
                    token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    output: ''
                  }            
        },          
        headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        computed : {
          years: function ()  {
            const year = new Date().getFullYear()
            return Array.from({length: year - 1900}, (value, index) => 1901 + index)
          }
        },
        methods: {            
            close(){
              this.$emit('close');
            },
            checkForm: function (e) {
              this.errors = [];

              if (!this.name) {
                this.errors.push("Name required.");
              }
              if (!this.year) {
                this.errors.push("Year required.");
              }
              if (!this.notes) {
                this.errors.push("Brief required.");
              }
              if (!this.email) {
                this.errors.push('Email required.');
              } else if (!this.validEmail(this.email)) {
                this.errors.push('Valid email required.');
              }
              
              if (String(this.email1).length > 0) {
                if (!this.validEmail(this.email1)) {
                  this.errors.push('Valid email required for Tenant 1');
                }
              }

              if (String(this.email2).length > 0) {
                if (!this.validEmail(this.email2)) {
                  this.errors.push('Valid email required for Tenant 2');
                }
              }
              if (String(this.email3).length > 0) {
                if (!this.validEmail(this.email3)) {
                  this.errors.push('Valid email required for Tenant 3');
                }
              }
              if (String(this.email4).length > 0) {
                if (!this.validEmail(this.email4)) {
                  this.errors.push('Valid email required for Tenant 4');
                }
              }
              if (String(this.email5).length > 0) {
                if (!this.validEmail(this.email5)) {
                  this.errors.push('Valid email required for Tenant 5');
                }
              }
              if (!this.errors.length) {
                return true;
              }else
              {
                return false;
              }
              

              e.preventDefault();
            },
            validEmail: function (email) {
              var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
              return re.test(email);
            },
            book: function (e) {                  
                if(this.checkForm(e))                
                {
                  axios.post('/api/booking', {
                    email: this.email,
                    name: this.name,
                    year: this.year,
                    notes: this.notes,

                    email1: this.email1,
                    name1: this.name1,
                    year1: this.year1,

                    email2: this.email2,
                    name2: this.name2,
                    year2: this.year2,

                    email3: this.email3,
                    name3: this.name3,
                    year3: this.year3,

                    email4: this.email4,
                    name4: this.name4,
                    year4: this.year4,

                    email5: this.email5,
                    name5: this.name5,
                    year5: this.year5,

                    id:    this.id,
                    page:  this.page,
                    token: this.token
                  })
                  .then((response)=>{                       
                    console.log('Login API response ' +response);  
                    if(response.data[0].status == "success")
                    {
                      alert(response.data[0].message[0]);
                      this.close();           
                    }
                    else
                    {
                      this.errors.push(response.data[0].message[0]);                          
                      e.preventDefault();                          
                    }
                  })
                  .catch(function(error) {
                  console.log('Error on Authentication '+ error); 
                  e.preventDefault();    
                  return false;                   
                });                
                e.preventDefault();   
              }
            }
        }
    }
</script>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop" @click.self="close">
      <div class="modal modal-booking"
        role="dialog"        
        aria-labelledby="modalTitle"
        v-on:keyup.esc="close"
        aria-describedby="BookingModal">
        
        <section
          class="modal-body"
          id="BookingModal">
        <slot name="header">
          <h3 class="align-center mt-3">Rental Application Form</h3>
          <p v-if="errors.length">
            <b>Please correct the following error(s):</b>
            <ul>
              <li v-for="error in errors">{{ error }}</li>
            </ul>
          </p>
        </slot>
          <slot name="body">
            <form method="post" v-model="formdata" @submit="book" ref="form" action="/booking/inquiry" class="mt-3">
              <div class="row">
                  <div class="col-sm-6 col-md-6">                             
                      Your Name:
                  </div>
                  <div class="col-sm-6 col-md-6">
                      <input type="text" class="form-control user-input"  id="name" name="name" v-model="name" placeholder="Name">
                  </div>                                
              </div>
              <div class="row">
                  <div class="col-sm-6 col-md-6">
                      Email:
                  </div>
                  <div class="col-sm-6 col-md-6">
                      <input type="email" class="form-control user-input"  id="email" name="eamil" v-model="email"  placeholder="Email">
                  </div>                                
              </div>
              <div class="row">
                  <div class="col-sm-6 col-md-6">
                      University Year:
                  </div>
                  <div class="col-sm-6 col-md-6">
                      <select id="year" v-model="year" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                  </div>                                
              </div>
              <div class="row mt-3">
                <div class="col-sm-12">
                  <h5>Other Tenants Info:</h5>
                </div>
              </div>
              
              <div class="row mt-3"">
                <div class="col-sm-2 col-md-1">
                  <span><h5>1</h5></span>                          
                </div>
                <div class="col-sm-10 col-md-3">
                  <input type="text" class="form-control user-input"  :id="name1" v-model="name1"  placeholder="Name">
                </div>
                <div class="col-sm-10 col-md-4">
                  <input type="email" class="form-control user-input"  :id="email1" v-model="email1" placeholder="Email">
                </div>
                <div class="col-sm-10 col-md-4">
                     <select id="year1" v-model="year1" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                </div>
              </div> 

              <div class="row mt-3"">
                <div class="col-sm-2 col-md-1">
                  <span><h5>2</h5></span>                          
                </div>
                
                <div class="col-sm-10 col-md-3">
                  <input type="text" class="form-control user-input"  :id="name2" v-model="name2"  placeholder="Name">
                </div>
                <div class="col-sm-10 col-md-4">
                  <input type="email" class="form-control user-input"  :id="email2" v-model="email2" placeholder="Email">
                </div>
                <div class="col-sm-10 col-md-4">
                    <select id="year2" v-model="year2" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                </div>
              </div> 

              <div class="row mt-3"">
                <div class="col-sm-2 col-md-1">
                  <span><h5>3</h5></span>                          
                </div>
                <div class="col-sm-10 col-md-3">
                  <input type="text" class="form-control user-input"  :id="name3" v-model="name3"  placeholder="Name">
                </div>
                <div class="col-sm-10 col-md-4">
                  <input type="email" class="form-control user-input"  :id="email3" v-model="email3" placeholder="Email">
                </div>
                <div class="col-sm-10 col-md-4">
                    <select id="year3" v-model="year3" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                </div>

              </div> 
              
              <div class="row mt-3"">
                <div class="col-sm-2 col-md-1">
                  <span><h5>4</h5></span>                          
                </div>
                <div class="col-sm-10 col-md-3">
                  <input type="text" class="form-control user-input"  :id="name4" v-model="name4"  placeholder="Name">
                </div>
                <div class="col-sm-10 col-md-4">
                  <input type="email" class="form-control user-input"  :id="email4" v-model="email4" placeholder="Email">
                </div>
                <div class="col-sm-10 col-md-4">
                     <select id="year4" v-model="year4" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                </div>
              </div> 

              <div class="row mt-3"">
                <div class="col-sm-2 col-md-1">
                  <span><h5>5</h5></span>                          
                </div>
                <div class="col-sm-10 col-md-3">
                  <input type="text" class="form-control user-input"  :id="name5" v-model="name5"  placeholder="Name">
                </div>
                <div class="col-sm-10 col-md-4">
                  <input type="email" class="form-control user-input"  :id="email5" v-model="email5" placeholder="Email">
                </div>
                <div class="col-sm-10 col-md-4">
                     <select id="year5" v-model="year5" class="user-input">                                   
                        <option disabled value="">Year</option>                                                     
                        <option value="1st year">1st year</option>
                        <option value="1st year">2nd year</option>
                        <option value="1st year">3rd year</option>
                        <option value="1st year">4th year</option>
                        <option value="1st year">Alumni</option>                                                                                                                      
                      </select>
                </div>
              </div>

               <div class="row mt-4">
                <div class="col-sm-12">
                  <h5>Brief Intro:</h5>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-sm-12">
                  <textarea v-model="notes" placeholder="" style="width:100%;"></textarea>
                </div>
              </div>
              <div style="background-color:#f1f1f1">
                <button type="button" @click="close" class="btn btn-primary">Cancel</button>                
                <button type="submit" class="btn btn-danger" value="submit" v-on:click.prevent="book">Submit</button>
              </div>              
            </form>            
          </slot>
        </section>
      </div>
    </div>
  </transition>
</template>
<style>
.user-input
{
  background-color: rgb(241, 241, 241);
  width:100%;
  height:100%;
}
.modal-booking
{
  background:white;
  overflow-x: auto;
  display: flex;
  left: auto;
  top: auto;
  width: auto;
  height: auto;
  min-width: 320px;
  max-height: 650px;
}
</style>