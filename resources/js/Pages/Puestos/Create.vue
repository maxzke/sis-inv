<template>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                    <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0">                        
                        <h3 class="card-title"><strong> Puesto&nbsp;</strong> / Nuevo</h3>
                        <div class="card-toolbar">
                          <inertia-link :href="route('puestos')" as="button" type="button" 
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
                      <div class="col-md-12 mx-auto">
                        <form @submit.prevent="store">
                          <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                              <!--begin::form-->
                              <div class="row">
                                <!-- NOMBRE  -->                  
                                <div class="form-group col-md-12">
                                    <label>Nombre</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.nombre"
                                    :class="(form.errors.nombre ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.nombre }}</span
                                    >
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
                                    <button type="submit" class="btn btn-sm btn-light-success mr-2" >
                                    Guardar
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
export default {
    layout: MetronicLayout,
    data(){
        return{
            form: this.$inertia.form({
                nombre:null
            })
        }
    },
    methods:{
        store() {
            this.form.post(this.route('puestos.store'), {
                onSuccess: () => [this.alert(),this.resetForm()]
            })
        },
        alert(){
            swal.fire("Guardado!", "", "success");
        },
        resetForm(){
            this.form.nombre=null;
        }
    }
};
</script>

<style>
</style>