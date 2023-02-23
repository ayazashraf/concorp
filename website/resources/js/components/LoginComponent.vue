<script>
    export default {
        name: 'LoginModal',
        data() {
            return {
                    errors: [],
                    username: "",
                    password: "",
                    remember: 0,
                    url: document.getElementById("url").value,  
                    token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    output: ''
                  }            
        },
        headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        methods: {            
            close(){
              this.$emit('close');
            },
            buildLogoUrl: function () {
              return this.url +'/public/images/logofinal.jpg';
            },
            login: function (e) {
                this.errors = [];                          
                if(this.username != "" && this.password != "") {
                      axios.post('/api/login', {
                        email: this.username,
                        password: this.password,
                        remember: this.remember,
                        token: this.token
                      })
                     .then((response)=>{                       
                       console.log('Login API response ' +response);  
                       if(response.data[0].status == "success")
                       {
                         this.$refs.form.submit();
                          return true;                     
                       }
                       else
                       {
                          this.errors.push(response.data[0].message[0]);                          
                          e.preventDefault();                          
                       }
                     })
                     .catch(function(error) {
                      console.log('Error on Authentication '+ error); 
                      this.errors.push('Error on Authentication '+ error);                          
                      e.preventDefault();    
                      return false;                   
                    });
                } else {
                    console.log("A username and password must be present");
                    this.errors.push('A username and password must be present');                          
                    e.preventDefault();                     
                    return false;
                }
                e.preventDefault();   
            }
        }
    }
</script>

<template>
  <transition name="modal-fade">
    <div class="modal-backdrop" @click.self="close">
      <div class="modal modal-vue"
        role="dialog"
        aria-labelledby="modalTitle"
        v-on:keyup.esc="close"
        aria-describedby="modalDescription"
        
      >
        
        <section
          class="modal-body"
          id="modalDescription"
        >
          <slot name="body">
             <form method="post" @submit="login" ref="form" action="/login/tenant" id="app">
              <input type="hidden" name="_token" :value="this.token">
              <div class="imgcontainer">
                <img :src="buildLogoUrl()" alt="Avatar" class="login-scren-logo">
              </div>
              <div style="text-align: center;">
                <h5> MEMBERS LOGIN </h5>
              </div>
              
                <p v-if="errors.length">
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors">{{ error }}</li>
                  </ul>
                </p>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-addon"><i class="fas fa-user"></i></span>
                  </div>
                  <input type="text" autocomplete="off" id="email" class="form-control" v-model="username"  name="email" placeholder="Email">
                </div>
                
                <div class="input-group">
                  <span class="input-group-addon"> <i class="fas fa-lock"></i></span>
                  <input id="password" autocomplete="off" type="password" class="form-control"  v-model="password" name="password" placeholder="Password">
                </div>  
                                  
                <label>
                  <input type="checkbox" checked="checked" v-model="remember" name="remember"> Remember me
                </label>

                <button type="submit" class="btn btn-dark" value="submit" >Login</button>
              

              <div style="background-color:#f1f1f1">
                <button type="button" @click="close" class="btn btn-danger">Cancel</button>                
                <span class="psw"><a href="/password/reset">Forgot password?</a></span>
              </div>
              
            </form>
        
          </slot>
        </section>
      </div>
    </div>
  </transition>
</template>
