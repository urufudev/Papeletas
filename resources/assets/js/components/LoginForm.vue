<template>
    <div class="modal-content">
        <form @submit.prevent="Submit()">
      <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><b>INICIAR SESIÓN</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group p-t-15 ">
              <label for="dni" class="col-md-12 control-label"> <b>DNI</b> </label>

              <div class="col-md-12">
                  <div class="form-line">
                  <input id="dni" type="text"  class="form-control" v-model="dni"  required autofocus>

                  
                      <span class="text-danger" v-if="errores.dni">
                          <strong>{{ errores.dni[0] }}</strong>
                      </span>
                
                  </div>
              </div>
          </div>

          <div class="form-group p-t-15  ">
              <label for="password" class="col-md-12 control-label"> <b>CONTRASEÑA</b> </label>

              <div class="col-md-12 ">
                  <div class="form-line">
                  <input id="password" type="password" class="form-control" v-model="password" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" required>

                 <!--  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif -->
                  </div>
                 
              </div>
          </div>
      </div>
      <div class="modal-footer">
           
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
          <button type="submit" class="btn btn-primary">
              <b>INICIAR SESION</b> 
          </button> 
      </div>
      </form>
    </div>
</template>

<script>


    export default {
        data(){
            return{
                errores: {},
                dni: '',
                password: ''
                
            }
        },
        methods: {
            Submit(){
                let data = {
                    dni: this.dni,
                    password: this.password,
                }
                axios.post('/login', data).then(res => {
                        location.href = '/home'
                }).catch((error) => {
                    this.errores = error.response.data.errors;
                })
            }
        }
    }
</script>
