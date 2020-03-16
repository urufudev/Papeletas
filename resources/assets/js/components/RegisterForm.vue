<template>
  <div class="modal fade" id="modal-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <form @submit.prevent="Submit">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel"><b>REGISTRAR NUEVO EMPLEADO</b></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
                        <label for="name" class="col-md-4 control-label"> <b>NOMBRE</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                                    <input id="name" type="text" class="form-control text-uppercase" v-model="name"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  autofocus>
                            
                           
                                <span class="help-block" v-if="errores.name">
                                    <strong>{{ errores.name[0] }}</strong>
                                </span>
                            
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ap_paterno" class="col-md-4 control-label"> <b>AP. PATERNO</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="ap_paterno" type="text" class="form-control" v-model="ap_paterno"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  autofocus>
                            
                                <span class="help-block" v-if="errores.ap_paterno">
                                    <strong>{{ errores.ap_paterno[0] }}</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ap_materno" class="col-md-4 control-label"> <b>AP. MATERNO</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="ap_materno" type="text" class="form-control" v-model="ap_materno"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"  autofocus>

                                    <span class="help-block" v-if="errores.ap_materno">
                                        <strong>{{ errores.ap_materno[0] }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="dni" class="col-md-4 control-label"> <b>DNI</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="dni" type="dni" class="form-control" v-model="dni"   maxlength="8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >

                                    <span class="help-block" v-if="errores.dni">
                                        <strong>{{ errores.dni[0] }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>
              <div class="form-group">
                        <label for="gender" class="col-md-4 control-label"><b>GENERO</b> </label>

                        <div class="col-md-12">
                            
                            
                            <input id="MASCULINO" class="with-gap radio-col-blue" v-model="gender" type="radio" value="MASCULINO">
                            <label for="MASCULINO">MASCULINO
                            </label>
                            
                            <input id="FEMENINO" class="with-gap radio-col-pink" v-model="gender" type="radio" value="FEMENINO">
                            
                            <label for="FEMENINO">FEMENINO    
                            </label>
                        <span class="help-block" v-if="errores.gender">
                                        <strong>{{ errores.gender[0] }}</strong>
                            </span>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="f_birth" class="col-md-4 control-label"><b>FECHA DE NACIMIENTO</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input type="date" min="1900-01-01" max="2019-12-12" class="form-control" v-model="f_birth"  >

                                    <span class="help-block" v-if="errores.f_birth">
                                        <strong>{{ errores.f_birth[0] }}</strong>
                                    </span>
                                </div>
                        </div>
                    </div>   
                    <div class="form-group">
                        <label for="office_id" class="col-md-4 control-label"><b>OFICINA</b> </label>

                        <div class="col-md-12">
                            
                        <!-- {{Form::select('office_id',$offices,null,['class'=>'form-control'])}} -->
                                <select class="form-control" v-model="office_id">
                                            
                                        <option v-for="office in offices" :key="office.id" :value="office.id" >{{office.name}}</option>
                                </select>  

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="position" class="col-md-4 control-label"><b>CARGO</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="position" type="text" class="form-control" v-model="position" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >

                                    <span class="help-block" v-if="errores.position">
                                        <strong>{{ errores.position[0] }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="regime" class="col-md-4 control-label"><b> REGIMEN</b> </label>

                        <div class="col-md-12">
                                    
                            <select v-model="regime" id="regime" class="form-control">
                                <option value="DECRETO LEGISLATIVO N° 276" selected>DECRETO LEGISLATIVO N° 276</option>
                                <option value="DECRETO LEGISLATIVO N° 1057">DECRETO LEGISLATIVO N° 1057</option>
                                <option value="DECRETO LEGISLATIVO N° 728">DECRETO LEGISLATIVO N° 728</option>
                                <option value="LEY N° 29944">LEY N° 29944</option>
                                <option value="LEY N° 30512">LEY N° 30512</option>
                                <option value="LEY N° 30328">LEY N° 30328</option>
                                <option value="LEY N° 30493">LEY N° 30493</option>
                                

                            </select>
              
                           <span class="help-block" v-if="errores.regime">
                                        <strong>{{ errores.regime[0] }}</strong>
                                    </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="col-md-4 control-label"><b>TELEFONO</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input type="text" maxlength="9" class="form-control" v-model="phone" >

                                    <span class="help-block" v-if="errores.phone">
                                        <strong>{{ errores.phone[0] }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>
                     

                     
                    

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label"><b>CORREO</b> </label>

                        <div class="col-md-12">
                                <div class="form-line">
                            <input id="email" type="email" class="form-control"  v-model="email" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >

                                <span class="help-block" v-if="errores.email">
                                        <strong>{{ errores.email[0] }}</strong>
                                    </span>
                        </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-md-4 control-label"><b>CONTRASEÑA</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="password" type="password" class="form-control" v-model="password" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >

                                    <span class="help-block" v-if="errores.password">
                                        <strong>{{ errores.password[0] }}</strong>
                                    </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label"><b>CONFIRMAR CONTRASEÑA</b> </label>

                        <div class="col-md-12">
                            <div class="form-line">
                            <input id="password-confirm" type="password" class="form-control" v-model="password_confirmation" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" >
                            </div>
                        </div>
                    </div>  
                    
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary"><b>REGISTRARSE</b> </button>
        </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    export default {
        props: {
            offices: Array
        },
        data(){
            return{
                errores: {},
                name: '',
                ap_paterno: '',
                ap_materno: '',
                dni: '',
                gender: '',
                f_birth: '',
                office_id: 0,
                position: '',
                regime: '',
                phone: '',
                email: '',
                password: '',
                 password_confirmation: '',

                

                
            }
        },
        methods: {
            Submit(){
                let data = {
                    name: this.name,
                    ap_paterno: this.ap_paterno,
                    ap_materno: this.ap_materno,
                    dni: this.dni,
                    gender: this.gender,
                    f_birth: this.f_birth,
                    office_id: this.office_id,
                    position: this.position,
                    regime: this.regime,
                    phone: this.phone,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                
                }
                axios.post('/register ', data).then(res => {
                        location.href = '/home'
                }).catch((error) => {
                    this.errores = error.response.data.errors;
                })
            }
        }
    }
</script>

