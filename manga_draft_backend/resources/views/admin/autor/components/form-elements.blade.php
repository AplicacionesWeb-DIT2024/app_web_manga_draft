<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.autor.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.autor.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('apellido'), 'has-success': fields.apellido && fields.apellido.valid }">
    <label for="apellido" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.autor.columns.apellido') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.apellido" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('apellido'), 'form-control-success': fields.apellido && fields.apellido.valid}" id="apellido" name="apellido" placeholder="{{ trans('admin.autor.columns.apellido') }}">
        <div v-if="errors.has('apellido')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('apellido') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha_nacimiento'), 'has-success': fields.fecha_nacimiento && fields.fecha_nacimiento.valid }">
    <label for="fecha_nacimiento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.autor.columns.fecha_nacimiento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_nacimiento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha_nacimiento'), 'form-control-success': fields.fecha_nacimiento && fields.fecha_nacimiento.valid}" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha_nacimiento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha_nacimiento') }}</div>
    </div>
</div>


