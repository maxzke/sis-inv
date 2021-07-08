<template>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Entry-->
            <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                    <div class="card card-custom card-stretch gutter-b">
                    <!--begin::Header-->
                    <div class="card-header border-0">                        
                        <h3 class="card-title"><strong> Proveedor&nbsp;</strong> / Nuevo</h3>
                        <div class="card-toolbar">
                          <inertia-link :href="route('proveedores')" as="button" type="button" 
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
                        <form @submit.prevent="update">
                          <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                              <!--begin::form-->
                              <div class="row">
                                <!-- CODIGO  -->
                                <div class="form-group col-md-2">
                                  <label>Código</label>
                                  <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid"
                                    v-model="form.codigo"
                                    :class="(form.errors.codigo  ? 'is-invalid' : '')"
                                    />
                                  <span class="form-text text-danger"
                                    >{{ form.errors.codigo }}</span
                                    >
                                </div> 
                                <!-- NOMBRE  -->                  
                                <div class="form-group col-md-6">
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
                                <!-- RFC  -->                  
                                <div class="form-group col-md-2">
                                    <label>RFC</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.rfc"
                                    :class="(form.errors.rfc ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.rfc }}</span
                                    >
                                </div>
                                <!-- TELEFONO  -->                  
                                <div class="form-group col-md-2">
                                    <label>Telefono</label>
                                    <input
                                    type="number"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.telefono"
                                    :class="(form.errors.telefono ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.telefono }}.</span
                                    >
                                </div>
                              </div>  
                              <div class="row">
                                <!-- CIUDAD  -->                  
                                <div class="form-group col-md-5">
                                    <label>Ciudad</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.ciudad"
                                    :class="(form.errors.ciudad ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.ciudad }}.</span
                                    >
                                </div>
                                <!-- ESTADO  -->                  
                                <div class="form-group col-md-5">
                                    <label>Estado</label>
                                    <!-- <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.estado"
                                    :class="(form.errors.estado ? 'is-invalid' : '')"
                                    /> -->
                                    <select class="form-control form-control-sm form-control-solid text-uppercase"
                                      v-model="form.estado"
                                      :class="(form.errors.estado ? 'is-invalid' : '')">
                                        <option value="no">Seleccione uno...</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="CDMX">Ciudad de México</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                    <span class="form-text text-danger"
                                    >{{ form.errors.estado }}.</span
                                    >
                                </div>
                                <!-- CODIGO POSTAL  -->                  
                                <div class="form-group col-md-2">
                                    <label>CP</label>
                                    <input
                                    type="number"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.cp"
                                    :class="(form.errors.cp ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.cp }}.</span
                                    >
                                </div>
                              </div>
                              <div class="row">
                                <!-- CALLE  -->                  
                                <div class="form-group col-md-5">
                                    <label>Calle</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.calle"
                                    :class="(form.errors.calle ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.calle }}.</span
                                    >
                                </div>
                                <!-- COLONIA  -->                  
                                <div class="form-group col-md-4">
                                    <label>Colonia</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.colonia"
                                    :class="(form.errors.colonia ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.colonia }}.</span
                                    >
                                </div>
                                <!-- GIRO  -->                  
                                <div class="form-group col-md-3">
                                    <label>Giro</label>
                                    <input
                                    type="text"
                                    class="form-control form-control-sm form-control-solid text-uppercase"
                                    v-model="form.giro"
                                    :class="(form.errors.giro ? 'is-invalid' : '')"
                                    />
                                    <span class="form-text text-danger"
                                    >{{ form.errors.giro }}.</span
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
    props:{
        proveedor:Object
    },
    data(){
        return{
            form: this.$inertia.form({
                id:this.proveedor.id,
                codigo:this.proveedor.codigo,
                nombre:this.proveedor.nombre,
                rfc:this.proveedor.rfc,
                telefono:this.proveedor.telefono,
                ciudad:this.proveedor.ciudad,
                estado:this.proveedor.estado,
                cp:this.proveedor.cp,
                calle:this.proveedor.calle,
                colonia:this.proveedor.colonia,
                giro:this.proveedor.giro,
            })
        }
    },
    methods:{
        update() {
            this.form.put(this.route('proveedores.update',this.proveedor.id), {
                onSuccess: () => [this.alert()]
            })
        },
        alert(){
            swal.fire("", "Actualizado !", "success");
        },
        resetForm(){
            this.form.codigo=null;
            this.form.nombre=null;
            this.form.rfc=null;
            this.form.telefono=null;
            this.form.ciudad=null;
            this.form.estado=null;
            this.form.cp=null;
            this.form.calle=null;
            this.form.colonia=null;
            this.form.giro=null;
        }
    }
};
</script>

<style>
</style>