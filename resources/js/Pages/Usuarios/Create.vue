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
                        <h3 class="card-title"><strong><i class="fas fa-users"></i> Usuarios&nbsp;</strong> / Nuevo</h3>
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
                        <form @submit.prevent="store">
                          <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                              <!--begin::form-->
                              <div class="row">
                                <div class="col-md-12">
                                  <!-- Nombre -->
                                  <div class="form-group">
                                    <label>Nombre completo</label>
                                    <input
                                      type="text"
                                      class="form-control form-control-sm form-control-solid text-capitalize"
                                      v-model="input.name"
                                      :class="(input.errors.name  ? 'is-invalid' : '')"
                                      />
                                    <span class="form-text text-danger"
                                      >{{ input.errors.name }}.</span
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
                                      :class="(input.errors.email ? 'is-invalid' : '')"
                                      />
                                      <span class="form-text text-danger"
                                      >{{ input.errors.email }}.</span
                                      >
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
                                      placeholder="Almenos 8 caracteres"
                                      v-model="input.password"
                                      :class="(input.errors.password ? 'is-invalid' : '')"
                                      />
                                      <span class="form-text text-danger"
                                      >{{ input.errors.password }}.</span>
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
                                    Guardar
                                    <div class="spinner-grow spinner-grow-sm text-white" role="status" v-if="input.loading">
                                        <span class="sr-only">Loading...</span>
                                    </div>
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
import FlashMessages from '@/Jetstream/FlashMessages'
export default {
   layout: MetronicLayout,
    components: {
        JetNavLink,
        FlashMessages
    },
  data(){
    return{
        input: this.$inertia.form({
          name:null,
          username:null,
          email:null,
          password:null,
          image:null,
          state:'A',
          success:false,
          show:true
      }),
    }
  },
  methods:{
    store() {
      this.input.post(this.route('usuario.store'), {
        onSuccess: () => [this.alert(),this.resetForm()]
      })
    },
    alert(){
        swal.fire("", "Usuario Guardado!", "success");
    },
    resetForm(){
        this.input.name=null;
        this.input.username=null;
        this.input.email=null;
        this.input.password=null;
        this.input.state='A';
        this.input.success=false;
        this.input.show=true;
    }
  }
};
//create user
</script>

<style>
</style>