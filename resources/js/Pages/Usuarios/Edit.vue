<template>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-6 offset-3">
                    <!-- Registrar Nuevo Usuario -->
                    <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">                        
                        <h3 class="card-title"><strong><i class="fas fa-users"></i> Usuarios&nbsp;</strong> / Editar Usuario</h3>
                        <div class="card-toolbar">
                          <inertia-link :href="route('usuarios.index')" as="button" type="button" 
                          class="btn btn-sm btn-light-warning
                              font-weight-bolder font-size-sm
                              mr-3">
                              <i class="fas fa-chevron-left"></i>
                              Volver
                          </inertia-link>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="row">
                      <div class="col-md-8 mx-auto">
                        <form @submit.prevent="update">
                          <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                              <!--begin::form-->
                              <div class="row">
                                <div class="col-md-12">
                                  <!-- Nombre -->
                                  <div class="form-group">
                                    <label>Nombre</label>
                                    <input
                                      type="text"
                                      class="form-control form-control-sm form-control-solid"
                                      v-model="input.name"
                                      :class="(input.emptyName == true ? 'is-invalid' : '')"
                                      />
                                    <span class="form-text text-muted"
                                      >Nombre y apellidos.</span
                                      >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">                      
                                  <div class="form-group">
                                      <label>Correo</label>
                                      <input
                                      type="text"
                                      class="form-control form-control-sm form-control-solid"
                                      v-model="input.email"
                                      :class="(input.emptyEmail == true ? 'is-invalid' : '')"
                                      />
                                  </div>
                                  </div>
                                  
                              </div>
                              <div class="row">
                                <div class="col-md-12">                    
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input
                                        type="password"
                                        class="form-control form-control-sm form-control-solid"
                                        v-model="input.password"
                                        :class="(input.emptyPassword == true ? 'is-invalid' : '')"
                                        placeholder="sin modificar"
                                        />
                                        <span class="form-text text-muted"
                                        >Almenos 8 caracteres.</span>
                                    </div>
                                </div>
                              </div>
                              <!--end::form-->
                            </div>
                          </div>
                          <!--end::Body-->
                          <!--begin::footer-->
                          <div class="card-footer">
                            <div class="row">
                              <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-sm btn-light-success mr-2" 
                                :disabled="input.loading">
                                Actualizar
                                </button>
                              </div>
                            </div>
                          </div>
                          <!--end::footer-->
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Registrar Nuevo Usuario end -->
                </div>
              </div>
            </div>

            <!--end::Container-->
            </div>
            <!--end::Entry-->
        </div>
</template>

<script>
import MetronicLayout from '@/Layouts/MetronicLayout'
import JetNavLink from '@/Jetstream/NavLink'
export default {
   layout: MetronicLayout,
    props:{
      user:Object
    },
    components: {
        JetNavLink
    },
  data(){
    return{
        input: this.$inertia.form({
          _method: 'put',
          userId: this.user.id,
          name:this.user.name,
          username:this.user.username,
          email:this.user.email,
          password:null,
          image:this.user.profile_photo_url,
          imagesend:null,
          state:this.user.state,
          imagenMiniatura:this.user.profile_photo_url,
      }),
    }
  },
  methods:{
    update() {
      this.input.post(this.route('usuario.update', this.user.id), {
        onSuccess: () => this.input.reset('password', 'imagesend'),
      })
    },
    obtenerImagen(e){
      this.input.image = e.target.files[0];
      //this.input.imagesend = e.target.files[0];
      console.log(this.input.image);
      this.cargarImagen(this.input.image);
    },
    cargarImagen(file){
      let reader = new FileReader();
      reader.onload = (e) => {
        this.input.imagenMiniatura = e.target.result;
      }
      reader.readAsDataURL(file);
    },
    cancelarImagen(){
      this.$refs.inputFile.value=null;
      this.input.imagenMiniatura = '';
      this.input.imagesend = '';
      this.input.image = '/assets/media/users/blank.png';
    }
  },
  computed:{
    imagenProprty(){
      return this.input.imagenMiniatura;
    }
  }
};
//create user
</script>

<style>
</style>