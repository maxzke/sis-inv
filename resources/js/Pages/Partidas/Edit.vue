<template>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0 py-5">                        
                        <h3 class="card-title"><strong> Partida&nbsp;</strong> / Editar</h3>
                        <div class="card-toolbar">
                          <inertia-link :href="route('partidas')" as="button" type="button" 
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
                                    <label>Código</label>
                                    <input
                                      type="text"
                                      class="form-control form-control-sm form-control-solid text-capitalize"
                                      v-model="form.codigo"
                                      :class="(form.errors.codigo  ? 'is-invalid' : '')"
                                      />
                                    <span class="form-text text-danger"
                                      >{{ form.errors.codigo }}.</span
                                      >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">                      
                                  <div class="form-group">
                                      <label>Nombre</label>
                                      <input
                                      type="text"
                                      class="form-control form-control-sm form-control-solid text-uppercase"
                                      v-model="form.nombre"
                                      :class="(form.errors.nombre ? 'is-invalid' : '')"
                                      />
                                      <span class="form-text text-danger"
                                      >{{ form.errors.nombre }}.</span
                                      >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">                      
                                  <div class="form-group">
                                    <label for="exampleTextarea">Detalle</label>
                                    <textarea class="form-control form-control-solid text-uppercase" rows="5"
                                        v-model="form.detalle"></textarea>
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
                                    <button type="submit" class="btn btn-sm btn-light-success mr-2" >
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
    props:{
        partida:Object
    },
    data(){
        return{
            form: this.$inertia.form({
                codigo:this.partida.codigo,
                nombre:this.partida.nombre,
                detalle:this.partida.detalle
            }),
        }
    },
    methods:{
        update() {
            this.form.put(this.route('partidas.update',this.partida.id), {
                onSuccess: () => [this.alert()]
            })
        },
        alert(){
            swal.fire("", "Actualizado !", "success");
        }
    }
};
</script>

<style>
</style>